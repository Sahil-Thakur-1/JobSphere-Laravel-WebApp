<x-app-layout>
    <x-slot name="header">
        {{-- Page title + breadcrumb --}}
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center shrink-0">
                <svg class="w-5 h-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
            </div>
            <div>
                <h2 class="font-display font-semibold text-xl text-gray-900 leading-tight tracking-tight">
                    {{ __('My Profile') }}
                </h2>
                <p class="text-sm text-gray-500 mt-0.5">Manage your personal information and account settings</p>
            </div>
        </div>
    </x-slot>

    <style>
        .font-display { font-family: 'Playfair Display', serif; }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(14px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .section-card {
            animation: fadeUp 0.4s cubic-bezier(0.22, 1, 0.36, 1) both;
        }
        .section-card:nth-child(1) { animation-delay: 0.05s; }
        .section-card:nth-child(2) { animation-delay: 0.12s; }
        .section-card:nth-child(3) { animation-delay: 0.19s; }
    </style>

    <div class="space-y-6">

        {{-- ── AVATAR / PROFILE HERO ── --}}
        <div class="section-card bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
            {{-- Blue accent bar --}}
            <div class="h-1 bg-gradient-to-r from-blue-600 via-blue-400 to-transparent"></div>

            <div class="px-6 py-6 sm:px-8 flex flex-col sm:flex-row items-start sm:items-center gap-5">
                {{-- Avatar --}}
                <div class="relative shrink-0">
                    <div class="w-16 h-16 rounded-2xl bg-blue-600 flex items-center justify-center shadow-md shadow-blue-200">
                        <span class="text-white text-2xl font-bold font-display">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </span>
                    </div>
                    <div class="absolute -bottom-1 -right-1 w-5 h-5 rounded-full bg-emerald-400 border-2 border-white"></div>
                </div>

                {{-- Info --}}
                <div class="flex-1 min-w-0">
                    <h3 class="text-lg font-semibold text-gray-900 truncate">{{ Auth::user()->name }}</h3>
                    <p class="text-sm text-gray-500 truncate">{{ Auth::user()->email }}</p>
                    <div class="flex items-center gap-2 mt-2 flex-wrap">
                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-100">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 inline-block"></span>
                            Active Account
                        </span>
                        @if(auth()->user()->role == "hirer")
                            <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-violet-50 text-violet-700 border border-violet-100">
                                Hirer
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-blue-50 text-blue-700 border border-blue-100">
                                Job Seeker
                            </span>
                        @endif
                    </div>
                </div>

                {{-- Member since --}}
                <div class="hidden sm:block text-right shrink-0">
                    <p class="text-xs text-gray-400 font-medium uppercase tracking-wide">Member since</p>
                    <p class="text-sm font-semibold text-gray-700 mt-0.5">{{ Auth::user()->created_at->format('M Y') }}</p>
                </div>
            </div>
        </div>

        {{-- ── SECTION WRAPPER ── --}}
        {{-- Section 1: Profile Information --}}
        <div class="section-card bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
            <div class="h-0.5 bg-gradient-to-r from-blue-500 to-transparent opacity-60"></div>

            <div class="px-6 py-5 sm:px-8 border-b border-gray-50 flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg bg-blue-50 border border-blue-100 flex items-center justify-center shrink-0">
                    <svg class="w-4 h-4 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-900">Profile Information</h3>
                    <p class="text-xs text-gray-500 mt-0.5">Update your name, email and account details</p>
                </div>
            </div>

            <div class="px-6 py-6 sm:px-8">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
        </div>

        {{-- Section 2: Update Password --}}
        <div class="section-card bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
            <div class="h-0.5 bg-gradient-to-r from-amber-400 to-transparent opacity-60"></div>

            <div class="px-6 py-5 sm:px-8 border-b border-gray-50 flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg bg-amber-50 border border-amber-100 flex items-center justify-center shrink-0">
                    <svg class="w-4 h-4 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-900">Update Password</h3>
                    <p class="text-xs text-gray-500 mt-0.5">Ensure your account uses a strong, secure password</p>
                </div>
            </div>

            <div class="px-6 py-6 sm:px-8">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>

        {{-- Section 3: Delete Account --}}
        <div class="section-card bg-white rounded-2xl border border-red-100 shadow-sm overflow-hidden">
            <div class="h-0.5 bg-gradient-to-r from-red-500 to-transparent opacity-60"></div>

            <div class="px-6 py-5 sm:px-8 border-b border-red-50 flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg bg-red-50 border border-red-100 flex items-center justify-center shrink-0">
                    <svg class="w-4 h-4 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-red-700">Danger Zone</h3>
                    <p class="text-xs text-red-400 mt-0.5">Permanently delete your account and all associated data</p>
                </div>
            </div>

            <div class="px-6 py-6 sm:px-8 bg-red-50/30">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>

    </div>
</x-app-layout>