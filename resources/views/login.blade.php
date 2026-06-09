<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasty Station — Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
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

        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            20% {
                transform: translateX(-6px);
            }

            40% {
                transform: translateX(6px);
            }

            60% {
                transform: translateX(-4px);
            }

            80% {
                transform: translateX(4px);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .spin {
            animation: spin 0.8s linear infinite;
            display: inline-block;
        }

        .left-panel::before {
            content: '';
            position: absolute;
            top: -60px;
            right: -60px;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .08);
        }

        .left-panel::after {
            content: '';
            position: absolute;
            bottom: -40px;
            left: -40px;
            width: 160px;
            height: 160px;
            border-radius: 50%;
            background: rgba(0, 0, 0, .1);
        }

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

        .input-field:focus {
            border-color: var(--teal) !important;
            background: #fff !important;
            box-shadow: 0 0 0 4px rgba(11, 171, 140, .12) !important;
            outline: none;
        }

        .eye-btn:hover {
            color: var(--teal);
        }

        ::-webkit-scrollbar {
            width: 3px;
        }

        ::-webkit-scrollbar-thumb {
            background: #ddd;
            border-radius: 999px;
        }
    </style>
</head>


{{-- Opsi 2 --}}
<body class="min-h-screen flex items-center justify-start bg-cover bg-no-repeat relative overflow-hidden px-6 lg:px-20"
    style="
        background-image:url('{{ asset('images/tablet-standing-isolated-table.jpg') }}');
        background-position:center top;">

    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/20"></div>

    <!-- Login Card -->
    <div class="relative z-10 w-full max-w-md
    mx-4 lg:ml-20
    rounded-[32px]
    p-8
    border border-white/10
    backdrop-blur-2xl
    shadow-2xl"
        style="
        background:#080808b8;
        box-shadow:
            0 8px 40px rgba(0,0,0,0.65),
            inset 0 1px 1px rgba(255,255,255,0.04);
    ">

        <!-- Heading -->
        <div class="mb-8 text-center">
            <div class="mb-4 flex justify-center">

                <img src="{{ asset('images/gglogo.png') }}" alt="Logo" class="w-16 h-16 object-contain">
            </div>

            <h1 class="text-3xl font-black tracking-wide drop-shadow-lg" style="color:#d8b452;">
                Cafe & Carwash
            </h1>

            <p class="text-white/55 mt-3 text-sm tracking-wide">
                Login untuk mengakses dashboard restoran
            </p>
        </div>

        <!-- Form -->
        <form action="{{ url('/login-process') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Username -->
            <div>
                <label class="block text-sm font-semibold text-white/90 mb-2">
                    Username
                </label>

                <input type="text" name="username" placeholder="Masukkan Username"
                    class="w-full rounded-2xl
            border border-white/20
            bg-white/10
            backdrop-blur-md
            text-white
            placeholder-white/40
            px-4 py-3.5 text-sm
            focus:outline-none
            focus:ring-2
            focus:ring-[#D4AF37]
            transition duration-300">
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm font-semibold text-white/90 mb-2">
                    Password
                </label>

                <input type="password" name="password" placeholder="Masukkan password"
                    class="w-full rounded-2xl
            border border-white/20
            bg-white/10
            backdrop-blur-md
            text-white
            placeholder-white/40
            px-4 py-3.5 text-sm
            focus:outline-none
            focus:ring-2
            focus:ring-[#D4AF37]
            transition duration-300">
            </div>

            <!-- Button -->
            <button type="submit"
                class="w-full rounded-2xl py-3.5 text-sm font-bold text-white
        transition duration-300
        hover:scale-[1.02]
        hover:brightness-110"
                style="
            background:linear-gradient(135deg, #7a6220 0%, #a68517 50%, #8f7424 100%);">
                Masuk Sekarang
            </button>

        </form>

    </div>

</body>


</html>
