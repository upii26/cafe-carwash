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
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M18 8h1a4 4 0 010 8h-1M2 8h16v9a4 4 0 01-4 4H6a4 4 0 01-4-4V8zM6 1v3M10 1v3M14 1v3" />
                    </svg>
                    <span>Cafe</span>
                </a>

                <!-- Carwash -->
                <a href="{{ url('dashboard-carwash') }}"
                    class="sidebar-item flex items-center gap-3 px-2.5 py-2 rounded-xl text-sm font-medium
                    {{ request()->is('dashboard-carwash')
                        ? 'bg-gradient-to-r from-[#8B6B1F] to-[#D4AF37] text-white shadow-md'
                        : 'text-white/80 hover:bg-gradient-to-r hover:from-[#8B6B1F] hover:to-[#D4AF37] hover:text-white' }}">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 17h1m16 0h1M5 17a2 2 0 1 0 4 0a2 2 0 1 0 -4 0m10 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0M3 17V9l3-5h12l3 5v8M3 13h18" />
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
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
            </svg>
            <span>Order Line</span>
        </a>

        <!-- Manage Dishes -->

        <a href="{{ url('dishes') }}"
            class="sidebar-item flex items-center gap-3 px-2.5 py-2.5 rounded-xl text-sm font-medium
    {{ request()->is('dishes')
        ? 'bg-gradient-to-r from-[#8B6B1F] to-[#D4AF37] text-white shadow-md'
        : 'text-white hover:bg-gradient-to-r hover:from-[#8B6B1F] hover:to-[#D4AF37] hover:text-white' }}">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
            </svg>
            <span>Manage Dishes</span>
        </a>

        <!-- Repots -->
        <a href="{{ url('/reports') }}"
            class="sidebar-item flex items-center gap-3 px-2.5 py-2.5 rounded-xl text-sm font-medium
            {{ Route::is('reports')
                ? 'bg-gradient-to-r from-[#8B6B1F] to-[#D4AF37] text-white shadow-md'
                : 'text-white hover:bg-gradient-to-r hover:from-[#8B6B1F] hover:to-[#D4AF37] hover:text-white' }}">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            <span>Repots</span>
        </a>

        <!-- Users -->
        <a href="{{ url('users') }}"
            class="sidebar-item flex items-center gap-3 px-2.5 py-2.5 rounded-xl text-sm font-medium
            {{ Route::is('users')
                ? 'bg-gradient-to-r from-[#8B6B1F] to-[#D4AF37] text-white shadow-md'
                : 'text-white hover:bg-gradient-to-r hover:from-[#8B6B1F] hover:to-[#D4AF37] hover:text-white' }}">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0" />
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
