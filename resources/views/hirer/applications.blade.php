<x-app-layout>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    @forelse($applications as $application)
        <x-applicant-card :application="$application" />
    @empty
        <div class="col-span-full bg-white border border-dashed border-gray-100 rounded-2xl p-10 text-center">
            <p class="text-sm font-medium text-gray-600">No applications yet</p>
            <p class="text-xs text-gray-400 mt-1">Applicants will appear here once they apply</p>
        </div>
    @endforelse
</div>
</x-app-layout>