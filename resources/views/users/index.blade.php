@include('header.head')

<body class="bg-[#F2F2F0] h-screen overflow-hidden">

    @include('header.sidebar')

    <!-- Overlay sidebar mobile -->
    {{-- <div id="sidebarOverlay" onclick="closeSidebar()"></div> --}}

    <div id="appWrapper" class="flex flex-col h-screen overflow-hidden">

        @include('header.navbar')

        <!-- MAIN LAYOUT -->
        <div class="main-layout flex-1 overflow-y-auto p-6">

            <!-- CONTENT -->
                {{-- Flash message --}}
                @if(session('success'))
                    <div id="flashMsg"
                        class="flex items-center gap-2 mb-4 px-4 py-3 rounded-xl text-sm font-semibold"
                        style="background:rgba(212,175,55,.12);color:#D4AF37;border:1px solid rgba(11,171,140,.2)">
                        ✅ {{ session('success') }}
                    </div>
                @endif

                <!-- Header -->
                <div class="flex items-start justify-between mb-6">
                    <div>
                        <h1 class="text-xl font-semibold text-black-800">Manage Users</h1>
                        <p class="text-sm text-black-500 mt-1">Kelola akun &amp; hak akses pengguna</p>
                    </div>
                    <a href="/users/create"
                        class="inline-flex items-center gap-2 bg-[#D4AF37] hover:bg-[#C49A22] text-sm font-medium px-4 py-2 rounded-xl transition-colors"
                        style="color:#fff !important">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                        </svg>
                        Tambah User
                    </a>
                </div>

                <!-- Toolbar -->
                <div class="flex items-center justify-between gap-3 mb-3 flex-wrap">
                    <div class="flex items-center gap-2">
                        <select id="filterRole" onchange="filterTable()"
                            class="text-sm border border-black-200 rounded-xl px-3 py-2 bg-white text-black-600 focus:outline-none focus:ring-2 focus:ring-[#D4AF37]/30 focus:border-[#D4AF37] transition-colors">
                            <option value="">Semua Role</option>
                            <option value="owner">Owner</option>
                            <option value="kasir">Kasir</option>
                        </select>
                    </div>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-3 flex items-center text-black-400 pointer-events-none">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z"/>
                            </svg>
                        </span>
                        <input type="text" id="searchInput" oninput="filterTable()"
                            placeholder="Cari nama / email..."
                            class="pl-9 pr-4 py-2 text-sm border border-black-200 rounded-xl bg-white text-black-700 w-56 focus:outline-none focus:ring-2 focus:ring-[#D4AF37]/30 focus:border-[#D4AF37] transition-colors">
                    </div>
                </div>

                <!-- Table -->
                <div class="bg-white border border-black-100 rounded-2xl overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead>
                                <tr class="bg-[#F8FFFE] border-b border-black-100">
                                    <th class="text-left px-4 py-3 text-xs font-medium text-black-400 uppercase tracking-wide w-10">#</th>
                                    <th class="text-left px-4 py-3 text-xs font-medium text-black-400 uppercase tracking-wide">Pengguna</th>
                                    <th class="text-left px-4 py-3 text-xs font-medium text-black-400 uppercase tracking-wide">Role</th>
                                    <th class="text-left px-4 py-3 text-xs font-medium text-black-400 uppercase tracking-wide">Bergabung</th>
                                    <th class="text-center px-4 py-3 text-xs font-medium text-black-400 uppercase tracking-wide">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $i => $user)
                                    <tr class="border-b border-black-50 hover:bg-[#F8FFFE] transition-colors user-row"
                                        data-name="{{ strtolower($user->name) }}"
                                        data-email="{{ strtolower($user->email) }}"
                                        data-role="{{ $user->role }}">

                                        <td class="px-4 py-3 text-xs text-black-400">{{ $i + 1 }}</td>

                                        <td class="px-4 py-3">
                                            <div class="flex items-center gap-3">
                                                <div class="w-9 h-9 rounded-full flex items-center justify-center text-white text-xs font-semibold flex-shrink-0"
                                                    style="background:{{ $user->role === 'owner' ? '#D4AF37' : '#3B82F6' }}">
                                                    {{ strtoupper(substr($user->name, 0, 2)) }}
                                                </div>
                                                <div>
                                                    <div class="font-medium text-black-800 text-sm">{{ $user->name }}</div>
                                                    <div class="text-xs text-black-400">{{ $user->email }}</div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-4 py-3">
                                            @if($user->role === 'owner')
                                                <span class="px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-50 text-purple-700">
                                                    👑 Owner
                                                </span>
                                            @else
                                                <span class="px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-50 text-blue-600">
                                                    🧑‍💼 Kasir
                                                </span>
                                            @endif
                                        </td>

                                        <td class="px-4 py-3 text-xs text-black-500">
                                            {{ $user->created_at?->format('d M Y') ?? '-' }}
                                        </td>

                                        <td class="px-4 py-3">
                                            <div class="flex items-center justify-center gap-2">
                                                <a href="/users/{{ $user->id }}/edit"
                                                    class="inline-flex items-center px-3 py-1.5 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 text-xs font-medium transition-colors">
                                                    Edit
                                                </a>
                                                <button
                                                    onclick="openDeleteModal({{ $user->id }}, '{{ addslashes($user->name) }}')"
                                                    class="inline-flex items-center px-3 py-1.5 rounded-lg bg-red-50 text-red-500 hover:bg-red-100 text-xs font-medium transition-colors">
                                                    Hapus
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-4 py-16 text-center">
                                            <div class="flex flex-col items-center text-black-400">
                                                <svg class="w-12 h-12 mb-3 text-black-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0"/>
                                                </svg>
                                                <p class="text-sm font-medium">Belum ada user</p>
                                                <a href="/users/create" class="text-xs mt-1 text-[#D4AF37] font-semibold">Tambah sekarang →</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Empty state filter --}}
                    <div id="emptyFilter" class="hidden py-12 text-center text-black-400">
                        <p class="text-sm font-medium">Tidak ada user ditemukan</p>
                        <p class="text-xs mt-1">Coba ubah filter atau kata kunci pencarian</p>
                    </div>

                    <!-- Footer count -->
                    <div class="px-4 py-3 border-t border-black-100">
                        <p class="text-xs text-black-400">
                            Total <span id="userCount" class="font-bold text-black-600">{{ $users->count() }}</span> user
                        </p>
                    </div>
                </div>
        </div>

        @include('header.navmobile')

    </div>

    @include('footer.footer')

    {{-- ── DELETE MODAL ── --}}
    <div id="deleteModal"
        class="fixed inset-0 z-50 items-center justify-center p-4"
        style="display:none; background:rgba(0,0,0,0.45)">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-sm p-6"
            style="animation:fadeUp .22s ease both">

            <div class="flex items-center justify-center w-14 h-14 rounded-full mx-auto mb-4"
                style="background:#fef2f2">
                <svg class="w-7 h-7" fill="none" stroke="#ef4444" stroke-width="2.5" viewBox="0 0 24 24">
                    <polyline points="3 6 5 6 21 6"/>
                    <path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/>
                    <path d="M10 11v6M14 11v6"/>
                    <path d="M9 6V4a1 1 0 011-1h4a1 1 0 011 1v2"/>
                </svg>
            </div>

            <div class="text-center mb-5">
                <div class="text-base font-extrabold text-black-900 mb-1">Hapus User?</div>
                <div class="text-sm text-black-400 leading-relaxed">
                    User <span id="deleteUserName" class="font-bold text-black-700"></span>
                    akan dihapus permanen dan tidak bisa dikembalikan.
                </div>
            </div>

            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <div class="flex gap-3">
                    <button type="button" onclick="closeDeleteModal()"
                        class="flex-1 py-2.5 rounded-xl text-sm font-bold border transition-colors"
                        style="background:white;color:#475569;border-color:#e2e8f0">
                        Batal
                    </button>
                    <button type="submit"
                        class="flex-1 py-2.5 rounded-xl text-sm font-bold text-white"
                        style="background:#ef4444">
                        Ya, Hapus
                    </button>
                </div>
            </form>
        </div>
    </div>

    <style>
        @keyframes fadeUp {
            from { opacity:0; transform:translateY(12px) }
            to   { opacity:1; transform:translateY(0) }
        }
    </style>

    <script>
        // ── Delete modal ──────────────────────────────────────────────
        function openDeleteModal(id, name) {
            document.getElementById('deleteUserName').textContent = name;
            document.getElementById('deleteForm').action = '/users/' + id;
            document.getElementById('deleteModal').style.display = 'flex';
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').style.display = 'none';
        }

        // Klik backdrop → tutup modal
        document.getElementById('deleteModal').addEventListener('click', function(e) {
            if (e.target === this) closeDeleteModal();
        });

        // ── Filter & search ───────────────────────────────────────────
        function filterTable() {
            var q    = document.getElementById('searchInput').value.toLowerCase();
            var role = document.getElementById('filterRole').value;
            var rows = document.querySelectorAll('.user-row');
            var visible = 0;

            rows.forEach(function(row) {
                var matchQ    = !q    || row.dataset.name.includes(q) || row.dataset.email.includes(q);
                var matchRole = !role || row.dataset.role === role;
                var show      = matchQ && matchRole;
                row.style.display = show ? '' : 'none';
                if (show) visible++;
            });

            document.getElementById('userCount').textContent = visible;

            var emptyFilter = document.getElementById('emptyFilter');
            emptyFilter.classList.toggle('hidden', visible > 0 || rows.length === 0);
        }

        // ── Auto hide flash ───────────────────────────────────────────
        var flash = document.getElementById('flashMsg');
        if (flash) {
            setTimeout(function() {
                flash.style.transition = 'opacity .4s';
                flash.style.opacity = '0';
                setTimeout(function() { flash.remove(); }, 400);
            }, 3000);
        }
    </script>

</body>

