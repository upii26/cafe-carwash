@include('header.head')

<body class="bg-[#F0FBF8] min-h-screen overflow-x-hidden">

    @include('header.sidebar')

    <!-- Overlay sidebar mobile -->
    <div id="sidebarOverlay" onclick="closeSidebar()"></div>

    <div id="appWrapper" class="flex flex-col min-h-screen">

        @include('header.navbar')

        <!-- MAIN LAYOUT -->
        <div class="main-layout flex flex-1 overflow-hidden">
            {{-- Masukan konten nya di sini --}}
            <div class="flex-1 p-6 overflow-auto">

                <!-- Page Header -->
                <div class="flex items-start justify-between mb-6">
                    <div>
                        <h1 class="text-xl font-semibold text-gray-800">Manage Dishes</h1>
                        <p class="text-sm text-gray-500 mt-1">Kelola semua menu makanan & minuman</p>
                    </div>
                    <a href="{{ url('/menu-add') }}" style="color: white !important;"
                        class="inline-flex items-center gap-2 bg-[#2DCE98] hover:bg-[#26b585] text-sm font-medium px-4 py-2 rounded-xl transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                        </svg>
                        Tambah Menu
                    </a>
                </div>

                <!-- Toolbar -->
                <div class="flex items-center justify-between gap-3 mb-3 flex-wrap">

                    <!-- Kiri: Filter -->
                    <div class="flex items-center gap-2">
                        <select id="filterKategori" onchange="filterTable()"
                            class="text-sm border border-gray-200 rounded-xl px-3 py-2 bg-white text-gray-600 focus:outline-none focus:ring-2 focus:ring-[#2DCE98]/30 focus:border-[#2DCE98] transition-colors">
                            <option value="">Semua Kategori</option>
                            <option value="Makanan">Makanan</option>
                            <option value="Minuman">Minuman</option>
                            <option value="Dessert">Dessert</option>
                            <option value="Snack">Snack</option>
                        </select>
                        <select id="filterStatus" onchange="filterTable()"
                            class="text-sm border border-gray-200 rounded-xl px-3 py-2 bg-white text-gray-600 focus:outline-none focus:ring-2 focus:ring-[#2DCE98]/30 focus:border-[#2DCE98] transition-colors">
                            <option value="">Semua Status</option>
                            <option value="Tersedia">Tersedia</option>
                            <option value="Habis">Habis</option>
                        </select>
                    </div>

                    <!-- Kanan: Search -->
                    <div class="relative">

                        <input type="text" id="searchInput" oninput="filterTable()" placeholder="Cari nama menu..."
                            class="pl-9 pr-4 py-2 px-5 text-sm border border-gray-200 rounded-xl bg-white text-gray-700 w-56 focus:outline-none focus:ring-2 focus:ring-[#2DCE98]/30 focus:border-[#2DCE98] transition-colors">
                    </div>

                </div>

                <!-- Table Card -->
                <div class="bg-white border border-gray-100 rounded-2xl overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm" id="dishesTable">
                            <thead>
                                <tr class="bg-[#F8FFFE] border-b border-gray-100">
                                    <th class="text-left px-4 py-3 text-xs font-medium text-gray-400 uppercase tracking-wide w-10">#</th>
                                    <th class="text-left px-4 py-3 text-xs font-medium text-gray-400 uppercase tracking-wide">Menu</th>
                                    <th class="text-left px-4 py-3 text-xs font-medium text-gray-400 uppercase tracking-wide">Kategori</th>
                                    <th class="text-left px-4 py-3 text-xs font-medium text-gray-400 uppercase tracking-wide">Harga</th>
                                    <th class="text-left px-4 py-3 text-xs font-medium text-gray-400 uppercase tracking-wide">Terjual</th>
                                    <th class="text-left px-4 py-3 text-xs font-medium text-gray-400 uppercase tracking-wide">Status</th>
                                    <th class="text-center px-4 py-3 text-xs font-medium text-gray-400 uppercase tracking-wide">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody"></tbody>
                        </table>
                    </div>

                    <!-- Empty State -->
                    <div id="emptyState" class="hidden flex-col items-center justify-center py-16 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mb-3 text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <p class="text-sm font-medium">Tidak ada menu ditemukan</p>
                        <p class="text-xs mt-1">Coba ubah filter atau kata kunci pencarian</p>
                    </div>

                    <!-- Footer Pagination -->
                    <div class="flex items-center justify-between px-4 py-3 border-t border-gray-100">
                        <p class="text-xs text-gray-400" id="paginationInfo"></p>
                        <div class="flex items-center gap-1" id="paginationBtns"></div>
                    </div>
                </div>

            </div>

            <script>
            const dishes = [
                { id:1,  name:'Pasta with Roast Beef',   category:'Makanan', price:45000, sold:34, status:'Tersedia' },
                { id:2,  name:'Grilled Salmon Steak',    category:'Makanan', price:85000, sold:28, status:'Tersedia' },
                { id:3,  name:'Beef Steak',              category:'Makanan', price:95000, sold:22, status:'Tersedia' },
                { id:4,  name:'Apple Stuffed Pancake',   category:'Dessert', price:35000, sold:17, status:'Tersedia' },
                { id:5,  name:'Shrimp Rice Bowl',        category:'Makanan', price:55000, sold:12, status:'Habis'    },
                { id:6,  name:'Mango Smoothie',          category:'Minuman', price:25000, sold:40, status:'Tersedia' },
                { id:7,  name:'Caramel Latte',           category:'Minuman', price:28000, sold:33, status:'Tersedia' },
                { id:8,  name:'Cheese Fries',            category:'Snack',   price:22000, sold:19, status:'Tersedia' },
                { id:9,  name:'Tiramisu',               category:'Dessert', price:38000, sold:11, status:'Habis'    },
                { id:10, name:'Chicken Wrap',            category:'Makanan', price:42000, sold:26, status:'Tersedia' },
                { id:11, name:'Avocado Toast',           category:'Snack',   price:30000, sold:15, status:'Tersedia' },
                { id:12, name:'Orange Juice',            category:'Minuman', price:18000, sold:44, status:'Tersedia' },
            ];

            const avatarColors = ['#2DCE98','#3B82F6','#F59E0B','#8B5CF6','#EC4899','#14B8A6','#EF4444'];
            const badgeClass = { Makanan:'bg-blue-50 text-blue-600', Minuman:'bg-teal-50 text-teal-600', Dessert:'bg-pink-50 text-pink-600', Snack:'bg-orange-50 text-orange-600' };

            let filtered = [...dishes];
            let currentPage = 1;
            const perPage = 8;

            function getInitials(name) {
                return name.split(' ').slice(0,2).map(w => w[0]).join('').toUpperCase();
            }
            function getColor(name) {
                let h = 0; for (let c of name) h = (h * 31 + c.charCodeAt(0)) % avatarColors.length;
                return avatarColors[h];
            }
            function formatRp(n) { return 'Rp ' + n.toLocaleString('id-ID'); }

            function filterTable() {
                const q   = document.getElementById('searchInput').value.toLowerCase();
                const kat = document.getElementById('filterKategori').value;
                const st  = document.getElementById('filterStatus').value;
                filtered  = dishes.filter(d =>
                    (!q   || d.name.toLowerCase().includes(q)) &&
                    (!kat || d.category === kat) &&
                    (!st  || d.status   === st)
                );
                currentPage = 1;
                render();
            }

            function render() {
                const tbody = document.getElementById('tableBody');
                const empty = document.getElementById('emptyState');
                const total = filtered.length;
                const start = (currentPage - 1) * perPage;
                const slice = filtered.slice(start, start + perPage);

                tbody.innerHTML = '';

                if (slice.length === 0) {
                    empty.classList.remove('hidden'); empty.classList.add('flex');
                } else {
                    empty.classList.add('hidden'); empty.classList.remove('flex');
                    slice.forEach((d, i) => {
                        const pct = Math.min(Math.round((d.sold / 50) * 100), 100);
                        const bc  = badgeClass[d.category] || 'bg-gray-100 text-gray-500';
                        const tr  = document.createElement('tr');
                        tr.className = 'border-b border-gray-50 hover:bg-[#F8FFFE] transition-colors';
                        tr.innerHTML = `
                            <td class="px-4 py-3 text-xs text-gray-400">${start + i + 1}</td>
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-xl flex items-center justify-center text-white text-xs font-semibold flex-shrink-0"
                                        style="background:${getColor(d.name)}">${getInitials(d.name)}</div>
                                    <span class="font-medium text-gray-800">${d.name}</span>
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <span class="px-2.5 py-0.5 rounded-full text-xs font-medium ${bc}">${d.category}</span>
                            </td>
                            <td class="px-4 py-3 font-semibold text-gray-700">${formatRp(d.price)}</td>
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-2">
                                    <div class="w-14 h-1.5 rounded-full bg-gray-100 overflow-hidden">
                                        <div class="h-full rounded-full bg-[#2DCE98]" style="width:${pct}%"></div>
                                    </div>
                                    <span class="text-xs text-gray-500">${d.sold}×</span>
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                ${d.status === 'Tersedia'
                                    ? `<span class="inline-flex items-center gap-1.5 text-xs font-medium text-[#0F6E56]"><span class="w-1.5 h-1.5 rounded-full bg-[#2DCE98]"></span>Tersedia</span>`
                                    : `<span class="inline-flex items-center gap-1.5 text-xs font-medium text-red-500"><span class="w-1.5 h-1.5 rounded-full bg-red-400"></span>Habis</span>`
                                }
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="/dishes/${d.id}/edit"
                                        class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 text-xs font-medium transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                        Edit
                                    </a>
                                    <button onclick="confirmDelete(${d.id}, '${d.name.replace(/'/g,"\\'")}')"
                                        class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-red-50 text-red-500 hover:bg-red-100 text-xs font-medium transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                        Hapus
                                    </button>
                                </div>
                            </td>`;
                        tbody.appendChild(tr);
                    });
                }

                // Info
                document.getElementById('paginationInfo').textContent =
                    total === 0 ? 'Tidak ada data' : `Menampilkan ${start + 1}–${Math.min(start + perPage, total)} dari ${total} data`;

                // Pagination buttons
                const container = document.getElementById('paginationBtns');
                container.innerHTML = '';
                const totalPages = Math.ceil(total / perPage);
                if (totalPages <= 1) return;

                const mkBtn = (label, page, disabled, active) => {
                    const b = document.createElement('button');
                    b.innerHTML = label;
                    b.disabled  = disabled;
                    b.className = `px-3 py-1.5 rounded-lg text-xs font-medium border transition-colors
                        ${active   ? 'bg-[#2DCE98] text-white border-[#2DCE98]' : ''}
                        ${disabled ? 'text-gray-300 border-gray-100 cursor-default' : ''}
                        ${!active && !disabled ? 'text-gray-500 border-gray-200 hover:border-[#2DCE98] hover:text-[#2DCE98]' : ''}`;
                    if (!disabled && !active) b.onclick = () => { currentPage = page; render(); };
                    return b;
                };

                container.appendChild(mkBtn('&#8249;', currentPage - 1, currentPage === 1, false));
                for (let p = 1; p <= totalPages; p++) container.appendChild(mkBtn(p, p, false, p === currentPage));
                container.appendChild(mkBtn('&#8250;', currentPage + 1, currentPage === totalPages, false));
            }

            function confirmDelete(id, name) {
                if (confirm(`Hapus menu "${name}"?`)) {
                    // Ganti dengan fetch/axios delete ke endpoint Laravel kamu
                    console.log('delete id:', id);
                }
            }

            render();
            </script>

        </div>

    </div>

    @include('header.navmobile')
    </div>

    @include('footer.footer')
