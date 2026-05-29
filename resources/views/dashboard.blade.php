@include('header.head')
   <style>
                /* ── Stat cards ── */
                .stat-card {
                    transition: transform .2s, box-shadow .2s;
                }

                .stat-card:hover {
                    transform: translateY(-3px);
                    box-shadow: 0 8px 24px rgba(0, 0, 0, .09);
                }

                .stat-icon {
                    transition: transform .25s;
                }

                .stat-card:hover .stat-icon {
                    transform: scale(1.12) rotate(-4deg);
                }

                /* ── Progress bar ── */
                .progress-bar {
                    height: 6px;
                    border-radius: 99px;
                    background: #e9f0ee;
                    overflow: hidden;
                }

                .progress-fill {
                    height: 100%;
                    border-radius: 99px;
                    background: #0BAB8C;
                    animation: growBar .8s ease both;
                }

                @keyframes growBar {
                    from {
                        width: 0 !important;
                    }
                }

                /* ── Recent orders table rows ── */
                .order-row {
                    transition: background .15s;
                }

                .order-row:hover {
                    background: #f7fdfb;
                }

                /* ── Activity dot pulse ── */
                .pulse-dot {
                    animation: pulse 2s ease-in-out infinite;
                }

                @keyframes pulse {

                    0%,
                    100% {
                        opacity: 1;
                        transform: scale(1);
                    }

                    50% {
                        opacity: .5;
                        transform: scale(1.35);
                    }
                }

                /* ── Page fade-up ── */
                .fade-up {
                    animation: fadeUp .45s ease both;
                }

                @keyframes fadeUp {
                    from {
                        opacity: 0;
                        transform: translateY(16px);
                    }

                    to {
                        opacity: 1;
                        transform: translateY(0);
                    }
                }

                .delay-1 {
                    animation-delay: .05s
                }

                .delay-2 {
                    animation-delay: .10s
                }

                .delay-3 {
                    animation-delay: .15s
                }

                .delay-4 {
                    animation-delay: .20s
                }

                .delay-5 {
                    animation-delay: .25s
                }

                .delay-6 {
                    animation-delay: .30s
                }

                /* ── Chart bars ── */
                .chart-bar {
                    transition: height .6s cubic-bezier(.4, 0, .2, 1);
                    border-radius: 6px 6px 0 0;
                }

                /* ── Donut chart ── */
                .donut {
                    transform: rotate(-90deg);
                }

                /* ── FIX SCROLL ── */
                html, body {
                    height: 100%;
                    overflow-x: hidden;
                }

                #appWrapper {
                    overflow-y: auto !important;
                    height: 100vh;
                }

                .main-layout {
                    overflow: visible !important;
                    min-height: 0;
                }
            </style>

