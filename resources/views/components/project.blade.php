<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    @forelse ($projects as $index => $project)
        <div 
            x-data="{ show: false }" 
            x-intersect="show = true"
            :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-20'"
            class="bg-gray-900 rounded-lg overflow-hidden transition-all duration-700 hover:transform hover:scale-[1.02]"
            style="transition-delay: {{ $index * 200 }}ms"
        >
            <div class="relative aspect-[16/9] overflow-hidden">
                <img src="{{ Storage::url($project->image_url) }}" 
                     alt="{{ $project->title }}" 
                     class="w-full h-full object-cover">
                
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40 to-transparent"></div>
            </div>
            
            <div class="p-6">
                <h3 class="text-xl font-bold text-white mb-2">{{ $project->title }}</h3>
                <p class="text-gray-400 text-sm mb-4">{{ $project->description }}</p>
                
                <div class="flex flex-wrap gap-2 mb-6">
                    @foreach($project->technologies ?? [] as $tech)
                        <span class="px-3 py-1 rounded-full text-xs font-medium bg-gray-800 text-gray-300 border border-gray-700">
                            {{ $tech }}
                        </span>
                    @endforeach
                </div>
                
                <div class="flex gap-3">
                    @if($project->demo_url)
                        <a href="{{ $project->demo_url }}" 
                           target="_blank"
                           class="inline-flex items-center gap-2 px-4 py-2 bg-gray-800 hover:bg-gray-700 rounded-lg text-sm text-white transition-colors">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none">
                                <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Demo
                        </a>
                    @endif
                    
                    @if($project->repository_url)
                        <a href="{{ $project->repository_url }}" 
                           target="_blank"
                           class="inline-flex items-center gap-2 px-4 py-2 bg-gray-800 hover:bg-gray-700 rounded-lg text-sm text-white transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                            </svg>
                            Repository
                        </a>
                    @endif
                </div>
            </div>
        </div>
    @empty
        <div class="col-span-full text-center text-gray-400">
            <p>Belum ada project yang ditambahkan</p>
        </div>
    @endforelse
</div> 