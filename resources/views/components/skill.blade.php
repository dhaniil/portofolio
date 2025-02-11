<div x-data="{
        page: 1,
        perPage: 3,
        updatePerPage() {
            if (window.innerWidth >= 1024) {
                this.perPage = 9;
            } else {
                this.perPage = 3;
            }
        }
    }"
     x-init="updatePerPage(); window.addEventListener('resize', updatePerPage)"
     class="relative"
>
    <!-- Kontainer untuk Skill -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($skills as $index => $skill)
            <div
                x-show="Math.ceil(({{ $index }} + 1) / perPage) === page"
                x-data="{ show: false }"
                x-intersect="show = true"
                :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-20'"
                class="bg-gray-900/80 rounded-lg overflow-hidden transition-all duration-700 hover:transform hover:scale-[1.02] border border-white/10"
                style="transition-delay: {{ $index * 200 }}ms"
            >
                <div class="p-6 relative">
                    <!-- Garis gradient di samping kiri -->
                    <div class="absolute left-0 top-0 h-full w-[3px] bg-gradient-to-b from-purple-500 to-cyan-400"></div>

                    <div class="pl-4"> <!-- Padding left untuk memberi ruang pada garis -->
                        <h3 class="text-xl font-bold text-white mb-4 flex items-center">
                            {{ $skill->name }}
                        </h3>

                        <div class="w-full bg-gray-800 rounded-full h-1.5 mb-3 overflow-hidden">
                            <div
                                x-data="{ width: 0 }"
                                x-intersect="setTimeout(() => width = {{ $skill->percentage }}, {{ $index * 200 + 700 }})"
                                :style="'width: ' + width + '%'"
                                class="bg-gradient-to-r from-purple-500 to-cyan-600 h-1.5 rounded-full transition-all duration-1000"
                            >
                            </div>
                        </div>

                        <p class="text-gray-400 text-sm">
                            Mastery: {{ $skill->percentage }}%
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Navigasi -->
    <div class="flex justify-center mt-4 space-x-4">
        <button
            x-on:click="page = Math.max(page - 1, 1)"
            class="p-2 flex items-center justify-center bg-gradient-to-r from-purple-500 to-cyan-500 text-white rounded-lg shadow-lg hover:scale-105 transition-transform disabled:opacity-50 disabled:cursor-not-allowed"
            :disabled="page === 1"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        <button
            x-on:click="page = Math.min(page + 1, Math.ceil({{ $skills->count() }} / perPage))"
            class="p-2 flex items-center justify-center bg-gradient-to-r from-cyan-500 to-purple-500 text-white rounded-lg shadow-lg hover:scale-105 transition-transform disabled:opacity-50 disabled:cursor-not-allowed"
            :disabled="page === Math.ceil({{ $skills->count() }} / perPage)"
        >

            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>
    </div>
</div>

<!-- Styles for visibility of the buttons on mobile -->
<style>
    @media (max-width: 640px) {
        .hidden.sm\:inline {
            display: inline !important;
        }
    }
</style>
