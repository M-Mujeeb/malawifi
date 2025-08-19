<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>MalaWi‑Fi</title>

    <!-- Tailwind (CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'ui-sans-serif', 'system-ui', '-apple-system', 'Segoe UI', 'Roboto',
                            'Helvetica Neue', 'Arial', 'Noto Sans'
                        ]
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

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <style>
        html,
        body {
            height: 100%;
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-900 font-sans">
    <main class="relative min-h-screen flex items-center justify-center overflow-hidden p-4">
        <!-- Softer background accents -->
        <div class="pointer-events-none absolute -top-24 -left-24 h-72 w-72 rounded-full bg-brand-500/20 blur-3xl">
        </div>
        <div class="pointer-events-none absolute -bottom-24 -right-24 h-72 w-72 rounded-full bg-indigo-400/20 blur-3xl">
        </div>
        <div
            class="absolute inset-0 [background:radial-gradient(circle_at_1px_1px,rgba(2,6,23,0.05)_1px,transparent_0)] [background-size:26px_26px]">
        </div>

        <!-- Card -->
        <!-- Card -->
        <section class="relative z-10 w-full max-w-4xl">
            <div class="rounded-2xl bg-white shadow-card ring-1 ring-slate-200/70 overflow-hidden">
                <div class="grid md:grid-cols-2">
                    <!-- Product Showcase Section -->
                    <div
                        class="bg-slate-100/70 p-8 md:p-10 flex flex-col items-center justify-center text-center order-2 md:order-1">
                        <!-- Logo for DESKTOP only -->
                        <img src="{{ asset('logo.png') }}" alt="" aria-hidden="true"
                            class="hidden md:block h-12 w-auto object-contain mb-4">
                        <img src="{{ asset('malawifi.webp') }}" alt="MalaWi‑Fi Device"
                            class="max-w-xs w-full object-contain mb-4">
                        <h2 class="text-xl font-bold text-slate-800 mb-1">Seamless Wi‑Fi Access</h2>
                        <p class="text-slate-600 text-sm max-w-xs">Tap to connect. The easiest way to share your Wi‑Fi
                            with guests and customers.</p>
                        <a href="https://malawichair.com/products/malawi-fi-tap-to-connect-wi-fi-device" target="_blank"
                            class="mt-6 text-sm font-semibold text-brand-600 hover:text-brand-500 transition-colors">
                            Learn More &rarr;
                        </a>
                    </div>

                    <!-- Auth Section -->
                    <div class="p-8 md:p-10 flex flex-col justify-center order-1 md:order-2">
                        <div class="w-full max-w-sm mx-auto">
                            <!-- Logo for MOBILE only -->
                            <img src="{{ asset('logo.png') }}" alt="MalaWi‑Fi logo"
                                class="block md:hidden h-10 w-auto object-contain mx-auto mb-6">

                            <h3 class="text-2xl font-bold text-slate-800 text-center mb-2">Welcome Back!</h3>
                            <p class="text-slate-500 text-center mb-8">Sign in to manage your devices or create a new
                                account.</p>

                            <div class="space-y-4">
                                <a href="{{ route('login') }}"
                                    class="block w-full text-center bg-brand-600 text-white font-semibold py-3 px-4 rounded-lg hover:bg-brand-500 transition-colors">
                                    Sign In
                                </a>
                                <a href="{{ route('profiles.register') }}"
                                    class="block w-full text-center bg-slate-200 text-slate-700 font-semibold py-3 px-4 rounded-lg hover:bg-slate-300 transition-colors">
                                    Sign Up
                                </a>
                            </div>

                            <div class="text-center mt-8">
                                <p class="text-sm text-slate-500">Don't have a MalaWi‑Fi device?</p>
                                <a href="https://malawichair.com/products/malawi-fi-tap-to-connect-wi-fi-device"
                                    target="_blank" class="font-semibold text-brand-600 hover:text-brand-500 text-md">
                                    Buy Now
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>

</body>

</html>
