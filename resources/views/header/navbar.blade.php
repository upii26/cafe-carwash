<header
    class="bg-[linear-gradient(180deg,#14110A_0%,#1B160D_50%,#2A2112_100%)]
    px-4 py-3 flex items-center gap-3 
    border-b border-white/10 flex-shrink-0 z-20 shadow-md"
    style="box-shadow: 0 2px 10px rgba(0,0,0,0.35); height:56px">

    <!-- Hamburger -->
    <button id="hamburger" onclick="openSidebar()"
        class="w-9 h-9 
    bg-[#C89B2C] 
    rounded-xl flex items-center justify-center 
    hover:bg-[#A87912] 
    flex-shrink-0 lg:hidden 
    transition-all duration-200 shadow-sm">

        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>

    <div class="flex-1 relative">
    </div>

    <!-- Profile -->
    <div class="flex items-center gap-2 flex-shrink-0">

        <div
            class="w-9 h-9 
        bg-[#F2DA7B]
        border border-[#E5C35A]/50
        rounded-xl flex items-center justify-center 
        text-[#6B4E0F] text-xs font-bold shadow-sm">
            IK
        </div>

        <div class="hidden sm:block">
            <div class="text-sm font-semibold text-white leading-tight">
                {{ auth()->user()->name }}
            </div>

            <div class="text-xs text-white/80 font-medium">
                {{ auth()->user()->role }}
            </div>
        </div>
    </div>
</header>
