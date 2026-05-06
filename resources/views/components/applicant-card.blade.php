<div class="bg-white border border-gray-100 rounded-2xl shadow-sm shadow-blue-50 overflow-hidden">

    {{-- Blue accent bar --}}
    <div class="h-1 w-full bg-gradient-to-r from-blue-600 to-blue-400"></div>
   

    <div class="p-5">    
     <p class="text-sm font-semibold text-gray-900 mb-2 leading-tight">{{ $application['job_title'] }}</p>
        {{-- Header: avatar + name + status --}}
        <div class="flex items-start justify-between gap-3">
            
            <div class="flex items-center gap-3">
                {{-- Avatar --}}
                <div class="w-11 h-11 rounded-xl bg-blue-50 flex items-center justify-center flex-shrink-0">
                    <span class="text-base font-semibold text-blue-600">
                        {{ strtoupper(substr($application['user']->name, 0, 1)) }}
                    </span>
                </div>

                <div>
                    <p class="text-sm font-semibold text-gray-900 leading-tight">{{ $application['user']->name }}</p>
                    <p class="text-xs text-gray-400 mt-0.5">{{ $application['user']->email }}</p>
                </div>
            </div>

            {{-- Status Badge --}}
            @php
                $statusConfig = match($application['status']) {
                    'accepted'   => ['bg' => 'bg-green-50',  'text' => 'text-green-700',  'label' => 'Accepted'],
                    'rejected'   => ['bg' => 'bg-red-50',    'text' => 'text-red-600',    'label' => 'Rejected'],
                    'interviwed' => ['bg' => 'bg-blue-50',   'text' => 'text-blue-700',   'label' => 'Interviewed'],
                    default      => ['bg' => 'bg-yellow-50', 'text' => 'text-yellow-600', 'label' => 'Processing'],
                };
            @endphp
            <span class="flex-shrink-0 text-xs font-medium px-2.5 py-1 rounded-full {{ $statusConfig['bg'] }} {{ $statusConfig['text'] }}">
                {{ $statusConfig['label'] }}
            </span>
        </div>

        {{-- Profile Details --}}
        @php $profile = $application['user']->jobSeekerProfile; @endphp

        <div class="mt-4 grid grid-cols-2 gap-2">

            <div class="bg-gray-50 rounded-xl px-3 py-2">
                <p class="text-xs text-gray-400">Experience</p>
                <p class="text-xs font-medium text-gray-700 mt-0.5">
                    {{ $profile?->experience ? $profile->experience . ' yrs' : '—' }}
                </p>
            </div>

            <div class="bg-gray-50 rounded-xl px-3 py-2">
                <p class="text-xs text-gray-400">Location</p>
                <p class="text-xs font-medium text-gray-700 mt-0.5 truncate">
                    {{ $profile?->current_location ?? '—' }}
                </p>
            </div>

            <div class="bg-gray-50 rounded-xl px-3 py-2">
                <p class="text-xs text-gray-400">Expected Salary</p>
                <p class="text-xs font-medium text-gray-700 mt-0.5">
                    {{ $profile?->expected_salary ? '$' . number_format($profile->expected_salary) : '—' }}
                </p>
            </div>

            <div class="bg-gray-50 rounded-xl px-3 py-2">
                <p class="text-xs text-gray-400">Applied on</p>
                <p class="text-xs font-medium text-gray-700 mt-0.5">
                    {{ $application['user']->created_at->format('d M Y') }}
                </p>
            </div>

        </div>

        {{-- Headline --}}
        @if($profile?->headline)
            <p class="mt-3 text-xs text-gray-500 leading-relaxed line-clamp-2">
                {{ $profile->headline }}
            </p>
        @endif

        {{-- Resume + Status Actions --}}
        <div class="mt-4 pt-4 border-t border-gray-100 flex items-center justify-between gap-2">

            {{-- Resume link --}}
            @if($profile?->resume_url)
                <a
                    href="{{ $profile->resume_url }}"
                    target="_blank"
                    class="inline-flex items-center gap-1.5 text-xs font-medium text-blue-600 hover:underline"
                >
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/>
                    </svg>
                    View Resume
                </a>
            @else
                <span class="text-xs text-gray-300">No resume uploaded</span>
            @endif

            {{-- Status Update Dropdown --}}
            <div class="relative" x-data="{ open: false }">
                <button
                    @click="open = !open"
                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-medium border border-gray-200 text-gray-600 hover:bg-gray-50 hover:border-gray-300 transition-all duration-150"
                >
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                    </svg>
                    Update Status
                </button>

                <div
                    x-show="open"
                    @click.outside="open = false"
                    x-transition
                    class="absolute right-0 bottom-9 w-40 bg-white border border-gray-100 rounded-xl shadow-lg shadow-gray-100 overflow-hidden z-10"
                >
                    @foreach(['processing' => ['label' => 'Processing', 'text' => 'text-yellow-600'], 'interviwed' => ['label' => 'Interviewed', 'text' => 'text-blue-600'], 'accepted' => ['label' => 'Accepted', 'text' => 'text-green-600'], 'rejected' => ['label' => 'Rejected', 'text' => 'text-red-500']] as $value => $config)
                        <form action="{{ url('hirer/applications/' . $application['user']->id . '/status/' . $application['job_id']) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="status" value="{{ $value }}">
                            <button
                                type="submit"
                                class="w-full text-left px-4 py-2.5 text-xs font-medium {{ $config['text'] }} hover:bg-gray-50 transition-colors duration-100 {{ $application['status'] === $value ? 'bg-gray-50' : '' }}"
                            >
                                {{ $config['label'] }}
                                @if($application['status'] === $value)
                                    <span class="float-right">✓</span>
                                @endif
                            </button>
                        </form>
                    @endforeach
                </div>
            </div>

        </div>

    </div>
</div>