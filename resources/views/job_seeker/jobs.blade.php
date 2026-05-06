<x-app-layout >
    <div class="space-y-6">
        <div class="space-y-6">
            {{-- Page Header --}}
            <div>
                <h2 class="font-semibold text-xl text-gray-900 leading-tight tracking-tight">
                    {{ __('Jobs') }}
                </h2>
                <p class="text-sm text-gray-500 mt-1">Your All Job posting at one place</p>
            </div>
    </div>
    <!-- jobs-card -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-[5px]">
    @foreach($jobs as $job)
        <x-job-card :job="$job" />
    @endforeach
     </div>

     <!-- page-links -->
     <div class="">
        {{ $jobs->links() }}
    </div>
     
    </div>
</x-app-layout>