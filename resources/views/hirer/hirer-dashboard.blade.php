<x-app-layout>
{{-- Page Header --}}
<div class="mb-10">
    <h2 class="font-semibold text-xl text-gray-900 leading-tight tracking-tight">
        {{ __('Hiring is our priority') }}
    </h2>
    <p class="text-sm text-gray-500 mt-1">Make your company Hiring Process more professional and smooth.</p>
</div>

{{-- Stats Row --}}
<div class="grid grid-cols-2 md:grid-cols-4 gap-3">

    {{-- Total Jobs Posted --}}
    <div class="bg-white border border-gray-100 rounded-2xl p-4 shadow-sm shadow-blue-50">
        <div class="flex items-center justify-between mb-3">
            <p class="text-xs text-gray-400">Jobs Posted</p>
            <div class="w-8 h-8 rounded-lg bg-blue-50 flex items-center justify-center">
                <svg class="w-4 h-4 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
            </div>
        </div>
        <p class="text-2xl font-semibold text-gray-900">{{ $totalJobs }}</p>
        <p class="text-xs text-gray-400 mt-0.5">{{ $activeJobs }} active</p>
    </div>

    {{-- Total Applicants --}}
    <div class="bg-white border border-gray-100 rounded-2xl p-4 shadow-sm shadow-blue-50">
        <div class="flex items-center justify-between mb-3">
            <p class="text-xs text-gray-400">Total Applicants</p>
            <div class="w-8 h-8 rounded-lg bg-purple-50 flex items-center justify-center">
                <svg class="w-4 h-4 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m4 6v-2m0 0a4 4 0 100-8 4 4 0 000 8z"/>
                </svg>
            </div>
        </div>
        <p class="text-2xl font-semibold text-gray-900">{{ $totalApplicants }}</p>
        <p class="text-xs text-gray-400 mt-0.5">{{ $newApplicants }} this week</p>
    </div>

    {{-- Interviewed --}}
    <div class="bg-white border border-gray-100 rounded-2xl p-4 shadow-sm shadow-blue-50">
        <div class="flex items-center justify-between mb-3">
            <p class="text-xs text-gray-400">Interviewed</p>
            <div class="w-8 h-8 rounded-lg bg-yellow-50 flex items-center justify-center">
                <svg class="w-4 h-4 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
        </div>
        <p class="text-2xl font-semibold text-gray-900">{{ $interviewed }}</p>
        <p class="text-xs text-gray-400 mt-0.5">across all jobs</p>
    </div>

    {{-- Hired --}}
    <div class="bg-white border border-gray-100 rounded-2xl p-4 shadow-sm shadow-blue-50">
        <div class="flex items-center justify-between mb-3">
            <p class="text-xs text-gray-400">Hired</p>
            <div class="w-8 h-8 rounded-lg bg-green-50 flex items-center justify-center">
                <svg class="w-4 h-4 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
        <p class="text-2xl font-semibold text-gray-900">{{ $accepted }}</p>
        <p class="text-xs text-gray-400 mt-0.5">candidates accepted</p>
    </div>
</div> 
</x-app-layout>
