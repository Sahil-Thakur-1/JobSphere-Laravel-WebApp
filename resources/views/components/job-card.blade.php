<div class="bg-white border border-gray-100 rounded-2xl shadow-sm shadow-blue-50 overflow-hidden">

    {{-- Blue accent bar --}}
    <div class="h-1 w-full bg-gradient-to-r from-blue-600 to-blue-400"></div>

    <div class="p-5">

        {{-- Header: icon + title + status badge --}}
        <div class="flex items-start justify-between gap-2 mb-3">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-900 leading-tight">{{ $job->title }}</p>
                    <p class="text-xs text-gray-400 mt-0.5">{{ $job->user->company_name ?? 'Your Company' }}</p>
                </div>
            </div>

            {{-- Status Badge --}}
            @php
                $statusStyles = match($job->status) {
                    'active'  => 'bg-green-50 text-green-700',
                    'closed'  => 'bg-red-50 text-red-600',
                    'draft'   => 'bg-gray-100 text-gray-500',
                    default   => 'bg-gray-100 text-gray-500',
                };
            @endphp
            <span class="flex-shrink-0 text-xs font-medium px-2.5 py-1 rounded-full {{ $statusStyles }}">
                {{ ucfirst($job->status) }}
            </span>
        </div>

        {{-- Description --}}
        <p class="text-xs text-gray-500 leading-relaxed line-clamp-2 mb-3">
            {{ $job->description }}
        </p>

        {{-- Badges: job type + location --}}
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

        {{-- Footer: salary + action --}}
        <div class="border-t border-gray-100 pt-3 flex items-center justify-between">
            <div>
                <p class="text-xs text-gray-400">Salary range</p>
                <p class="text-sm font-semibold text-gray-800">
                    ${{ number_format($job->salary_min) }} – ${{ number_format($job->salary_max) }}
                </p>
            </div>
               

              <a
              href="{{ url('/job/details/' . $job->id) }}" 
              class="text-xs font-medium px-3.5 py-2 rounded-xl border border-gray-200 text-gray-600 hover:bg-gray-50 hover:border-gray-300 transition-all duration-150">
                View details
              </a>

        </div>

    </div>
</div>