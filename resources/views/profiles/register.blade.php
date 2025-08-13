<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>MalaWi‑Fi • Sign Up</title>

  <!-- Tailwind (CDN) -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          fontFamily: { sans: ['Inter','ui-sans-serif','system-ui','-apple-system','Segoe UI','Roboto','Helvetica Neue','Arial','Noto Sans'] },
          colors: {
            brand: { 50:'#eef2ff',100:'#e0e7ff',200:'#c7d2fe',300:'#a5b4fc',400:'#818cf8',500:'#6366f1',600:'#5458e6',700:'#4343c7',800:'#3738a3',900:'#2e2f89' }
          },
          boxShadow: {
            card: '0 10px 30px -12px rgba(2,6,23,0.18)',
            ring: '0 0 0 1px rgba(15,23,42,0.06)'
          }
        }
      }
    }
  </script>

  <!-- Inter font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- Lucide -->
  <script src="https://unpkg.com/lucide@latest"></script>

  <style>
    html, body { height: 100%; }
    .input-icon { position:absolute; left:.875rem; top:50%; transform:translateY(-50%); color:#94a3b8 }
  </style>
</head>
<body class="bg-slate-50 text-slate-900 font-sans">
  <main class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <!-- softer background accents -->
    <div class="pointer-events-none absolute -top-24 -left-24 h-72 w-72 rounded-full bg-brand-500/20 blur-3xl"></div>
    <div class="pointer-events-none absolute -bottom-24 -right-24 h-72 w-72 rounded-full bg-indigo-400/20 blur-3xl"></div>
    <div class="absolute inset-0 [background:radial-gradient(circle_at_1px_1px,rgba(2,6,23,0.05)_1px,transparent_0)] [background-size:26px_26px]"></div>

    <!-- Card -->
    <section class="relative z-10 w-full max-w-md px-4">
      <div class="rounded-2xl p-8 md:p-9 bg-white shadow-card ring-1 ring-slate-200/70">
        <!-- Logo + heading -->
        <div class="flex flex-col items-center mb-6">
          <img src="{{ asset('logo.png') }}" alt="Logo" class="h-12 w-auto block object-contain mb-3">
          <h1 class="text-xl font-semibold tracking-tight">Create your account</h1>
          <p class="text-slate-600 text-sm mt-1">Access your MalaWi‑Fi dashboard</p>
        </div>

        {{-- Backend errors (auto-hide) --}}
        @if ($errors->any())
          <div id="alert-errors" class="mb-5 rounded-xl border border-red-200 bg-red-50 p-3">
            <div class="flex items-center gap-2 text-red-700 mb-1">
              <i data-lucide="alert-circle" class="w-4 h-4"></i>
              <span class="font-medium">Please fix the following:</span>
            </div>
            <ul class="list-disc ml-6 text-red-700 text-sm space-y-1">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        {{-- Success flash (auto-hide) --}}
        @if (session('success'))
          <div id="alert-success" class="mb-5 rounded-xl border border-green-200 bg-green-50 p-3">
            <div class="flex items-center gap-2 text-green-700">
              <i data-lucide="check-circle" class="w-4 h-4"></i>
              <span class="font-medium">{{ session('success') }}</span>
            </div>
          </div>
        @endif

        <form id="signupForm" method="POST" action="{{ route('profiles.registerSubmit') }}" novalidate class="space-y-4">
          @csrf

          <!-- Name -->
          <div class="relative">
            <i data-lucide="user" class="input-icon w-4 h-4"></i>
            <input id="name" name="name" type="text" autocomplete="name" value="{{ old('name') }}"
                   placeholder="Full name"
                   class="w-full pl-10 pr-3 py-3 rounded-xl bg-white ring-1 ring-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500/70">
          </div>

          <!-- Email -->
          <div class="relative">
            <i data-lucide="mail" class="input-icon w-4 h-4"></i>
            <input id="email" name="email" type="email" autocomplete="email" value="{{ old('email') }}"
                   placeholder="Email address"
                   class="w-full pl-10 pr-3 py-3 rounded-xl bg-white ring-1 ring-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500/70">
          </div>

          <!-- Password -->
          <div class="relative">
            <i data-lucide="lock" class="input-icon w-4 h-4"></i>
            <input id="password" name="password" type="password" autocomplete="new-password"
                   placeholder="Password (min 8 characters)"
                   class="w-full pl-10 pr-10 py-3 rounded-xl bg-white ring-1 ring-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500/70" minlength="8">
            <button type="button" id="togglePassword"
                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-400 hover:text-slate-600">
              <i data-lucide="eye" class="h-4 w-4"></i>
              <span class="sr-only">Show password</span>
            </button>
          </div>

          <!-- Confirm -->
          <div class="relative">
            <i data-lucide="shield-check" class="input-icon w-4 h-4"></i>
            <input id="confirmPassword" name="confirmPassword" type="password" autocomplete="new-password"
                   placeholder="Confirm password"
                   class="w-full pl-10 pr-10 py-3 rounded-xl bg-white ring-1 ring-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500/70" minlength="8">
            <button type="button" id="toggleConfirm"
                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-400 hover:text-slate-600">
              <i data-lucide="eye" class="h-4 w-4"></i>
              <span class="sr-only">Show password</span>
            </button>
          </div>

          <!-- client-side error (unique id, not clashing with backend) -->
          <div id="clientError" class="hidden text-sm text-red-600"></div>

          <button type="submit"
                  class="w-full inline-flex items-center justify-center gap-2 py-3 px-4 rounded-xl bg-brand-600 text-white font-semibold hover:bg-brand-500 focus:outline-none focus:ring-4 focus:ring-brand-500/30">
            <i data-lucide="user-plus" class="h-5 w-5"></i>
            Create account
          </button>

          <p class="text-center text-sm text-slate-600">
            Already have an account?
            <a href="{{ route('profiles.login') }}" class="font-semibold text-brand-600 hover:text-brand-500">Sign in</a>
          </p>
        </form>
      </div>
    </section>
  </main>

  <script>
    // init icons
    document.addEventListener('DOMContentLoaded', () => { if (window.lucide) lucide.createIcons(); });

    // auto-hide alerts
    (function autoHideAlerts(){
      const hide = (id) => {
        const el = document.getElementById(id);
        if (!el) return;
        setTimeout(() => {
          el.classList.add('opacity-0','transition','duration-500');
          setTimeout(() => el.remove(), 500);
        }, 4000);
      };
      hide('alert-errors');
      hide('alert-success');
    })();

    // form validation
    const form = document.getElementById('signupForm');
    const nameEl = document.getElementById('name');
    const emailEl = document.getElementById('email');
    const passEl = document.getElementById('password');
    const confirmEl = document.getElementById('confirmPassword');
    const clientError = document.getElementById('clientError');

    const togglePassword = document.getElementById('togglePassword');
    const toggleConfirm  = document.getElementById('toggleConfirm');

    function toggleEye(input, btn){
      const show = input.type === 'password';
      input.type = show ? 'text' : 'password';
      btn.innerHTML = show ? '<i data-lucide="eye-off" class="h-4 w-4"></i>' : '<i data-lucide="eye" class="h-4 w-4"></i>';
      if (window.lucide) lucide.createIcons();
    }
    togglePassword.addEventListener('click', () => toggleEye(passEl, togglePassword));
    toggleConfirm .addEventListener('click', () => toggleEye(confirmEl, toggleConfirm));

    form.addEventListener('submit', (e) => {
      clientError.classList.add('hidden');
      const n = nameEl.value.trim();
      const mail = emailEl.value.trim();
      const pass = passEl.value.trim();
      const conf = confirmEl.value.trim();

      if (!n || !mail || !pass || !conf) { e.preventDefault(); return showError('Please fill all fields.'); }
      if (n.length < 2) { e.preventDefault(); return showError('Name must be at least 2 characters.'); }
      const validEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(mail);
      if (!validEmail) { e.preventDefault(); return showError('Enter a valid email address.'); }
      if (pass.length < 8) { e.preventDefault(); return showError('Password must be at least 8 characters.'); }
      if (pass !== conf) { e.preventDefault(); return showError('Passwords do not match.'); }
      // allow submit
    });

    function showError(msg){
      clientError.textContent = msg;
      clientError.classList.remove('hidden');
      clientError.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
  </script>
</body>
</html>
