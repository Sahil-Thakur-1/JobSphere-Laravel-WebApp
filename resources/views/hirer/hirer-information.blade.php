<x-app-layout>
    <div class="space-y-6">

        {{-- Page Header --}}
        <div>
            <h2 class="font-semibold text-xl text-gray-900 leading-tight tracking-tight">
                {{ __('Hirer Information') }}
            </h2>
            <p class="text-sm text-gray-500 mt-1">Manage your company information and account settings</p>
        </div>

        {{-- Form Card --}}
        <div class="bg-white border border-gray-100 rounded-2xl shadow-sm shadow-blue-50 overflow-hidden">

            {{-- Blue accent bar --}}
            <div class="h-1 w-full bg-gradient-to-r from-blue-600 to-blue-400"></div>

            <form action="hirer/add-update-details" method="POST" class="p-6 space-y-5">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    {{-- Company Name --}}
                    <div class="space-y-1.5">
                        <label for="company_name" class="block text-sm font-medium text-gray-700">
                            {{ __('Company Name') }}
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0H5m14 0h2M5 21H3M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 8h6"/>
                                </svg>
                            </div>
                            <x-text-input
                                id="company_name"
                                name="company_name"
                                type="text"
                                class="block w-full pl-10 pr-4 py-2.5 text-sm border-gray-200 rounded-xl focus:border-blue-400 focus:ring-blue-100"
                                :value="old('company_name', $details['company_name'] ?? '')"
                                placeholder="{{ __('e.g. Acme Corporation') }}"
                                required
                            />
                        </div>
                        <x-input-error class="text-xs text-red-500 mt-1" :messages="$errors->get('company_name')" />
                    </div>

                    {{-- Website --}}
                    <div class="space-y-1.5">
                        <label for="website" class="block text-sm font-medium text-gray-700">
                            {{ __('Website') }}
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9"/>
                                </svg>
                            </div>
                            <x-text-input
                                id="website"
                                name="website"
                                type="url"
                                class="block w-full pl-10 pr-4 py-2.5 text-sm border-gray-200 rounded-xl focus:border-blue-400 focus:ring-blue-100"
                                :value="old('website', $details['website'] ?? '')"
                                placeholder="{{ __('https://yourcompany.com') }}"
                                required
                            />
                        </div>
                        <x-input-error class="text-xs text-red-500 mt-1" :messages="$errors->get('website')" />
                    </div>

                    {{-- Company Size --}}
                    <div class="space-y-1.5">
                        <label for="company_size" class="block text-sm font-medium text-gray-700">
                            {{ __('Company Size') }}
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m4 6v-2m0 0a4 4 0 100-8 4 4 0 000 8z"/>
                                </svg>
                            </div>
                            <select
                                id="company_size"
                                name="company_size"
                                class="block w-full pl-10 pr-4 py-2.5 text-sm border border-gray-200 rounded-xl focus:border-blue-400 focus:ring-2 focus:ring-blue-100 focus:outline-none bg-white"
                                required
                            >
                                <option value="" disabled selected>{{ __('Select company size') }}</option>
                                <option value="1-10">1 – 10 employees</option>
                                <option value="11-50">11 – 50 employees</option>
                                <option value="51-200">51 – 200 employees</option>
                                <option value="201-500">201 – 500 employees</option>
                                <option value="501-1000">501 – 1,000 employees</option>
                                <option value="1000+">1,000+ employees</option>
                            </select>
                        </div>
                        <x-input-error class="text-xs text-red-500 mt-1" :messages="$errors->get('company_size')" />
                    </div>

                    {{-- Industry --}}
                    <div class="space-y-1.5">
                        <label for="industry" class="block text-sm font-medium text-gray-700">
                            {{ __('Industry') }}
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                </svg>
                            </div>
                            <select
                                id="industry"
                                name="industry"
                                class="block w-full pl-10 pr-4 py-2.5 text-sm border border-gray-200 rounded-xl focus:border-blue-400 focus:ring-2 focus:ring-blue-100 focus:outline-none bg-white"
                                required
                            >
                                <option value="" disabled selected>{{ __('Select your industry') }}</option>
                                <option value="technology">Technology</option>
                                <option value="finance">Finance & Banking</option>
                                <option value="healthcare">Healthcare</option>
                                <option value="education">Education</option>
                                <option value="ecommerce">E-Commerce & Retail</option>
                                <option value="manufacturing">Manufacturing</option>
                                <option value="media">Media & Entertainment</option>
                                <option value="consulting">Consulting</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <x-input-error class="text-xs text-red-500 mt-1" :messages="$errors->get('industry')" />
                    </div>

                    {{-- Location --}}
                    <div class="space-y-1.5">
                        <label for="location" class="block text-sm font-medium text-gray-700">
                            {{ __('Location') }}
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <x-text-input
                                id="location"
                                name="location"
                                type="text"
                                class="block w-full pl-10 pr-4 py-2.5 text-sm border-gray-200 rounded-xl focus:border-blue-400 focus:ring-blue-100"
                                :value="old('location', $details['location'] ?? '')"
                                placeholder="{{ __('e.g. New York, USA') }}"
                                required
                            />
                        </div>
                        <x-input-error class="text-xs text-red-500 mt-1" :messages="$errors->get('location')" />
                    </div>

                    {{-- Company Description --}}
                    <div class="md:col-span-2 space-y-1.5">
                        <label for="company_description" class="block text-sm font-medium text-gray-700">
                            {{ __('Company Description') }}
                        </label>
                        <div class="relative">
                            <div class="absolute top-3 left-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h12"/>
                                </svg>
                            </div>
                            <textarea
                                id="company_description"
                                name="company_description"
                                rows="3"
                                class="block w-full pl-10 pr-4 py-2.5 text-sm border border-gray-200 rounded-xl focus:border-blue-400 focus:ring-2 focus:ring-blue-100 focus:outline-none resize-none"
                                placeholder="{{ __('Describe your company, culture, and what you do...') }}"
                                required
                            >{{ old('company_description', $details['company_description'] ?? '') }}</textarea>
                        </div>
                        <x-input-error class="text-xs text-red-500 mt-1" :messages="$errors->get('company_description')" />
                    </div>

                </div>

                {{-- Divider + Submit --}}
                <div class="border-t border-gray-100 pt-4 flex items-center justify-end">
                    <button
                        type="submit"
                        class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 active:bg-blue-800 transition-all duration-150 shadow-sm shadow-blue-100 hover:shadow-md hover:shadow-blue-200"
                    >
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                        </svg>
                        {{ __('Save Changes') }}
                    </button>
                </div>

            </form>
        </div>

    </div>
</x-app-layout>