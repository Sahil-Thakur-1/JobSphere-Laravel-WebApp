<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'JobSphere') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600;9..40,700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body { font-family: 'DM Sans', sans-serif; }
            .font-display { font-family: 'Playfair Display', serif; }

            /* Frosted glass nav */
            .nav-glass {
                background: rgba(255, 255, 255, 0.85);
                backdrop-filter: blur(16px) saturate(180%);
                -webkit-backdrop-filter: blur(16px) saturate(180%);
            }

            /* Subtle dot grid background */
            .dot-grid {
                background-image: radial-gradient(circle, #d1d5db 1px, transparent 1px);
                background-size: 28px 28px;
            }

            /* Fade up animation */
            @keyframes fadeUp {
                from { opacity: 0; transform: translateY(18px); }
                to   { opacity: 1; transform: translateY(0); }
            }
            .animate-fade-up {
                animation: fadeUp 0.5s cubic-bezier(0.22, 1, 0.36, 1) both;
            }

            /* Scrollbar */
            ::-webkit-scrollbar { width: 5px; }
            ::-webkit-scrollbar-track { background: transparent; }
            ::-webkit-scrollbar-thumb { background: #e5e7eb; border-radius: 99px; }
            ::-webkit-scrollbar-thumb:hover { background: #9ca3af; }

            /* Header accent blob */
            .header-blob {
                background: radial-gradient(ellipse at top right, #eff6ff 0%, transparent 70%);
            }
        </style>
    </head>

    <body class="antialiased text-gray-900 bg-gray-50 max-h-screen overflow-x-hidden">

        {{-- APP SHELL --}}
        <div class="min-h-screen flex flex-col">

            {{-- ── DOT GRID TEXTURE (fixed) ── --}}
            <div class="dot-grid fixed inset-0 opacity-40 pointer-events-none z-0"></div>

            {{-- ── STICKY NAVIGATION ── --}}
            <div class="nav-glass sticky top-0 z-50 border-b border-gray-100 shadow-sm">
                @include('layouts.navigation')
            </div>

            {{-- ── PAGE HEADING ── --}}
            @isset($header)
                <header class="header-blob relative z-10 bg-white border-b border-gray-100">
                    {{-- Accent line top --}}
                    <div class="h-0.5 bg-gradient-to-r from-blue-600 via-blue-400 to-transparent"></div>

                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8">
                        <div class="flex items-start justify-between gap-4 flex-wrap">
                            <div>
                                {{ $header }}
                            </div>
                        </div>
                    </div>
                </header>
            @endisset

            {{-- ── MAIN CONTENT ── --}}
            <main class="relative z-10 flex-1 animate-fade-up">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-10">
                    {{ $slot }}
                </div>
            </main>

            {{-- ── FOOTER ── --}}
            <footer class="relative z-10 bg-white border-t border-gray-100">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-4">

                        {{-- Brand --}}
                        <div class="flex items-center gap-2">
                            <div class="w-7 h-7 rounded-lg bg-blue-600 flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20 7H4a2 2 0 00-2 2v10a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v2"/>
                                </svg>
                            </div>
                            <span class="font-display font-semibold text-gray-900 text-sm tracking-tight">
                                {{ config('app.name', 'JobSphere') }}
                            </span>
                        </div>

                        {{-- Links --}}
                        <nav class="flex items-center gap-6">
                            <a href="#" class="text-xs text-gray-500 hover:text-blue-600 transition-colors font-medium">About</a>
                            <a href="#" class="text-xs text-gray-500 hover:text-blue-600 transition-colors font-medium">Privacy</a>
                            <a href="#" class="text-xs text-gray-500 hover:text-blue-600 transition-colors font-medium">Terms</a>
                            <a href="#" class="text-xs text-gray-500 hover:text-blue-600 transition-colors font-medium">Contact</a>
                        </nav>

                        {{-- Copyright --}}
                        <p class="text-xs text-gray-400">
                            &copy; {{ date('Y') }} {{ config('app.name', 'JobSphere') }}. All rights reserved.
                        </p>

                    </div>
                </div>
            </footer>

        </div>{{-- end app-shell --}}

    </body>
</html>