<body class="bg-[#F0FBF8] min-h-screen overflow-x-hidden">

    @include('header.sidebar')

    <!-- Overlay sidebar mobile -->
    <div id="sidebarOverlay" onclick="closeSidebar()"></div>

    <div id="appWrapper" class="flex flex-col min-h-screen">

        @include('header.navbar')

        <!-- MAIN LAYOUT -->
        <div class="main-layout flex flex-1">



            {{-- ═══ DASHBOARD CONTENT ═══ --}}
            <div class="flex-1 p-4 md:p-6 pb-20 lg:pb-6">

                {{-- ── Top greeting row ── --}}
                <div class="flex items-center justify-between mb-5 fade-up">
                    <div>
                        <h1 class="text-lg md:text-xl font-bold text-gray-900 leading-tight">Selamat Datang, Ibrahim 👋
                        </h1>
                        <p class="text-xs text-gray-400 mt-0.5" id="dateLabel"></p>
                    </div>
                    <div class="flex items-center gap-2">
                        <div
                            class="hidden sm:flex items-center gap-1.5 bg-white px-3 py-1.5 rounded-xl text-xs font-medium text-gray-500 border border-gray-100">
                            <span class="w-2 h-2 rounded-full bg-green-400 pulse-dot"></span>
                            Restoran Buka
                        </div>
                        <button
                            class="w-9 h-9 bg-white rounded-xl flex items-center justify-center border border-gray-100 hover:bg-gray-50">
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- ── STAT CARDS (4 kolom di lg, 2 di tablet, 2 di mobile) ── --}}
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 md:gap-4 mb-5">

                    {{-- Total Revenue --}}
                    <div class="stat-card bg-white rounded-2xl p-4 fade-up delay-1">
                        <div class="flex items-start justify-between mb-3">
                            <div
                                class="stat-icon w-10 h-10 rounded-xl bg-[#e6faf6] flex items-center justify-center text-xl">
                                💰</div>
                            <span
                                class="text-[10px] font-semibold text-green-500 bg-green-50 px-2 py-0.5 rounded-full">+12.5%</span>
                        </div>
                        <div class="text-xl md:text-2xl font-bold text-gray-900" data-count="4820" id="c1">$0
                        </div>
                        <div class="text-xs text-gray-400 mt-0.5">Total Revenue</div>
                        <div class="progress-bar mt-3">
                            <div class="progress-fill" style="width:72%"></div>
                        </div>
                        <div class="text-[10px] text-gray-400 mt-1">Target bulanan: $6.700</div>
                    </div>

                    {{-- Total Orders --}}
                    <div class="stat-card bg-white rounded-2xl p-4 fade-up delay-2">
                        <div class="flex items-start justify-between mb-3">
                            <div
                                class="stat-icon w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-xl">
                                📋</div>
                            <span
                                class="text-[10px] font-semibold text-blue-500 bg-blue-50 px-2 py-0.5 rounded-full">+8.1%</span>
                        </div>
                        <div class="text-xl md:text-2xl font-bold text-gray-900" data-count="148" id="c2">0</div>
                        <div class="text-xs text-gray-400 mt-0.5">Total Pesanan</div>
                        <div class="progress-bar mt-3">
                            <div class="progress-fill" style="width:58%; background:#3b82f6"></div>
                        </div>
                        <div class="text-[10px] text-gray-400 mt-1">Target hari ini: 200</div>
                    </div>

                    {{-- Active Tables --}}
                    <div class="stat-card bg-white rounded-2xl p-4 fade-up delay-3">
                        <div class="flex items-start justify-between mb-3">
                            <div
                                class="stat-icon w-10 h-10 rounded-xl bg-orange-50 flex items-center justify-center text-xl">
                                🪑</div>
                            <span
                                class="text-[10px] font-semibold text-orange-500 bg-orange-50 px-2 py-0.5 rounded-full">Live</span>
                        </div>
                        <div class="text-xl md:text-2xl font-bold text-gray-900"><span data-count="9"
                                id="c3">0</span><span class="text-sm font-normal text-gray-400"> / 16</span>
                        </div>
                        <div class="text-xs text-gray-400 mt-0.5">Meja Aktif</div>
                        <div class="progress-bar mt-3">
                            <div class="progress-fill" style="width:56%; background:#f97316"></div>
                        </div>
                        <div class="text-[10px] text-gray-400 mt-1">7 meja tersedia</div>
                    </div>

                    {{-- Avg Order Value --}}
                    <div class="stat-card bg-white rounded-2xl p-4 fade-up delay-4">
                        <div class="flex items-start justify-between mb-3">
                            <div
                                class="stat-icon w-10 h-10 rounded-xl bg-purple-50 flex items-center justify-center text-xl">
                                ⭐</div>
                            <span
                                class="text-[10px] font-semibold text-purple-500 bg-purple-50 px-2 py-0.5 rounded-full">+3.2%</span>
                        </div>
                        <div class="text-xl md:text-2xl font-bold text-gray-900" data-count="32" id="c4">$0</div>
                        <div class="text-xs text-gray-400 mt-0.5">Rata-rata Pesanan</div>
                        <div class="progress-bar mt-3">
                            <div class="progress-fill" style="width:64%; background:#a855f7"></div>
                        </div>
                        <div class="text-[10px] text-gray-400 mt-1">Target: $50</div>
                    </div>
                </div>

                {{-- ── ROW 2: Chart + Donut ── --}}
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-3 md:gap-4 mb-5">

                    {{-- Bar Chart (Revenue 7 hari) --}}
                    <div class="lg:col-span-2 bg-white rounded-2xl p-4 md:p-5 fade-up delay-5">
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <h3 class="font-bold text-gray-900 text-sm">Pendapatan Mingguan</h3>
                                <p class="text-xs text-gray-400 mt-0.5">7 hari terakhir</p>
                            </div>
                            <div class="flex gap-1.5">
                                <button
                                    class="px-2.5 py-1 bg-[#0BAB8C] text-white rounded-lg text-[10px] font-semibold">Minggu</button>
                                <button
                                    class="px-2.5 py-1 bg-gray-50 text-gray-500 rounded-lg text-[10px] font-semibold hover:bg-gray-100">Bulan</button>
                            </div>
                        </div>
                        {{-- SVG Bar Chart --}}
                        <div class="flex items-end gap-2 h-32 md:h-40" id="barChart">
                            {{-- rendered by JS --}}
                        </div>
                        <div class="flex justify-between mt-2" id="barLabels"></div>
                    </div>

                    {{-- Donut Chart (Order type) --}}
                    <div class="bg-white rounded-2xl p-4 md:p-5 fade-up delay-6">
                        <h3 class="font-bold text-gray-900 text-sm mb-1">Tipe Pesanan</h3>
                        <p class="text-xs text-gray-400 mb-4">Hari ini</p>
                        <div class="flex items-center justify-center mb-4">
                            <div class="relative w-28 h-28">
                                <svg viewBox="0 0 36 36" class="w-full h-full donut">
                                    <circle cx="18" cy="18" r="14" fill="none" stroke="#e9f0ee"
                                        stroke-width="4" />
                                    <circle cx="18" cy="18" r="14" fill="none" stroke="#0BAB8C"
                                        stroke-width="4" stroke-dasharray="49 51" stroke-linecap="round" />
                                    <circle cx="18" cy="18" r="14" fill="none" stroke="#3b82f6"
                                        stroke-width="4" stroke-dasharray="27 73" stroke-dashoffset="-49"
                                        stroke-linecap="round" />
                                    <circle cx="18" cy="18" r="14" fill="none" stroke="#f97316"
                                        stroke-width="4" stroke-dasharray="16 84" stroke-dashoffset="-76"
                                        stroke-linecap="round" />
                                    <circle cx="18" cy="18" r="14" fill="none" stroke="#a855f7"
                                        stroke-width="4" stroke-dasharray="8 92" stroke-dashoffset="-92"
                                        stroke-linecap="round" />
                                </svg>
                                <div class="absolute inset-0 flex flex-col items-center justify-center">
                                    <span class="text-lg font-bold text-gray-900">148</span>
                                    <span class="text-[10px] text-gray-400">pesanan</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2">
                            <div class="flex items-center justify-between text-xs">
                                <div class="flex items-center gap-1.5"><span
                                        class="w-2.5 h-2.5 rounded-full bg-[#0BAB8C]"></span><span
                                        class="text-gray-600">Dine In</span></div>
                                <span class="font-bold text-gray-800">73 <span
                                        class="text-gray-400 font-normal">(49%)</span></span>
                            </div>
                            <div class="flex items-center justify-between text-xs">
                                <div class="flex items-center gap-1.5"><span
                                        class="w-2.5 h-2.5 rounded-full bg-blue-500"></span><span
                                        class="text-gray-600">Take Away</span></div>
                                <span class="font-bold text-gray-800">40 <span
                                        class="text-gray-400 font-normal">(27%)</span></span>
                            </div>
                            <div class="flex items-center justify-between text-xs">
                                <div class="flex items-center gap-1.5"><span
                                        class="w-2.5 h-2.5 rounded-full bg-orange-400"></span><span
                                        class="text-gray-600">Delivery</span></div>
                                <span class="font-bold text-gray-800">23 <span
                                        class="text-gray-400 font-normal">(16%)</span></span>
                            </div>
                            <div class="flex items-center justify-between text-xs">
                                <div class="flex items-center gap-1.5"><span
                                        class="w-2.5 h-2.5 rounded-full bg-purple-500"></span><span
                                        class="text-gray-600">Online</span></div>
                                <span class="font-bold text-gray-800">12 <span
                                        class="text-gray-400 font-normal">(8%)</span></span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ── ROW 3: Recent Orders + Top Menu ── --}}
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-3 md:gap-4">

                    {{-- Recent Orders Table --}}
                    <div class="lg:col-span-2 bg-white rounded-2xl overflow-hidden fade-up delay-5">
                        <div class="flex items-center justify-between px-4 md:px-5 pt-4 pb-3 border-b border-gray-50">
                            <h3 class="font-bold text-gray-900 text-sm">Pesanan Terkini</h3>
                            <a href="#" class="text-xs font-semibold text-[#0BAB8C] hover:underline">Lihat
                                semua</a>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-xs">
                                <thead>
                                    <tr class="bg-gray-50">
                                        <th class="text-left px-4 md:px-5 py-2.5 text-gray-400 font-semibold">Order ID
                                        </th>
                                        <th class="text-left px-3 py-2.5 text-gray-400 font-semibold">Meja</th>
                                        <th
                                            class="text-left px-3 py-2.5 text-gray-400 font-semibold hidden sm:table-cell">
                                            Item</th>
                                        <th class="text-left px-3 py-2.5 text-gray-400 font-semibold">Total</th>
                                        <th class="text-left px-3 py-2.5 text-gray-400 font-semibold">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="order-row border-t border-gray-50">
                                        <td class="px-4 md:px-5 py-3 font-semibold text-gray-800">#F0031</td>
                                        <td class="px-3 py-3 text-gray-500">T-12</td>
                                        <td class="px-3 py-3 text-gray-500 hidden sm:table-cell">5 item</td>
                                        <td class="px-3 py-3 font-bold text-gray-800">$48.00</td>
                                        <td class="px-3 py-3"><span
                                                class="bg-[#FFF3CD] text-[#B45309] px-2 py-0.5 rounded-md font-semibold text-[10px]">In
                                                Kitchen</span></td>
                                    </tr>
                                    <tr class="order-row border-t border-gray-50">
                                        <td class="px-4 md:px-5 py-3 font-semibold text-gray-800">#F0030</td>
                                        <td class="px-3 py-3 text-gray-500">T-04</td>
                                        <td class="px-3 py-3 text-gray-500 hidden sm:table-cell">6 item</td>
                                        <td class="px-3 py-3 font-bold text-gray-800">$72.00</td>
                                        <td class="px-3 py-3"><span
                                                class="bg-blue-50 text-blue-600 px-2 py-0.5 rounded-md font-semibold text-[10px]">Serving</span>
                                        </td>
                                    </tr>
                                    <tr class="order-row border-t border-gray-50">
                                        <td class="px-4 md:px-5 py-3 font-semibold text-gray-800">#F0029</td>
                                        <td class="px-3 py-3 text-gray-500">T-07</td>
                                        <td class="px-3 py-3 text-gray-500 hidden sm:table-cell">3 item</td>
                                        <td class="px-3 py-3 font-bold text-gray-800">$31.00</td>
                                        <td class="px-3 py-3"><span
                                                class="bg-[#D1FAE5] text-[#065F46] px-2 py-0.5 rounded-md font-semibold text-[10px]">Selesai</span>
                                        </td>
                                    </tr>
                                    <tr class="order-row border-t border-gray-50">
                                        <td class="px-4 md:px-5 py-3 font-semibold text-gray-800">#F0028</td>
                                        <td class="px-3 py-3 text-gray-500">T-03</td>
                                        <td class="px-3 py-3 text-gray-500 hidden sm:table-cell">8 item</td>
                                        <td class="px-3 py-3 font-bold text-gray-800">$96.00</td>
                                        <td class="px-3 py-3"><span
                                                class="bg-[#D1FAE5] text-[#065F46] px-2 py-0.5 rounded-md font-semibold text-[10px]">Selesai</span>
                                        </td>
                                    </tr>
                                    <tr class="order-row border-t border-gray-50">
                                        <td class="px-4 md:px-5 py-3 font-semibold text-gray-800">#F0027</td>
                                        <td class="px-3 py-3 text-gray-500">T-09</td>
                                        <td class="px-3 py-3 text-gray-500 hidden sm:table-cell">2 item</td>
                                        <td class="px-3 py-3 font-bold text-gray-800">$22.00</td>
                                        <td class="px-3 py-3"><span
                                                class="bg-[#FEE2E2] text-[#B91C1C] px-2 py-0.5 rounded-md font-semibold text-[10px]">Wait
                                                List</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- Top Menu Items --}}
                    <div class="bg-white rounded-2xl p-4 md:p-5 fade-up delay-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="font-bold text-gray-900 text-sm">Menu Terlaris</h3>
                            <span class="text-[10px] text-gray-400">Hari ini</span>
                        </div>
                        <div class="flex flex-col gap-3">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-9 h-9 rounded-xl bg-[#FFF9F0] flex items-center justify-center text-xl flex-shrink-0">
                                    🍝</div>
                                <div class="flex-1 min-w-0">
                                    <div class="text-xs font-semibold text-gray-800 truncate">Pasta with Roast Beef
                                    </div>
                                    <div class="progress-bar mt-1">
                                        <div class="progress-fill" style="width:85%"></div>
                                    </div>
                                </div>
                                <span class="text-xs font-bold text-gray-700 flex-shrink-0">34x</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-9 h-9 rounded-xl bg-[#FFF5F0] flex items-center justify-center text-xl flex-shrink-0">
                                    🍣</div>
                                <div class="flex-1 min-w-0">
                                    <div class="text-xs font-semibold text-gray-800 truncate">Grilled Salmon Steak
                                    </div>
                                    <div class="progress-bar mt-1">
                                        <div class="progress-fill" style="width:70%; background:#f97316"></div>
                                    </div>
                                </div>
                                <span class="text-xs font-bold text-gray-700 flex-shrink-0">28x</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-9 h-9 rounded-xl bg-[#FFF0F0] flex items-center justify-center text-xl flex-shrink-0">
                                    🥩</div>
                                <div class="flex-1 min-w-0">
                                    <div class="text-xs font-semibold text-gray-800 truncate">Beef Steak</div>
                                    <div class="progress-bar mt-1">
                                        <div class="progress-fill" style="width:55%; background:#3b82f6"></div>
                                    </div>
                                </div>
                                <span class="text-xs font-bold text-gray-700 flex-shrink-0">22x</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-9 h-9 rounded-xl bg-[#FFFFF0] flex items-center justify-center text-xl flex-shrink-0">
                                    🥞</div>
                                <div class="flex-1 min-w-0">
                                    <div class="text-xs font-semibold text-gray-800 truncate">Apple Stuffed Pancake
                                    </div>
                                    <div class="progress-bar mt-1">
                                        <div class="progress-fill" style="width:42%; background:#a855f7"></div>
                                    </div>
                                </div>
                                <span class="text-xs font-bold text-gray-700 flex-shrink-0">17x</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-9 h-9 rounded-xl bg-[#F0F8FF] flex items-center justify-center text-xl flex-shrink-0">
                                    🍤</div>
                                <div class="flex-1 min-w-0">
                                    <div class="text-xs font-semibold text-gray-800 truncate">Shrimp Rice Bowl</div>
                                    <div class="progress-bar mt-1">
                                        <div class="progress-fill" style="width:30%; background:#ec4899"></div>
                                    </div>
                                </div>
                                <span class="text-xs font-bold text-gray-700 flex-shrink-0">12x</span>
                            </div>
                        </div>

                        {{-- Quick Summary --}}
                        <div class="mt-4 pt-4 border-t border-gray-50 grid grid-cols-2 gap-3">
                            <div class="bg-[#e6faf6] rounded-xl p-3 text-center">
                                <div class="text-sm font-bold text-[#0BAB8C]">$4,820</div>
                                <div class="text-[10px] text-gray-500 mt-0.5">Pendapatan</div>
                            </div>
                            <div class="bg-gray-50 rounded-xl p-3 text-center">
                                <div class="text-sm font-bold text-gray-700">4.8 ⭐</div>
                                <div class="text-[10px] text-gray-500 mt-0.5">Rating Hari Ini</div>
                            </div>
                        </div>
                    </div>

                </div>{{-- end row 3 --}}

            </div>{{-- end dashboard scroll --}}


        </div>

    </div>

    @include('header.navmobile')
    </div>

    <script>
        (function() {
            /* ── Date label ── */
            const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            const months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
            const now = new Date();
            const el = document.getElementById('dateLabel');
            if (el) el.textContent = days[now.getDay()] + ', ' + now.getDate() + ' ' + months[now.getMonth()] + ' ' +
                now.getFullYear();

            /* ── Count-up animation ── */
            function countUp(id, target, prefix = '', suffix = '') {
                const el = document.getElementById(id);
                if (!el) return;
                const dur = 900;
                const step = 16;
                let cur = 0;
                const inc = target / (dur / step);
                const t = setInterval(() => {
                    cur += inc;
                    if (cur >= target) {
                        cur = target;
                        clearInterval(t);
                    }
                    el.textContent = prefix + Math.floor(cur).toLocaleString() + suffix;
                }, step);
            }
            countUp('c1', 4820, '$');
            countUp('c2', 148);
            countUp('c3', 9);
            countUp('c4', 32, '$');

            /* ── Bar chart ── */
            const labels = ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'];
            const values = [520, 780, 650, 920, 840, 1100, 960]; // in dollars (×10 for display)
            const max = Math.max(...values);
            const colors = ['#a7f3d0', '#6ee7b7', '#34d399', '#10b981', '#059669', '#0BAB8C', '#047857'];

            const chart = document.getElementById('barChart');
            const lblRow = document.getElementById('barLabels');
            if (chart && lblRow) {
                chart.innerHTML = values.map((v, i) => {
                    const pct = (v / max * 100).toFixed(1);
                    const isToday = i === 6;
                    return `<div class="flex-1 flex flex-col items-center gap-1 group cursor-pointer">
                <div class="text-[9px] font-semibold text-gray-400 group-hover:text-[#0BAB8C] transition-colors opacity-0 group-hover:opacity-100">$${v}</div>
                <div class="w-full flex items-end" style="flex:1">
                    <div class="chart-bar w-full" style="height:${pct}%; background:${isToday ? '#0BAB8C' : colors[i]}; opacity:${isToday ? 1 : 0.6};"
                         title="$${v}">
                    </div>
                </div>
            </div>`;
                }).join('');

                lblRow.innerHTML = labels.map((l, i) =>
                    `<div class="flex-1 text-center text-[9px] font-medium ${i === 6 ? 'text-[#0BAB8C] font-bold' : 'text-gray-400'}">${l}</div>`
                ).join('');
            }
        })();
    </script>
    @include('footer.footer')
