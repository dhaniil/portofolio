<div x-data class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse ($skills as $index => $skill)
        <div 
            x-data="{ show: false }" 
            x-intersect="show = true"
            :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-20'"
            class="p-[1px] rounded-lg bg-gradient-to-r from-purple-600 via-cyan-400 to-purple-600 transition-all duration-700"
            style="transition-delay: {{ $index * 200 }}ms"
        >
            <div class="bg-gray-800/95 p-6 rounded-lg h-full">
                <h3 class="text-xl font-bold text-white mb-2">{{ $skill->name }}</h3>
                <div class="w-full bg-gray-700 rounded-full h-2.5 mb-2 overflow-hidden">
                    <div 
                        x-data="{ width: 0 }"
                        x-intersect="setTimeout(() => width = {{ $skill->percentage }}, {{ $index * 200 + 700 }})"
                        :style="`width: ${width}%`"
                        class="bg-gradient-to-r from-purple-600 to-cyan-400 h-2.5 rounded-full transition-all duration-1000"
                    >
                    </div>
                </div>
                <p class="text-gray-300">Mastery: {{ $skill->percentage }}%</p>
            </div>
        </div>
    @empty
        <div class="col-span-full text-center text-gray-400">
            <p>Tidak ada skills yang ditemukan</p>
        </div>
    @endforelse
</div>