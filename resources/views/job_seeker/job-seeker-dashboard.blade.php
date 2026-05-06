<x-app-layout>
    {{-- Page Header --}}
    <div class="mb-10">
        <h2 class="font-semibold text-xl text-gray-900 leading-tight tracking-tight">
            {{ __('Apply First and wait for result') }}
        </h2>
        <p class="text-sm text-gray-500 mt-1">All The Jobs at your desktop.</p>
    </div>

    {{-- Stats Row --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
        <div class="bg-white border border-gray-100 rounded-2xl p-4 shadow-sm shadow-blue-50">
            <p class="text-xs text-gray-400">Total Applied</p>
            <p class="text-2xl font-semibold text-gray-900 mt-0.5">{{ $appliedJobs->count() }}</p>
        </div>
        <div class="bg-white border border-gray-100 rounded-2xl p-4 shadow-sm shadow-blue-50">
            <p class="text-xs text-gray-400">Processing</p>
            <p class="text-2xl font-semibold text-yellow-500 mt-0.5">{{ $appliedJobs->where('status', 'processing')->count() }}</p>
        </div>
        <div class="bg-white border border-gray-100 rounded-2xl p-4 shadow-sm shadow-blue-50">
            <p class="text-xs text-gray-400">Accepted</p>
            <p class="text-2xl font-semibold text-green-500 mt-0.5">{{ $appliedJobs->where('status', 'accepted')->count() }}</p>
        </div>
        <div class="bg-white border border-gray-100 rounded-2xl p-4 shadow-sm shadow-blue-50">
            <p class="text-xs text-gray-400">Rejected</p>
            <p class="text-2xl font-semibold text-red-500 mt-0.5">{{ $appliedJobs->where('status', 'rejected')->count() }}</p>
        </div>
    </div>
</x-app-layout>

