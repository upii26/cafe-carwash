@include('header.head')

<body class="bg-[#F2F2F0] min-h-screen overflow-x-hidden">

    @include('header.sidebar')

    <!-- Overlay sidebar mobile -->
    {{-- <div id="sidebarOverlay" onclick="closeSidebar()"></div> --}}

    <div id="appWrapper" class="flex flex-col min-h-screen">

        @include('header.navbar')

        <!-- MAIN LAYOUT -->
        <div class="main-layout flex flex-1 overflow-hidden">
            {{-- Masukan konten nya di sini --}}

        </div>

    </div>

    @include('header.navmobile')

    @include('footer.footer')
