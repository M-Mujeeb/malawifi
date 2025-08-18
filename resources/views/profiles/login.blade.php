<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>MalaWi-fi - Login</title>

    <!-- Tailwind CSS (CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: [
                            'Inter',
                            'ui-sans-serif', 'system-ui', '-apple-system', 'Segoe UI',
                            'Roboto', 'Helvetica Neue', 'Arial', 'Noto Sans'
                        ]
                    },
                    boxShadow: {
                        glow: '0 10px 40px -10px rgba(99,102,241,0.35)'
                    },
                    colors: {
                        brand: {
                            50: '#eef2ff',
                            100: '#e0e7ff',
                            200: '#c7d2fe',
                            300: '#a5b4fc',
                            400: '#818cf8',
                            500: '#6366f1',
                            600: '#5458e6',
                            700: '#4343c7',
                            800: '#3738a3',
                            900: '#2e2f89'
                        }
                    }
                }
            }
        }
    </script>

    <!-- Lucide Icons (vanilla) -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        html,
        body {
            height: 100%;
        }

        ::-webkit-scrollbar {
            width: 10px;
            height: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(100, 116, 139, .35);
            border-radius: 8px;
        }
    </style>

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('favicon.ico') }}">
</head>

<body class="bg-slate-50 text-slate-900 font-sans">
    <main class="relative min-h-screen flex items-center justify-center overflow-hidden">
        <!-- Background: gradient blobs + subtle grid -->
        <div class="pointer-events-none absolute -top-20 -left-20 h-72 w-72 rounded-full bg-brand-500/30 blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-20 -right-20 h-72 w-72 rounded-full bg-indigo-400/30 blur-3xl">
        </div>
        <div
            class="absolute inset-0 [background:radial-gradient(circle_at_1px_1px,rgba(2,6,23,0.06)_1px,transparent_0)] [background-size:28px_28px]">
        </div>

        <!-- Card -->
        <section class="relative z-10 w-full max-w-md px-4">
            <div class="rounded-2xl p-8 md:p-10 bg-white/60 backdrop-blur-xl ring-1 ring-slate-200/70 shadow-glow">
                <div class="flex flex-col items-center mb-6">
                    <img src="{{ asset('logo.png') }}" alt="Logo" class="h-12 w-auto block object-contain mb-3">
                    <h1 class="text-xl font-semibold tracking-tight">Welcome back</h1>
                </div>
                @if ($errors->any())
                    <div id="errorMsg" class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl shake">
                        <div class="flex items-center gap-2 text-red-700 mb-2">
                            <i data-lucide="alert-circle" class="w-5 h-5"></i>
                            <span class="font-medium">Please fix the following errors:</span>
                        </div>
                        <ul class="list-disc ml-7 text-red-600 text-sm space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div id="successMsg" class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl bounce-in">
                        <div class="flex items-center gap-2 text-green-700">
                            <i data-lucide="check-circle" class="w-5 h-5 success-checkmark"></i>
                            <span class="font-medium">{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                <p class="text-sm text-slate-600 mb-6">Sign in to continue to your dashboard.</p>

                <form id="loginForm" method="POST" action="{{ route('profiles.loginSubmit') }}"
                    enctype="multipart/form-data" class="space-y-4" novalidate>
                    @csrf
                    <!-- Email -->
                    <div class="group relative">
                        <div
                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-slate-400 group-focus-within:text-brand-500 transition-colors">
                            <i data-lucide="mail" class="h-4 w-4"></i>
                        </div>
                        <input id="email" type="email" inputmode="email" value="{{ old('email') }}"
                            autocomplete="email" name="email" placeholder="Email address"
                            class="w-full pl-10 pr-4 py-3 rounded-xl bg-white/80 ring-1 ring-slate-200/70 focus:outline-none focus:ring-2 focus:ring-brand-500/70 placeholder:text-slate-400 transition"
                            required />
                    </div>

                    <!-- Password -->
                    <div class="group relative">
                        <div
                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-slate-400 group-focus-within:text-brand-500 transition-colors">
                            <i data-lucide="lock" class="h-4 w-4"></i>
                        </div>
                        <input id="password" type="password" autocomplete="current-password" name="password"
                            placeholder="Password"
                            class="w-full pl-10 pr-10 py-3 rounded-xl bg-white/80 ring-1 ring-slate-200/70 focus:outline-none focus:ring-2 focus:ring-brand-500/70 placeholder:text-slate-400 transition"
                            required />
                        <button type="button" id="togglePassword"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-400 hover:text-slate-600">
                            <i data-lucide="eye" class="h-4 w-4" aria-hidden="true"></i>
                            <span class="sr-only">Show password</span>
                        </button>
                    </div>

                    <div id="errorMsg" class="hidden text-sm text-red-600"></div>



                    <button type="submit"
                        class="w-full inline-flex items-center justify-center gap-2 py-3 px-4 rounded-xl bg-brand-600 text-white font-semibold hover:bg-brand-500 focus:outline-none focus:ring-4 focus:ring-brand-500/30 transition">
                        <i data-lucide="log-in" class="h-5 w-5"></i>
                        Sign in
                    </button>
                    <a href="{{ route('oauth.google.redirect') }}"
                        class="w-full inline-flex items-center justify-center gap-2 py-3 px-4 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 text-slate-700 font-medium transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 48 48">
                            <path fill="#FFC107"
                                d="M43.611 20.083H42V20H24v8h11.303C33.677 32.659 29.223 36 24 36c-6.627 0-12-5.373-12-12s5.373-12 12-12c3.059 0 5.84 1.156 7.957 3.043l5.657-5.657C34.671 6.053 29.601 4 24 4 12.955 4 4 12.955 4 24s8.955 20 20 20 20-8.955 20-20c0-1.341-.138-2.651-.389-3.917z" />
                            <path fill="#FF3D00"
                                d="M6.306 14.691l6.571 4.814C14.388 16.286 18.83 13 24 13c3.059 0 5.84 1.156 7.957 3.043l5.657-5.657C34.671 6.053 29.601 4 24 4c-7.938 0-14.64 4.614-17.694 10.691z" />
                            <path fill="#4CAF50"
                                d="M24 44c5.166 0 9.86-1.984 13.409-5.217l-6.211-5.268C29.141 35.091 26.715 36 24 36c-5.202 0-9.646-3.317-11.292-7.946l-6.549 5.05C9.186 39.37 16.061 44 24 44z" />
                            <path fill="#1976D2"
                                d="M43.611 20.083H42V20H24v8h11.303c-1.093 3.106-3.353 5.559-6.105 7.066l.004-.003 6.211 5.268C37.129 41.854 44 37.5 44 24c0-1.341-.138-2.651-.389-3.917z" />
                        </svg>
                        Continue with Google
                    </a>


                    <p class="text-center text-sm text-slate-600">
                        Don’t have an account?
                        <a href="{{ route('profiles.register') }}"
                            class="font-semibold text-brand-600 hover:text-brand-500">Sign up</a>
                    </p>
                </form>
            </div>
        </section>
    </main>

    <script>
        // Initialize Lucide icons
        lucide.createIcons();

        // Simple validation + demo submit
        const form = document.getElementById('loginForm');
        const email = document.getElementById('email');
        const password = document.getElementById('password');
        const errorMsg = document.getElementById('errorMsg');
        const toggle = document.getElementById('togglePassword');
        const themeToggle = document.getElementById('themeToggle');

        // Password show/hide
        toggle.addEventListener('click', () => {
            const isPw = password.getAttribute('type') === 'password';
            password.setAttribute('type', isPw ? 'text' : 'password');
            toggle.innerHTML = isPw ? '<i data-lucide="eye-off" class="h-4 w-4"></i>' :
                '<i data-lucide="eye" class="h-4 w-4"></i>';
            lucide.createIcons();
        });

        // Form submit (demo only)
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            errorMsg.classList.add('hidden');
            const mail = email.value.trim();
            const pass = password.value.trim();
            const valid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(mail);
            if (!mail || !pass) {
                showError('Please enter your email and password.');
                return;
            }
            if (!valid) {
                showError('Enter a valid email address.');
                return;
            }

            form.submit();
            // reset eye icon
            toggle.innerHTML = '<i data-lucide="eye" class="h-4 w-4"></i>';
            lucide.createIcons();
        });

        function showError(msg) {
            errorMsg.textContent = msg;
            errorMsg.classList.remove('hidden');
        }
    </script>
</body>

</html>
