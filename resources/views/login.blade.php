@include('header.head')
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

    /* ── LEFT PANEL illustrations ── */
    .left-panel {
        background: linear-gradient(145deg, #0d3d2e 0%, #0BAB8C 60%, #14d4ac 100%);
        position: relative;
        overflow: hidden;
    }

    .left-panel::before {
        content: '';
        position: absolute;
        inset: 0;
        background:
            radial-gradient(circle at 20% 20%, rgba(255, 255, 255, .08) 0%, transparent 50%),
            radial-gradient(circle at 80% 80%, rgba(0, 0, 0, .15) 0%, transparent 50%);
    }

    /* floating food bubbles */
    .bubble {
        position: absolute;
        border-radius: 9999px;
        background: rgba(255, 255, 255, .1);
        display: flex;
        align-items: center;
        justify-content: center;
        backdrop-filter: blur(4px);
        border: 1.5px solid rgba(255, 255, 255, .18);
        animation: float 6s ease-in-out infinite;
    }

    .bubble:nth-child(2) {
        animation-delay: -1s;
    }

    .bubble:nth-child(3) {
        animation-delay: -2.5s;
    }

    .bubble:nth-child(4) {
        animation-delay: -4s;
    }

    .bubble:nth-child(5) {
        animation-delay: -0.8s;
    }

    .bubble:nth-child(6) {
        animation-delay: -3s;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px) rotate(0deg);
        }

        33% {
            transform: translateY(-14px) rotate(3deg);
        }

        66% {
            transform: translateY(-6px) rotate(-2deg);
        }
    }

    /* ── Input styles ── */
    .input-field {
        width: 100%;
        padding: 14px 16px 14px 48px;
        background: #f8fafb;
        border: 1.5px solid #e5e9eb;
        border-radius: 14px;
        font-size: 14px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        color: #1a2e25;
        transition: border-color .2s, box-shadow .2s, background .2s;
        outline: none;
    }

    .input-field:focus {
        border-color: var(--teal);
        background: #fff;
        box-shadow: 0 0 0 4px rgba(11, 171, 140, .12);
    }

    .input-field::placeholder {
        color: #a0adb4;
    }

    /* ── Button ── */
    .btn-primary {
        width: 100%;
        padding: 15px;
        background: var(--teal);
        color: white;
        border: none;
        border-radius: 14px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 15px;
        font-weight: 700;
        cursor: pointer;
        transition: background .2s, transform .15s, box-shadow .2s;
        box-shadow: 0 4px 20px rgba(11, 171, 140, .35);
    }

    .btn-primary:hover {
        background: var(--teal-d);
        box-shadow: 0 6px 24px rgba(11, 171, 140, .4);
    }

    .btn-primary:active {
        transform: scale(0.98);
    }

    /* ── Checkbox ── */
    .custom-check {
        appearance: none;
        -webkit-appearance: none;
        width: 18px;
        height: 18px;
        border: 1.5px solid #d1d9df;
        border-radius: 6px;
        cursor: pointer;
        position: relative;
        transition: border-color .2s, background .2s;
        flex-shrink: 0;
    }

    .custom-check:checked {
        background: var(--teal);
        border-color: var(--teal);
    }

    .custom-check:checked::after {
        content: '';
        position: absolute;
        left: 4px;
        top: 1.5px;
        width: 6px;
        height: 10px;
        border: 2px solid white;
        border-top: none;
        border-left: none;
        transform: rotate(45deg);
    }

    /* ── Eye toggle ── */
    .eye-btn {
        transition: color .15s;
    }

    .eye-btn:hover {
        color: var(--teal);
    }

    /* ── Page load animation ── */
    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(24px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .fade-up {
        animation: fadeUp .55s ease both;
    }

    .fade-up-1 {
        animation-delay: .05s;
    }

    .fade-up-2 {
        animation-delay: .12s;
    }

    .fade-up-3 {
        animation-delay: .19s;
    }

    .fade-up-4 {
        animation-delay: .26s;
    }

    .fade-up-5 {
        animation-delay: .33s;
    }

    .fade-up-6 {
        animation-delay: .40s;
    }

    /* ── Left panel slide in ── */
    @keyframes slideRight {
        from {
            opacity: 0;
            transform: translateX(-30px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .slide-right {
        animation: slideRight .7s ease both;
    }

    /* ── Divider ── */
    .divider {
        position: relative;
        text-align: center;
    }

    .divider::before,
    .divider::after {
        content: '';
        position: absolute;
        top: 50%;
        width: calc(50% - 24px);
        height: 1px;
        background: #e5e9eb;
    }

    .divider::before {
        left: 0;
    }

    .divider::after {
        right: 0;
    }

    /* ── Social buttons ── */
    .btn-social {
        flex: 1;
        padding: 12px;
        border: 1.5px solid #e5e9eb;
        border-radius: 12px;
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 13px;
        font-weight: 600;
        color: #4a5568;
        cursor: pointer;
        transition: border-color .2s, background .2s, box-shadow .2s;
    }

    .btn-social:hover {
        border-color: #c0cdd6;
        background: #f8fafb;
        box-shadow: 0 2px 8px rgba(0, 0, 0, .06);
    }

    .btn-social:active {
        transform: scale(0.98);
    }

    /* ── Scrollbar ── */
    ::-webkit-scrollbar {
        width: 3px;
    }

    ::-webkit-scrollbar-thumb {
        background: #ddd;
        border-radius: 999px;
    }

    /* ── Stats cards on left panel ── */
    .stat-card {
        background: rgba(255, 255, 255, .12);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, .2);
        border-radius: 16px;
        padding: 16px 20px;
    }
</style>

<body class="min-h-screen bg-[#f0faf8]" style="height:100dvh; display:flex; overflow:hidden;">



    <!-- ═══ RIGHT PANEL — Form ═══ -->
    <div class="flex-1 flex flex-col overflow-y-auto" style="-webkit-overflow-scrolling:touch;">

        <!-- Mobile/Tablet top brand bar -->
        <div class="lg:hidden flex items-center gap-3 px-5 pt-8 pb-6">
            <div class="w-10 h-10 bg-[var(--teal)] rounded-2xl flex items-center justify-center shadow-lg"
                style="box-shadow:0 4px 16px rgba(11,171,140,.3)">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
            </div>
            <div>
                <div class="font-bold text-gray-900" style="font-family:'Fraunces',serif;">Tasty Station</div>
                <div class="text-xs text-gray-400">Restaurant POS System</div>
            </div>
        </div>

        <!-- Form container -->
        <div class="flex-1 flex items-center justify-center px-5 sm:px-8 lg:px-12 xl:px-16 pb-8 lg:py-10">
            <div class="w-full max-w-sm lg:max-w-md">

                <!-- Heading -->
                <div class="fade-up fade-up-1 mb-8">
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 leading-tight"
                        style="font-family:'Fraunces',serif;">
                        Masuk ke Akun Anda
                    </h2>
                    <p class="text-sm text-gray-400 mt-2">Masukkan email password untuk melanjutkan ke dashboard</p>
                </div>

                <!-- Form -->
                <form onsubmit="handleLogin(event)" class="flex flex-col gap-4">

                    <!-- Email -->
                    <div class="fade-up fade-up-2">
                        <label class="block text-xs font-semibold text-gray-600 mb-1.5 ml-1">Email</label>
                        <div class="relative">
                            <svg class="w-4 h-4 text-gray-400 absolute left-4 top-1/2 -translate-y-1/2 pointer-events-none"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <input id="email" type="email" class="input-field" placeholder="nama@restoran.com"
                                autocomplete="email">
                        </div>
                        <p id="emailErr" class="hidden text-xs text-red-500 mt-1.5 ml-1">Masukkan email yang valid</p>
                    </div>

                    <!-- Password -->
                    <div class="fade-up fade-up-3">
                        <label class="block text-xs font-semibold text-gray-600 mb-1.5 ml-1">Password</label>
                        <div class="relative">
                            <svg class="w-4 h-4 text-gray-400 absolute left-4 top-1/2 -translate-y-1/2 pointer-events-none"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <rect x="3" y="11" width="18" height="11" rx="2" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 11V7a5 5 0 0110 0v4" />
                            </svg>
                            <input id="password" type="password" class="input-field" placeholder="Masukkan password"
                                autocomplete="current-password">
                            <button type="button" onclick="togglePassword()"
                                class="eye-btn absolute right-4 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg id="eyeIcon" class="w-4 h-4" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                        <p id="passErr" class="hidden text-xs text-red-500 mt-1.5 ml-1">Password minimal 6 karakter
                        </p>
                    </div>

                    <!-- Error banner -->
                    <div id="loginErr"
                        class="hidden bg-red-50 border border-red-200 rounded-xl px-4 py-3 flex items-center gap-2.5">
                        <svg class="w-4 h-4 text-red-500 flex-shrink-0" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01" />
                        </svg>
                        <span class="text-sm text-red-600 font-medium">Email atau password salah</span>
                    </div>

                    <!-- Submit -->
                    <div class="fade-up fade-up-5">
                        <button id="loginBtn" type="submit" class="btn-primary">
                            <span id="btnText">Masuk Sekarang</span>
                            <span id="btnLoader" class="hidden inline-flex items-center gap-2">
                                <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="3" stroke-dasharray="30 60" opacity=".4" />
                                    <path fill="currentColor" d="M4 12a8 8 0 018-8v3a5 5 0 00-5 5H4z" />
                                </svg>
                                Memproses...
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ═══════════ SUCCESS OVERLAY ═══════════ -->
    <div id="successOverlay"
        class="fixed inset-0 z-50 flex flex-col items-center justify-center bg-[var(--teal)] hidden">
        <div id="successContent" class="text-center px-8">
            <div class="w-20 h-20 bg-white/20 rounded-3xl flex items-center justify-center mx-auto mb-5 text-5xl">✅
            </div>
            <h3 class="text-white font-bold text-2xl mb-2" style="font-family:'Fraunces',serif;">Login Berhasil!</h3>
            <p class="text-white/70 text-sm">Mengarahkan ke dashboard...</p>
            <div class="mt-6 w-48 h-1 bg-white/20 rounded-full mx-auto overflow-hidden">
                <div id="progressBar" class="h-full bg-white rounded-full"
                    style="width:0%;transition:width 2s ease;"></div>
            </div>
        </div>
    </div>

    <script>
        /* ── Toggle password ── */
        let passVisible = false;

        function togglePassword() {
            passVisible = !passVisible;
            const inp = document.getElementById('password');
            const icon = document.getElementById('eyeIcon');
            inp.type = passVisible ? 'text' : 'password';
            icon.innerHTML = passVisible ?
                `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>` :
                `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>`;
        }

        /* ── Input focus lift effect ── */
        document.querySelectorAll('.input-field').forEach(inp => {
            inp.addEventListener('focus', () => {
                inp.closest('.relative').style.transform = 'scale(1.01)';
                inp.closest('.relative').style.transition = 'transform .2s';
            });
            inp.addEventListener('blur', () => {
                inp.closest('.relative').style.transform = 'scale(1)';
            });
        });

        /* ── Login handler ── */
        function handleLogin(e) {
            e.preventDefault();
            const email = document.getElementById('email').value.trim();
            const pass = document.getElementById('password').value;
            let valid = true;

            // Reset
            document.getElementById('emailErr').classList.add('hidden');
            document.getElementById('passErr').classList.add('hidden');
            document.getElementById('loginErr').classList.add('hidden');

            // Validate
            if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                document.getElementById('emailErr').classList.remove('hidden');
                document.getElementById('email').style.borderColor = '#f87171';
                valid = false;
            } else {
                document.getElementById('email').style.borderColor = '';
            }

            if (!pass || pass.length < 6) {
                document.getElementById('passErr').classList.remove('hidden');
                document.getElementById('password').style.borderColor = '#f87171';
                valid = false;
            } else {
                document.getElementById('password').style.borderColor = '';
            }

            if (!valid) return;

            // Show loader
            document.getElementById('btnText').classList.add('hidden');
            document.getElementById('btnLoader').classList.remove('hidden');
            document.getElementById('loginBtn').disabled = true;

            setTimeout(() => {
                // Check demo credentials
                if (email === 'admin@tasty.com' && pass === 'admin123') {
                    showSuccess();
                } else {
                    document.getElementById('btnText').classList.remove('hidden');
                    document.getElementById('btnLoader').classList.add('hidden');
                    document.getElementById('loginBtn').disabled = false;
                    document.getElementById('loginErr').classList.remove('hidden');
                    // Shake animation
                    document.getElementById('loginBtn').style.animation = 'none';
                    document.getElementById('loginBtn').offsetHeight;
                    document.getElementById('loginBtn').style.animation = 'shake .4s ease';
                }
            }, 1400);
        }

        function showSuccess() {
            const overlay = document.getElementById('successOverlay');
            overlay.classList.remove('hidden');
            overlay.style.animation = 'fadeIn .4s ease both';
            setTimeout(() => {
                const bar = document.getElementById('progressBar');
                bar.style.width = '100%';
            }, 100);
            setTimeout(() => {
                // Redirect to dashboard
                window.location.href = 'tasty-station.html';
            }, 2200);
        }

        /* ── Shake keyframe for wrong credentials ── */
        const style = document.createElement('style');
        style.textContent = `
    @keyframes shake {
      0%,100%{transform:translateX(0)}
      20%{transform:translateX(-6px)}
      40%{transform:translateX(6px)}
      60%{transform:translateX(-4px)}
      80%{transform:translateX(4px)}
    }
    @keyframes fadeIn {
      from{opacity:0} to{opacity:1}
    }
    #successOverlay { animation: fadeIn .4s ease both; }
  `;
        document.head.appendChild(style);

        /* ── Fix bg color on right panel for desktop ── */
        function updateBg() {
            const right = document.querySelector('.flex-1.flex.flex-col');
            if (right && window.innerWidth >= 1024) {
                right.style.background = '#ffffff';
            } else if (right) {
                right.style.background = '#f0faf8';
            }
        }
        updateBg();
        window.addEventListener('resize', updateBg);
    </script>
</body>

</html>
