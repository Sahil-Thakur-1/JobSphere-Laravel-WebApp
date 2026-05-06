<x-app-layout>
    <div class="space-y-6">

        {{-- Page Header --}}
        <div class="flex items-start justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-900 leading-tight tracking-tight">
                    {{ __('Applied Jobs') }}
                </h2>
                <p class="text-sm text-gray-500 mt-1">Track the status of all your job applications</p>
            </div>
        </div>

        {{-- Applied Jobs --}}
        @if($appliedJobs->count())

            {{-- Job Application Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($appliedJobs as $job)

                    @php
                        $status = $job->pivot->status;

                        $statusConfig = match($status) {
                            'accepted'   => ['bg' => 'bg-green-50',  'text' => 'text-green-700',  'label' => 'Accepted'],
                            'rejected'   => ['bg' => 'bg-red-50',    'text' => 'text-red-600',    'label' => 'Rejected'],
                            'interviwed' => ['bg' => 'bg-blue-50',   'text' => 'text-blue-600',   'label' => 'Interviewed'],
                            default      => ['bg' => 'bg-yellow-50', 'text' => 'text-yellow-600', 'label' => 'Processing'],
                        };

                        $iconConfig = match($status) {
                            'accepted'   => 'text-green-500',
                            'rejected'   => 'text-red-400',
                            'interviwed' => 'text-blue-500',
                            default      => 'text-yellow-500',
                        };
                    @endphp

                    <div class="bg-white border border-gray-100 rounded-2xl shadow-sm shadow-blue-50 overflow-hidden flex flex-col">

                        {{-- Blue accent bar --}}
                        <div class="h-1 w-full bg-gradient-to-r from-blue-600 to-blue-400"></div>

                        <div class="p-5 flex flex-col flex-1">

                            {{-- Header: icon + title + status --}}
                            <div class="flex items-start justify-between gap-2 mb-3">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-gray-900 leading-tight">{{ $job->title }}</p>
                                        <p class="text-xs text-gray-400 mt-0.5">{{ $job->user->hirerProfile->company_name ?? $job->user->name }}</p>
                                    </div>
                                </div>

                                {{-- Status Badge --}}
                                <span class="flex-shrink-0 text-xs font-medium px-2.5 py-1 rounded-full {{ $statusConfig['bg'] }} {{ $statusConfig['text'] }}">
                                    {{ $statusConfig['label'] }}
                                </span>
                            </div>

                            {{-- Description --}}
                            <p class="text-xs text-gray-500 leading-relaxed line-clamp-2 mb-3">
                                {{ $job->description }}
                            </p>

                            {{-- Badges --}}
                            <div class="flex flex-wrap gap-1.5 mb-4">
                                <span @class([
                                    'text-xs font-medium px-2.5 py-1 rounded-full',
                                    'bg-blue-50 text-blue-700'   => $job->job_type === 'full-time',
                                    'bg-purple-50 text-purple-700' => $job->job_type === 'intership',
                                ])>
                                    {{ $job->job_type === 'full-time' ? 'Full-Time' : 'Internship' }}
                                </span>
                                <span class="text-xs flex items-center gap-1 px-2.5 py-1 rounded-full bg-gray-50 text-gray-500">
                                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    {{ $job->location }}
                                </span>
                            </div>

                            {{-- Footer --}}
                            <div class="border-t border-gray-100 pt-3 mt-auto flex items-center justify-between">
                                <div>
                                    <p class="text-xs text-gray-400">Salary range</p>
                                    <p class="text-sm font-semibold text-gray-800">
                                        ${{ number_format($job->salary_min) }} – ${{ number_format($job->salary_max) }}
                                    </p>
                                </div>
                                <div class="text-right">
                                    <p class="text-xs text-gray-400">Applied on</p>
                                    <p class="text-xs font-medium text-gray-600">
                                        {{ $job->pivot->created_at->format('d M Y') }}
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>

                @endforeach
            </div>

        @else

            {{-- Empty State --}}
            <div class="bg-white border border-gray-100 border-dashed rounded-2xl p-12 flex flex-col items-center justify-center text-center shadow-sm">
                <div class="w-14 h-14 rounded-2xl bg-blue-50 flex items-center justify-center mb-4">
                    <svg class="w-7 h-7 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <p class="text-sm font-semibold text-gray-700">No applications yet</p>
                <p class="text-xs text-gray-400 mt-1 max-w-xs">You haven't applied to any jobs yet. Browse open positions and start applying.</p>
                
                    href="{{ url('job-seeker/jobs') }}"
                    class="mt-5 inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 active:bg-blue-800 transition-all duration-150 shadow-sm shadow-blue-100"
                >
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    {{ __('Browse Jobs') }}
                </a>
            </div>

        @endif

    </div>
</x-app-layout>