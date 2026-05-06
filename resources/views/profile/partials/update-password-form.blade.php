<section class="space-y-6">

    {{-- ── FORM ── --}}
    <form method="post" action="{{ route('password.update') }}" class="space-y-5">
        @csrf
        @method('put')

        {{-- Current Password --}}
        <div class="space-y-1.5">
            <label for="update_password_current_password" class="block text-sm font-medium text-gray-700">
                {{ __('Current Password') }}
            </label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                    </svg>
                </div>
                <x-text-input
                    id="update_password_current_password"
                    name="current_password"
                    type="password"
                    class="block w-full pl-10 pr-4 py-2.5 text-sm border-gray-200 rounded-xl focus:border-amber-400 focus:ring-amber-100"
                    autocomplete="current-password"
                    placeholder="{{ __('Enter current password') }}"
                />
            </div>
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="text-xs text-red-500 mt-1" />
        </div>

        {{-- Divider --}}
        <div class="border-t border-dashed border-gray-100"></div>

        {{-- New Password --}}
        <div class="space-y-1.5">
            <label for="update_password_password" class="block text-sm font-medium text-gray-700">
                {{ __('New Password') }}
            </label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                </div>
                <x-text-input
                    id="update_password_password"
                    name="password"
                    type="password"
                    class="block w-full pl-10 pr-4 py-2.5 text-sm border-gray-200 rounded-xl focus:border-amber-400 focus:ring-amber-100"
                    autocomplete="new-password"
                    placeholder="{{ __('Enter new password') }}"
                />
            </div>
            <x-input-error :messages="$errors->updatePassword->get('password')" class="text-xs text-red-500 mt-1" />

            {{-- Password strength hint --}}
            <p class="text-xs text-gray-400 flex items-center gap-1.5 mt-1">
                <svg class="w-3.5 h-3.5 text-amber-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Use at least 8 characters with a mix of letters, numbers & symbols
            </p>
        </div>

        {{-- Confirm Password --}}
        <div class="space-y-1.5">
            <label for="update_password_password_confirmation" class="block text-sm font-medium text-gray-700">
                {{ __('Confirm New Password') }}
            </label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <x-text-input
                    id="update_password_password_confirmation"
                    name="password_confirmation"
                    type="password"
                    class="block w-full pl-10 pr-4 py-2.5 text-sm border-gray-200 rounded-xl focus:border-amber-400 focus:ring-amber-100"
                    autocomplete="new-password"
                    placeholder="{{ __('Re-enter new password') }}"
                />
            </div>
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="text-xs text-red-500 mt-1" />
        </div>

        {{-- ── ACTIONS ── --}}
        <div class="pt-1 flex items-center gap-4">
            <button
                type="submit"
                class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm font-semibold text-white bg-amber-500 hover:bg-amber-600 active:bg-amber-700 transition-all duration-150 shadow-sm shadow-amber-100 hover:shadow-amber-200"
            >
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                </svg>
                {{ __('Update Password') }}
            </button>

            @if (session('status') === 'password-updated')
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
                    {{ __('Password updated!') }}
                </div>
            @endif
        </div>

    </form>

</section>