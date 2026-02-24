@include('header.head')
<body class="bg-[#F0FBF8] h-screen overflow-hidden">
    @include('header.sidebar')
    <div id="panelOverlay" onclick="closePanel()"></div>
    <div id="appWrapper" class="flex flex-col h-screen">
        @include('header.navbar')

        <!-- ═══ MAIN LAYOUT ROW ═══ -->
        <div class="main-layout flex flex-1 overflow-hidden" style="height:calc(100vh - 56px)">
          {{-- isi konten main disini --}}

      @include('header.navmobile')

    </div><!-- end #appWrapper -->

   \
</body>