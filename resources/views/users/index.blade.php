@include('header.head')

<body class="bg-[#F2F2F0] min-h-screen overflow-x-hidden">

    @include('header.sidebar')

    <!-- Overlay sidebar mobile -->
    <div id="sidebarOverlay" onclick="closeSidebar()"></div>

    <div id="appWrapper" class="flex flex-col min-h-screen">

        @include('header.navbar')

        <!-- MAIN LAYOUT -->
        <div class="main-layout flex flex-1 overflow-hidden">

            <!-- CONTENT -->
            <div class="flex-1 p-6 overflow-auto">

                <!-- Header -->
                <div class="flex items-start justify-between mb-6">
                    <div>
                        <h1 class="text-xl font-semibold text-gray-800">Manage Users</h1>
                        <p class="text-sm text-gray-500 mt-1">
                            Kelola akun & hak akses pengguna
                        </p>
                    </div>

                    <a href="/users/create"
                        class="inline-flex items-center gap-2 bg-[#2DCE98] hover:bg-[#26b585] text-sm font-medium px-4 py-2 rounded-xl transition-colors"
                        style="color:#fff !important">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-4 h-4"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2.5">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 4v16m8-8H4"/>
                        </svg>

                        Tambah User
                    </a>
                </div>

                <!-- Toolbar -->
                <div class="flex items-center justify-between gap-3 mb-3 flex-wrap">

                    <div class="flex items-center gap-2">

                        <select id="filterRole"
                            onchange="filterTable()"
                            class="text-sm border border-gray-200 rounded-xl px-3 py-2 bg-white text-gray-600 focus:outline-none focus:ring-2 focus:ring-[#2DCE98]/30 focus:border-[#2DCE98] transition-colors">

                            <option value="">Semua Role</option>
                            <option value="Admin">Admin</option>
                            <option value="Kasir">Kasir</option>
                            <option value="Dapur">Dapur</option>
                            <option value="Manajer">Manajer</option>
                        </select>

                        <select id="filterStatus"
                            onchange="filterTable()"
                            class="text-sm border border-gray-200 rounded-xl px-3 py-2 bg-white text-gray-600 focus:outline-none focus:ring-2 focus:ring-[#2DCE98]/30 focus:border-[#2DCE98] transition-colors">

                            <option value="">Semua Status</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Nonaktif">Nonaktif</option>
                        </select>
                    </div>

                    <div class="relative">

                        <span class="absolute inset-y-0 left-3 flex items-center text-gray-400 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z"/>
                            </svg>
                        </span>

                        <input type="text"
                            id="searchInput"
                            oninput="filterTable()"
                            placeholder="Cari nama / email..."
                            class="pl-9 pr-4 py-2 text-sm border border-gray-200 rounded-xl bg-white text-gray-700 w-56 focus:outline-none focus:ring-2 focus:ring-[#2DCE98]/30 focus:border-[#2DCE98] transition-colors">
                    </div>
                </div>

                <!-- Table -->
                <div class="bg-white border border-gray-100 rounded-2xl overflow-hidden">

                    <div class="overflow-x-auto">

                        <table class="w-full text-sm">

                            <thead>
                                <tr class="bg-[#F8FFFE] border-b border-gray-100">
                                    <th class="text-left px-4 py-3 text-xs font-medium text-gray-400 uppercase tracking-wide w-10">#</th>
                                    <th class="text-left px-4 py-3 text-xs font-medium text-gray-400 uppercase tracking-wide">Pengguna</th>
                                    <th class="text-left px-4 py-3 text-xs font-medium text-gray-400 uppercase tracking-wide">Role</th>
                                    <th class="text-left px-4 py-3 text-xs font-medium text-gray-400 uppercase tracking-wide">No. HP</th>
                                    <th class="text-left px-4 py-3 text-xs font-medium text-gray-400 uppercase tracking-wide">Bergabung</th>
                                    <th class="text-left px-4 py-3 text-xs font-medium text-gray-400 uppercase tracking-wide">Status</th>
                                    <th class="text-center px-4 py-3 text-xs font-medium text-gray-400 uppercase tracking-wide">Aksi</th>
                                </tr>
                            </thead>

                            <tbody id="tableBody"></tbody>

                        </table>
                    </div>

                    <!-- Empty -->
                    <div id="emptyState"
                        class="hidden flex-col items-center justify-center py-16 text-gray-400">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-12 h-12 mb-3 text-gray-200"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.5"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0"/>
                        </svg>

                        <p class="text-sm font-medium">
                            Tidak ada user ditemukan
                        </p>

                        <p class="text-xs mt-1">
                            Coba ubah filter atau kata kunci pencarian
                        </p>
                    </div>

                    <!-- Footer -->
                    <div class="flex items-center justify-between px-4 py-3 border-t border-gray-100">

                        <p class="text-xs text-gray-400"
                            id="paginationInfo">
                        </p>

                        <div class="flex items-center gap-1"
                            id="paginationBtns">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('header.navmobile')

    </div>

    @include('footer.footer')

    <script>

        const users = [
            {
                id:1,
                name:'Ibrahim Khalil',
                email:'ibrahim@tasty.com',
                role:'Admin',
                phone:'081234567890',
                joined:'01 Jan 2026',
                status:'Aktif'
            },
            {
                id:2,
                name:'Sari Dewi',
                email:'sari@tasty.com',
                role:'Kasir',
                phone:'082233445566',
                joined:'15 Feb 2026',
                status:'Aktif'
            },
            {
                id:3,
                name:'Budi Santoso',
                email:'budi@tasty.com',
                role:'Dapur',
                phone:'085544332211',
                joined:'20 Feb 2026',
                status:'Aktif'
            },
            {
                id:4,
                name:'Rina Melati',
                email:'rina@tasty.com',
                role:'Manajer',
                phone:'087788990011',
                joined:'01 Mar 2026',
                status:'Aktif'
            },
            {
                id:5,
                name:'Doni Pratama',
                email:'doni@tasty.com',
                role:'Kasir',
                phone:'089900112233',
                joined:'10 Apr 2026',
                status:'Nonaktif'
            },
            {
                id:6,
                name:'Ayu Lestari',
                email:'ayu@tasty.com',
                role:'Dapur',
                phone:'081122334455',
                joined:'12 Apr 2026',
                status:'Aktif'
            },
        ];

        const avatarColors = [
            '#2DCE98',
            '#3B82F6',
            '#8B5CF6',
            '#EC4899',
            '#F59E0B',
            '#14B8A6',
            '#EF4444'
        ];

        const roleBadge = {
            Admin   : 'bg-purple-50 text-purple-700',
            Kasir   : 'bg-blue-50 text-blue-600',
            Dapur   : 'bg-orange-50 text-orange-600',
            Manajer : 'bg-teal-50 text-teal-700',
        };

        let filtered = [...users];
        let currentPage = 1;
        const perPage = 8;

        function getInitials(name) {
            return name
                .split(' ')
                .slice(0,2)
                .map(w => w[0])
                .join('')
                .toUpperCase();
        }

        function getColor(name) {

            let h = 0;

            for (let c of name) {
                h = (h * 31 + c.charCodeAt(0)) % avatarColors.length;
            }

            return avatarColors[h];
        }

        function filterTable() {

            const q = document.getElementById('searchInput')
                .value
                .toLowerCase();

            const role = document.getElementById('filterRole').value;
            const stat = document.getElementById('filterStatus').value;

            filtered = users.filter(u =>

                (!q || u.name.toLowerCase().includes(q) || u.email.toLowerCase().includes(q)) &&
                (!role || u.role === role) &&
                (!stat || u.status === stat)

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

                slice.forEach((u, i) => {

                    const badgeClass = roleBadge[u.role] || 'bg-gray-100 text-gray-500';

                    const tr = document.createElement('tr');

                    tr.className = 'border-b border-gray-50 hover:bg-[#F8FFFE] transition-colors';

                    tr.innerHTML = `
                        <td class="px-4 py-3 text-xs text-gray-400">
                            ${start + i + 1}
                        </td>

                        <td class="px-4 py-3">
                            <div class="flex items-center gap-3">

                                <div class="w-9 h-9 rounded-full flex items-center justify-center text-white text-xs font-semibold flex-shrink-0"
                                    style="background:${getColor(u.name)}">

                                    ${getInitials(u.name)}
                                </div>

                                <div>
                                    <div class="font-medium text-gray-800 text-sm">
                                        ${u.name}
                                    </div>

                                    <div class="text-xs text-gray-400">
                                        ${u.email}
                                    </div>
                                </div>
                            </div>
                        </td>

                        <td class="px-4 py-3">
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-medium ${badgeClass}">
                                ${u.role}
                            </span>
                        </td>

                        <td class="px-4 py-3 text-xs text-gray-500">
                            ${u.phone}
                        </td>

                        <td class="px-4 py-3 text-xs text-gray-500">
                            ${u.joined}
                        </td>

                        <td class="px-4 py-3">

                            ${
                                u.status === 'Aktif'

                                ? `
                                    <span class="inline-flex items-center gap-1.5 text-xs font-medium text-[#0F6E56]">
                                        <span class="w-1.5 h-1.5 rounded-full bg-[#2DCE98]"></span>
                                        Aktif
                                    </span>
                                `

                                : `
                                    <span class="inline-flex items-center gap-1.5 text-xs font-medium text-red-500">
                                        <span class="w-1.5 h-1.5 rounded-full bg-red-400"></span>
                                        Nonaktif
                                    </span>
                                `
                            }

                        </td>

                        <td class="px-4 py-3">

                            <div class="flex items-center justify-center gap-2">

                                <a href="/users/${u.id}/edit"
                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 text-xs font-medium transition-colors">

                                    Edit
                                </a>

                                <button onclick="confirmDelete(${u.id}, '${u.name.replace(/'/g, "\\'")}')"
                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-red-50 text-red-500 hover:bg-red-100 text-xs font-medium transition-colors">

                                    Hapus
                                </button>
                            </div>
                        </td>
                    `;

                    tbody.appendChild(tr);
                });
            }

            document.getElementById('paginationInfo').textContent =

                total === 0

                ? 'Tidak ada data'

                : `Menampilkan ${start + 1}–${Math.min(start + perPage, total)} dari ${total} data`;

            const container = document.getElementById('paginationBtns');

            container.innerHTML = '';

            const totalPages = Math.ceil(total / perPage);

            if (totalPages <= 1) return;

            const mkBtn = (label, page, disabled, active) => {

                const b = document.createElement('button');

                b.innerHTML = label;

                b.disabled = disabled;

                b.className = `
                    px-3 py-1.5 rounded-lg text-xs font-medium border transition-colors

                    ${active ? 'bg-[#2DCE98] text-white border-[#2DCE98]' : ''}

                    ${disabled ? 'text-gray-300 border-gray-100 cursor-default' : ''}

                    ${!active && !disabled
                        ? 'text-gray-500 border-gray-200 hover:border-[#2DCE98] hover:text-[#2DCE98]'
                        : ''
                    }
                `;

                if (!disabled && !active) {

                    b.onclick = () => {

                        currentPage = page;

                        render();
                    };
                }

                return b;
            };

            container.appendChild(
                mkBtn('&#8249;', currentPage - 1, currentPage === 1, false)
            );

            for (let p = 1; p <= totalPages; p++) {

                container.appendChild(
                    mkBtn(p, p, false, p === currentPage)
                );
            }

            container.appendChild(
                mkBtn('&#8250;', currentPage + 1, currentPage === totalPages, false)
            );
        }

        function confirmDelete(id, name) {

            if (confirm(`Hapus user "${name}" ?`)) {

                console.log('delete id:', id);
            }
        }

        render();

    </script>

    @include('header.navmobile')
    </div>

    @include('footer.footer')
