@include('header.head')
<style>
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

    .order-row {
        transition: background .15s;
    }

    .order-row:hover {
        background: #f7fdfb;
    }

    .pulse-dot {
        animation: pulse 2s ease-in-out infinite;
    }

    @keyframes pulse {

        0%,
        100% {
            opacity: 1;
            transform: scale(1)
        }

        50% {
            opacity: .5;
            transform: scale(1.35)
        }
    }

    .fade-up {
        animation: fadeUp .45s ease both;
    }

    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(16px)
        }

        to {
            opacity: 1;
            transform: translateY(0)
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

    .chart-bar {
        transition: height .6s cubic-bezier(.4, 0, .2, 1);
        border-radius: 6px 6px 0 0;
    }

    .donut {
        transform: rotate(-90deg);
    }
</style>

<body class="bg-[#F2F2F0] min-h-screen overflow-x-hidden">

    @include('header.sidebar')
    {{-- <div id="sidebarOverlay" onclick="closeSidebar()"></div> --}}

    <div id="appWrapper" class="flex flex-col min-h-screen overflow-y-auto h-screen">
        @include('header.navbar')

        <div class="main-layout flex-1 overflow-y-auto p-4 md:p-6 pb-12">

            {{-- Greeting --}}
            <div class="flex items-center justify-between mb-5 fade-up">
                <div>
                    <h1 class="text-lg md:text-xl font-bold text-[#000000] leading-tight">Dashboard Carwash 🚗</h1>
                    <p class="text-xs text-black-400 mt-0.5" id="dateLabel"></p>
                </div>
                <div class="flex items-center gap-2">
                    <div
                        class="hidden sm:flex items-center gap-1.5
                        bg-[#D4AF37]/15 backdrop-blur-xl border border-[#D4AF37]/30
                        rounded-xl px-3 py-1.5 text-xs font-medium text-[#000]
                        shadow-[0_8px_30px_rgba(212,175,55,0.15)]">
                        <span class="w-2 h-2 rounded-full bg-green-400 pulse-dot"></span>
                        Carwash Buka
                    </div>
                    <button onclick="window.location.reload()" title="Refresh"
                        class="w-9 h-9 bg-[#D4AF37]/15 backdrop-blur-xl border border-[#D4AF37]/30
                        rounded-xl flex items-center justify-center hover:bg-[#000]/25 transition-all duration-200
                        shadow-[0_8px_30px_rgba(212,175,55,0.15)]">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                    </button>
                </div>
            </div>

            {{-- STAT CARDS (3 kolom karena tidak ada status) --}}
            <div class="grid grid-cols-2 gap-3 md:gap-4 mb-5">

                {{-- Pendapatan Hari Ini --}}
                <div
                    class="stat-card bg-[#D4AF37]/15 backdrop-blur-xl border border-[#D4AF37]/30
                    rounded-2xl p-4 shadow-[0_8px_30px_rgba(212,175,55,0.15)] fade-up delay-1">
                    <div class="flex items-start justify-between mb-3">
                        <div
                            class="stat-icon w-10 h-10 rounded-xl bg-[#D4AF37]/20 flex items-center justify-center text-xl">
                            💰</div>
                        <span
                            class="text-[10px] font-semibold text-[#6B4E16] bg-[#D4AF37]/20 px-2 py-0.5 rounded-full border border-[#D4AF37]/30">Hari
                            ini</span>
                    </div>
                    <div class="text-lg md:text-xl font-bold text-[#000000]">
                        Rp {{ number_format($pendapatanHariIni, 0, ',', '.') }}
                    </div>
                    <div class="text-xs text-[#000000] mt-0.5">Pendapatan Hari Ini</div>
                    <div class="mt-3 h-1.5 bg-white rounded-full overflow-hidden">
                        @php $pctPendapatan = min(100, ($pendapatanHariIni / 3000000) * 100) @endphp
                        <div class="h-full bg-gradient-to-r from-[#D4AF37] to-[#B8860B] rounded-full"
                            style="width:{{ $pctPendapatan }}%"></div>
                    </div>
                    <div class="text-[10px] text-[#000] mt-1">Target: Rp 3.000.000</div>
                </div>

                {{-- Total Kendaraan Hari Ini --}}
                <div
                    class="stat-card bg-[#D4AF37]/15 backdrop-blur-xl border border-[#D4AF37]/30
                    rounded-2xl p-4 shadow-[0_8px_30px_rgba(212,175,55,0.15)] fade-up delay-2">
                    <div class="flex items-start justify-between mb-3">
                        <div
                            class="stat-icon w-10 h-10 rounded-xl bg-blue-500/20 flex items-center justify-center text-xl">
                            🚙</div>
                        <span
                            class="text-[10px] font-semibold text-blue-700 bg-blue-500/15 px-2 py-0.5 rounded-full border border-blue-500/20">Hari
                            ini</span>
                    </div>
                    <div class="text-xl md:text-2xl font-bold text-[#000]">{{ $tipeLayanan->sum('total') }}</div>
                    <div class="text-xs text-[#000] mt-0.5">Total Kendaraan</div>
                    <div class="mt-3 h-1.5 bg-white rounded-full overflow-hidden">
                        <div class="progress-fill"
                            style="width:{{ min(100, ($tipeLayanan->sum('total') / 50) * 100) }}%; background:#3b82f6"></div>
                    </div>
                    <div class="text-[10px] text-[#000] mt-1">Target hari ini: 40</div>
                </div>

                {{-- Total Layanan (qty item carwash hari ini) --}}
                {{-- <div
                    class="stat-card bg-[#D4AF37]/15 backdrop-blur-xl border border-[#D4AF37]/30
                    rounded-2xl p-4 shadow-[0_8px_30px_rgba(212,175,55,0.15)] fade-up delay-3 col-span-2 lg:col-span-1">
                    <div class="flex items-start justify-between mb-3">
                        <div
                            class="stat-icon w-10 h-10 rounded-xl bg-green-50 flex items-center justify-center text-xl">
                            🧴</div>
                        <span class="text-[10px] font-semibold text-green-600 bg-green-50 px-2 py-0.5 rounded-full">Hari
                            ini</span>
                    </div>
                    <div class="text-xl md:text-2xl font-bold text-black-900">{{ $tipeLayanan->sum('total') }}</div>
                    <div class="text-xs text-black-400 mt-0.5">Total Item Layanan</div>
                    <div class="mt-3 h-1.5 bg-white rounded-full overflow-hidden">
                        <div class="progress-fill"
                            style="width:{{ min(100, ($tipeLayanan->sum('total') / 50) * 100) }}%; background:#22c55e">
                        </div>
                    </div>
                    <div class="text-[10px] text-black-400 mt-1">Target hari ini: 50</div>
                </div> --}}
            </div>

            {{-- ROW 2: Chart + Donut --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-3 md:gap-4 mb-5">

                {{-- Bar Chart --}}
                <div
                    class="lg:col-span-2 bg-[#D4AF37]/15 backdrop-blur-xl border border-[#D4AF37]/30
                    rounded-2xl p-4 md:p-5 shadow-[0_8px_30px_rgba(212,175,55,0.15)] fade-up delay-4">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <h3 class="font-bold text-black-900 text-sm">Kendaraan Masuk (7 Hari)</h3>
                            <p class="text-xs text-black-400 mt-0.5">7 hari terakhir</p>
                        </div>
                    </div>
                    <div class="flex items-end gap-2 h-32 md:h-40 bg-white/30 rounded-xl p-2" id="barChart"></div>
                    <div class="flex justify-between mt-2" id="barLabels"></div>
                </div>

                {{-- Donut: Tipe Layanan --}}
                <div
                    class="bg-[#D4AF37]/15 backdrop-blur-xl border border-[#D4AF37]/30
                    rounded-2xl p-4 md:p-5 shadow-[0_8px_30px_rgba(212,175,55,0.15)] fade-up delay-5">
                    <h3 class="font-bold text-black-900 text-sm mb-1">Tipe Layanan</h3>
                    <p class="text-xs text-black-400 mb-4">Hari ini</p>

                    @php
                        $donutColors = ['#0BAB8C', '#3b82f6', '#f97316', '#a855f7', '#ec4899'];
                        $offset = 0;
                    @endphp

                    <div class="flex items-center justify-center mb-4">
                        <div class="relative w-28 h-28">
                            <svg viewBox="0 0 36 36" class="w-full h-full donut">
                                <circle cx="18" cy="18" r="14" fill="none"
                                    stroke="rgba(212,175,55,0.25)" stroke-width="4" />
                                @foreach ($tipeLayanan as $idx => $item)
                                    @php
                                        $pct = ($item->total / $totalLayanan) * 100;
                                        $dash = round($pct, 1);
                                        $gap = 100 - $dash;
                                        $color = $donutColors[$idx % count($donutColors)];
                                    @endphp
                                    <circle cx="18" cy="18" r="14" fill="none"
                                        stroke="{{ $color }}" stroke-width="4"
                                        stroke-dasharray="{{ $dash }} {{ $gap }}"
                                        stroke-dashoffset="-{{ $offset }}" stroke-linecap="round" />
                                    @php $offset += $dash @endphp
                                @endforeach
                            </svg>
                            <div class="absolute inset-0 flex flex-col items-center justify-center">
                                <span class="text-lg font-bold text-black-900">{{ $totalHariIni }}</span>
                                <span class="text-[10px] text-black-400">kendaraan</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col gap-2">
                        @forelse($tipeLayanan as $idx => $item)
                            @php
                                $pctItem = round(($item->total / $totalLayanan) * 100);
                                $color = $donutColors[$idx % count($donutColors)];
                            @endphp
                            <div class="flex items-center justify-between text-xs">
                                <div class="flex items-center gap-1.5">
                                    <span class="w-2.5 h-2.5 rounded-full flex-shrink-0"
                                        style="background:{{ $color }}"></span>
                                    <span class="text-black-600">{{ $item->name }}</span>
                                </div>
                                <span class="font-bold text-black-800">{{ $item->total }}
                                    <span class="text-black-400 font-normal">({{ $pctItem }}%)</span>
                                </span>
                            </div>
                        @empty
                            <div class="text-xs text-center text-black-400 py-4">Belum ada data hari ini</div>
                        @endforelse
                    </div>
                </div>
            </div>

            {{-- ROW 3: Tabel Antrian + Layanan Terlaris --}}
            <div class="grid grid-cols-1 gap-6">

                {{-- Tabel Antrian --}}
                <div class="bg-[#D4AF37]/15 rounded-2xl overflow-hidden fade-up delay-5">
                    <div class="flex items-center justify-between px-4 md:px-5 pt-4 pb-3 border-b border-black/20">
                        <h3 class="font-bold text-black-900 text-sm">Transaksi Carwash Terkini</h3>
                        <span class="text-[10px] text-black-400">5 terbaru</span>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-xs">
                            <thead>
                                <tr class="bg-black-50">
                                    <th class="text-left px-4 py-2.5 text-black-400 font-semibold">No. Order</th>
                                    <th
                                        class="text-left px-3 py-2.5 text-black-400 font-semibold hidden sm:table-cell">
                                        Layanan</th>
                                    <th class="text-left px-3 py-2.5 text-black-400 font-semibold">Total</th>
                                    <th class="text-left px-3 py-2.5 text-black-400 font-semibold">Bayar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($antrianTerkini as $row)
                                    <tr class="order-row border-t border-black-50">
                                        <td class="px-4 py-3 font-semibold text-black-800">{{ $row->no_order }}</td>
                                        <td
                                            class="px-3 py-3 text-black-500 hidden sm:table-cell truncate max-w-[120px]">
                                            {{ $row->layanan }}</td>
                                        <td class="px-3 py-3 font-bold text-black-800">Rp
                                            {{ number_format($row->total, 0, ',', '.') }}</td>
                                        <td class="px-3 py-3">
                                            <span
                                                class="px-2 py-0.5 rounded-md font-semibold text-[10px]
                                                {{ $row->payment_method === 'Cash' ? 'bg-[#D1FAE5] text-[#065F46]' : 'bg-blue-50 text-blue-600' }}">
                                                {{ $row->payment_method ?? '-' }}
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-4 py-8 text-center text-black-400 text-xs">
                                            Belum ada transaksi carwash
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Layanan Terlaris --}}
                {{-- <div class="bg-[#D4AF37]/15 rounded-2xl p-4 md:p-5 fade-up delay-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-bold text-black-900 text-sm">Layanan Terlaris</h3>
                        <span class="text-[10px] text-black-400">Hari ini</span>
                    </div>

                    @php
                        $barColors = ['#0BAB8C', '#3b82f6', '#f97316', '#a855f7', '#ec4899'];
                        $icons = ['🚿', '✨', '💎', '🔧', '🧴'];
                    @endphp

                    <div class="flex flex-col gap-3">
                        @forelse($layananTerlaris as $idx => $item)
                            @php
                                $pctBar = round(($item->total_terjual / $maxTerjual) * 100);
                                $col = $barColors[$idx % count($barColors)];
                                $ico = $icons[$idx % count($icons)];
                            @endphp
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-xl flex items-center justify-center text-xl flex-shrink-0"
                                    style="background:{{ $col }}22">{{ $ico }}</div>
                                <div class="flex-1 min-w-0">
                                    <div class="text-xs font-semibold text-black-800 truncate">{{ $item->name }}
                                    </div>
                                    <div class="progress-bar mt-1">
                                        <div class="progress-fill"
                                            style="width:{{ $pctBar }}%; background:{{ $col }}"></div>
                                    </div>
                                </div>
                                <span
                                    class="text-xs font-bold text-black-700 flex-shrink-0">{{ $item->total_terjual }}x</span>
                            </div>
                        @empty
                            <div class="text-xs text-center text-black-400 py-6">Belum ada data hari ini</div>
                        @endforelse
                    </div>

                    <div class="mt-4 pt-4 border-t border-black/20 grid grid-cols-2 gap-3">
                        <div class="bg-[#D4AF37]/15 border border-[#D4AF37]/30 rounded-xl p-3 text-center">
                            <div class="text-sm font-bold text-[#00000]">Rp
                                {{ number_format($pendapatanHariIni, 0, ',', '.') }}</div>
                            <div class="text-[10px] text-black-500 mt-0.5">Pendapatan</div>
                        </div>
                        <div class="bg-black-50 rounded-xl p-3 text-center">
                            <div class="text-sm font-bold text-black-700">{{ $totalHariIni }} unit</div>
                            <div class="text-[10px] text-black-500 mt-0.5">Total Kendaraan</div>
                        </div>
                    </div>
                </div> --}}

            </div>

        </div>
    </div>

    @include('header.navmobile')

    <script>
        (function() {
            const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            const months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
            const now = new Date();
            const el = document.getElementById('dateLabel');
            if (el) el.textContent = days[now.getDay()] + ', ' + now.getDate() + ' ' + months[now.getMonth()] + ' ' +
                now.getFullYear();

            const weeklyData = @json($weeklyData);
            const colors = ['#3B82F6', '#10B981', '#F59E0B', '#8B5CF6', '#EF4444', '#06B6D4', '#0BAB8C'];
            const values = weeklyData.map(d => d.count);
            const labels = weeklyData.map(d => d.label);
            const max = Math.max(...values, 1);

            const chart = document.getElementById('barChart');
            const lblRow = document.getElementById('barLabels');

            if (chart && lblRow) {
                chart.innerHTML = values.map((v, i) => {
                    const pct = ((v / max) * 100).toFixed(1);
                    const isToday = i === values.length - 1;
                    return `
            <div class="flex-1 flex flex-col items-center gap-1 cursor-pointer h-full">
                <div class="text-[10px] font-bold text-[#5C4520] mb-1">${v}</div>
                <div class="w-full h-full flex items-end">
                    <div class="chart-bar w-full"
                        style="height:${pct}%;background:${isToday ? '#D4AF37' : colors[i]};box-shadow:0 4px 10px rgba(0,0,0,.12)"
                        title="${v} kendaraan">
                    </div>
                </div>
            </div>`;
                }).join('');

                lblRow.innerHTML = labels.map((l, i) =>
                    `<div class="flex-1 text-center text-[9px] font-medium ${i === labels.length - 1 ? 'text-[#000] font-bold' : 'text-black-400'}">${l}</div>`
                ).join('');
            }
        })();
    </script>

    @include('footer.footer')
