<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasty Station — Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root {
            --teal: #0BAB8C;
            --teal-d: #089073;
            --teal-xl: #e6faf6;
            --dark: #0f2820;
        }

        * {
            -webkit-tap-highlight-color: transparent;
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            33% { transform: translateY(-14px) rotate(3deg); }
            66% { transform: translateY(-6px) rotate(-2deg); }
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(24px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .fade-up { animation: fadeUp .55s ease both; }
        .fade-up-1 { animation-delay: .05s; }
        .fade-up-2 { animation-delay: .12s; }
        .fade-up-3 { animation-delay: .19s; }
        .fade-up-4 { animation-delay: .26s; }
        .fade-up-5 { animation-delay: .33s; }

        @keyframes slideRight {
            from { opacity: 0; transform: translateX(-30px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .slide-right { animation: slideRight .7s ease both; }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            20% { transform: translateX(-6px); }
            40% { transform: translateX(6px); }
            60% { transform: translateX(-4px); }
            80% { transform: translateX(4px); }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes spin { to { transform: rotate(360deg); } }
        .spin { animation: spin 0.8s linear infinite; display: inline-block; }

        .left-panel::before {
            content: '';
            position: absolute;
            top: -60px; right: -60px;
            width: 200px; height: 200px;
            border-radius: 50%;
            background: rgba(255,255,255,.08);
        }

        .left-panel::after {
            content: '';
            position: absolute;
            bottom: -40px; left: -40px;
            width: 160px; height: 160px;
            border-radius: 50%;
            background: rgba(0,0,0,.1);
        }

        .bubble {
            position: absolute;
            border-radius: 9999px;
            background: rgba(255,255,255,.1);
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(4px);
            border: 1.5px solid rgba(255,255,255,.18);
            animation: float 6s ease-in-out infinite;
        }

        .bubble:nth-child(2) { animation-delay: -1s; }
        .bubble:nth-child(3) { animation-delay: -2.5s; }
        .bubble:nth-child(4) { animation-delay: -4s; }

        .input-field:focus {
            border-color: var(--teal) !important;
            background: #fff !important;
            box-shadow: 0 0 0 4px rgba(11,171,140,.12) !important;
            outline: none;
        }

        .eye-btn:hover { color: var(--teal); }

        ::-webkit-scrollbar { width: 3px; }
        ::-webkit-scrollbar-thumb { background: #ddd; border-radius: 999px; }
    </style>
</head>
<body class="min-h-screen bg-[#f0faf8] font-['Plus_Jakarta_Sans']" style="height:100dvh; display:flex; overflow:hidden;">

    <!-- LEFT PANEL -->
    <div class="left-panel hidden lg:flex flex-col p-8 relative overflow-hidden slide-right"
        style="width:42%; background:#0BAB8C;">

        <div class="bubble" style="width:80px;height:80px;top:15%;left:10%;font-size:32px;">🍔</div>
        <div class="bubble" style="width:60px;height:60px;top:35%;right:12%;font-size:24px;">🍕</div>
        <div class="bubble" style="width:70px;height:70px;bottom:25%;left:18%;font-size:28px;">🍜</div>
        <div class="bubble" style="width:50px;height:50px;top:60%;right:20%;font-size:20px;">☕</div>

        <div class="flex items-center gap-2 w-max px-3 py-2 rounded-full relative z-10"
            style="background:rgba(255,255,255,.15); border:1px solid rgba(255,255,255,.25);">
            <div class="w-7 h-7 bg-white rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4" fill="none" stroke="#0BAB8C" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
            </div>
            <span class="text-xs font-bold text-white tracking-wide">Tasty Station</span>
        </div>

        <div class="flex-1 flex flex-col justify-center mt-6 relative z-10">
            <div class="grid grid-cols-3 gap-2 mb-7">
                <div class="flex flex-col items-center justify-center gap-1 rounded-xl p-3" style="aspect-ratio:1; background:rgba(255,255,255,.1); border:1px solid rgba(255,255,255,.18);">
                    <span class="text-2xl">🍳</span>
                    <span class="text-white text-xs opacity-70">Dapur</span>
                </div>
                <div class="flex flex-col items-center justify-center gap-1 rounded-xl p-3" style="aspect-ratio:1; background:rgba(255,255,255,.1); border:1px solid rgba(255,255,255,.18);">
                    <span class="text-2xl">🧾</span>
                    <span class="text-white text-xs opacity-70">Kasir</span>
                </div>
                <div class="flex flex-col items-center justify-center gap-1 rounded-xl p-3" style="aspect-ratio:1; background:rgba(255,255,255,.1); border:1px solid rgba(255,255,255,.18);">
                    <span class="text-2xl">📊</span>
                    <span class="text-white text-xs opacity-70">Laporan</span>
                </div>
                <div class="flex flex-col items-center justify-center gap-1 rounded-xl p-3" style="aspect-ratio:1; background:rgba(255,255,255,.1); border:1px solid rgba(255,255,255,.18);">
                    <span class="text-2xl">👥</span>
                    <span class="text-white text-xs opacity-70">Staf</span>
                </div>
                <div class="flex flex-col items-center justify-center gap-1 rounded-xl p-3" style="aspect-ratio:1; background:rgba(255,255,255,.1); border:1px solid rgba(255,255,255,.18);">
                    <span class="text-2xl">📦</span>
                    <span class="text-white text-xs opacity-70">Stok</span>
                </div>
                <div class="flex flex-col items-center justify-center gap-1 rounded-xl p-3" style="aspect-ratio:1; background:rgba(255,255,255,.1); border:1px solid rgba(255,255,255,.18);">
                    <span class="text-2xl">⭐</span>
                    <span class="text-white text-xs opacity-70">Menu</span>
                </div>
            </div>

            <h1 class="text-2xl font-extrabold text-white leading-snug mb-3">
                Kelola restoran<br>lebih cerdas
            </h1>
            <p class="text-sm mb-7 leading-relaxed" style="color:rgba(255,255,255,.7);">
                Satu platform untuk kasir, dapur, stok, dan laporan keuangan Anda.
            </p>

            <div class="flex gap-3">
                <div class="flex-1 rounded-2xl p-4" style="background:rgba(255,255,255,.12); border:1px solid rgba(255,255,255,.2);">
                    <span class="block text-xl font-extrabold text-white">1.2rb</span>
                    <span class="block text-xs mt-0.5" style="color:rgba(255,255,255,.65);">Transaksi/hari</span>
                </div>
                <div class="flex-1 rounded-2xl p-4" style="background:rgba(255,255,255,.12); border:1px solid rgba(255,255,255,.2);">
                    <span class="block text-xl font-extrabold text-white">99.9%</span>
                    <span class="block text-xs mt-0.5" style="color:rgba(255,255,255,.65);">Uptime sistem</span>
                </div>
            </div>
        </div>
    </div>

    <!-- RIGHT PANEL -->
    <div class="flex-1 flex flex-col overflow-y-auto bg-white" style="-webkit-overflow-scrolling:touch;">

        <!-- Mobile brand bar -->
        <div class="lg:hidden flex items-center gap-3 px-5 pt-8 pb-6">
            <div class="w-10 h-10 rounded-2xl flex items-center justify-center shadow-lg"
                style="background:#0BAB8C; box-shadow:0 4px 16px rgba(11,171,140,.3)">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
            </div>
            <div>
                <div class="font-bold text-gray-900">Tasty Station</div>
                <div class="text-xs text-gray-400">Restaurant POS System</div>
            </div>
        </div>

        <!-- Form container -->
        <div class="flex-1 flex items-center justify-center px-5 sm:px-8 lg:px-12 xl:px-16 pb-8 lg:py-10">
            <div class="w-full max-w-sm lg:max-w-md">

                <!-- Heading -->
                <div class="fade-up fade-up-1 mb-8">
                    <div class="w-10 h-10 rounded-xl flex items-center justify-center mb-4" style="background:#0BAB8C;">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <rect x="3" y="11" width="18" height="11" rx="2" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11V7a5 5 0 0110 0v4" />
                        </svg>
                    </div>
                    <h2 class="text-2xl md:text-3xl font-extrabold text-gray-900 leading-tight">
                        Selamat datang 👋
                    </h2>
                    <p class="text-sm text-gray-400 mt-2">Masuk untuk mengakses dashboard kasir Anda</p>
                </div>

                <!-- Error banner -->
                <div id="loginErr"
                    class="hidden items-center gap-2.5 rounded-xl px-4 py-3 mb-4 text-sm font-medium"
                    style="background:#FCEBEB; border:0.5px solid #F09595; color:#A32D2D;">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="#E24B4A" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01" />
                    </svg>
                    <span>Email atau password salah. Coba lagi.</span>
                </div>

                <!-- Form -->
                <form onsubmit="handleLogin(event)" class="flex flex-col gap-4">

                    <!-- Email -->
                    <div class="fade-up fade-up-2">
                        <label class="block text-xs font-semibold text-gray-500 mb-1.5 ml-1">Alamat email</label>
                        <div class="relative">
                            <svg class="w-4 h-4 text-gray-400 absolute left-4 top-1/2 -translate-y-1/2 pointer-events-none"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <input id="email" type="email"
                                class="input-field w-full pl-10 pr-4 py-3.5 text-sm rounded-xl border border-gray-200 bg-gray-50 text-gray-800 transition"
                                placeholder="nama@restoran.com" autocomplete="email">
                        </div>
                        <p id="emailErr" class="hidden text-xs text-red-500 mt-1.5 ml-1">Masukkan email yang valid</p>
                    </div>

                    <!-- Password -->
                    <div class="fade-up fade-up-3">
                        <label class="block text-xs font-semibold text-gray-500 mb-1.5 ml-1">Password</label>
                        <div class="relative">
                            <svg class="w-4 h-4 text-gray-400 absolute left-4 top-1/2 -translate-y-1/2 pointer-events-none"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <rect x="3" y="11" width="18" height="11" rx="2" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11V7a5 5 0 0110 0v4" />
                            </svg>
                            <input id="password" type="password"
                                class="input-field w-full pl-10 pr-10 py-3.5 text-sm rounded-xl border border-gray-200 bg-gray-50 text-gray-800 transition"
                                placeholder="Masukkan password" autocomplete="current-password">
                            <button type="button" onclick="togglePassword()"
                                class="eye-btn absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 transition p-1">
                                <svg id="eyeIcon" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                        <p id="passErr" class="hidden text-xs text-red-500 mt-1.5 ml-1">Password minimal 6 karakter</p>
                    </div>

                    <!-- Forgot -->
                    <div class="fade-up fade-up-4 flex justify-end -mt-2">
                        <a href="#" class="text-xs font-semibold" style="color:#0BAB8C;">Lupa password?</a>
                    </div>

                    <!-- Submit -->
                    <div class="fade-up fade-up-5">
                        <button id="loginBtn" type="submit"
                            class="w-full flex items-center justify-center gap-2 py-3.5 rounded-xl text-sm font-bold text-white transition hover:opacity-90 active:scale-[.98]"
                            style="background:#0BAB8C; box-shadow:0 4px 20px rgba(11,171,140,.35);">
                            <span id="btnText">Masuk Sekarang</span>
                            <span id="btnLoader" class="hidden items-center gap-2">
                                <svg class="w-4 h-4 spin" fill="none" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="3" stroke-dasharray="30 60" opacity=".4" />
                                    <path fill="currentColor" d="M4 12a8 8 0 018-8v3a5 5 0 00-5 5H4z" />
                                </svg>
                                Memproses...
                            </span>
                            <svg id="btnArrow" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- SUCCESS OVERLAY -->
    <div id="successOverlay"
        class="fixed inset-0 z-50 hidden flex-col items-center justify-center text-center px-8"
        style="background:#0BAB8C; animation:fadeIn .4s ease both;">
        <div class="w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4"
            style="background:rgba(255,255,255,.2);">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
            </svg>
        </div>
        <h3 class="text-xl font-extrabold text-white mb-2">Login Berhasil!</h3>
        <p class="text-sm mb-6" style="color:rgba(255,255,255,.7);">Mengarahkan ke dashboard kasir...</p>
        <div class="rounded-full overflow-hidden" style="width:160px; height:4px; background:rgba(255,255,255,.2);">
            <div id="progressBar" class="h-full rounded-full"
                style="background:white; width:0; transition:width 2s ease;"></div>
        </div>
    </div>

    <script>
        let passVisible = false;

        function togglePassword() {
            passVisible = !passVisible;
            const inp = document.getElementById('password');
            const icon = document.getElementById('eyeIcon');
            inp.type = passVisible ? 'text' : 'password';
            icon.innerHTML = passVisible
                ? `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>`
                : `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>`;
        }

        document.querySelectorAll('.input-field').forEach(inp => {
            inp.addEventListener('focus', () => {
                inp.closest('.relative').style.transform = 'scale(1.01)';
                inp.closest('.relative').style.transition = 'transform .2s';
            });
            inp.addEventListener('blur', () => {
                inp.closest('.relative').style.transform = 'scale(1)';
            });
        });

        function handleLogin(e) {
            e.preventDefault();
            const email = document.getElementById('email').value.trim();
            const pass = document.getElementById('password').value;
            let valid = true;

            document.getElementById('emailErr').classList.add('hidden');
            document.getElementById('passErr').classList.add('hidden');
            document.getElementById('loginErr').classList.add('hidden');
            document.getElementById('email').style.borderColor = '';
            document.getElementById('password').style.borderColor = '';

            if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                document.getElementById('emailErr').classList.remove('hidden');
                document.getElementById('email').style.borderColor = '#E24B4A';
                valid = false;
            }
            if (!pass || pass.length < 6) {
                document.getElementById('passErr').classList.remove('hidden');
                document.getElementById('password').style.borderColor = '#E24B4A';
                valid = false;
            }
            if (!valid) return;

            document.getElementById('btnText').classList.add('hidden');
            document.getElementById('btnArrow').classList.add('hidden');
            document.getElementById('btnLoader').classList.remove('hidden');
            document.getElementById('btnLoader').classList.add('flex');
            document.getElementById('loginBtn').disabled = true;

            setTimeout(() => {
                if (email === 'admin@tasty.com' && pass === 'admin123') {
                    showSuccess();
                } else {
                    document.getElementById('btnText').classList.remove('hidden');
                    document.getElementById('btnArrow').classList.remove('hidden');
                    document.getElementById('btnLoader').classList.add('hidden');
                    document.getElementById('btnLoader').classList.remove('flex');
                    document.getElementById('loginBtn').disabled = false;
                    document.getElementById('loginErr').classList.remove('hidden');
                    document.getElementById('loginErr').classList.add('flex');
                    document.getElementById('loginBtn').style.animation = 'shake .4s ease';
                    setTimeout(() => document.getElementById('loginBtn').style.animation = '', 400);
                }
            }, 1400);
        }

        function showSuccess() {
            const overlay = document.getElementById('successOverlay');
            overlay.classList.remove('hidden');
            overlay.classList.add('flex');
            setTimeout(() => {
                document.getElementById('progressBar').style.width = '100%';
            }, 100);
            setTimeout(() => {
                alert('Redirect ke dashboard (sesuaikan URL tujuan)');
                // window.location.href = 'dashboard.html';
            }, 2200);
        }
    </script>
</body>
</html>
