<div x-data="{ activeSection: 'home', isOpen: false }" 
     class="fixed left-0 top-0 h-full flex items-center z-[100]">
    
    <!-- Hamburger Button -->
    <button @click="isOpen = !isOpen" 
            class="fixed top-6 left-4 p-2 rounded-lg bg-gray-900/50 transition-transform duration-300">
        <div class="w-6 h-5 relative flex flex-col justify-between">
            <span class="w-full h-[2px] bg-white transform transition-all duration-300"
                  :class="{ 'rotate-90 translate-y-[0.45rem]': !isOpen }"></span>
            <span class="w-full h-[2px] bg-white transform transition-all duration-300"
                  :class="{ 'opacity-0': !isOpen }"></span>
            <span class="w-full h-[2px] bg-white transform transition-all duration-300"
                  :class="{ '-rotate-90 -translate-y-[0.45rem]': !isOpen }"></span>
        </div>
    </button>

    <!-- Navigation -->
    <nav class="bg-gray-900/20 backdrop-blur-sm p-4 rounded-r-lg transition-all duration-300 absolute left-0"
         :class="{ '-translate-x-full': !isOpen }">
        <ul class="space-y-6 relative">
            <!-- Garis Putih Utama -->
            <div class="absolute left-2 top-0 bottom-0 w-[1px] bg-white/30"></div>
            
            <template x-for="(section, index) in ['home', 'about', 'portfolio', 'contact']" :key="index">
                <li class="relative">
                    <a :href="`#${section}`" 
                       @click.prevent="
                           const el = document.getElementById(section === 'portfolio' ? 'content' : section);
                           el.scrollIntoView({ behavior: 'smooth' });
                           activeSection = section;
                       "
                       class="text-white/70 hover:text-white transition-colors duration-300 flex items-center space-x-2 pl-2 text-base lg:text-lg"
                    >
                        <!-- Garis Aktif dengan Animasi -->
                        <div class="absolute left-2 w-[2px] transition-all duration-700"
                             :class="{ 'h-12 scale-y-100': activeSection === section, 'h-0 scale-y-0': activeSection !== section }"
                             style="top: -6px; background: linear-gradient(to bottom, #9333ea, #22d3ee);">
                        </div>
                        <span :class="{ 'text-white font-medium': activeSection === section }"
                              x-text="section.toUpperCase()">
                        </span>
                    </a>
                </li>
            </template>
        </ul>
    </nav>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const sections = document.querySelectorAll('.snap-section');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && entry.intersectionRatio >= 0.5) {
                const sectionId = entry.target.id;
                const navElement = document.querySelector('[x-data]');
                if (navElement && navElement.__x) {
                    navElement.__x.$data.activeSection = sectionId === 'content' ? 'portfolio' : sectionId;
                }
            }
        });
    }, {
        threshold: [0.5],
        rootMargin: '-10% 0px -10% 0px'
    });

    sections.forEach(section => observer.observe(section));
});
</script>