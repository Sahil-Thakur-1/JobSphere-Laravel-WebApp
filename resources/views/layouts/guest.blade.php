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

            /* Dot grid */
            .dot-grid {
                background-image: radial-gradient(circle, #cbd5e1 1px, transparent 1px);
                background-size: 24px 24px;
            }

            /* Card fade-up */
            @keyframes fadeUp {
                from { opacity: 0; transform: translateY(20px); }
                to   { opacity: 1; transform: translateY(0); }
            }
            .animate-fade-up {
                animation: fadeUp 0.5s cubic-bezier(0.22, 1, 0.36, 1) both;
            }

            /* Floating label shimmer on the card top accent */
            @keyframes shimmer {
                from { background-position: -200% center; }
                to   { background-position: 200% center; }
            }
            .shimmer-bar {
                background: linear-gradient(90deg, #1d4ed8, #60a5fa, #1d4ed8);
                background-size: 200% auto;
                animation: shimmer 3s linear infinite;
            }

            /* Input focus ring */
            input:focus, select:focus, textarea:focus {
                outline: none;
                box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
            }

            /* Scrollbar */
            ::-webkit-scrollbar { width: 5px; }
            ::-webkit-scrollbar-track { background: transparent; }
            ::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 99px; }
        </style>
    </head>

    <body class="antialiased text-gray-900 bg-slate-50 min-h-screen">

        {{-- ── FULL PAGE LAYOUT ── --}}
        <div class="min-h-screen flex">

            {{-- ── LEFT PANEL (hero, hidden on mobile) ── --}}
            <div class="hidden lg:flex lg:w-1/2 xl:w-[55%] relative bg-blue-700 flex-col justify-between overflow-hidden">

                {{-- Background pattern --}}
                <div class="absolute inset-0 dot-grid opacity-10"></div>

                {{-- Gradient overlays --}}
                <div class="absolute inset-0 bg-gradient-to-br from-blue-900 via-blue-700 to-blue-500 opacity-90"></div>
                <div class="absolute bottom-0 left-0 right-0 h-1/2 bg-gradient-to-t from-blue-950/60 to-transparent"></div>

                {{-- Decorative circles --}}
                <div class="absolute -top-24 -right-24 w-96 h-96 rounded-full bg-white/5 blur-2xl"></div>
                <div class="absolute top-1/3 -left-16 w-64 h-64 rounded-full bg-blue-400/20 blur-3xl"></div>
                <div class="absolute -bottom-16 right-16 w-80 h-80 rounded-full bg-indigo-500/20 blur-3xl"></div>

                {{-- Content --}}
                <div class="relative z-10 p-10 xl:p-14 flex flex-col h-full justify-between">

                    {{-- Logo --}}
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-xl bg-white/15 backdrop-blur flex items-center justify-center border border-white/20">
                            <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20 7H4a2 2 0 00-2 2v10a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v2"/>
                            </svg>
                        </div>
                        <span class="font-display font-semibold text-white text-xl tracking-tight">
                            {{ config('app.name', 'JobSphere') }}
                        </span>
                    </div>

                    {{-- Hero text --}}
                    <div class="space-y-6">
                        <div>
                            <p class="text-blue-300 text-sm font-semibold uppercase tracking-widest mb-3">Your Career, Elevated</p>
                            <h1 class="font-display text-4xl xl:text-5xl font-semibold text-white leading-tight">
                                Find your next<br>
                                <span class="text-blue-200">dream opportunity</span>
                            </h1>
                        </div>
                        <p class="text-blue-100/80 text-base leading-relaxed max-w-sm">
                            Connect with top companies and talented professionals. Your perfect match is just a few clicks away.
                        </p>

                        {{-- Stats --}}
                        <div class="flex items-center gap-6 pt-2">
                            <div>
                                <p class="font-display text-2xl font-semibold text-white">10k+</p>
                                <p class="text-blue-300 text-xs mt-0.5 font-medium">Active Jobs</p>
                            </div>
                            <div class="w-px h-10 bg-white/15"></div>
                            <div>
                                <p class="font-display text-2xl font-semibold text-white">5k+</p>
                                <p class="text-blue-300 text-xs mt-0.5 font-medium">Companies</p>
                            </div>
                            <div class="w-px h-10 bg-white/15"></div>
                            <div>
                                <p class="font-display text-2xl font-semibold text-white">50k+</p>
                                <p class="text-blue-300 text-xs mt-0.5 font-medium">Candidates</p>
                            </div>
                        </div>
                    </div>

                    {{-- Testimonial --}}
                    <div class="bg-white/10 backdrop-blur-sm border border-white/15 rounded-2xl p-5">
                        <div class="flex gap-1 mb-3">
                            @for($i = 0; $i < 5; $i++)
                                <svg class="w-4 h-4 text-amber-400 fill-amber-400" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            @endfor
                        </div>
                        <p class="text-white/90 text-sm leading-relaxed italic">
                            "Found my dream job within two weeks. The platform made it incredibly easy to connect with the right companies."
                        </p>
                        <div class="flex items-center gap-2.5 mt-4">
                            <div class="w-8 h-8 rounded-full bg-blue-400/30 border border-white/20 flex items-center justify-center text-white text-xs font-bold">S</div>
                            <div>
                                <p class="text-white text-sm font-semibold">Sarah K.</p>
                                <p class="text-blue-300 text-xs">Software Engineer at Google</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            {{-- ── RIGHT PANEL (auth form) ── --}}
            <div class="w-full lg:w-1/2 xl:w-[45%] flex flex-col justify-center items-center px-6 py-12 sm:px-10 bg-white relative">

                {{-- Subtle top dot grid --}}
                <div class="absolute inset-0 dot-grid opacity-[0.03] pointer-events-none"></div>

                {{-- Mobile logo (only shows on small screens) ── --}}
                <div class="lg:hidden flex items-center gap-2.5 mb-10">
                    <div class="w-8 h-8 rounded-xl bg-blue-600 flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20 7H4a2 2 0 00-2 2v10a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v2"/>
                        </svg>
                    </div>
                    <span class="font-display font-semibold text-gray-900 text-lg tracking-tight">
                        {{ config('app.name', 'JobSphere') }}
                    </span>
                </div>

                {{-- Auth Card --}}
                <div class="w-full max-w-md animate-fade-up relative z-10">

                    {{-- Shimmer accent bar --}}
                    <div class="shimmer-bar h-1 rounded-t-xl w-full mb-0"></div>

                    {{-- Card --}}
                    <div class="bg-white border border-gray-100 rounded-b-2xl shadow-xl shadow-gray-100/80 px-8 py-8">
                        {{ $slot }}
                    </div>

                    {{-- Footer note --}}
                    <p class="text-center text-xs text-gray-400 mt-6">
                        &copy; {{ date('Y') }} {{ config('app.name', 'JobSphere') }} &middot;
                        <a href="#" class="hover:text-blue-600 transition-colors">Privacy</a> &middot;
                        <a href="#" class="hover:text-blue-600 transition-colors">Terms</a>
                    </p>
                </div>

            </div>
        </div>

    </body>
</html>