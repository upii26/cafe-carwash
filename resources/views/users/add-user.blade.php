@include('header.head')

<body class="bg-[#F2F2F0] min-h-screen overflow-x-hidden">

    @include('header.sidebar')
    <div id="sidebarOverlay" onclick="closeSidebar()"></div>

    <div id="appWrapper" class="flex flex-col min-h-screen">
        @include('header.navbar')

        <div class="main-layout flex flex-1 overflow-hidden">
            <div class="flex-1 overflow-y-auto p-5 pb-24">

                {{-- Page header --}}
                <div class="flex items-center gap-3 mb-5">
                    <a href="/users"
                        class="w-8 h-8 rounded-xl flex items-center justify-center flex-shrink-0 transition-colors"
                        style="background:#f1f5f9;color:#475569">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path d="M15 19l-7-7 7-7"/>
                        </svg>
                    </a>
                    <div>
                        <div class="text-base font-extrabold text-gray-900">Tambah User Baru</div>
                        <div class="text-xs text-gray-400 mt-0.5">Manajemen User › Tambah</div>
                    </div>
                </div>

                <form action="/users" method="POST" id="userForm">
                    @csrf

                    <div class="grid grid-cols-1 gap-4 max-w-lg">

                        {{-- Card: Info User --}}
                        <div class="bg-white rounded-2xl p-5 shadow-sm border border-black/[.07]">
                            <div class="flex items-center gap-2 mb-4">
                                <span class="w-6 h-6 rounded-lg flex items-center justify-center text-xs font-bold text-white flex-shrink-0"
                                    style="background:#0BAB8C">1</span>
                                <span class="text-sm font-extrabold text-gray-900">Informasi User</span>
                            </div>

                            <div class="flex flex-col gap-4">

                                {{-- Nama --}}
                                <div class="flex flex-col gap-1.5">
                                    <label class="text-xs font-bold uppercase tracking-wide text-gray-500">
                                        Nama <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" name="name" id="userName"
                                        value="{{ old('name') }}"
                                        placeholder="cth. Budi Santoso"
                                        class="px-3 py-2.5 rounded-xl text-sm outline-none transition-all w-full
                                               {{ $errors->has('name') ? 'border-2 border-red-400 bg-red-50' : 'border border-gray-200 bg-gray-50' }}"
                                        style="font-family:inherit;color:#1e293b">
                                    @error('name')
                                        <span class="text-xs text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Email --}}
                                <div class="flex flex-col gap-1.5">
                                    <label class="text-xs font-bold uppercase tracking-wide text-gray-500">
                                        Email <span class="text-red-500">*</span>
                                    </label>
                                    <input type="email" name="email" id="userEmail"
                                        value="{{ old('email') }}"
                                        placeholder="cth. budi@email.com"
                                        class="px-3 py-2.5 rounded-xl text-sm outline-none transition-all w-full
                                               {{ $errors->has('email') ? 'border-2 border-red-400 bg-red-50' : 'border border-gray-200 bg-gray-50' }}"
                                        style="font-family:inherit;color:#1e293b">
                                    @error('email')
                                        <span class="text-xs text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Password --}}
                                <div class="flex flex-col gap-1.5">
                                    <label class="text-xs font-bold uppercase tracking-wide text-gray-500">
                                        Password <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <input type="password" name="password" id="userPassword"
                                            placeholder="Min. 6 karakter"
                                            class="px-3 py-2.5 pr-10 rounded-xl text-sm outline-none transition-all w-full
                                                   {{ $errors->has('password') ? 'border-2 border-red-400 bg-red-50' : 'border border-gray-200 bg-gray-50' }}"
                                            style="font-family:inherit;color:#1e293b">
                                        <button type="button" onclick="togglePassword('userPassword', this)"
                                            class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" id="eyeIcon1">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                                <circle cx="12" cy="12" r="3"/>
                                            </svg>
                                        </button>
                                    </div>
                                    @error('password')
                                        <span class="text-xs text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        {{-- Card: Role --}}
                        <div class="bg-white rounded-2xl p-5 shadow-sm border border-black/[.07]">
                            <div class="flex items-center gap-2 mb-4">
                                <span class="w-6 h-6 rounded-lg flex items-center justify-center text-xs font-bold text-white flex-shrink-0"
                                    style="background:#0BAB8C">2</span>
                                <span class="text-sm font-extrabold text-gray-900">Role</span>
                            </div>

                            <div class="flex flex-col gap-3">
                                {{-- Owner --}}
                                <label class="flex items-center gap-4 p-4 rounded-xl border-2 cursor-pointer transition-all role-option"
                                    id="roleOwner"
                                    style="{{ old('role') === 'owner' ? 'border-color:#0BAB8C;background:#e6faf6' : 'border-color:#e2e8f0;background:#f8fafb' }}"
                                    onclick="selectRole('owner')">
                                    <input type="radio" name="role" value="owner" class="hidden"
                                        {{ old('role') === 'owner' ? 'checked' : '' }}>
                                    <div class="w-10 h-10 rounded-xl flex items-center justify-center text-xl flex-shrink-0"
                                        style="background:#e6faf6">👑</div>
                                    <div class="flex-1">
                                        <div class="text-sm font-bold text-gray-800">Owner</div>
                                        <div class="text-xs text-gray-400 mt-0.5">Akses penuh ke semua fitur</div>
                                    </div>
                                    <div class="w-5 h-5 rounded-full border-2 flex items-center justify-center flex-shrink-0 role-check-owner"
                                        style="{{ old('role') === 'owner' ? 'border-color:#0BAB8C;background:#0BAB8C' : 'border-color:#cbd5e1' }}">
                                        @if(old('role') === 'owner')
                                            <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                                <polyline points="20 6 9 17 4 12"/>
                                            </svg>
                                        @endif
                                    </div>
                                </label>

                                {{-- Kasir --}}
                                <label class="flex items-center gap-4 p-4 rounded-xl border-2 cursor-pointer transition-all role-option"
                                    id="roleKasir"
                                    style="{{ old('role', 'kasir') === 'kasir' ? 'border-color:#0BAB8C;background:#e6faf6' : 'border-color:#e2e8f0;background:#f8fafb' }}"
                                    onclick="selectRole('kasir')">
                                    <input type="radio" name="role" value="kasir" class="hidden"
                                        {{ old('role', 'kasir') === 'kasir' ? 'checked' : '' }}>
                                    <div class="w-10 h-10 rounded-xl flex items-center justify-center text-xl flex-shrink-0"
                                        style="background:#eff6ff">🧑‍💼</div>
                                    <div class="flex-1">
                                        <div class="text-sm font-bold text-gray-800">Kasir</div>
                                        <div class="text-xs text-gray-400 mt-0.5">Akses transaksi &amp; menu</div>
                                    </div>
                                    <div class="w-5 h-5 rounded-full border-2 flex items-center justify-center flex-shrink-0 role-check-kasir"
                                        style="{{ old('role', 'kasir') === 'kasir' ? 'border-color:#0BAB8C;background:#0BAB8C' : 'border-color:#cbd5e1' }}">
                                        @if(old('role', 'kasir') === 'kasir')
                                            <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                                <polyline points="20 6 9 17 4 12"/>
                                            </svg>
                                        @endif
                                    </div>
                                </label>

                                @error('role')
                                    <span class="text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- Actions --}}
                        <div class="flex gap-3">
                            <a href="/users"
                                class="flex-1 py-3 rounded-xl text-sm font-bold text-center border transition-colors"
                                style="background:white;color:#475569;border-color:#e2e8f0">
                                Batal
                            </a>
                            <button type="submit"
                                class="flex-1 py-3 rounded-xl text-sm font-bold text-white transition-colors"
                                style="background:#0BAB8C;box-shadow:0 4px 14px rgba(11,171,140,.25)">
                                ✅ Simpan User
                            </button>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>

    @include('header.navmobile')
    @include('footer.footer')

    <script>
        var currentRole = '{{ old('role', 'kasir') }}';

        function selectRole(role) {
            currentRole = role;
            document.querySelector('input[name="role"][value="' + role + '"]').checked = true;

            var roles = ['owner', 'kasir'];
            roles.forEach(function(r) {
                var card  = document.getElementById('role' + r.charAt(0).toUpperCase() + r.slice(1));
                var check = document.querySelector('.role-check-' + r);
                if (r === role) {
                    card.style.borderColor = '#0BAB8C';
                    card.style.background  = '#e6faf6';
                    check.style.borderColor = '#0BAB8C';
                    check.style.background  = '#0BAB8C';
                    check.innerHTML = '<svg class="w-3 h-3" style="color:white" fill="none" stroke="white" stroke-width="3" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>';
                } else {
                    card.style.borderColor = '#e2e8f0';
                    card.style.background  = '#f8fafb';
                    check.style.borderColor = '#cbd5e1';
                    check.style.background  = 'transparent';
                    check.innerHTML = '';
                }
            });
        }

        function togglePassword(inputId, btn) {
            var input = document.getElementById(inputId);
            var isText = input.type === 'text';
            input.type = isText ? 'password' : 'text';
            btn.querySelector('svg').style.opacity = isText ? '1' : '0.4';
        }
    </script>

</body>