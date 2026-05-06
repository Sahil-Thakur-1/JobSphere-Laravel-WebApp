    <div class="space-y-6">

        {{-- Page Header --}}
        <div class="flex items-start justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-900 leading-tight tracking-tight">
                    {{ __('Add Work Experience') }}
                </h2>
                <p class="text-sm text-gray-500 mt-1">Add your past roles to strengthen your profile</p>
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

            <form action="{{ url('job-seeker/work-experience/store') }}" method="POST" class="p-6 space-y-5">
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
                                :value="old('company_name', $experience->company_name ?? '')"
                                placeholder="{{ __('e.g. Google') }}"
                                required
                            />
                        </div>
                        <x-input-error class="text-xs text-red-500 mt-1" :messages="$errors->get('company_name')" />
                    </div>

                    {{-- Job Role --}}
                    <div class="space-y-1.5">
                        <label for="job_role" class="block text-sm font-medium text-gray-700">
                            {{ __('Job Role') }}
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <x-text-input
                                id="job_role"
                                name="job_role"
                                type="text"
                                class="block w-full pl-10 pr-4 py-2.5 text-sm border-gray-200 rounded-xl focus:border-blue-400 focus:ring-blue-100"
                                :value="old('job_role', $experience->job_role ?? '')"
                                placeholder="{{ __('e.g. Senior Software Engineer') }}"
                                required
                            />
                        </div>
                        <x-input-error class="text-xs text-red-500 mt-1" :messages="$errors->get('job_role')" />
                    </div>

                    {{-- Start Date --}}
                    <div class="space-y-1.5">
                        <label for="start_date" class="block text-sm font-medium text-gray-700">
                            {{ __('Start Date') }}
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <x-text-input
                                id="start_date"
                                name="start_date"
                                type="date"
                                class="block w-full pl-10 pr-4 py-2.5 text-sm border-gray-200 rounded-xl focus:border-blue-400 focus:ring-blue-100"
                                :value="old('start_date', isset($experience->start_date) ? $experience->start_date->format('Y-m-d') : '')"
                                required
                            />
                        </div>
                        <x-input-error class="text-xs text-red-500 mt-1" :messages="$errors->get('start_date')" />
                    </div>

                    {{-- End Date --}}
                    <div class="space-y-1.5">
                        <label for="end_date" class="block text-sm font-medium text-gray-700">
                            {{ __('End Date') }}
                            <span class="text-xs font-normal text-gray-400 ml-1">{{ __('(leave blank if current)') }}</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <x-text-input
                                id="end_date"
                                name="end_date"
                                type="date"
                                class="block w-full pl-10 pr-4 py-2.5 text-sm border-gray-200 rounded-xl focus:border-blue-400 focus:ring-blue-100"
                                :value="old('end_date', isset($experience->end_date) ? $experience->end_date->format('Y-m-d') : '')"
                            />
                        </div>
                        <x-input-error class="text-xs text-red-500 mt-1" :messages="$errors->get('end_date')" />

                        {{-- Currently working here checkbox --}}
                        <label class="inline-flex items-center gap-2 mt-1 cursor-pointer select-none">
                            <input
                                type="checkbox"
                                id="currently_working"
                                class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-100 cursor-pointer"
                                onchange="document.getElementById('end_date').disabled = this.checked; if(this.checked) document.getElementById('end_date').value = '';"
                                {{ old('end_date') === null && isset($experience) && is_null($experience->end_date) ? 'checked' : '' }}
                            />
                            <span class="text-xs text-gray-500">{{ __('I currently work here') }}</span>
                        </label>
                    </div>

                    {{-- Description --}}
                    <div class="md:col-span-2 space-y-1.5">
                        <label for="description" class="block text-sm font-medium text-gray-700">
                            {{ __('Description') }}
                            <span class="text-xs font-normal text-gray-400 ml-1">{{ __('(optional)') }}</span>
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
                                placeholder="{{ __('Describe your responsibilities, achievements and impact in this role...') }}"
                            >{{ old('description', $experience->description ?? '') }}</textarea>
                        </div>
                        <x-input-error class="text-xs text-red-500 mt-1" :messages="$errors->get('description')" />
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
                        {{ __('Save Experience') }}
                    </button>
                </div>

            </form>
        </div>

    </div>