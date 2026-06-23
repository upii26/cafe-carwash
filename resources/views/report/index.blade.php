@include('header.head')

<body class="bg-[#F2F2F0] h-screen overflow-hidden">
    @include('header.sidebar')
    <div id="panelOverlay" onclick="closePanel()"></div>
    <div id="appWrapper" class="flex flex-col h-screen">
        @include('header.navbar')

        <div class="main-layout flex-1 overflow-y-auto p-4" style="height:calc(100vh - 56px)">

            <!-- Header -->
            <div class="flex items-center justify-between mb-4">
                <h2 class="font-bold text-gray-900 text-lg">Laporan Penjualan</h2>
            </div>

            <!-- Tabs -->
            <div class="flex gap-2 mb-4">
                <a href="{{ url('/reports') }}?type=food&from={{ $from }}&to={{ $to }}"
                    data-tab="food"
                    class="report-tab-btn {{ $type === 'food' ? 'tab-active' : 'bg-white text-gray-500' }} px-4 py-2 rounded-xl text-sm font-semibold">
                    🍽️ Makanan &amp; Minuman
                </a>
                <a href="{{ url('/reports') }}?type=carwash&from={{ $from }}&to={{ $to }}"
                    data-tab="carwash"
                    class="report-tab-btn {{ $type === 'carwash' ? 'tab-active' : 'bg-white text-gray-500' }} px-4 py-2 rounded-xl text-sm font-semibold">
                    🚗 Carwash
                </a>
            </div>

            <!-- Filter -->
            <form method="GET" action="{{ url('/reports') }}"
                class="bg-white rounded-2xl p-4 mb-4 flex flex-wrap items-end gap-3">

                <input type="hidden" name="type" value="{{ $type }}">

                <div>
                    <label class="text-xs text-gray-400 font-medium mb-1 block">
                        Dari Tanggal
                    </label>
                    <input type="date" name="from" value="{{ $from }}"
                        class="text-sm border border-gray-200 rounded-xl px-3 py-2">
                </div>

                <div>
                    <label class="text-xs text-gray-400 font-medium mb-1 block">
                        Sampai Tanggal
                    </label>
                    <input type="date" name="to" value="{{ $to }}"
                        class="text-sm border border-gray-200 rounded-xl px-3 py-2">
                </div>

                <button type="submit" class="px-4 py-2 bg-[#0BAB8C] text-white rounded-xl text-sm font-semibold">
                    Terapkan
                </button>

                <a href="{{ url('/reports') }}?type={{ $type }}"
                    class="px-4 py-2 bg-gray-100 text-gray-600 rounded-xl text-sm font-semibold">
                    Reset
                </a>

            </form>

            <!-- Summary -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 mb-4">
                <div class="bg-white rounded-2xl p-4">
                    <div class="text-xs text-gray-400 font-medium mb-1">Total Transaksi</div>
                    <div class="text-xl font-bold text-gray-900">
                        {{ $totalTransaction }}
                    </div>
                </div>
                <div class="bg-white rounded-2xl p-4 sm:col-span-2">
                    <div class="text-xs text-gray-400 font-medium mb-1">Total Penjualan</div>
                    <div class="text-xl font-bold text-[#0BAB8C]">
                        Rp {{ number_format($totalSales, 0, ',', '.') }}
                    </div>
                </div>
            </div>

            <!-- Chart: Makanan & Minuman -->
            <div id="chartFoodWrapper" class="bg-white rounded-2xl p-4 mb-4 {{ $type !== 'food' ? 'hidden' : '' }}">
                <div class="flex items-center justify-between mb-3">
                    <span class="text-sm font-bold text-gray-900">Penjualan Makanan &amp; Minuman per Bulan</span>
                    <span class="flex items-center gap-1.5 text-xs text-gray-500">
                        <span class="w-2.5 h-2.5 rounded-sm bg-[#0BAB8C]"></span> Total / bulan
                    </span>
                </div>
                <div style="position: relative; width: 100%; height: 260px;">
                    <canvas id="chartFood"></canvas>
                </div>
            </div>

            <!-- Chart: Carwash -->
            <div id="chartCarwashWrapper"
                class="bg-white rounded-2xl p-4 mb-4 {{ $type !== 'carwash' ? 'hidden' : '' }}">
                <div class="flex items-center justify-between mb-3">
                    <span class="text-sm font-bold text-gray-900">Penjualan Carwash per Bulan</span>
                    <span class="flex items-center gap-1.5 text-xs text-gray-500">
                        <span class="w-2.5 h-2.5 rounded-sm bg-[#D85A30]"></span> Total / bulan
                    </span>
                </div>
                <div style="position: relative; width: 100%; height: 260px;">
                    <canvas id="chartCarwash"></canvas>
                </div>
            </div>

            <!-- Search -->
            <div class="mb-3 flex justify-end">
                <div class="relative w-full max-w-xs">

                    <svg class="w-4 h-4 text-gray-300 absolute left-3 top-1/2 -translate-y-1/2" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z" />
                    </svg>

                    <input type="text" id="searchOrder" placeholder="Cari no order..." oninput="filterTable()"
                        class="w-full text-sm border border-gray-200 rounded-xl pl-9 pr-3 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#0BAB8C]/30 focus:border-[#0BAB8C] transition-all">

                </div>
            </div>

            <!-- Table -->
            <div class="bg-white rounded-2xl overflow-hidden">
                <div class="overflow-x-auto">
                    <table id="reportTable" class="w-full text-sm">
                        <thead>
                            <tr class="bg-gray-50 text-gray-400 text-xs font-semibold">
                                <th class="text-left px-4 py-3 whitespace-nowrap">Tanggal</th>
                                <th class="text-left px-4 py-3 whitespace-nowrap">Order</th>
                                <th class="text-left px-4 py-3 whitespace-nowrap">Customer</th>
                                <th class="text-center px-4 py-3 whitespace-nowrap">Meja</th>
                                <th class="text-left px-4 py-3 whitespace-nowrap">Pembayaran</th>
                                <th class="text-right px-4 py-3 whitespace-nowrap">Total</th>
                                <th class="text-center px-4 py-3 whitespace-nowrap">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="reportTableBody"></tbody>
                    </table>
                    <div class="flex items-center justify-between px-4 py-3 border-t border-gray-100 flex-wrap gap-2">
                        <div class="flex items-center gap-2">
                            <span class="text-xs text-gray-400">Tampilkan</span>
                            <select id="perPageSelect" onchange="changePerPage()"
                                class="text-xs border border-gray-200 rounded-lg px-2 py-1 bg-white text-gray-600 focus:outline-none focus:ring-2 focus:ring-[#0BAB8C]/30 focus:border-[#0BAB8C] transition-colors">
                                <option value="10">10</option>
                                <option value="30">30</option>
                                <option value="50">50</option>
                            </select>
                            <span class="text-xs text-gray-400" id="paginationInfo"></span>
                        </div>
                        <div class="flex items-center gap-1" id="paginationBtns"></div>
                    </div>
                </div>
                <div id="searchEmptyState" class="text-center text-gray-300 py-10 text-sm hidden">
                    Order tidak ditemukan 🔍
                </div>
            </div>

        </div>
    </div>

    <style>
        .report-tab-btn.tab-active {
            background-color: #0BAB8C;
            color: #fff;
        }
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.js"></script>

    <script>
        // ════════════════════════════════════════
        // DATA UNTUK PRINT STRUK (sesuai tab/filter aktif)
        // ════════════════════════════════════════
        const ordersData = @json($ordersJs);

        // ════════════════════════════════════════
        // DATA CHART PER BULAN, MASING-MASING KATEGORI
        // format: [{ month: 'Jan', total: 0 }, ...]
        // ════════════════════════════════════════
        const monthlyFoodData = @json($chartFood);
        const monthlyCarwashData = @json($chartCarwash);

        let chartFood, chartCarwash;

        let filteredOrders = [...ordersData];
        let currentPage = 1;
        let perPage = 10;

        const monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        function formatTanggal(dateStr) {
            const d = new Date(dateStr);
            return `${String(d.getDate()).padStart(2,'0')} ${monthNames[d.getMonth()]} ${d.getFullYear()}`;
        }

        function formatRp(n) {
            return 'Rp ' + Number(n).toLocaleString('id-ID');
        }

        function filterTable() {
            const keyword = document.getElementById('searchOrder').value.trim().toLowerCase();
            filteredOrders = ordersData.filter(o =>
                (o.order_code || '').toLowerCase().includes(keyword)
            );
            currentPage = 1;
            renderTable();
        }

        function changePerPage() {
            perPage = parseInt(document.getElementById('perPageSelect').value);
            currentPage = 1;
            renderTable();
        }

        function renderTable() {
            const tbody = document.getElementById('reportTableBody');
            const total = filteredOrders.length;
            const start = (currentPage - 1) * perPage;
            const slice = filteredOrders.slice(start, start + perPage);

            tbody.innerHTML = '';

            if (slice.length === 0) {
                tbody.innerHTML = `<tr><td colspan="7" class="text-center py-10 text-gray-300">
            ${ordersData.length === 0 ? 'Tidak ada transaksi 📭' : 'Order tidak ditemukan 🔍'}
        </td></tr>`;
            } else {
                slice.forEach(o => {
                    const tr = document.createElement('tr');
                    tr.className = 'border-t border-gray-100';
                    tr.innerHTML = `
                <td class="px-4 py-3 whitespace-nowrap text-gray-600">
                    ${formatTanggal(o.date)}
                    <br>
                    <span class="text-xs text-gray-400">${o.time || ''}</span>
                </td>
                <td class="px-4 py-3 font-semibold text-gray-800">${o.order_code}</td>
                <td class="px-4 py-3 text-gray-700">${o.customer}</td>
                <td class="px-4 py-3 text-center text-gray-700">${o.table}</td>
                <td class="px-4 py-3 text-gray-700">${o.payment}</td>
                <td class="px-4 py-3 text-right font-bold text-[#0BAB8C]">${formatRp(o.total)}</td>
                <td class="px-4 py-3 text-center">
                    <button onclick="printReceipt(${o.id})"
                        class="px-3 py-1.5 bg-gray-50 hover:bg-gray-100 rounded-lg text-xs font-semibold text-gray-700">
                        🖨 Print
                    </button>
                </td>
            `;
                    tbody.appendChild(tr);
                });
            }

            document.getElementById('paginationInfo').textContent =
                total === 0 ? '' : `Menampilkan ${start + 1}–${Math.min(start + perPage, total)} dari ${total} data`;

            const container = document.getElementById('paginationBtns');
            container.innerHTML = '';
            const totalPages = Math.ceil(total / perPage);
            if (totalPages <= 1) return;

            const mkBtn = (label, page, disabled, active) => {
                const b = document.createElement('button');
                b.innerHTML = label;
                b.disabled = disabled;
                b.className =
                `px-3 py-1.5 rounded-lg text-xs font-medium border transition-colors
            ${active ? 'bg-[#0BAB8C] text-white border-[#0BAB8C]' : ''}
            ${disabled ? 'text-gray-300 border-gray-100 cursor-default' : ''}
            ${!active && !disabled ? 'text-gray-500 border-gray-200 hover:border-[#0BAB8C] hover:text-[#0BAB8C]' : ''}`;
                if (!disabled && !active) b.onclick = () => {
                    currentPage = page;
                    renderTable();
                };
                return b;
            };

            container.appendChild(mkBtn('&#8249;', currentPage - 1, currentPage === 1, false));
            for (let p = 1; p <= totalPages; p++) container.appendChild(mkBtn(p, p, false, p === currentPage));
            container.appendChild(mkBtn('&#8250;', currentPage + 1, currentPage === totalPages, false));
        }

        function filterTable() {
            const keyword = document.getElementById('searchOrder').value.trim().toLowerCase();
            const rows = document.querySelectorAll('#reportTableBody .order-row');
            let visibleCount = 0;

            rows.forEach(row => {
                const noOrder = row.dataset.order || '';
                const match = noOrder.includes(keyword);
                row.style.display = match ? '' : 'none';
                if (match) visibleCount++;
            });

            const searchEmptyState = document.getElementById('searchEmptyState');
            if (rows.length > 0) {
                searchEmptyState.classList.toggle('hidden', visibleCount > 0 || keyword === '');
            }
        }

        // ════════════════════════════════════════
        // CHARTS
        // ════════════════════════════════════════
        function renderCharts() {
            chartFood = new Chart(document.getElementById('chartFood'), {
                type: 'bar',
                data: {
                    labels: monthlyFoodData.map(d => d.month),
                    datasets: [{
                        label: 'Makanan & Minuman',
                        data: monthlyFoodData.map(d => d.total),
                        backgroundColor: '#0BAB8C',
                        borderRadius: 4
                    }]
                },
                options: chartOptions()
            });

            chartCarwash = new Chart(document.getElementById('chartCarwash'), {
                type: 'bar',
                data: {
                    labels: monthlyCarwashData.map(d => d.month),
                    datasets: [{
                        label: 'Carwash',
                        data: monthlyCarwashData.map(d => d.total),
                        backgroundColor: '#D85A30',
                        borderRadius: 4
                    }]
                },
                options: chartOptions()
            });
        }

        function chartOptions() {
            return {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: (ctx) => ctx.dataset.label + ': Rp ' + ctx.parsed.y.toLocaleString('id-ID')
                        }
                    }
                },
                scales: {
                    x: {
                        ticks: {
                            autoSkip: false
                        }
                    },
                    y: {
                        ticks: {
                            callback: (v) => 'Rp ' + (v / 1000000).toLocaleString('id-ID') + 'jt'
                        }
                    }
                }
            };
        }



        // ════════════════════════════════════════
        // PRINT STRUK
        // ════════════════════════════════════════
        function printReceipt(orderId) {
            const o = ordersData.find(x => x.id === orderId);
            if (!o) return;

            let itemsHtml = '';
            let subtotal = 0;

            o.items.forEach(item => {
                const lineTotal = item.price * item.qty;
                subtotal += lineTotal;
                itemsHtml += `
                    <tr>
                        <td colspan="2" style="padding-top:6px;font-weight:bold;">${item.name}</td>
                    </tr>
                    <tr>
                        <td>${item.qty} x Rp ${Number(item.price).toLocaleString('id-ID')}</td>
                        <td style="text-align:right">Rp ${lineTotal.toLocaleString('id-ID')}</td>
                    </tr>
                `;
            });

            const dateObj = new Date(o.date + 'T' + (o.time || '00:00'));
            const dateStr = dateObj.toLocaleDateString('id-ID', {
                day: '2-digit',
                month: 'long',
                year: 'numeric'
            });
            const timeStr = o.time || '';

            const win = window.open('', '', 'width=350,height=600');

            win.document.write(`
                <html>
                <head>
                    <title>Print Struk</title>
                    <style>
                        * { box-sizing: border-box; }
                        body {
                            font-family: 'Courier New', monospace;
                            padding: 16px;
                            font-size: 12px;
                            color: #222;
                        }
                        .center { text-align: center; }
                        h2 { margin: 0; font-size: 16px; letter-spacing: 1px; }
                        .sub { font-size: 10px; color: #777; margin-top: 2px; }
                        hr { border: none; border-top: 1px dashed #999; margin: 10px 0; }
                        table { width: 100%; border-collapse: collapse; }
                        td { padding: 2px 0; vertical-align: top; }
                        .info td { font-size: 11px; color: #555; }
                        .total td { font-weight: bold; font-size: 14px; padding-top: 6px; }
                        .footer { margin-top: 14px; font-size: 11px; }
                    </style>
                </head>
                <body>
                    <div class="center">
                        <h2>GG CAFE & CARWASH</h2>
                        <div class="sub">Jl. Contoh Alamat No. 123</div>
                        <div class="sub">${dateStr} • ${timeStr}</div>
                    </div>

                    <hr>

                    <table class="info">
                        <tr>
                            <td>Order</td>
                            <td style="text-align:right">#${o.order_code}</td>
                        </tr>
                        <tr>
                            <td>Customer</td>
                            <td style="text-align:right">${o.customer}</td>
                        </tr>
                        <tr>
                            <td>No. Meja</td>
                            <td style="text-align:right">${o.table}</td>
                        </tr>
                        <tr>
                            <td>Pembayaran</td>
                            <td style="text-align:right">${o.payment}</td>
                        </tr>
                    </table>

                    <hr>

                    <table>
                        ${itemsHtml}
                    </table>

                    <hr>

                    <table>
                        <tr>
                            <td>Subtotal</td>
                            <td style="text-align:right">Rp ${subtotal.toLocaleString('id-ID')}</td>
                        </tr>
                        <tr class="total">
                            <td>TOTAL</td>
                            <td style="text-align:right">Rp ${Number(o.total).toLocaleString('id-ID')}</td>
                        </tr>
                    </table>

                    <div class="footer center">
                        Terima kasih atas kunjungan Anda 🙏<br>
                        Sampai jumpa kembali!
                    </div>
                </body>
                </html>
            `);

            win.document.close();
            win.print();
        }



        // ════════════════════════════════════════
        // INIT
        // ════════════════════════════════════════
        renderCharts();
        renderTable();
    </script>


    @include('footer.footer')
