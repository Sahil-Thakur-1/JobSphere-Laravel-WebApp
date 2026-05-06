<div class="space-y-6">

        {{-- Page Header --}}
        <div class="flex items-start justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-900 leading-tight tracking-tight">
                    {{ __('My Profile') }}
                </h2>
                <p class="text-sm text-gray-500 mt-1">Keep your profile updated to get the best job matches</p>
            </div>

            {{-- Close Button --}}
            <a
                onClick='closeDrawer()'
                class="inline-flex items-center justify-center w-9 h-9 rounded-xl border border-gray-200 text-gray-400 hover:text-gray-600 hover:bg-gray-50 hover:border-gray-300 transition-all duration-150 shadow-sm"
                title="{{ __('Close') }}"
            >
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </a>
        </div>

        {{-- Form Card --}}
        <div class="bg-white border border-gray-100 rounded-2xl shadow-sm shadow-blue-50 overflow-hidden">

            {{-- Blue accent bar --}}
            <div class="h-1 w-full bg-gradient-to-r from-blue-600 to-blue-400"></div>

           <div>
                <form action="{{ url('job-seeker/details/update') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-5">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    {{-- Headline --}}
                    <div class="md:col-span-2 space-y-1.5">
                        <label for="headline" class="block text-sm font-medium text-gray-700">
                            {{ __('Headline') }}
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h6m-6 4h10"/>
                                </svg>
                            </div>
                            <x-text-input
                                id="headline"
                                name="headline"
                                type="text"
                                class="block w-full pl-10 pr-4 py-2.5 text-sm border-gray-200 rounded-xl focus:border-blue-400 focus:ring-blue-100"
                                :value="old('headline', $profile->headline ?? '')"
                                placeholder="{{ __('e.g. Full-Stack Developer with 5 years of experience') }}"
                            />
                        </div>
                        <x-input-error class="text-xs text-red-500 mt-1" :messages="$errors->get('headline')" />
                    </div>

                    {{-- Current Location --}}
                    <div class="space-y-1.5">
                        <label for="current_location" class="block text-sm font-medium text-gray-700">
                            {{ __('Current Location') }}
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <x-text-input
                                id="current_location"
                                name="current_location"
                                type="text"
                                class="block w-full pl-10 pr-4 py-2.5 text-sm border-gray-200 rounded-xl focus:border-blue-400 focus:ring-blue-100"
                                :value="old('current_location', $profile->current_location ?? '')"
                                placeholder="{{ __('e.g. New York, USA') }}"
                            />
                        </div>
                        <x-input-error class="text-xs text-red-500 mt-1" :messages="$errors->get('current_location')" />
                    </div>

                    {{-- Years of Experience --}}
                    <div class="space-y-1.5">
                        <label for="experience" class="block text-sm font-medium text-gray-700">
                            {{ __('Years of Experience') }}
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <x-text-input
                                id="experience"
                                name="experience"
                                type="number"
                                min="0"
                                max="50"
                                class="block w-full pl-10 pr-4 py-2.5 text-sm border-gray-200 rounded-xl focus:border-blue-400 focus:ring-blue-100"
                                :value="old('experience', $profile->experience ?? '')"
                                placeholder="{{ __('e.g. 3') }}"
                            />
                        </div>
                        <x-input-error class="text-xs text-red-500 mt-1" :messages="$errors->get('experience')" />
                    </div>

                    {{-- Expected Salary --}}
                    <div class="space-y-1.5">
                        <label for="expected_salary" class="block text-sm font-medium text-gray-700">
                            {{ __('Expected Salary') }}
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <x-text-input
                                id="expected_salary"
                                name="expected_salary"
                                type="number"
                                min="0"
                                class="block w-full pl-10 pr-4 py-2.5 text-sm border-gray-200 rounded-xl focus:border-blue-400 focus:ring-blue-100"
                                :value="old('expected_salary', $profile->expected_salary ?? '')"
                                placeholder="{{ __('e.g. 50000') }}"
                            />
                        </div>
                        <x-input-error class="text-xs text-red-500 mt-1" :messages="$errors->get('expected_salary')" />
                    </div>

                    {{-- Resume Upload --}}
                    <div class="space-y-1.5">
                        <label for="resume" class="block text-sm font-medium text-gray-700">
                            {{ __('Resume') }}
                        </label>

                        {{-- Show existing resume if present --}}
                        @if(!empty($profile->resume_url))
                            <div class="flex items-center gap-2 px-3 py-2 bg-blue-50 border border-blue-100 rounded-xl">
                                <svg class="w-4 h-4 text-blue-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/>
                                </svg>
                                <a href="{{ $profile->resume_url }}" target="_blank" class="text-xs text-blue-600 hover:underline truncate">
                                    {{ basename($profile->resume_url) }}
                                </a>
                                <span class="ml-auto text-xs text-gray-400 flex-shrink-0">Current</span>
                            </div>
                        @endif

                        <div class="relative">
                            <input
                                id="resume"
                                name="resume"
                                type="file"
                                accept=".pdf,.doc,.docx"
                                class="block w-full text-sm text-gray-500 border border-gray-200 rounded-xl cursor-pointer
                                       file:mr-4 file:py-2 file:px-4 file:border-0 file:rounded-l-xl
                                       file:text-sm file:font-medium file:bg-blue-50 file:text-blue-600
                                       hover:file:bg-blue-100 focus:outline-none focus:border-blue-400"
                            />
                        </div>
                        <p class="text-xs text-gray-400">PDF, DOC or DOCX — max 5MB</p>
                        <x-input-error class="text-xs text-red-500 mt-1" :messages="$errors->get('resume')" />
                    </div>

                    {{-- Summary --}}
                    <div class="md:col-span-2 space-y-1.5">
                        <label for="summary" class="block text-sm font-medium text-gray-700">
                            {{ __('Professional Summary') }}
                        </label>
                        <div class="relative">
                            <div class="absolute top-3 left-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h12"/>
                                </svg>
                            </div>
                            <textarea
                                id="summary"
                                name="summary"
                                rows="4"
                                class="block w-full pl-10 pr-4 py-2.5 text-sm border border-gray-200 rounded-xl focus:border-blue-400 focus:ring-2 focus:ring-blue-100 focus:outline-none resize-none"
                                placeholder="{{ __('Write a short summary about yourself, your skills and career goals...') }}"
                            >{{ old('summary', $profile->summary ?? '') }}</textarea>
                        </div>
                        <x-input-error class="text-xs text-red-500 mt-1" :messages="$errors->get('summary')" />
                    </div>

                    <!-- skills  -->
                    <div class="md:col-span-2 space-y-1.5">
                        <label for="skills" class="block text-sm font-medium text-gray-700">
                            {{ __('Skills') }}
                        </label>
                        <x-select-skill-field class='skills' :skills='$skills'></x-select-skill-field>
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
                        {{ __('Save Profile') }}
                    </button>
                </div>
            </form>
         </div>
        </div>
    </div>