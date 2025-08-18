<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>MalaWi‑Fi </title>

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

    <!-- Lucide -->
    <script src="https://unpkg.com/lucide@latest"></script>

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <style>
        html,
        body {
            height: 100%;
        }

        .input-icon {
            position: absolute;
            left: .875rem;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-900 font-sans">
    <main class="relative min-h-screen flex items-center justify-center overflow-hidden">
        <!-- softer background accents -->
        <div class="pointer-events-none absolute -top-24 -left-24 h-72 w-72 rounded-full bg-brand-500/20 blur-3xl">
        </div>
        <div class="pointer-events-none absolute -bottom-24 -right-24 h-72 w-72 rounded-full bg-indigo-400/20 blur-3xl">
        </div>
        <div
            class="absolute inset-0 [background:radial-gradient(circle_at_1px_1px,rgba(2,6,23,0.05)_1px,transparent_0)] [background-size:26px_26px]">
        </div>

        <!-- Card -->
        <section class="relative z-10 w-full max-w-md px-4">
            <div class="rounded-2xl p-8 md:p-9 bg-white shadow-card ring-1 ring-slate-200/70">
                <!-- Logo + heading -->
                <div class="flex flex-col items-center mb-6">
                    <img src="{{ asset('logo.png') }}" alt="Logo" class="h-12 w-auto block object-contain mb-3">
                    <h1 class="text-xl font-semibold tracking-tight">Coming Soon</h1>
                    <p class="text-slate-600 text-sm mt-1">MalaWi‑Fi is currently under development and will be available soon.</p>
                    <a href="{{ route('login') }}" class="font-semibold text-brand-600 hover:text-brand-500">Sign
                        in</a>
                </div>
            </div>
        </section>
    </main>

  
</body>

</html>
