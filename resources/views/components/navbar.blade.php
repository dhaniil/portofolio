<nav x-data="{ 
    isOpen: false,
    atTop: true,
    handleScroll() {
        this.atTop = window.pageYOffset < 30;
    }
}" 
@scroll.window="handleScroll"
:class="{ 'bg-gray-900/75 backdrop-blur-md shadow-lg': !atTop }"
class="fixed w-full top-0 z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="#" class="text-white font-bold">Logo</a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden lg:block">
                <div class="ml-10 flex items-center space-x-4">
                    <a href="#home" class="nav-link">Home</a>
                    <a href="#about" class="nav-link">About</a>
                    <a href="#portfolio" class="nav-link">Portfolio</a>
                    <a href="#contact" class="nav-link">Contact</a>
                </div>
            </div>

            <!-- Hamburger button -->
            <button @click="isOpen = !isOpen" 
                    class="lg:hidden text-gray-300 hover:text-white"
                    :class="{ 'z-10': !isOpen }">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path :class="{'hidden': isOpen, 'inline-flex': !isOpen }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': !isOpen, 'inline-flex': isOpen }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <!-- Mobile menu -->
            <div x-show="isOpen"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 transform -translate-x-full"
                 x-transition:enter-end="opacity-100 transform translate-x-0"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 transform translate-x-0"
                 x-transition:leave-end="opacity-0 transform -translate-x-full"
                 @click.away="isOpen = false"
                 class="absolute left-0 top-0 w-64 h-screen bg-gray-800 z-50"
                 x-cloak>
                <div class="pt-20 px-4">
                    <a href="#home" class="block text-gray-300 hover:text-white py-2">Home</a>
                    <a href="#about" class="block text-gray-300 hover:text-white py-2">About</a>
                    <a href="#portfolio" class="block text-gray-300 hover:text-white py-2">Portfolio</a>
                    <a href="#contact" class="block text-gray-300 hover:text-white py-2">Contact</a>
                </div>
            </div>
        </div>
    </div>
</nav>

<style>
.nav-link {
    @apply text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200;
}

[x-cloak] {
    display: none !important;
}
</style>