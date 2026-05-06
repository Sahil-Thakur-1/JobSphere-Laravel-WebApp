<section class="space-y-5">

    {{-- ── WARNING BANNER ── --}}
    <div class="flex gap-3 p-4 rounded-xl bg-red-50 border border-red-100">
        <div class="shrink-0 mt-0.5">
            <svg class="w-5 h-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
            </svg>
        </div>
        <div>
            <h3 class="text-sm font-semibold text-red-800">
                {{ __('This action cannot be undone') }}
            </h3>
            <p class="text-sm text-red-600 mt-0.5 leading-relaxed">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please download any data you wish to retain before proceeding.') }}
            </p>
        </div>
    </div>

    {{-- ── DELETE TRIGGER BUTTON ── --}}
    <div>
        <button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
            class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-white border border-red-200 text-red-600 text-sm font-semibold hover:bg-red-50 hover:border-red-300 transition-all duration-150 shadow-sm group"
        >
            <svg class="w-4 h-4 group-hover:scale-110 transition-transform duration-150" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
            </svg>
            {{ __('Delete Account') }}
        </button>
    </div>

    {{-- ── CONFIRMATION MODAL ── --}}
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>

        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 sm:p-8">
            @csrf
            @method('delete')

            {{-- Modal Header --}}
            <div class="flex items-start gap-4 mb-6">
                <div class="w-10 h-10 rounded-xl bg-red-100 border border-red-200 flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                </div>
                <div>
                    <h2 class="text-base font-semibold text-gray-900">
                        {{ __('Delete your account?') }}
                    </h2>
                    <p class="text-sm text-gray-500 mt-1 leading-relaxed">
                        {{ __('All your data will be permanently removed. This cannot be reversed. Enter your password to confirm.') }}
                    </p>
                </div>
            </div>

            {{-- Divider --}}
            <div class="border-t border-gray-100 mb-6"></div>

            {{-- Password Field --}}
            <div class="space-y-1.5">
                <label for="password" class="block text-sm font-medium text-gray-700">
                    {{ __('Confirm your password') }}
                </label>

                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                    </div>
                    <x-text-input
                        id="password"
                        name="password"
                        type="password"
                        class="block w-full pl-10 pr-4 py-2.5 text-sm border-gray-200 rounded-xl focus:border-red-400 focus:ring-red-100"
                        placeholder="{{ __('Enter your password') }}"
                    />
                </div>

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-1.5 text-xs text-red-600" />
            </div>

            {{-- Divider --}}
            <div class="border-t border-gray-100 mt-6 mb-5"></div>

            {{-- Actions --}}
            <div class="flex items-center justify-end gap-3">
                <button
                    type="button"
                    x-on:click="$dispatch('close')"
                    class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl text-sm font-medium text-gray-600 bg-white border border-gray-200 hover:bg-gray-50 hover:border-gray-300 transition-all duration-150 shadow-sm"
                >
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                    {{ __('Cancel') }}
                </button>

                <button
                    type="submit"
                    class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl text-sm font-semibold text-white bg-red-600 hover:bg-red-700 active:bg-red-800 transition-all duration-150 shadow-sm shadow-red-200 hover:shadow-red-300"
                >
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                    {{ __('Yes, delete my account') }}
                </button>
            </div>

        </form>
    </x-modal>

</section>