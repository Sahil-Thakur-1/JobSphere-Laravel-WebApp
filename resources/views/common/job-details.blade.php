<x-app-layout>
<div class="min-h-screen bg-gray-50 py-10 px-4 sm:px-6 lg:px-8" style="font-family: 'Georgia', serif;">

    <div class="max-w-4xl mx-auto space-y-6">

        {{-- Back Button --}}
        <a href="{{ url()->previous() }}" class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-blue-600 transition-colors duration-150">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
            Back to Jobs
        </a>

        {{-- ─── Job Header Card ─── --}}
        <div class="bg-white border border-gray-200 rounded-2xl shadow-sm p-8">
            <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4">

                <div class="flex items-start gap-4">
                    {{-- Company Logo Placeholder --}}
                    <div class="w-14 h-14 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center flex-shrink-0">
                        <svg class="w-7 h-7 text-blue-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                        </svg>
                    </div>

                    <div>
                        <h1 class="text-2xl font-bold text-gray-900 leading-tight">{{ $jobPost->title }}</h1>
                        <p class="text-gray-500 text-sm mt-1">{{ $jobPost->user->hirerProfile->company_name }}</p>

                        <div class="flex flex-wrap items-center gap-3 mt-3">
                            {{-- Job Type Badge --}}
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold
                                {{ $jobPost->job_type === 'full-time' ? 'bg-blue-100 text-blue-700' : 'bg-amber-100 text-amber-700' }}">
                                {{ ucfirst($jobPost->job_type) }}
                            </span>

                            {{-- Location --}}
                            <span class="inline-flex items-center gap-1 text-xs text-gray-500">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                </svg>
                                {{ $jobPost->location }}
                            </span>

                            {{-- Posted Date --}}
                            <span class="inline-flex items-center gap-1 text-xs text-gray-500">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5" />
                                </svg>
                                {{ $jobPost->created_at->diffForHumans() }}
                            </span>
                        </div>
                    </div>
                </div>

                {{-- Salary --}}
                <div class="sm:text-right flex-shrink-0">
                    <p class="text-xs text-gray-400 uppercase tracking-wide font-medium">Salary Range</p>
                    <p class="text-xl font-bold text-gray-900 mt-1">
                        ${{ number_format($jobPost->salary_min) }}
                        <span class="text-gray-400 font-normal text-base">–</span>
                        ${{ number_format($jobPost->salary_max) }}
                    </p>
                    <p class="text-xs text-gray-400 mt-0.5">per year</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- ─── Left Column: Job Details + Skills ─── --}}
            <div class="lg:col-span-2 space-y-6">

                {{-- Job Description --}}
                <div class="bg-white border border-gray-200 rounded-2xl shadow-sm p-8">
                    <h2 class="text-base font-semibold text-gray-900 mb-4 flex items-center gap-2">
                        <span class="w-1 h-5 bg-blue-500 rounded-full inline-block"></span>
                        Job Description
                    </h2>
                    <div class="text-gray-600 text-sm leading-relaxed whitespace-pre-line">
                        {{ $jobPost->description }}
                    </div>
                </div>

                {{-- Required Skills --}}
                <div class="bg-white border border-gray-200 rounded-2xl shadow-sm p-8">
                    <h2 class="text-base font-semibold text-gray-900 mb-4 flex items-center gap-2">
                        <span class="w-1 h-5 bg-blue-500 rounded-full inline-block"></span>
                        Required Skills
                    </h2>

                    @if($jobPost->skills->isEmpty())
                        <p class="text-sm text-gray-400 italic">No skills listed.</p>
                    @else
                        <div class="flex flex-wrap gap-2">
                            @foreach($jobPost->skills as $skill)
                                <span class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-medium bg-gray-100 text-gray-700 border border-gray-200 hover:bg-blue-50 hover:text-blue-700 hover:border-blue-200 transition-colors duration-150 cursor-default">
                                    {{ $skill->name }}
                                </span>
                            @endforeach
                        </div>
                    @endif
                </div>


                @if(auth()->id() != $jobPost->user_id)
                {{-- Apply Now Button --}}
                <div class="bg-white border border-gray-200 rounded-2xl shadow-sm p-8">
                    <h2 class="text-base font-semibold text-gray-900 mb-2 flex items-center gap-2">
                        <span class="w-1 h-5 bg-blue-500 rounded-full inline-block"></span>
                        Ready to Apply?
                    </h2>
                    <p class="text-sm text-gray-500 mb-5">Submit your application for <span class="font-medium text-gray-700">{{ $jobPost->title }}</span> at <span class="font-medium text-gray-700">{{ $jobPost->user->hirerProfile->company_name }}</span>.</p>

                    @auth
                        <form method="POST" action="{{'/job-seeker/job/apply/' . $jobPost->id}}">
                            @csrf
                            <button type="submit"
                                class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-3 bg-blue-600 hover:bg-blue-700 active:bg-blue-800 text-white text-sm font-semibold rounded-xl shadow-sm transition-all duration-150 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                                </svg>
                                Apply Now
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}"
                            class="inline-flex items-center justify-center gap-2 px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-xl shadow-sm transition-all duration-150">
                            Login to Apply
                        </a>
                    @endauth
                </div>
                @endif

            </div>

            {{-- ─── Right Column: Hirer Info ─── --}}
            <div class="space-y-6">

                {{-- Hirer / Company Card --}}
                <div class="bg-white border border-gray-200 rounded-2xl shadow-sm p-6">
                    <h2 class="text-base font-semibold text-gray-900 mb-4 flex items-center gap-2">
                        <span class="w-1 h-5 bg-blue-500 rounded-full inline-block"></span>
                        About the Hirer
                    </h2>

                    {{-- Hirer Avatar + Name --}}
                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center flex-shrink-0">
                            <span class="text-blue-600 font-bold text-sm">
                                {{ strtoupper(substr($jobPost->user->name, 0, 2)) }}
                            </span>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-800">{{ $jobPost->user->name }}</p>
                            <p class="text-xs text-gray-400">{{ $jobPost->user->email }}</p>
                        </div>
                    </div>

                    <div class="space-y-3 text-sm">

                        {{-- Company Name --}}
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-400">Company</p>
                                <p class="font-medium text-gray-700">{{ $jobPost->user->hirerProfile->company_name }}</p>
                            </div>
                        </div>

                        {{-- Industry --}}
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-400">Industry</p>
                                <p class="font-medium text-gray-700">{{ $jobPost->user->hirerProfile->industry }}</p>
                            </div>
                        </div>

                        {{-- Company Size --}}
                        @if($jobPost->user->hirerProfile->company_size)
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-400">Company Size</p>
                                <p class="font-medium text-gray-700">{{ $jobPost->user->hirerProfile->company_size }} employees</p>
                            </div>
                        </div>
                        @endif

                        {{-- Location --}}
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-400">Location</p>
                                <p class="font-medium text-gray-700">{{ $jobPost->user->hirerProfile->location }}</p>
                            </div>
                        </div>

                        {{-- Website --}}
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-400">Website</p>
                                <a href="{{ $jobPost->user->hirerProfile->website }}" target="_blank"
                                    class="font-medium text-blue-600 hover:underline truncate block max-w-[160px]">
                                    {{ $jobPost->user->hirerProfile->website }}
                                </a>
                            </div>
                        </div>

                    </div>

                    {{-- Company Description --}}
                    @if($jobPost->user->hirerProfile->company_description)
                    <div class="mt-5 pt-5 border-t border-gray-100">
                        <p class="text-xs text-gray-400 uppercase tracking-wide font-medium mb-2">About Company</p>
                        <p class="text-sm text-gray-600 leading-relaxed">{{ $jobPost->user->hirerProfile->company_description }}</p>
                    </div>
                    @endif
                </div>

                {{-- Job Quick Stats --}}
                <div class="bg-blue-600 rounded-2xl shadow-sm p-6 text-white">
                    <h2 class="text-sm font-semibold mb-4 opacity-80 uppercase tracking-wide">Job Overview</h2>
                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between items-center">
                            <span class="opacity-70">Type</span>
                            <span class="font-semibold">{{ ucfirst($jobPost->job_type) }}</span>
                        </div>
                        <div class="border-t border-white/20"></div>
                        <div class="flex justify-between items-center">
                            <span class="opacity-70">Min Salary</span>
                            <span class="font-semibold">${{ number_format($jobPost->salary_min) }}</span>
                        </div>
                        <div class="border-t border-white/20"></div>
                        <div class="flex justify-between items-center">
                            <span class="opacity-70">Max Salary</span>
                            <span class="font-semibold">${{ number_format($jobPost->salary_max) }}</span>
                        </div>
                        <div class="border-t border-white/20"></div>
                        <div class="flex justify-between items-center">
                            <span class="opacity-70">Location</span>
                            <span class="font-semibold">{{ $jobPost->location }}</span>
                        </div>
                        <div class="border-t border-white/20"></div>
                        <div class="flex justify-between items-center">
                            <span class="opacity-70">Posted</span>
                            <span class="font-semibold">{{ $jobPost->created_at->format('M d, Y') }}</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</x-app-layout>