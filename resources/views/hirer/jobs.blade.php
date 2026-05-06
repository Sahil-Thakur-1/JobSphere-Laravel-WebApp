<x-app-layout >
    <!-- Overlay -->
    <div id="overlay" class="fixed inset-0 bg-black/50 z-40 hidden"></div>

    <!-- Drawer -->
    <div id="drawer"
        class="fixed top-0 right-0 h-full w-full sm:w-[500px] bg-white z-50 p-5
            transform translate-x-full transition duration-300 overflow-y-auto">
    @include('hirer.partials.add-job-form',['skills'=>$skills])
    </div>

        <div class="space-y-6">
            {{-- Page Header --}}
            <div class="flex flex-row justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-900 leading-tight tracking-tight">
                    {{ __('Jobs') }}
                </h2>
                <p class="text-sm text-gray-500 mt-1">Your All Job posting at one place</p>
            </div>
            <div class="border-t border-gray-100 pt-4 flex items-center justify-end">
                <button
                    type="submit"
                    id="openBtn"
                    class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 active:bg-blue-800 transition-all duration-150 shadow-sm shadow-blue-100 hover:shadow-md hover:shadow-blue-200">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                            </svg>
                            {{ __('Add Job Application') }}
                        </button>
                    </div>
            </div>

            <!-- jobs-card -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-[5px]">
            @foreach($jobs as $job)
                <x-job-card :job="$job" />
            @endforeach
            </div>

    </div>

</x-app-layout>


<script>
    const openBtn = document.getElementById("openBtn");
    const closeBtn = document.getElementById("closeBtn");
    const drawer = document.getElementById("drawer");
    const overlay = document.getElementById("overlay");

    openBtn.onclick = () => {
        drawer.classList.remove("translate-x-full");
        overlay.classList.remove("hidden");
    };

    const closeDrawer = () => {
        drawer.classList.add("translate-x-full");
        overlay.classList.add("hidden");
    };

    closeBtn.onclick = closeDrawer;
    overlay.onclick = closeDrawer;
</script>