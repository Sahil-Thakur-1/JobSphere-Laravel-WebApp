<div class="bg-white border border-gray-100 rounded-2xl shadow-sm shadow-blue-50 overflow-hidden">

    {{-- Blue accent bar --}}
    <div class="h-1 w-full bg-gradient-to-r from-blue-600 to-blue-400"></div>

    <div class="p-5">

        {{-- Header --}}
        <div class="flex items-start justify-between gap-3">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-purple-50 flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-900 leading-tight">{{ $experience->job_role }}</p>
                    <p class="text-xs text-gray-400 mt-0.5">{{ $experience->company_name }}</p>
                </div>
            </div>

            {{-- Actions --}}
            <div class="flex items-center gap-1.5 flex-shrink-0">
                
                 <a   href="{{ url('job-seeker/work-experience/' . $experience->id . '/edit') }}"
                    class="inline-flex items-center justify-center w-8 h-8 rounded-lg border border-gray-200 text-gray-400 hover:text-blue-600 hover:bg-blue-50 hover:border-blue-200 transition-all duration-150"
                    title="{{ __('Edit') }}"
                >
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </a>
                <form action="{{ url('job-seeker/work-experience/' . $experience->id) }}" method="POST" onsubmit="return confirm('Remove this experience entry?')">
                    @csrf
                    @method('DELETE')
                    <button
                        type="submit"
                        class="inline-flex items-center justify-center w-8 h-8 rounded-lg border border-gray-200 text-gray-400 hover:text-red-500 hover:bg-red-50 hover:border-red-200 transition-all duration-150"
                        title="{{ __('Delete') }}"
                    >
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div>

        {{-- Date range + duration badge --}}
        <div class="flex items-center gap-3 mt-3">
            <span class="inline-flex items-center gap-1.5 text-xs text-gray-400">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                {{ $experience->start_date->format('M Y') }} — {{ $experience->end_date ? $experience->end_date->format('M Y') : 'Present' }}
            </span>

            @php
                $end   = $experience->end_date ?? \Carbon\Carbon::now();
                $diff  = $experience->start_date->diff($end);
                $years = $diff->y;
                $months = $diff->m;
                $duration = $years > 0 ? $years . 'y ' : '';
                $duration .= $months > 0 ? $months . 'mo' : '';
                $duration = $duration ?: '< 1 mo';
            @endphp
            <span class="inline-flex items-center gap-1 text-xs font-medium px-2 py-0.5 rounded-full bg-purple-50 text-purple-600">
                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                {{ $duration }}
            </span>
        </div>

        {{-- Description --}}
        @if($experience->description)
            <p class="mt-3 text-xs text-gray-500 leading-relaxed line-clamp-2">
                {{ $experience->description }}
            </p>
        @endif

    </div>
</div>