@include('header.head')

<body class="bg-[#F2F2F0] h-screen overflow-hidden">


    @include('header.sidebar')

    <!-- Overlay sidebar mobile -->
    {{-- <div id="sidebarOverlay" onclick="closeSidebar()"></div> --}}

    <div id="appWrapper" class="flex flex-col h-screen">

        @include('header.navbar')

        @if (session('success'))
            <div class="mb-4 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl">
                {{ session('success') }}
            </div>
        @endif
        <!-- MAIN LAYOUT -->
        <div class="main-layout flex flex-1 overflow-hidden">
            {{-- Masukan konten nya di sini --}}
            <div class="flex-1 p-6 overflow-auto">

                <!-- Page Header -->
                <div class="flex items-start justify-between mb-6">
                    <div>
                        <h1 class="text-xl font-semibold text-black-800">Manage Dishes</h1>
                        <p class="text-sm text-black-500 mt-1">Kelola semua menu cafe & carwash</p>
                    </div>
                    <a href="{{ url('/menu-add') }}" style="color: white !important;"
                        class="inline-flex items-center gap-2 bg-[#D4AF37] hover:bg-[#C49A22] text-sm font-medium px-4 py-2 rounded-xl transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        Tambah Menu
                    </a>
                </div>

                <!-- Toolbar -->
                <div class="flex items-center justify-between gap-3 mb-3 flex-wrap">

                    <!-- Kiri: Filter -->
                    <div class="flex items-center gap-2">
                        <select id="filterKategori" onchange="filterTable()"
                            class="text-sm border border-black-200 rounded-xl px-3 py-2 bg-white text-black-600 focus:outline-none focus:ring-2 focus:ring-[#D4AF37]/30 focus:border-[#D4AF37] transition-colors">
                            <option value="">Semua Kategori</option>

                            @foreach ($categories as $category)
                                <option value="{{ $category->name_category }}">
                                    {{ $category->name_category }}
                                </option>
                            @endforeach
                        </select>

                    </div>

                    <!-- Kanan: Search -->
                    <div class="relative">

                        <input type="text" id="searchInput" oninput="filterTable()" placeholder="Cari nama menu..."
                            class="pl-9 pr-4 py-2 px-5 text-sm border border-black-200 rounded-xl bg-white text-black-700 w-56 focus:outline-none focus:ring-2 focus:ring-[#D4AF37]/30 focus:border-[#D4AF37] transition-colors">
                    </div>

                </div>

                <!-- Table Card -->
                <div
                    class="bg-[#D4AF37]/15
                        backdrop-blur-xl
                        border border-[#D4AF37]/30
                        rounded-2xl
                        overflow-hidden
                        shadow-[0_8px_30px_rgba(212,175,55,0.15)]">
                    <div class="overflow-auto max-h-[500px]">
                        <table class="w-full text-sm" id="dishesTable">
                            <thead>
                                <tr class="bg-[#D4AF37]/20 border-b border-[#D4AF37]/30">
                                    <th
                                        class="text-left px-4 py-3 text-xs font-medium text-black-400 uppercase tracking-wide w-10">
                                        #</th>
                                    <th
                                        class="text-left px-4 py-3 text-xs font-medium text-black-400 uppercase tracking-wide">
                                        Menu</th>
                                    <th
                                        class="text-left px-4 py-3 text-xs font-medium text-black-400 uppercase tracking-wide">
                                        Kategori</th>
                                    <th
                                        class="text-left px-4 py-3 text-xs font-medium text-black-400 uppercase tracking-wide">
                                        Harga</th>
                                    <th
                                        class="text-left px-4 py-3 text-xs font-medium text-black-400 uppercase tracking-wide">
                                        Terjual</th>
                                    @if (auth()->user()->role === 'owner')
                                        <th
                                            class="text-center px-4 py-3 text-xs font-medium text-black-400 uppercase tracking-wide">
                                            Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody id="tableBody"></tbody>
                        </table>
                    </div>

                    <!-- Empty State -->
                    <div id="emptyState" class="hidden flex-col items-center justify-center py-16 text-black-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mb-3 text-black-200" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="text-sm font-medium">Tidak ada menu ditemukan</p>
                        <p class="text-xs mt-1">Coba ubah filter atau kata kunci pencarian</p>
                    </div>

                    <!-- Footer Pagination -->
                    <div class="flex items-center justify-between px-4 py-3 border-t border-black-100">
                        <p class="text-xs text-black-400" id="paginationInfo"></p>
                        <div class="flex items-center gap-1" id="paginationBtns"></div>
                    </div>
                </div>

            </div>

            <div id="deleteModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

                <div class="bg-white rounded-2xl w-[420px] p-6">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 rounded-full bg-red-100 flex items-center justify-center">
                            🗑️
                        </div>

                        <div>
                            <h3 class="font-semibold text-black-800">
                                Hapus Menu
                            </h3>
                            <p class="text-sm text-black-500">
                                Data yang dihapus tidak dapat dikembalikan.
                            </p>
                        </div>
                    </div>

                    <p class="text-sm text-black-600 mb-6">
                        Yakin ingin menghapus menu
                        <span id="deleteMenuName" class="font-semibold"></span> ?
                    </p>

                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')

                        <div class="flex justify-end gap-2">
                            <button type="button" onclick="closeDeleteModal()"
                                class="px-4 py-2 border rounded-xl text-black-600">
                                Batal
                            </button>

                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-xl hover:bg-red-600">
                                Hapus
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <script>
                const dishes = @json($menus);
                console.log(dishes);

                const avatarColors = ['#D4AF37', '#3B82F6', '#F59E0B', '#8B5CF6', '#EC4899', '#14B8A6', '#EF4444'];
                const badgeClass = {
                    Makanan: 'bg-blue-50 text-blue-600',
                    Minuman: 'bg-teal-50 text-teal-600',
                    Carwash: 'bg-pink-50 text-pink-600'
                };

                let filtered = [...dishes];
                let currentPage = 1;
                const perPage = 8;

                const isOwner = @json(auth()->user()->role === 'owner');

                function getInitials(name) {
                    return name.split(' ').slice(0, 2).map(w => w[0]).join('').toUpperCase();
                }

                function getColor(name) {
                    let h = 0;
                    for (let c of name) h = (h * 31 + c.charCodeAt(0)) % avatarColors.length;
                    return avatarColors[h];
                }

                function formatRp(n) {
                    return 'Rp ' + n.toLocaleString('id-ID');
                }

                function filterTable() {
                    const q = document.getElementById('searchInput').value.toLowerCase();
                    const kat = document.getElementById('filterKategori').value;
                    // const st = document.getElementById('filterStatus').value;
                    filtered = dishes.filter(d =>
                        (!q || d.name.toLowerCase().includes(q)) &&
                        (!kat || d.category === kat)
                        // && (!st || d.status === st)
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
                        empty.classList.remove('hidden');
                        empty.classList.add('flex');
                    } else {
                        empty.classList.add('hidden');
                        empty.classList.remove('flex');
                        slice.forEach((d, i) => {
                            const pct = Math.min(Math.round((d.terjual / 50) * 100), 100);
                            const bc = badgeClass[d.category] || 'bg-black-100 text-black-500';
                            const tr = document.createElement('tr');
                            tr.className = 'border-b border-black-50 hover:bg-[#FCF8EC] transition-colors';
                            tr.innerHTML = `
                            <td class="px-4 py-3 text-xs text-black-400">${start + i + 1}</td>
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-3">
                                   <div class="w-10 h-10 rounded-xl overflow-hidden flex-shrink-0">
                                        <img
                                            src="/storage/${d.photo}"
                                            alt="${d.name}"
                                            class="w-full h-full object-cover"
                                            onerror="this.src='https://placehold.co/100x100'"
                                        >
                                    </div>
                                    <span class="font-medium text-black-800">${d.name}</span>
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <span class="px-2.5 py-0.5 rounded-full text-xs font-medium ${bc}">${d.category}</span>
                            </td>
                            <td class="px-4 py-3 font-semibold text-black-700">${formatRp(d.price)}</td>
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-2">
                                   
                                    <span class="text-xs text-black-500">${d.terjual}×</span>
                                </div>
                            </td>
                            ${isOwner ? `
                                        <td class="px-4 py-3">
                                            <div class="flex items-center justify-center gap-2">
                                                <a href="/dishes/${d.id}/edit"
                                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 text-xs font-medium transition-colors">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                    </svg>
                                                    Edit
                                                </a>
                                                <button onclick="openDeleteModal(${d.id}, '${d.name.replace(/'/g,"\\'")}')"
                                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-red-50 text-red-500 hover:bg-red-100 text-xs font-medium transition-colors">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                    Hapus
                                                </button>
                                            </div>
                                        </td>
                                        ` : ''}
                            `;
                            tbody.appendChild(tr);
                        });
                    }

                    // Info
                    document.getElementById('paginationInfo').textContent =
                        total === 0 ? 'Tidak ada data' :
                        `Menampilkan ${start + 1}–${Math.min(start + perPage, total)} dari ${total} data`;

                    // Pagination buttons
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
                        ${active   ? 'bg-[#D4AF37] text-white border-[#D4AF37]' : ''}
                        ${disabled ? 'text-black-300 border-black-100 cursor-default' : ''}
                        ${!active && !disabled ? 'text-black-500 border-black-200 hover:border-[#D4AF37] hover:text-[#D4AF37]' : ''}`;
                        if (!disabled && !active) b.onclick = () => {
                            currentPage = page;
                            render();
                        };
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

                function openDeleteModal(id, name) {
                    document
                        .getElementById('deleteMenuName')
                        .textContent = name;

                    document
                        .getElementById('deleteForm')
                        .action = `/menu-delete/${id}`;

                    document
                        .getElementById('deleteModal')
                        .classList.remove('hidden');

                    document
                        .getElementById('deleteModal')
                        .classList.add('flex');
                }

                function closeDeleteModal() {
                    document
                        .getElementById('deleteModal')
                        .classList.add('hidden');

                    document
                        .getElementById('deleteModal')
                        .classList.remove('flex');
                }

                render();
            </script>

        </div>

    </div>

    @include('header.navmobile')
    </div>

    @include('footer.footer')
