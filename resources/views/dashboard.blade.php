@include('header.head')
<style>
    .stat-card { transition: transform .2s, box-shadow .2s; }
    .stat-card:hover { transform: translateY(-3px); box-shadow: 0 8px 24px rgba(0,0,0,.09); }
    .stat-icon { transition: transform .25s; }
    .stat-card:hover .stat-icon { transform: scale(1.12) rotate(-4deg); }
    .progress-bar { height: 6px; border-radius: 99px; background: #e9f0ee; overflow: hidden; }
    .progress-fill { height: 100%; border-radius: 99px; background: #0BAB8C; animation: growBar .8s ease both; }
    @keyframes growBar { from { width: 0 !important; } }
    .order-row { transition: background .15s; }
    .order-row:hover { background: #f7fdfb; }
    .pulse-dot { animation: pulse 2s ease-in-out infinite; }
    @keyframes pulse { 0%,100% { opacity:1; transform:scale(1); } 50% { opacity:.5; transform:scale(1.35); } }
    .fade-up { animation: fadeUp .45s ease both; }
    @keyframes fadeUp { from { opacity:0; transform:translateY(16px); } to { opacity:1; transform:translateY(0); } }
    .delay-1{animation-delay:.05s} .delay-2{animation-delay:.10s} .delay-3{animation-delay:.15s}
    .delay-4{animation-delay:.20s} .delay-5{animation-delay:.25s} .delay-6{animation-delay:.30s}
    .chart-bar { transition: height .6s cubic-bezier(.4,0,.2,1); border-radius: 6px 6px 0 0; }
    .donut { transform: rotate(-90deg); }
</style>

<body class="bg-[#F2F2F0] min-h-screen overflow-x-hidden">

@include('header.sidebar')
{{-- <div id="sidebarOverlay" onclick="closeSidebar()"></div> --}}
<div id="appWrapper" class="flex flex-col min-h-screen overflow-y-auto h-screen">
    @include('header.navbar')

    <div class="main-layout flex-1 overflow-y-auto p-4 md:p-6 pb-12">

            {{-- ── Greeting ── --}}
            <div class="flex items-center justify-between mb-5 fade-up">
                <div>
                    <h1 class="text-lg md:text-xl font-bold text-[#000000] leading-tight">
                        Dashboard Cafe ☕
                    </h1>
                    <p class="text-xs text-black-400 mt-0.5" id="dateLabel"></p>
                </div>
                <div class="flex items-center gap-2">
                    <div class="hidden sm:flex items-center gap-1.5 bg-[#D4AF37]/15 backdrop-blur-xl border border-[#D4AF37]/30 rounded-xl px-3 py-1.5 text-xs font-medium text-[#000] shadow-[0_8px_30px_rgba(212,175,55,0.15)]">
                        <span class="w-2 h-2 rounded-full bg-green-400 pulse-dot"></span>
                        Restoran Buka
                    </div>
                    <button onclick="window.location.reload()"
                        class="w-9 h-9 bg-[#D4AF37]/15 backdrop-blur-xl border border-[#D4AF37]/30 rounded-xl flex items-center justify-center text-[#000] hover:bg-[#000]/25 transition-all duration-200 shadow-[0_8px_30px_rgba(212,175,55,0.15)]">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                        </svg>
                    </button>
                </div>
            </div>

            {{-- ── STAT CARDS ── --}}
            <div class="grid grid-cols-2 gap-3 md:gap-4 mb-5">

                {{-- Total Revenue --}}
                <div class="stat-card bg-[#D4AF37]/15 backdrop-blur-xl border border-[#D4AF37]/30 rounded-2xl p-4 shadow-[0_8px_30px_rgba(212,175,55,0.15)] fade-up delay-1">
                    <div class="flex items-start justify-between mb-3">
                        <div class="stat-icon w-10 h-10 rounded-xl bg-[#D4AF37]/20 flex items-center justify-center text-xl">💰</div>
                        <span class="text-[10px] font-semibold text-[#6B4E16] bg-[#D4AF37]/20 px-2 py-0.5 rounded-full border border-[#D4AF37]/30">Hari ini</span>
                    </div>
                    <div class="text-xl md:text-2xl font-bold text-[#000000]" id="c1">
                        Rp {{ number_format($totalRevenue, 0, ',', '.') }}
                    </div>
                    <div class="text-xs text-[#000000] mt-0.5">Pendapatan Hari Ini</div>
                    <div class="mt-3 h-1.5 bg-white rounded-full overflow-hidden">
                        <div class="h-full bg-gradient-to-r from-[#D4AF37] to-[#B8860B]" style="width: {{ $pctPendapatan }}%"></div>
                    </div>
                    <div class="text-[10px] text-black-500 mt-1">Target: Rp 1.500.000</div>
                </div>

                {{-- Total Pesanan --}}
                <div class="stat-card bg-[#D4AF37]/15 backdrop-blur-xl border border-[#D4AF37]/30 rounded-2xl p-4 shadow-[0_8px_30px_rgba(212,175,55,0.15)] fade-up delay-2">
                    <div class="flex items-start justify-between mb-3">
                        <div class="stat-icon w-10 h-10 rounded-xl bg-blue-500/20 flex items-center justify-center text-xl">📋</div>
                        <span class="text-[10px] font-semibold text-blue-700 bg-blue-500/15 px-2 py-0.5 rounded-full border border-blue-500/20">Hari ini</span>
                    </div>
                    <div class="text-xl md:text-2xl font-bold text-[#3A2A0F]" id="c2">
                        {{ $totalOrders }}
                    </div>
                    <div class="text-xs text-[#000] mt-0.5">Total Pesanan</div>
                    <div class="mt-3 h-1.5 bg-white rounded-full overflow-hidden">
                        <div class="progress-fill" style="width:{{ min(($totalOrders/200)*100, 100) }}%; background:#3b82f6"></div>
                    </div>
                    <div class="text-[10px] text-black-500 mt-1">Target hari ini: 200</div>
                </div>

                {{-- Meja Aktif (dummy, belum ada model Table) --}}
                {{-- <div class="stat-card bg-[#D4AF37]/15 backdrop-blur-xl border border-[#D4AF37]/30 rounded-2xl p-4 shadow-[0_8px_30px_rgba(212,175,55,0.15)] fade-up delay-3">
                    <div class="flex items-start justify-between mb-3">
                        <div class="stat-icon w-10 h-10 rounded-xl bg-orange-50 flex items-center justify-center text-xl">🪑</div>
                        <span class="text-[10px] font-semibold text-orange-500 bg-orange-50 px-2 py-0.5 rounded-full">Live</span>
                    </div>
                    <div class="text-xl md:text-2xl font-bold text-black-900">
                        {{ $totalOrders }} <span class="text-sm font-normal text-black-400">order aktif</span>
                    </div>
                    <div class="text-xs text-black-400 mt-0.5">Meja Aktif</div>
                    <div class="mt-3 h-1.5 bg-white rounded-full overflow-hidden">
                        <div class="progress-fill" style="width:{{ min(($totalOrders/20)*100, 100) }}%; background:#f97316"></div>
                    </div>
                    <div class="text-[10px] text-black-400 mt-1">Berdasarkan order hari ini</div>
                </div> --}}

                {{-- Rata-rata Pesanan --}}
                {{-- <div class="stat-card bg-[#D4AF37]/15 backdrop-blur-xl border border-[#D4AF37]/30 rounded-2xl p-4 shadow-[0_8px_30px_rgba(212,175,55,0.15)] fade-up delay-4">
                    <div class="flex items-start justify-between mb-3">
                        <div class="stat-icon w-10 h-10 rounded-xl bg-purple-50 flex items-center justify-center text-xl">⭐</div>
                        <span class="text-[10px] font-semibold text-purple-500 bg-purple-50 px-2 py-0.5 rounded-full">Avg</span>
                    </div>
                    <div class="text-xl md:text-2xl font-bold text-black-900">
                        Rp {{ number_format($avgOrder, 0, ',', '.') }}
                    </div>
                    <div class="text-xs text-black-400 mt-0.5">Rata-rata Pesanan</div>
                    <div class="mt-3 h-1.5 bg-white rounded-full overflow-hidden">
                        <div class="progress-fill" style="width:64%; background:#a855f7"></div>
                    </div>
                    <div class="text-[10px] text-black-400 mt-1">Per transaksi hari ini</div>
                </div> --}}

            </div>

            {{-- ── ROW 2: Chart + Top Menu ── --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-3 md:gap-4 mb-5">

                {{-- Bar Chart 7 Hari --}}
                <div class="lg:col-span-2 bg-[#D4AF37]/15 backdrop-blur-xl border border-[#D4AF37]/30 rounded-2xl p-4 md:p-5 shadow-[0_8px_30px_rgba(212,175,55,0.15)] fade-up delay-5">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <h3 class="font-bold text-black-900 text-sm">Pendapatan Mingguan</h3>
                            <p class="text-xs text-black-400 mt-0.5">7 hari terakhir · Makanan &amp; Minuman</p>
                        </div>
                    </div>
                    <div class="flex items-end gap-2 h-32 md:h-40 bg-white/30 rounded-xl p-2" id="barChart"></div>
                    <div class="flex justify-between mt-2" id="barLabels"></div>
                </div>

                {{-- Top Menu --}}
                <div class="bg-[#D4AF37]/15 backdrop-blur-xl border border-[#D4AF37]/30 rounded-2xl p-4 md:p-5 shadow-[0_8px_30px_rgba(212,175,55,0.15)] fade-up delay-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-bold text-black-900 text-sm">Menu Terlaris</h3>
                        <span class="text-[10px] text-black-400">Hari ini</span>
                    </div>

                    @if($topMenus->isEmpty())
                        <div class="text-center text-black-300 py-8 text-xs">Belum ada data hari ini 🍽️</div>
                    @else
                        <div class="flex flex-col gap-3">
                            @php
                                $barColors = ['#0BAB8C','#f97316','#3b82f6','#a855f7','#ec4899'];
                            @endphp
                            @foreach($topMenus as $i => $menu)
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-xl bg-black-50 flex items-center justify-center text-lg flex-shrink-0">
                                        🍽️
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="text-xs font-semibold text-black-800 truncate">
                                            {{ $menu->name }}
                                        </div>
                                        <div class="progress-bar mt-1">
                                            <div class="progress-fill"
                                                style="width:{{ round(($menu->total_qty / $maxQty) * 100) }}%; background:{{ $barColors[$i] ?? '#0BAB8C' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <span class="text-xs font-bold text-black-700 flex-shrink-0">
                                        {{ $menu->total_qty }}x
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    {{-- Quick Summary --}}
                    <div class="mt-4 pt-4 border-t border-black/20 grid grid-cols-2 gap-3">
                        <div class="bg-[#D4AF37]/15 border border-[#D4AF37]/30 rounded-xl p-3 text-center">
                            <div class="text-sm font-bold text-[#000000]">
                                Rp {{ number_format($totalRevenue, 0, ',', '.') }}
                            </div>
                            <div class="text-[10px] text-black-500 mt-0.5">Pendapatan</div>
                        </div>
                        <div class="bg-black-50 rounded-xl p-3 text-center">
                            <div class="text-sm font-bold text-black-700">{{ $totalOrders }}</div>
                            <div class="text-[10px] text-black-500 mt-0.5">Total Order</div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- ── ROW 3: Recent Orders ── --}}
            <div class="bg-[#D4AF37]/15 rounded-2xl overflow-hidden fade-up delay-5">
                <div class="flex items-center justify-between px-4 md:px-5 pt-4 pb-3 border-b border-black/20">
                    <h3 class="font-bold text-black-900 text-sm">Pesanan Terkini</h3>
                    <a href="{{ url('/reports?type=food') }}" class="text-xs font-semibold text-[#00000] hover:underline">
                        Lihat semua
                    </a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-xs">
                        <thead>
                            <tr class="bg-black-50">
                                <th class="text-left px-4 md:px-5 py-2.5 text-black-400 font-semibold">Order ID</th>
                                <th class="text-left px-3 py-2.5 text-black-400 font-semibold">Meja</th>
                                <th class="text-left px-3 py-2.5 text-black-400 font-semibold hidden sm:table-cell">Item</th>
                                <th class="text-left px-3 py-2.5 text-black-400 font-semibold">Total</th>
                                <th class="text-left px-3 py-2.5 text-black-400 font-semibold">Bayar</th>
                                <th class="text-left px-3 py-2.5 text-black-400 font-semibold">Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentOrders as $order)
                                <tr class="order-row border-t border-black-50">
                                    <td class="px-4 md:px-5 py-3 font-semibold text-black-800">
                                        #{{ $order['no_order'] }}
                                    </td>
                                    <td class="px-3 py-3 text-black-500">
                                        {{ $order['no_table'] }}
                                    </td>
                                    <td class="px-3 py-3 text-black-500 hidden sm:table-cell">
                                        {{ $order['item_count'] }} item
                                    </td>
                                    <td class="px-3 py-3 font-bold text-[#00000]">
                                        Rp {{ number_format($order['total'], 0, ',', '.') }}
                                    </td>
                                    <td class="px-3 py-3 text-black-500">
                                        {{ $order['payment_method'] }}
                                    </td>
                                    <td class="px-3 py-3 text-black-400">
                                        {{ $order['created_at'] }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-10 text-black-300 text-sm">
                                        Belum ada pesanan hari ini 🍽️
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</div>

@include('header.navmobile')

<script>
    // ── Date label ──
    const days   = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
    const months = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
    const now    = new Date();
    const el     = document.getElementById('dateLabel');
    if (el) el.textContent = days[now.getDay()] + ', ' + now.getDate() + ' ' + months[now.getMonth()] + ' ' + now.getFullYear();

    // ── Bar Chart (data dari backend) ──
    const weeklyChart = @json($weeklyChart);
    const maxVal      = Math.max(...weeklyChart.map(d => d.total), 1);
    const colors      = ['#3B82F6','#10B981','#F59E0B','#8B5CF6','#EF4444','#06B6D4','#D4AF37'];

    const chart   = document.getElementById('barChart');
    const lblRow  = document.getElementById('barLabels');
    const todayStr = new Date().toISOString().slice(0, 10);

    if (chart && lblRow) {
        chart.innerHTML = weeklyChart.map((d, i) => {
            const pct     = maxVal > 0 ? ((d.total / maxVal) * 100).toFixed(1) : 0;
            const isToday = d.date === todayStr;
            const label   = 'Rp ' + Number(d.total).toLocaleString('id-ID');

            return `
                <div class="flex-1 flex flex-col items-center gap-1 group cursor-pointer h-full">
                    <div class="text-[9px] font-bold text-[#5C4520] mb-1 drop-shadow-sm truncate w-full text-center">
                        ${label}
                    </div>
                    <div class="w-full h-full flex items-end">
                        <div class="chart-bar w-full rounded-lg"
                            style="height:${pct}%; background:${isToday ? '#D4AF37' : colors[i]}; box-shadow:0 4px 10px rgba(0,0,0,.12);"
                            title="${label}">
                        </div>
                    </div>
                </div>
            `;
        }).join('');

        lblRow.innerHTML = weeklyChart.map((d, i) =>
            `<div class="flex-1 text-center text-[9px] font-medium ${d.date === todayStr ? 'text-[#000] font-bold' : 'text-black-400'}">${d.label}</div>`
        ).join('');
    }
</script>

@include('footer.footer')