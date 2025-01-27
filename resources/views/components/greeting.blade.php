<div class="backdrop-blur-md flex flex-row items-center justify-center w-full h-[100vh]">
    <div class="flex flex-col">
        <div class="flex flex-col bg-black-500 justify-center items-center p-[1em]">
            <h1 class="text-8xl font-bold text-slate-200">Hello, I'm Dhani</h1>
            <span class="font-normal text-4xl bg-gradient-to-r from-purple-400 via-pink-500 to-red-500 bg-clip-text text-transparent">Welcome to my Website</span>
        </div>
        <div class="flex flex-row justify-center items-center gap-4 px-[1em]">
            <div class="p-[1px] rounded-sm bg-[size:400%] bg-gradient-to-l from-purple-600 via-cyan-400 to-purple-600 animate-gradient-rotate">
                <button 
                    onclick="document.getElementById('contact').scrollIntoView({ behavior: 'smooth', block: 'start' })"
                    class="min-w-36 text-lg text-white font-bold py-1 px-2 rounded-md bg-gray-800 hover:bg-gray-700 transition-colors"
                >
                    Contact Me
                </button>
            </div>
            <div class="p-[1px] rounded-sm bg-[size:400%] shadow-lg bg-gradient-to-r from-purple-600 via-cyan-400 to-purple-600 animate-gradient-rotate">
                <button 
                    onclick="document.getElementById('about').scrollIntoView({ behavior: 'smooth', block: 'start' })"
                    class="min-w-36 text-lg text-white font-bold py-1 px-2 rounded-md bg-gray-800/95 hover:bg-gray-700/95 transition-colors"
                >
                    About Me
                </button>
            </div>
        </div>
        <div>
            <div class="flex justify-center mt-10">
                <button 
                    onclick="document.getElementById('about').scrollIntoView({ behavior: 'smooth', block: 'start' })"
                    class="transition-transform hover:scale-110 active:scale-95"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-white animate-bounce">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5 12 21m0 0-7.5-7.5M12 21V3" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>