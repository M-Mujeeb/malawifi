<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ProfileLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ProfileController extends Controller
{
    /**
     * Show public profile creation form
     */
    public function create()
{
    $user = Auth::user();

    if (!$user) {
        return redirect()->route('profiles.login')
            ->withErrors(['auth' => 'Please login first.']);
    }

    // Eager-load links once
    $user->load(['links' => fn ($q) => $q->orderBy('type')->latest()]);

    // Split links for convenient usage in Blade
    $wifi    = $user->links->firstWhere('type', 'wifi');
    $socials = $user->links->whereIn('type', ['facebook','instagram','whatsapp','website','google']);

    return view('profiles.create', [
        'user'    => $user,
        'wifi'    => $wifi,
        'socials' => $socials,
    ]);
}

    /**
     * Store public profile directly on users table
     * and create a flexible link record for Wi‑Fi (optional).
     */
    public function store(Request $request)
{
    $user = Auth::user();
    
    if (!$user) {
        return redirect()->route('profiles.login')
            ->withErrors(['auth' => 'Please login first.']);
    }

    $validated = $request->validate([
        'name' => ['required', 'string', 'max:100'],
        'company' => ['nullable', 'string', 'max:150'],
        'phone' => ['nullable', 'string', 'max:20'],
        'username' => [
            'required',
            'string',
            'max:30',
            'regex:/^[A-Za-z0-9._-]+$/',
            Rule::unique('users', 'username')->ignore($user->id),
            Rule::notIn(['create', 'admin', 'login', 'register', 'api', 'dashboard']),
        ],
        'email' => ['nullable', 'email', 'max:190', Rule::unique('users', 'email')->ignore($user->id)],
        'profile_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        'cover_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:6144'],
        'wifi_encryption' => ['nullable', Rule::in(['WPA', 'WEP', 'nopass', 'WPA2'])],
        'wifi_ssid' => ['nullable', 'string', 'max:100'],
        'wifi_password' => ['nullable', 'string', 'max:190'],
        'social_links' => ['nullable', 'array'],
        'social_links.*.platform' => ['required', Rule::in(['facebook', 'instagram', 'google'])],
        'social_links.*.title' => ['required', 'string', 'max:100'],
        'social_links.*.link' => ['required', 'url', 'max:255'],
        'social_links.*.image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
    ]);

    // Normalize values
    if (($validated['wifi_encryption'] ?? null) === 'WPA2') {
        $validated['wifi_encryption'] = 'WPA';
    }
    $validated['username'] = Str::lower($validated['username']);

    // Handle uploads
    $profilePath = $request->file('profile_image')
        ? $request->file('profile_image')->store('profiles', 'public')
        : $user->profile_image_path;

    $coverPath = $request->file('cover_image')
        ? $request->file('cover_image')->store('covers', 'public')
        : $user->cover_image_path;

    // Update user
    $user->update([
        'username' => $validated['username'],
        'name' => $validated['name'],
        'company' => $validated['company'] ?? null,
        'email' => $validated['email'] ?? null,
        'phone' => $validated['phone'] ?? null,
        'profile_image_path' => $profilePath,
        'cover_image_path' => $coverPath,
    ]);

    // Update or create Wi-Fi link
    $wifiLink = $user->links()->where('type', 'wifi')->first();
    if (!empty($validated['wifi_ssid'])) {
        $wifiData = [
            'user_id' => $user->id,
            'type' => 'wifi',
            'label' => 'Wi‑Fi',
            'data' => [
                'encryption' => $validated['wifi_encryption'] ?? 'nopass',
                'ssid' => $validated['wifi_ssid'],
                'password' => $validated['wifi_password'] ?? '',
            ],
        ];
        if ($wifiLink) {
            $wifiLink->update($wifiData);
        } else {
            ProfileLink::create($wifiData);
        }
    } elseif ($wifiLink) {
        $wifiLink->delete();
    }

    // Update social links
    $user->links()->where('type', 'social')->delete();
    if (!empty($validated['social_links'])) {
        foreach ($validated['social_links'] as $index => $social) {
            $imagePath = $request->file("social_links.{$index}.image")
                ? $request->file("social_links.{$index}.image")->store('social_icons', 'public')
                : null;

            ProfileLink::create([
                'user_id' => $user->id,
                'type' => 'social',
                'label' => $social['title'],
                'data' => [
                    'platform' => $social['platform'],
                    'url' => $social['link'],
                    'icon_path' => $imagePath,
                ],
            ]);
        }
    }

    // Build public URL
    $url = route('profiles.show', $user->username);

    return redirect()
        ->route('profiles.create')
        ->with('created_url', $url)
        ->with('success', 'Profile updated successfully!');
}

    /**
     * Public profile page (by username)
     */
    public function show(User $user)
{
    $user->load(['links' => fn ($q) => $q->orderBy('type')->latest()]);
    
    $wifi = $user->links->firstWhere('type', 'wifi');
    $socials = $user->links->where('type', 'social');

    return view('profiles.show', [
        'profile' => $user,
        'wifi' => $wifi,
        'socials' => $socials,
    ]);
}

    /**
     * Wi‑Fi QR code image endpoint (by username)
     */
    public function wifiQr(User $user)
    {
        $wifi = $user->links()->where('type', 'wifi')->first();
        if (!$wifi)
            abort(404);

        $enc = $wifi->data['encryption'] ?? 'nopass';
        if ($enc === 'WPA2')
            $enc = 'WPA';

        $ssid = self::escapeWifi((string) ($wifi->data['ssid'] ?? ''));
        $pass = self::escapeWifi((string) ($wifi->data['password'] ?? ''));

        $payload = "WIFI:T:{$enc};S:{$ssid};";
        if ($enc !== 'nopass')
            $payload .= "P:{$pass};";
        $payload .= "H:false;;";

        // Use SVG output instead of PNG
        $svg = QrCode::format('svg')
            ->size(300)
            ->margin(1)
            ->generate($payload);

        return response($svg)->header('Content-Type', 'image/svg+xml');
    }


    private static function escapeWifi(string $value): string
    {
        // Escape special characters as per spec
        return str_replace(
            ['\\', ';', ',', ':', '"', "'"],
            ['\\\\', '\;', '\,', '\:', '\"', '\''],
            $value
        );
    }

    public function login()
    {
        return view('profiles.login');
    }

    public function loginSubmit(Request $request)
    {
        $messages = [
            'email.required' => 'Email is required',
            'email.email' => 'Please enter a valid email address',
            'password.required' => 'Password is required',
        ];

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:8'],
        ], $messages);

        // Try to login using session-based auth
        if (!Auth::attempt($credentials, $request->boolean('remember'))) {
            // back with errors + old email filled
            return back()->withErrors([
                'email' => 'Invalid email or password.',
            ])->onlyInput('email');
        }

        // Prevent session fixation
        $request->session()->regenerate();

        // Create a simple "web token" (NOT an API token; for your own page checks)
        $webToken = Str::random(60);
        // Store in session so all web pages can access it
        session(['access_token' => $webToken]);

        // Optionally: also flash it to the next page (use session('token') in view)
        return redirect()
            ->route('profiles.create')   // change to your route name
            ->with('success', 'Logged in successfully!')
            ->with('token', $webToken);
    }

    public function register()
    {
        return view('profiles.register');
    }

    public function registerSubmit(Request $request)
    {
        $messages = [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.email' => 'Email must be a valid email address',
            'email.unique' => 'This email is already registered',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 8 characters',
        ];

        $request->validate([
            'name' => 'required|string|min:2|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ], $messages);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->name . rand(1000, 9999),
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('profiles.login')
            ->with('success', 'Account created successfully! Please log in.');
    }

    public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken(); 
    $request->session()->forget('access_token');

    return redirect()->route('profiles.login')
        ->with('success', 'Logged out.');
}

}
