<div x-data="{ activeTab: 'skills' }" class="container mx-auto px-4 py-8 h-[100vh] z-50" id="content">
    <!-- Tab Navigation -->
    <div class="flex justify-center space-x-4 mb-8">
        <div class="flex justify-center space-x-4 bg-gray-800 p-2 rounded-lg">
            <button 
                @click="activeTab = 'skills'" 
                :class="activeTab === 'skills' ? 'bg-purple-600' : 'bg-gray-700 hover:bg-gray-600'"
                class="px-4 py-2 rounded-lg text-white transition-all duration-300"
            >
                Skills
            </button>
            <button 
                @click="activeTab = 'projects'"
                :class="activeTab === 'projects' ? 'bg-purple-600' : 'bg-gray-700 hover:bg-gray-600'"
                class="px-4 py-2 rounded-lg text-white transition-all duration-300"
            >
                Projects
            </button>
            <button 
                @click="activeTab = 'certificates'"
                :class="activeTab === 'certificates' ? 'bg-purple-600' : 'bg-gray-700 hover:bg-gray-600'"
                class="px-4 py-2 rounded-lg text-white transition-all duration-300"
            >
                Certificates
            </button>
        </div>
    </div>

    <!-- Tab Contents -->
    <div>
        <div x-show="activeTab === 'skills'" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform translate-y-4"
             x-transition:enter-end="opacity-100 transform translate-y-0"
             x-transition:leave="transition ease-in duration-300"
             x-transition:leave-start="opacity-100 transform translate-y-0"
             x-transition:leave-end="opacity-0 transform translate-y-4"
             x-cloak
        >
            <x-skills :skills="$skills" />
        </div>

        <div x-show="activeTab === 'projects'"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform translate-y-4"
             x-transition:enter-end="opacity-100 transform translate-y-0"
             x-transition:leave="transition ease-in duration-300"
             x-transition:leave-start="opacity-100 transform translate-y-0"
             x-transition:leave-end="opacity-0 transform translate-y-4"
             x-cloak
        >
            <x-project :projects="$projects" />
        </div>

        <div x-show="activeTab === 'certificates'"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform translate-y-4"
             x-transition:enter-end="opacity-100 transform translate-y-0"
             x-transition:leave="transition ease-in duration-300"
             x-transition:leave-start="opacity-100 transform translate-y-0"
             x-transition:leave-end="opacity-0 transform translate-y-4"
             x-cloak
        >
            <!-- Certificates content -->
            <p class="text-gray-400 text-center">Cek LinkedIn aja bang</p>
        </div>
    </div>
</div>