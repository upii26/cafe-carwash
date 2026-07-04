<!-- ═══ SIDEBAR OVERLAY (mobile) ═══ -->
<div id="sidebarOverlay" onclick="closeSidebar()" class="fixed inset-0 bg-black/40 z-40 hidden"></div>

<!-- ═══ SIDEBAR ═══ -->
<aside id="sidebar"
    class="fixed left-0 top-0 bottom-0 w-[220px]
bg-gradient-to-b from-[#1A1408] to-[#14110A]
flex flex-col py-5 px-3 shadow-sm z-50 transition-all">

    <!-- Logo -->
    <div class="flex items-center gap-3 mb-7 px-2">

        <div
            class="w-10 h-10 rounded-xl
        bg-gradient-to-br from-[#8B6B1F] to-[#D4AF37]
        flex items-center justify-center shadow-md">

            <svg class="w-5 h-5 text-[#14110A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
        </div>

        <div>
            <div class="font-bold text-sm text-white leading-tight tracking-wide">
                GG
            </div>

            <div class="text-xs text-[#D4AF37]/80 tracking-[0.2em] uppercase">
                Cafe & Carwash
            </div>
        </div>

    </div>

    <!-- Navigation -->
    <nav class="flex flex-col gap-1 flex-1">

        <!-- Dashboard -->
        <!-- Dashboard dengan submenu -->
        <div x-data="{ open: {{ request()->is('dashboard*') ? 'true' : 'false' }} }">

            <!-- Parent: Dashboard -->
            <button @click="open = !open"
                class="sidebar-item w-full flex items-center gap-3 px-2.5 py-2.5 rounded-xl text-sm font-medium
                {{ request()->is('dashboard*')
                    ? 'bg-gradient-to-r from-[#8B6B1F] to-[#D4AF37] text-white shadow-md'
                    : 'text-white hover:bg-gradient-to-r hover:from-[#8B6B1F] hover:to-[#D4AF37] hover:text-white' }}">

                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <rect x="3" y="3" width="7" height="7" rx="1.5" />
                    <rect x="14" y="3" width="7" height="7" rx="1.5" />
                    <rect x="3" y="14" width="7" height="7" rx="1.5" />
                    <rect x="14" y="14" width="7" height="7" rx="1.5" />
                </svg>

                <span class="flex-1 text-left">Dashboard</span>

                <!-- Chevron -->
                <svg class="w-4 h-4 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <!-- Submenu -->
            <div x-show="open" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-1"
                class="mt-1 ml-3 pl-4 border-l border-white/20 flex flex-col gap-1">

                <!-- Cafe -->
                <a href="{{ url('dashboard') }}"
                    class="sidebar-item flex items-center gap-3 px-2.5 py-2 rounded-xl text-sm font-medium
                        {{ request()->is('dashboard')
                            ? 'bg-gradient-to-r from-[#8B6B1F] to-[#D4AF37] text-white shadow-md'
                            : 'text-white/80 hover:bg-gradient-to-r hover:from-[#8B6B1F] hover:to-[#D4AF37] hover:text-white' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 7h13v6a6 6 0 11-12 0V7z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 8h1a3 3 0 010 6h-1" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21h13" />
                        <!-- uap -->
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 5 Q6.5 3.5 6 2" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9.5 5 Q10 3.5 9.5 2" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 5 Q13.5 3.5 13 2" />
                    </svg>
                    <span>Cafe</span>
                </a>

                <!-- Carwash -->
                <a href="{{ url('dashboard-carwash') }}"
                    class="sidebar-item flex items-center gap-3 px-2.5 py-2 rounded-xl text-sm font-medium
                    {{ request()->is('dashboard-carwash')
                        ? 'bg-gradient-to-r from-[#8B6B1F] to-[#D4AF37] text-white shadow-md'
                        : 'text-white/80 hover:bg-gradient-to-r hover:from-[#8B6B1F] hover:to-[#D4AF37] hover:text-white' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round">

                        <!-- Car body -->
                        <path d="M3 14l2-5c.6-1.5 2-2 3.5-2h6c1.5 0 2.9.5 3.5 2l2 5" />
                        <path d="M2.5 14h19l-.5 4H3z" />

                        <!-- Wheels -->
                        <circle cx="7" cy="18" r="2" />
                        <circle cx="17" cy="18" r="2" />

                        <!-- Windows -->
                        <path d="M8 9h8" />
                        <path d="M9 9l1.5-2h3l1.5 2" />
                    </svg>
                    <span>Carwash</span>
                </a>
            </div>
        </div>

        <!-- Order Line -->
        <a href="{{ url('orders') }}"
            class="sidebar-item flex items-center gap-3 px-2.5 py-2.5 rounded-xl text-sm font-medium
    {{ request()->is('orders')
        ? 'bg-gradient-to-r from-[#8B6B1F] to-[#D4AF37] text-white shadow-md'
        : 'text-white hover:bg-gradient-to-r hover:from-[#8B6B1F] hover:to-[#D4AF37] hover:text-white' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"
                stroke-linecap="round" stroke-linejoin="round">
                <rect x="8" y="2" width="8" height="4" rx="1" />
                <rect x="4" y="4" width="16" height="18" rx="2" />
                <line x1="8" y1="10" x2="16" y2="10" />
                <line x1="8" y1="14" x2="14" y2="14" />
                <line x1="8" y1="18" x2="12" y2="18" />
            </svg>
            <span>Order Line</span>
        </a>

        <!-- Manage Dishes -->

        <a href="{{ url('dishes') }}"
            class="sidebar-item flex items-center gap-3 px-2.5 py-2.5 rounded-xl text-sm font-medium
    {{ request()->is('dishes')
        ? 'bg-gradient-to-r from-[#8B6B1F] to-[#D4AF37] text-white shadow-md'
        : 'text-white hover:bg-gradient-to-r hover:from-[#8B6B1F] hover:to-[#D4AF37] hover:text-white' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.2"
                stroke-linecap="round" stroke-linejoin="round">
                <line x1="3" y1="7" x2="14" y2="7" />
                <line x1="3" y1="12" x2="14" y2="12" />
                <line x1="3" y1="17" x2="14" y2="17" />
                <circle cx="10" cy="7" r="2" fill="white" />
                <circle cx="6" cy="12" r="2" fill="white" />
                <circle cx="11" cy="17" r="2" fill="white" />
                <line x1="18" y1="3" x2="18" y2="21" />
                <line x1="16" y1="3" x2="16" y2="7" />
                <line x1="20" y1="3" x2="20" y2="7" />
                <path d="M16 7a2 2 0 0 0 4 0" />
            </svg>
            <span>Manage Dishes</span>
        </a>

        <!-- Repots -->
        <a href="{{ url('/reports') }}"
            class="sidebar-item flex items-center gap-3 px-2.5 py-2.5 rounded-xl text-sm font-medium
            {{ Route::is('reports')
                ? 'bg-gradient-to-r from-[#8B6B1F] to-[#D4AF37] text-white shadow-md'
                : 'text-white hover:bg-gradient-to-r hover:from-[#8B6B1F] hover:to-[#D4AF37] hover:text-white' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"
                stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="3" width="18" height="18" rx="2" />
                <polyline points="7,17 10,12 13,14 17,8" />
                <line x1="7" y1="17" x2="17" y2="17" />
            </svg>
            <span>Repots</span>
        </a>

        <!-- Users -->
        <a href="{{ url('users') }}"
            class="sidebar-item flex items-center gap-3 px-2.5 py-2.5 rounded-xl text-sm font-medium
            {{ Route::is('users')
                ? 'bg-gradient-to-r from-[#8B6B1F] to-[#D4AF37] text-white shadow-md'
                : 'text-white hover:bg-gradient-to-r hover:from-[#8B6B1F] hover:to-[#D4AF37] hover:text-white' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"
                stroke-linecap="round" stroke-linejoin="round">
                <circle cx="9" cy="7" r="4" />
                <path d="M1 21v-2a6 6 0 0 1 6-6h4a6 6 0 0 1 6 6v2" />
                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
            </svg>
            <span>Users</span>
        </a>



    </nav>

    <!-- Bottom Menu -->
    <div class="flex flex-col gap-1 mt-auto">

        <a href="{{ url('/logout-process') }}"
            class="sidebar-item flex items-center gap-3 px-2.5 py-2.5 rounded-xl text-sm font-medium
    text-white hover:bg-red-500/15 hover:text-red-400 transition-all duration-200">

            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>

            <span>Logout</span>
        </a>

    </div>

</aside>

<script>
    function openSidebar() {
        document.getElementById('sidebar').classList.remove('-translate-x-full');

        document.getElementById('sidebarOverlay').classList.remove('hidden');
    }

    function closeSidebar() {
        document.getElementById('sidebar').classList.add('-translate-x-full');

        document.getElementById('sidebarOverlay').classList.add('hidden');
    }
</script>
