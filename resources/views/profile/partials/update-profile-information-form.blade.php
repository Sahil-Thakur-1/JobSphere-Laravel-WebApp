<section class="space-y-6">

    {{-- Hidden verification form --}}
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    {{-- ── MAIN FORM ── --}}
    <form method="post" action="{{ route('profile.update') }}" class="space-y-5">
        @csrf
        @method('patch')

        {{-- Name Field --}}
        <div class="space-y-1.5">
            <label for="name" class="block text-sm font-medium text-gray-700">
                {{ __('Full Name') }}
            </label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <x-text-input
                    id="name"
                    name="name"
                    type="text"
                    class="block w-full pl-10 pr-4 py-2.5 text-sm border-gray-200 rounded-xl focus:border-blue-400 focus:ring-blue-100"
                    :value="old('name', $user->name)"
                    required
                    autofocus
                    autocomplete="name"
                    placeholder="{{ __('Your full name') }}"
                />
            </div>
            <x-input-error class="text-xs text-red-500 mt-1" :messages="$errors->get('name')" />
        </div>

        {{-- Email Field --}}
        <div class="space-y-1.5">
            <label for="email" class="block text-sm font-medium text-gray-700">
                {{ __('Email Address') }}
            </label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <x-text-input
                    id="email"
                    name="email"
                    type="email"
                    class="block w-full pl-10 pr-10 py-2.5 text-sm border-gray-200 rounded-xl focus:border-blue-400 focus:ring-blue-100"
                    :value="old('email', $user->email)"
                    required
                    autocomplete="username"
                    placeholder="{{ __('your@email.com') }}"
                />

                {{-- Verified badge inside field --}}
                @if (!($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail()))
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <svg class="w-4 h-4 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                @endif
            </div>

            <x-input-error class="text-xs text-red-500 mt-1" :messages="$errors->get('email')" />

            {{-- Email verification notice --}}
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2 flex items-start gap-2.5 p-3 rounded-xl bg-amber-50 border border-amber-100">
                    <svg class="w-4 h-4 text-amber-500 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                    <div class="flex-1 min-w-0">
                        <p class="text-xs font-medium text-amber-800">
                            {{ __('Your email address is unverified.') }}
                        </p>
                        <button
                            form="send-verification"
                            class="text-xs text-amber-700 underline underline-offset-2 hover:text-amber-900 transition-colors mt-0.5 font-medium"
                        >
                            {{ __('Resend verification email') }}
                        </button>
                    </div>
                </div>

                @if (session('status') === 'verification-link-sent')
                    <div class="mt-2 inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-emerald-50 border border-emerald-100 text-emerald-700 text-xs font-semibold">
                        <svg class="w-3.5 h-3.5 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                        </svg>
                        {{ __('Verification link sent to your inbox!') }}
                    </div>
                @endif
            @else
                <p class="text-xs text-emerald-600 flex items-center gap-1 mt-1 font-medium">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                    {{ __('Email address verified') }}
                </p>
            @endif
        </div>

        {{-- ── ACTIONS ── --}}
        <div class="pt-1 flex items-center gap-4">
            <button
                type="submit"
                class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 active:bg-blue-800 transition-all duration-150 shadow-sm shadow-blue-100 hover:shadow-blue-200"
            >
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                </svg>
                {{ __('Save Changes') }}
            </button>

            @if (session('status') === 'profile-updated')
                <div
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition.opacity
                    x-init="setTimeout(() => show = false, 3000)"
                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-emerald-50 border border-emerald-100 text-emerald-700 text-xs font-semibold"
                >
                    <svg class="w-3.5 h-3.5 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                    {{ __('Profile saved!') }}
                </div>
            @endif
        </div>

    </form>

</section>