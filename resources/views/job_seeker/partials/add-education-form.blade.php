
    <div class="space-y-6">

        {{-- Page Header --}}
        <div class="flex items-start justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-900 leading-tight tracking-tight">
                    {{ __('Add Education') }}
                </h2>
                <p class="text-sm text-gray-500 mt-1">Add your academic background to complete your profile</p>
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

            <form action="{{ url('job-seeker/education/store') }}" method="POST" class="p-6 space-y-5">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    {{-- Institution Name --}}
                    <div class="space-y-1.5">
                        <label for="institution_name" class="block text-sm font-medium text-gray-700">
                            {{ __('Institution Name') }}
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 7a9 9 0 110-18 9 9 0 010 18z" style="display:none"/>
                                </svg>
                            </div>
                            <x-text-input
                                id="institution_name"
                                name="institution_name"
                                type="text"
                                class="block w-full pl-10 pr-4 py-2.5 text-sm border-gray-200 rounded-xl focus:border-blue-400 focus:ring-blue-100"
                                :value="old('institution_name', $education->institution_name ?? '')"
                                placeholder="{{ __('e.g. Massachusetts Institute of Technology') }}"
                                required
                            />
                        </div>
                        <x-input-error class="text-xs text-red-500 mt-1" :messages="$errors->get('institution_name')" />
                    </div>

                    {{-- Degree --}}
                    <div class="space-y-1.5">
                        <label for="degree" class="block text-sm font-medium text-gray-700">
                            {{ __('Degree') }}
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                                </svg>
                            </div>
                            <select
                                id="degree"
                                name="degree"
                                class="block w-full pl-10 pr-4 py-2.5 text-sm border border-gray-200 rounded-xl focus:border-blue-400 focus:ring-2 focus:ring-blue-100 focus:outline-none bg-white"
                                required
                            >
                                <option value="" disabled selected>{{ __('Select your degree') }}</option>
                                <option value="Secondary School (10th)" {{ old('degree', $education->degree ?? '') === 'Secondary School (10th)' ? 'selected' : '' }}>Secondary School (10th)</option>
                                <option value="Higher Secondary (12th)" {{ old('degree', $education->degree ?? '') === 'Higher Secondary (12th)' ? 'selected' : '' }}>Higher Secondary (12th)</option>
                                <option value="Diploma" {{ old('degree', $education->degree ?? '') === 'Diploma' ? 'selected' : '' }}>Diploma</option>
                                <option value="Bachelor's" {{ old('degree', $education->degree ?? '') === "Bachelor's" ? 'selected' : '' }}>Bachelor's</option>
                                <option value="Master's" {{ old('degree', $education->degree ?? '') === "Master's" ? 'selected' : '' }}>Master's</option>
                                <option value="MBA" {{ old('degree', $education->degree ?? '') === 'MBA' ? 'selected' : '' }}>MBA</option>
                                <option value="PhD" {{ old('degree', $education->degree ?? '') === 'PhD' ? 'selected' : '' }}>PhD</option>
                                <option value="Other" {{ old('degree', $education->degree ?? '') === 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>
                        <x-input-error class="text-xs text-red-500 mt-1" :messages="$errors->get('degree')" />
                    </div>

                    {{-- Field of Study --}}
                    <div class="space-y-1.5">
                        <label for="field_of_study" class="block text-sm font-medium text-gray-700">
                            {{ __('Field of Study') }}
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            </div>
                            <x-text-input
                                id="field_of_study"
                                name="field_of_study"
                                type="text"
                                class="block w-full pl-10 pr-4 py-2.5 text-sm border-gray-200 rounded-xl focus:border-blue-400 focus:ring-blue-100"
                                :value="old('field_of_study', $education->field_of_study ?? '')"
                                placeholder="{{ __('e.g. Computer Science') }}"
                                required
                            />
                        </div>
                        <x-input-error class="text-xs text-red-500 mt-1" :messages="$errors->get('field_of_study')" />
                    </div>

                    {{-- Percentage --}}
                    <div class="space-y-1.5">
                        <label for="percentage" class="block text-sm font-medium text-gray-700">
                            {{ __('Percentage / CGPA') }}
                            <span class="text-xs font-normal text-gray-400 ml-1">{{ __('(optional)') }}</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                </svg>
                            </div>
                            <x-text-input
                                id="percentage"
                                name="percentage"
                                type="number"
                                min="0"
                                max="100"
                                step="0.01"
                                class="block w-full pl-10 pr-4 py-2.5 text-sm border-gray-200 rounded-xl focus:border-blue-400 focus:ring-blue-100"
                                :value="old('percentage', $education->percentage ?? '')"
                                placeholder="{{ __('e.g. 85.5') }}"
                            />
                        </div>
                        <x-input-error class="text-xs text-red-500 mt-1" :messages="$errors->get('percentage')" />
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
                                :value="old('start_date', isset($education->start_date) ? $education->start_date->format('Y-m-d') : '')"
                                required
                            />
                        </div>
                        <x-input-error class="text-xs text-red-500 mt-1" :messages="$errors->get('start_date')" />
                    </div>

                    {{-- End Date --}}
                    <div class="space-y-1.5">
                        <label for="end_date" class="block text-sm font-medium text-gray-700">
                            {{ __('End Date') }}
                            <span class="text-xs font-normal text-gray-400 ml-1">{{ __('(leave blank if ongoing)') }}</span>
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
                                :value="old('end_date', isset($education->end_date) ? $education->end_date->format('Y-m-d') : '')"
                            />
                        </div>
                        <x-input-error class="text-xs text-red-500 mt-1" :messages="$errors->get('end_date')" />

                        {{-- Currently studying here checkbox --}}
                        <label class="inline-flex items-center gap-2 mt-1 cursor-pointer select-none">
                            <input
                                type="checkbox"
                                id="currently_studying"
                                class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-100 cursor-pointer"
                                onchange="document.getElementById('end_date').disabled = this.checked; if(this.checked) document.getElementById('end_date').value = '';"
                                {{ old('end_date') === null && isset($education) && is_null($education->end_date) ? 'checked' : '' }}
                            />
                            <span class="text-xs text-gray-500">{{ __('I am currently studying here') }}</span>
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
                                placeholder="{{ __('e.g. Relevant coursework, achievements, activities or awards...') }}"
                            >{{ old('description', $education->description ?? '') }}</textarea>
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
                        {{ __('Save Education') }}
                    </button>
                </div>

            </form>
        </div>

    </div>