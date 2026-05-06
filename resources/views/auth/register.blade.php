<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Role -->
    <div class="mt-4">
    <x-input-label for="role" :value="__('Role')" />
    <select name="role" required
        class="block mt-1 w-full   px-4 py-2.5 text-sm text-gray-900 placeholder-gray-400
        bg-white border border-gray-200 rounded-xl
        shadow-sm
        transition-all duration-150 ease-in-out
        focus:outline-none focus:border-blue-400 focus:ring-2 focus:ring-blue-100
        disabled:bg-gray-50 disabled:text-gray-400 disabled:cursor-not-allowed disabled:border-gray-100">
        <!-- Default placeholder -->
        <option value="" disabled selected>-- Select Role --</option>
        <option value="job_seeker" {{ old('role') == 'job_seeker' ? 'selected' : '' }}>Job Seeker</option>
        <option value="hirer" {{ old('role') == 'hirer' ? 'selected' : '' }}>Hirer</option>
    </select>
    <x-input-error :messages="$errors->get('role')" class="mt-2" />
    </div>


        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gra-500 dark:hover:text-gray-500 rounded-md focus:outline-none focus:ring-1 focus:ring-offset-1 focus:ring-gray-400 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
