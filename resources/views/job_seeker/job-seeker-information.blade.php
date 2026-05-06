<x-app-layout>

    <div id="job-seeker-overlay" class="fixed inset-0 bg-black/50 z-40 hidden"></div>
    <div id="job-seeker-drawer" class="fixed top-0 right-0 w-[500px] h-full p-5 bg-white z-50 overflow-y-auto hidden">
        <div id="add-experience" class="drawer-view hidden">
            @include('job_seeker.partials.add-experience-form')
        </div>
        <div id="add-education" class="drawer-view hidden">
            @include('job_seeker.partials.add-education-form')
        </div>
        <div id="add-details" class="drawer-view hidden">
            @include('job_seeker.partials.basic-details-form',['skills'=>$skills])
        </div>
    </div>
    
    <div class="space-y-8">

        {{-- Page Header --}}
        <div class="flex items-start justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-900 leading-tight tracking-tight">
                    {{ __('My Profile') }}
                </h2>
                <p class="text-sm text-gray-500 mt-1">Manage your profile, experience and education</p>
            </div>
        </div>

        {{-- Profile Card --}}
        <div class="bg-white border border-gray-100 rounded-2xl shadow-sm shadow-blue-50 overflow-hidden">

            {{-- Blue accent bar --}}
            <div class="h-1 w-full bg-gradient-to-r from-blue-600 to-blue-400"></div>

            <div class="p-6">
                <div class="flex items-start justify-between gap-4">

                    {{-- Avatar + Basic Info --}}
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 rounded-2xl bg-blue-50 flex items-center justify-center flex-shrink-0">
                            <span class="text-xl font-semibold text-blue-600">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </span>
                        </div>
                        <div>
                            <p class="text-base font-semibold text-gray-900">{{ auth()->user()->name }}</p>
                            <p class="text-sm text-gray-400">{{ auth()->user()->email }}</p>
                            @if($profile?->headline)
                                <p class="text-sm text-gray-600 mt-0.5">{{ $profile->headline }}</p>
                            @endif
                        </div>
                    </div>

                    {{-- Edit Profile Button --}}
                    
                      <a   onclick="openDrawer('add-details')"
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-medium border border-gray-200 text-gray-600 hover:bg-gray-50 hover:border-gray-300 transition-all duration-150 flex-shrink-0"
                    >
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        {{ __('Edit Profile') }}
                    </a>
                </div>

                {{-- Stats Row --}}
                <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mt-6">

                    <div class="bg-gray-50 rounded-xl p-3">
                        <p class="text-xs text-gray-400">Location</p>
                        <p class="text-sm font-medium text-gray-700 mt-0.5 truncate">
                            {{ $profile?->current_location ?? '—' }}
                        </p>
                    </div>

                    <div class="bg-gray-50 rounded-xl p-3">
                        <p class="text-xs text-gray-400">Experience</p>
                        <p class="text-sm font-medium text-gray-700 mt-0.5">
                            {{ $profile?->experience ? $profile->experience . ' yrs' : '—' }}
                        </p>
                    </div>

                    <div class="bg-gray-50 rounded-xl p-3">
                        <p class="text-xs text-gray-400">Expected Salary</p>
                        <p class="text-sm font-medium text-gray-700 mt-0.5">
                            {{ $profile?->expected_salary ? '$' . number_format($profile->expected_salary) : '—' }}
                        </p>
                    </div>

                    <div class="bg-gray-50 rounded-xl p-3">
                        <p class="text-xs text-gray-400">Resume</p>
                        @if($profile?->resume_url)
                            <a href="{{ $profile->resume_url }}" target="_blank" class="text-sm font-medium text-blue-600 hover:underline mt-0.5 block truncate">
                                View Resume
                            </a>
                        @else
                            <p class="text-sm font-medium text-gray-400 mt-0.5">Not uploaded</p>
                        @endif
                    </div>

                </div>

                {{-- Summary --}}
                @if($profile?->summary)
                    <div class="mt-5 pt-5 border-t border-gray-100">
                        <p class="text-xs font-medium text-gray-400 uppercase tracking-wide mb-1.5">Summary</p>
                        <p class="text-sm text-gray-600 leading-relaxed">{{ $profile->summary }}</p>
                    </div>
                @endif

            </div>
        </div>

        {{-- Work Experience Section --}}
        <div class="space-y-4">

            {{-- Section Header --}}
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-base font-semibold text-gray-900">Work Experience</h3>
                    <p class="text-sm text-gray-400 mt-0.5">{{ $experiences->count() }} {{ Str::plural('entry', $experiences->count()) }}</p>
                </div>
                
                <a   onclick="openDrawer('add-experience')"
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 active:bg-blue-800 transition-all duration-150 shadow-sm shadow-blue-100 hover:shadow-md hover:shadow-blue-200"
                >
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                    </svg>
                    {{ __('Add Experience') }}
                </a>
            </div>

            {{-- Experience Cards --}}
            @if($experiences->count())
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($experiences as $experience)
                        <x-experience-card :experience="$experience" />
                    @endforeach
                </div>
            @else
                <div class="bg-white border border-gray-100 border-dashed rounded-2xl p-8 flex flex-col items-center justify-center text-center">
                    <div class="w-12 h-12 rounded-xl bg-purple-50 flex items-center justify-center mb-3">
                        <svg class="w-6 h-6 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <p class="text-sm font-medium text-gray-600">No experience added yet</p>
                    <p class="text-xs text-gray-400 mt-1">Add your past roles to strengthen your profile</p>
                    
                     <a   href="{{ url('job-seeker/work-experience/create') }}"
                        class="mt-4 inline-flex items-center gap-1.5 text-xs font-medium text-blue-600 hover:underline"
                    >
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                        </svg>
                        Add your first experience
                    </a>
                </div>
            @endif
        </div>

        {{-- Education Section --}}
        <div class="space-y-4">

            {{-- Section Header --}}
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-base font-semibold text-gray-900">Education</h3>
                    <p class="text-sm text-gray-400 mt-0.5">{{ $educations->count() }} {{ Str::plural('entry', $educations->count()) }}</p>
                </div>
                
                 <a    onclick="openDrawer('add-education')"
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 active:bg-blue-800 transition-all duration-150 shadow-sm shadow-blue-100 hover:shadow-md hover:shadow-blue-200"
                >
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                    </svg>
                    {{ __('Add Education') }}
                </a>
            </div>

            {{-- Education Cards --}}
            @if($educations->count())
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($educations as $education)
                        <x-education-card :education="$education" />
                    @endforeach
                </div>
            @else
                <div class="bg-white border border-gray-100 border-dashed rounded-2xl p-8 flex flex-col items-center justify-center text-center">
                    <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center mb-3">
                        <svg class="w-6 h-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                        </svg>
                    </div>
                    <p class="text-sm font-medium text-gray-600">No education added yet</p>
                    <p class="text-xs text-gray-400 mt-1">Add your academic background to complete your profile</p>
                    
                     <a   href="{{ url('job-seeker/education/create') }}"
                        class="mt-4 inline-flex items-center gap-1.5 text-xs font-medium text-blue-600 hover:underline"
                    >
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                        </svg>
                        Add your first education
                    </a>
                </div>
            @endif
        </div>

    </div>
</x-app-layout>


<script>
   function openDrawer(viewId) {
    // show drawer
    document.getElementById('job-seeker-overlay').classList.remove('hidden');
    document.getElementById('job-seeker-drawer').classList.remove('hidden');

    // hide all views
    document.querySelectorAll('.drawer-view').forEach(el => {
        el.classList.add('hidden');
    });


    // show selected view
    document.getElementById(viewId).classList.remove('hidden');
}

function closeDrawer() {
    document.getElementById('job-seeker-overlay').classList.add('hidden');
    document.getElementById('job-seeker-drawer').classList.add('hidden');
}
</script>