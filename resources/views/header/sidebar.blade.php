<!-- ═══ SIDEBAR OVERLAY (mobile) ═══ -->
<div id="sidebarOverlay" onclick="closeSidebar()"></div>

<!-- ═══ SIDEBAR ═══ -->
<aside id="sidebar"
    class="fixed left-0 top-0 bottom-0 w-[220px] bg-white flex flex-col py-5 px-3 shadow-sm z-50 transition-all">

    <!-- Logo -->
    <div class="flex items-center gap-2 mb-7 px-1">
        <div class="w-9 h-9 bg-[#0BAB8C] rounded-xl flex items-center justify-center">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
        </div>
        <div>
            <div class="font-bold text-sm text-gray-900 leading-tight">Tasty</div>
            <div class="text-xs text-gray-400">Station</div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="flex flex-col gap-1 flex-1">

        <!-- Dashboard -->
        <!-- Dashboard -->
        <a href="{{ url('dashboard') }}"
            class="sidebar-item flex items-center gap-3 px-2.5 py-2.5 rounded-xl text-sm font-medium
    {{ request()->is('dashboard') ? 'bg-[#e6faf6] text-[#0BAB8C]' : 'text-gray-500 hover:bg-gray-50' }}">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <rect x="3" y="3" width="7" height="7" rx="1.5" />
                <rect x="14" y="3" width="7" height="7" rx="1.5" />
                <rect x="3" y="14" width="7" height="7" rx="1.5" />
                <rect x="14" y="14" width="7" height="7" rx="1.5" />
            </svg>
            <span>Dashboard</span>
        </a>

        <!-- Order Line -->
        <a href="{{url('orders')}}"
            class="sidebar-item flex items-center gap-3 px-2.5 py-2.5 rounded-xl text-sm font-medium
    {{ request()->is('orders') ? 'bg-[#e6faf6] text-[#0BAB8C]' : 'text-gray-500 hover:bg-gray-50' }}">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
            </svg>
            <span>Order Line</span>
        </a>

        <!-- Manage Table -->
        <a href=""
            class="sidebar-item flex items-center gap-3 px-2.5 py-2.5 rounded-xl text-sm font-medium
            {{ Route::is('manage.table') ? 'bg-[#e6faf6] text-[#0BAB8C]' : 'text-gray-500 hover:bg-gray-50' }}">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 10h18M3 14h18M10 6v12M14 6v12M5 6h14a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2z" />
            </svg>
            <span>Manage Table</span>
        </a>

        <!-- Manage Dishes -->

        <a href="{{ url('dishes') }}"
            class="sidebar-item flex items-center gap-3 px-2.5 py-2.5 rounded-xl text-sm font-medium
    {{ request()->is('dishes') ? 'bg-[#e6faf6] text-[#0BAB8C]' : 'text-gray-500 hover:bg-gray-50' }}">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
            </svg>
            <span>Manage Dishes</span>
        </a>

        <!-- Repots -->
        <a href="{{ url('reports') }}"
            class="sidebar-item flex items-center gap-3 px-2.5 py-2.5 rounded-xl text-sm font-medium
            {{ Route::is('reports') ? 'bg-[#e6faf6] text-[#0BAB8C]' : 'text-gray-500 hover:bg-gray-50' }}">
                <svg class="w-5 h-5 flex-shrink-0"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            <span>Repots</span>
        </a>

        <!-- Users -->
        <a href="{{ url('users') }}"
            class="sidebar-item flex items-center gap-3 px-2.5 py-2.5 rounded-xl text-sm font-medium
            {{ Route::is('users') ? 'bg-[#e6faf6] text-[#0BAB8C]' : 'text-gray-500 hover:bg-gray-50' }}">
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
            class="sidebar-item flex items-center gap-3 px-2.5 py-2.5 rounded-xl text-sm font-medium text-gray-500 hover:bg-gray-50">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
            <span>Logout</span>
        </a>

    </div>

</aside>
