<!-- ═══ SIDEBAR OVERLAY (mobile) ═══ -->
<div id="sidebarOverlay" onclick="closeSidebar()"></div>

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
        <!-- Dashboard Cafe-->
        <a href="{{ url('dashboard-cafe') }}"
            class="sidebar-item flex items-center gap-3 px-2.5 py-2.5 rounded-xl text-sm font-medium
{{ request()->is('dashboard-cafe')
    ? 'bg-gradient-to-r from-[#8B6B1F] to-[#D4AF37] text-white shadow-md'
    : 'text-white hover:bg-gradient-to-r hover:from-[#8B6B1F] hover:to-[#D4AF37] hover:text-white' }}">

            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h13v6a6 6 0 11-12 0V7z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8h1a3 3 0 010 6h-1" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21h13" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 5 Q6.5 3.5 6 2" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.5 5 Q10 3.5 9.5 2" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5 Q13.5 3.5 13 2" />
            </svg>

            <span>Dashboard Cafe</span>
        </a>

        <!-- Dashboard Carwash -->
        <a href="{{ url('dashboard-carwash') }}"
            class="sidebar-item flex items-center gap-3 px-2.5 py-2.5 rounded-xl text-sm font-medium 
{{ request()->is('dashboard-carwash')
    ? 'bg-gradient-to-r from-[#8B6B1F] to-[#D4AF37] text-white shadow-md'
    : 'text-white hover:bg-gradient-to-r hover:from-[#8B6B1F] hover:to-[#D4AF37] hover:text-white' }}">

            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 11l1.5-4A2 2 0 018.4 6h7.2a2 2 0 011.9 1.3L19 11v5h-2a2 2 0 11-4 0H9a2 2 0 11-4 0H3v-5h2z" />
                <circle cx="7" cy="16" r="1" fill="currentColor" />
                <circle cx="17" cy="16" r="1" fill="currentColor" />
            </svg>

            <span>Dashboard Carwash</span>
        </a>

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

        <!-- Manage Table -->
        {{-- <a href=""
            class="sidebar-item flex items-center gap-3 px-2.5 py-2.5 rounded-xl text-sm font-medium
            {{ Route::is('manage.table')
                ? 'bg-gradient-to-r from-[#8B6B1F] to-[#D4AF37] text-white shadow-md'
                : 'text-white hover:bg-gradient-to-r hover:from-[#8B6B1F] hover:to-[#D4AF37] hover:text-white' }}">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 10h18M3 14h18M10 6v12M14 6v12M5 6h14a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2z" />
            </svg>
            <span>Manage Table</span>
        </a> --}}

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
        <a href="{{ url('reports') }}"
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

        <a href=""
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
