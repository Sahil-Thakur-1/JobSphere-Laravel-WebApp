
    <div class="flex flex-col gap-10">
        {{-- Page Header --}}
        <div class="flex items-start justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-900 leading-tight tracking-tight">
                    {{ __('Post a New Job') }}
                </h2>
                <p class="text-sm text-gray-500 mt-1">Fill in the details below to publish a new job listing</p>
            </div>
                <button id='closeBtn' class='text-gray-400'>close</button>
        </div>

        {{-- Form Card --}}
        <div class="bg-white border border-gray-100 rounded-2xl shadow-sm shadow-blue-50 overflow-hidden">

            {{-- Blue accent bar --}}
            <div class="h-1 w-full bg-gradient-to-r from-blue-600 to-blue-400"></div>

            <form action="{{ url('hirer/job-posts') }}" method="POST" class="p-6 space-y-5">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    {{-- Job Title --}}
                    <div class="space-y-1.5">
                        <label for="title" class="block text-sm font-medium text-gray-700">
                            {{ __('Job Title') }}
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <x-text-input
                                id="title"
                                name="title"
                                type="text"
                                class="block w-full pl-10 pr-4 py-2.5 text-sm border-gray-200 rounded-xl focus:border-blue-400 focus:ring-blue-100"
                                :value="old('title')"
                                placeholder="{{ __('e.g. Senior Laravel Developer') }}"
                                required
                            />
                        </div>
                        <x-input-error class="text-xs text-red-500 mt-1" :messages="$errors->get('title')" />
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
                                :value="old('location')"
                                placeholder="{{ __('e.g. New York, USA / Remote') }}"
                                required
                            />
                        </div>
                        <x-input-error class="text-xs text-red-500 mt-1" :messages="$errors->get('location')" />
                    </div>

                    {{-- Job Type --}}
                    <div class="space-y-1.5">
                        <label for="job_type" class="block text-sm font-medium text-gray-700">
                            {{ __('Job Type') }}
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <select
                                id="job_type"
                                name="job_type"
                                class="block w-full pl-10 pr-4 py-2.5 text-sm border border-gray-200 rounded-xl focus:border-blue-400 focus:ring-2 focus:ring-blue-100 focus:outline-none bg-white"
                                required
                            >
                                <option value="" disabled selected>{{ __('Select job type') }}</option>
                                <option value="full-time" {{ old('job_type') === 'full-time' ? 'selected' : '' }}>Full-Time</option>
                                <option value="intership" {{ old('job_type') === 'intership' ? 'selected' : '' }}>Internship</option>
                            </select>
                        </div>
                        <x-input-error class="text-xs text-red-500 mt-1" :messages="$errors->get('job_type')" />
                    </div>

                    {{-- Salary Min --}}
                    <div class="space-y-1.5">
                        <label for="salary_min" class="block text-sm font-medium text-gray-700">
                            {{ __('Minimum Salary') }}
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <x-text-input
                                id="salary_min"
                                name="salary_min"
                                type="number"
                                min="0"
                                class="block w-full pl-10 pr-4 py-2.5 text-sm border-gray-200 rounded-xl focus:border-blue-400 focus:ring-blue-100"
                                :value="old('salary_min')"
                                placeholder="{{ __('e.g. 30000') }}"
                                required
                            />
                        </div>
                        <x-input-error class="text-xs text-red-500 mt-1" :messages="$errors->get('salary_min')" />
                    </div>

                    {{-- Salary Max --}}
                    <div class="space-y-1.5">
                        <label for="salary_max" class="block text-sm font-medium text-gray-700">
                            {{ __('Maximum Salary') }}
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <x-text-input
                                id="salary_max"
                                name="salary_max"
                                type="number"
                                min="0"
                                class="block w-full pl-10 pr-4 py-2.5 text-sm border-gray-200 rounded-xl focus:border-blue-400 focus:ring-blue-100"
                                :value="old('salary_max')"
                                placeholder="{{ __('e.g. 60000') }}"
                                required
                            />
                        </div>
                        <x-input-error class="text-xs text-red-500 mt-1" :messages="$errors->get('salary_max')" />
                    </div>

                    {{-- Job Description --}}
                    <div class="md:col-span-2 space-y-1.5">
                        <label for="description" class="block text-sm font-medium text-gray-700">
                            {{ __('Job Description') }}
                        </label>
                        <div class="relative">
                            <div class="absolute top-3 left-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h12"/>
                                </svg>
                            </div>
                            <textarea
                                id="description"
                                name="description"
                                rows="4"
                                class="block w-full pl-10 pr-4 py-2.5 text-sm border border-gray-200 rounded-xl focus:border-blue-400 focus:ring-2 focus:ring-blue-100 focus:outline-none resize-none"
                                placeholder="{{ __('Describe the role, responsibilities, and requirements...') }}"
                                required
                            >{{ old('description') }}</textarea>
                        </div>
                        <x-input-error class="text-xs text-red-500 mt-1" :messages="$errors->get('description')" />
                    </div>

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
                        {{ __('Post Job') }}
                    </button>
                </div>

            </form>
        </div>

    </div>