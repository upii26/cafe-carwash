@include('header.head')
<style>
    *,
    *::before,
    *::after {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        -webkit-tap-highlight-color: transparent
    }

    :root {
        --green: #0BAB8C;
        --green-2: #089073;
        --green-3: #065f46;
        --green-bg: #e6faf6;
        --green-glow: rgba(11, 171, 140, .18);
        --bg: #F2F2F0;
        --sidebar-w: 220px;
        --nav-h: 56px;
        --white: #fff;
        --s50: #f8fafb;
        --s100: #f1f5f9;
        --s200: #e2e8f0;
        --s300: #cbd5e1;
        --s400: #94a3b8;
        --s500: #64748b;
        --s600: #475569;
        --s700: #334155;
        --s800: #1e293b;
        --s900: #0f172a;
        --red: #ef4444;
        --red-bg: #fef2f2;
        --amber: #f59e0b;
        --amber-bg: #fffbeb;
        --blue: #3b82f6;
        --blue-bg: #eff6ff;
        --card-r: 18px;
        --sm-r: 10px;
        --md-r: 13px;
        --shadow: 0 1px 3px rgba(0, 0, 0, .06), 0 4px 16px rgba(0, 0, 0, .06);
        --shadow-lg: 0 8px 32px rgba(0, 0, 0, .10);
        --border: 1px solid rgba(0, 0, 0, .07);
        --transition: .18s cubic-bezier(.4, 0, .2, 1);
    }

    html,
    body {
        height: 100%;
        overflow: hidden;
        font-family: 'Plus Jakarta Sans', sans-serif
    }

    body {
        background: var(--bg);
        color: var(--s800);
        display: flex;
        font-size: 14px;
        line-height: 1.5
    }

    .app-wrap {
        margin-left: var(--sidebar-w);
        flex: 1;
        display: flex;
        flex-direction: column;
        height: 100vh;
        overflow: hidden;
    }

    .navbar {
        height: var(--nav-h);
        background: rgba(255, 255, 255, .92);
        backdrop-filter: blur(16px);
        border-bottom: var(--border);
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 20px;
        flex-shrink: 0;
        position: relative;
        z-index: 40;
    }

    .navbar-left {
        display: flex;
        align-items: center;
        gap: 8px
    }

    .back-btn {
        width: 32px;
        height: 32px;
        border-radius: 9px;
        background: var(--s100);
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: background var(--transition);
        color: var(--s600);
    }

    .back-btn:hover {
        background: var(--s200)
    }

    .back-btn svg {
        width: 14px;
        height: 14px;
        stroke: currentColor;
        fill: none;
        stroke-width: 2.5;
        stroke-linecap: round;
        stroke-linejoin: round
    }

    .page-title {
        font-size: 14px;
        font-weight: 800;
        color: var(--s900)
    }

    .page-sub {
        font-size: 10.5px;
        color: var(--s400);
        margin-top: 1px
    }

    .navbar-right {
        display: flex;
        align-items: center;
        gap: 8px
    }

    .step-pill {
        background: var(--green-bg);
        color: var(--green);
        font-size: 11px;
        font-weight: 700;
        padding: 5px 12px;
        border-radius: 99px;
        border: 1px solid rgba(11, 171, 140, .2);
    }

    .nav-icon-btn {
        width: 34px;
        height: 34px;
        border-radius: 9px;
        border: none;
        background: transparent;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--s500);
        transition: background var(--transition);
        position: relative;
    }

    .nav-icon-btn:hover {
        background: var(--s100)
    }

    .nav-icon-btn svg {
        width: 18px;
        height: 18px;
        stroke: currentColor;
        fill: none;
        stroke-width: 1.8;
        stroke-linecap: round;
        stroke-linejoin: round
    }

    .notif-dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: var(--red);
        position: absolute;
        top: 6px;
        right: 6px;
        border: 1.5px solid var(--white);
    }

    .page-body {
        flex: 1;
        overflow-y: auto;
        overflow-x: hidden;
        -webkit-overflow-scrolling: touch;
        padding: 20px 20px 80px;
    }

    .stepper {
        display: flex;
        align-items: center;
        gap: 0;
        margin-bottom: 20px;
        background: var(--white);
        border-radius: 12px;
        padding: 14px 16px;
        box-shadow: var(--shadow);
        border: var(--border);
    }

    .step {
        display: flex;
        align-items: center;
        gap: 8px;
        flex: 1
    }

    .step-dot {
        width: 26px;
        height: 26px;
        border-radius: 50%;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 10px;
        font-weight: 800;
        transition: all var(--transition);
    }

    .step-dot.done {
        background: var(--green);
        color: #fff
    }

    .step-dot.active {
        background: var(--green);
        color: #fff;
        box-shadow: 0 0 0 4px var(--green-bg)
    }

    .step-dot.idle {
        background: var(--s100);
        color: var(--s400)
    }

    .step-info {
        flex: 1
    }

    .step-label {
        font-size: 11px;
        font-weight: 700;
        color: var(--s700)
    }

    .step-label.idle {
        color: var(--s400)
    }

    .step-desc {
        font-size: 9.5px;
        color: var(--s400);
        margin-top: 1px
    }

    .step-line {
        flex: 1;
        height: 1.5px;
        background: var(--s200);
        border-radius: 1px;
        max-width: 40px;
        margin: 0 6px
    }

    .step-line.done {
        background: var(--green)
    }

    .layout-row {
        display: flex;
        gap: 18px;
        align-items: flex-start;
    }

    .form-col {
        flex: 1;
        min-width: 0;
        display: flex;
        flex-direction: column;
        gap: 14px;
    }

    .preview-col {
        width: 244px;
        flex-shrink: 0;
        position: sticky;
        top: 0;
    }

    .card {
        background: var(--white);
        border-radius: var(--card-r);
        padding: 18px;
        box-shadow: var(--shadow);
        border: var(--border);
        animation: fadeUp .35s ease both;
    }

    .card:nth-child(1) {
        animation-delay: .04s
    }

    .card:nth-child(2) {
        animation-delay: .08s
    }

    .card:nth-child(3) {
        animation-delay: .12s
    }

    .card:nth-child(4) {
        animation-delay: .16s
    }

    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(10px)
        }

        to {
            opacity: 1;
            transform: translateY(0)
        }
    }

    .card-head {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 16px
    }

    .card-num {
        width: 22px;
        height: 22px;
        border-radius: 7px;
        background: var(--green);
        color: #fff;
        font-size: 9.5px;
        font-weight: 800;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .card-title {
        font-size: 13px;
        font-weight: 800;
        color: var(--s900)
    }

    .card-subtitle {
        font-size: 11px;
        color: var(--s400);
        margin-left: auto
    }

    .field {
        display: flex;
        flex-direction: column;
        gap: 5px
    }

    .field-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px
    }

    label.lbl {
        font-size: 10.5px;
        font-weight: 700;
        color: var(--s500);
        text-transform: uppercase;
        letter-spacing: .04em
    }

    .req {
        color: var(--red)
    }

    .opt {
        font-weight: 500;
        color: var(--s300);
        text-transform: none;
        letter-spacing: 0
    }

    input[type=text],
    input[type=number],
    select,
    textarea {
        padding: 9px 12px;
        background: var(--s50);
        border: 1.5px solid var(--s200);
        border-radius: var(--sm-r);
        font-size: 13px;
        color: var(--s800);
        font-family: inherit;
        outline: none;
        transition: all var(--transition);
        width: 100%;
    }

    input:focus,
    select:focus,
    textarea:focus {
        border-color: var(--green);
        background: var(--white);
        box-shadow: 0 0 0 3px var(--green-glow);
    }

    input::placeholder,
    textarea::placeholder {
        color: var(--s300)
    }

    input.err,
    select.err {
        border-color: var(--red);
        background: var(--red-bg)
    }

    textarea {
        resize: vertical;
        min-height: 70px
    }

    .inp-wrap {
        position: relative
    }

    .inp-pre {
        position: absolute;
        left: 11px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 11.5px;
        font-weight: 700;
        color: var(--s400);
        pointer-events: none;
    }

    .inp-wrap input {
        padding-left: 34px
    }

    .field-err {
        font-size: 10.5px;
        color: var(--red);
        display: none
    }

    .field-err.show {
        display: block
    }

    .upload-zone {
        border: 2px dashed var(--s200);
        border-radius: 14px;
        background: var(--s50);
        text-align: center;
        padding: 22px 16px;
        cursor: pointer;
        transition: all var(--transition);
    }

    .upload-zone:hover,
    .upload-zone.drag {
        border-color: var(--green);
        background: var(--green-bg)
    }

    .upload-zone input {
        display: none
    }

    .upload-icon {
        font-size: 2.2rem;
        margin-bottom: 8px;
        display: block
    }

    .upload-title {
        font-size: 13px;
        font-weight: 700;
        color: var(--s700)
    }

    .upload-hint {
        font-size: 11px;
        color: var(--s400);
        margin-top: 3px
    }

    #uploadPreviewWrap {
        display: none
    }

    #uploadPreviewWrap img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 12px;
        margin: 0 auto 8px;
        display: block;
        box-shadow: 0 4px 12px rgba(0, 0, 0, .12)
    }

    .upload-fname {
        font-size: 11px;
        color: var(--green);
        font-weight: 600
    }

    .remove-btn {
        margin-top: 5px;
        background: none;
        border: none;
        font-size: 11px;
        color: var(--red);
        cursor: pointer;
        font-weight: 600
    }

    .remove-btn:hover {
        text-decoration: underline
    }

    .actions {
        display: flex;
        gap: 10px;
        animation: fadeUp .35s .24s ease both
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        padding: 10px 16px;
        border-radius: 11px;
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
        border: none;
        transition: all var(--transition);
        font-family: inherit;
        white-space: nowrap;
    }

    .btn-ghost {
        background: var(--white);
        color: var(--s600);
        flex: 1;
        border: 1.5px solid var(--s200)
    }

    .btn-ghost:hover {
        background: var(--s50);
        border-color: var(--s300)
    }

    .btn-main {
        background: var(--green);
        color: #fff;
        flex: 1.6;
        box-shadow: 0 4px 14px var(--green-glow)
    }

    .btn-main:hover {
        background: var(--green-2);
        box-shadow: 0 6px 18px var(--green-glow)
    }

    .btn-main:active,
    .btn-ghost:active {
        transform: scale(.97)
    }

    .preview-label {
        font-size: 9.5px;
        font-weight: 800;
        color: var(--s400);
        letter-spacing: .1em;
        text-transform: uppercase;
        margin-bottom: 10px;
    }

    .menu-card {
        background: var(--white);
        border-radius: 18px;
        overflow: hidden;
        box-shadow: var(--shadow-lg);
        border: var(--border);
        animation: fadeUp .3s .28s ease both;
        transition: transform .2s, box-shadow .2s;
    }

    .menu-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 40px rgba(0, 0, 0, .13)
    }

    .mc-img {
        width: 100%;
        height: 148px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.8rem;
        overflow: hidden;
        background: var(--green-bg);
        transition: background .3s;
    }

    .mc-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block
    }

    .mc-body {
        padding: 14px
    }

    .mc-badges {
        display: flex;
        gap: 4px;
        flex-wrap: wrap;
        margin-bottom: 5px;
        min-height: 16px
    }

    .mc-badge {
        font-size: 9px;
        font-weight: 800;
        padding: 2px 6px;
        border-radius: 5px
    }

    .mc-cat {
        font-size: 9.5px;
        color: var(--s400);
        font-weight: 500;
        margin-bottom: 2px
    }

    .mc-name {
        font-size: 13px;
        font-weight: 800;
        color: var(--s900);
        line-height: 1.3;
        margin-bottom: 4px
    }

    .mc-desc {
        font-size: 10.5px;
        color: var(--s400);
        line-height: 1.5;
        margin-bottom: 10px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .mc-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 8px
    }

    .mc-price {
        font-size: 14px;
        font-weight: 800;
        color: var(--s900)
    }

    .mc-qty {
        display: flex;
        align-items: center;
        gap: 6px
    }

    .qty-btn {
        width: 25px;
        height: 25px;
        border-radius: 50%;
        border: none;
        cursor: pointer;
        font-size: 13px;
        font-weight: 800;
        display: flex;
        align-items: center;
        justify-content: center;
        line-height: 1;
    }

    .qty-m {
        background: var(--s100);
        color: var(--s600)
    }

    .qty-p {
        background: var(--green);
        color: #fff
    }

    .qty-v {
        font-size: 12px;
        font-weight: 700;
        color: var(--s800);
        width: 14px;
        text-align: center
    }

    /* ── COMPLETENESS CARD (kanan bawah) ── */
    .meta-card {
        margin-top: 10px;
        background: var(--white);
        border-radius: 12px;
        padding: 10px 13px;
        box-shadow: var(--shadow);
        border: var(--border);
        animation: fadeUp .3s .32s ease both;
    }

    .meta-row {
        display: flex;
        justify-content: space-between;
        padding: 5px 0;
        font-size: 11px;
        color: var(--s400);
        border-bottom: 1px solid var(--s100);
        align-items: center;
        gap: 6px;
    }

    .meta-row:last-child {
        border-bottom: none
    }

    .meta-row strong {
        color: var(--s700);
        font-weight: 600;
        text-align: right
    }

    .complete-card {
        margin-top: 10px;
        background: var(--white);
        border-radius: 12px;
        padding: 10px 13px;
        box-shadow: var(--shadow);
        border: var(--border);
        animation: fadeUp .3s .36s ease both;
    }

    .complete-head {
        display: flex;
        justify-content: space-between;
        font-size: 11px;
        margin-bottom: 7px;
        align-items: center
    }

    .complete-head span {
        font-weight: 700
    }

    .bar-bg {
        height: 6px;
        background: var(--s100);
        border-radius: 99px;
        overflow: hidden
    }

    .bar-fill {
        height: 100%;
        border-radius: 99px;
        transition: width .5s ease, background .4s;
        width: 0%
    }

    .complete-list {
        margin-top: 10px;
        display: flex;
        flex-direction: column;
        gap: 4px
    }

    .complete-item {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 10.5px;
        color: var(--s400)
    }

    .complete-item.done {
        color: var(--green)
    }

    .ci-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: var(--s200);
        flex-shrink: 0;
        transition: background .2s
    }

    .complete-item.done .ci-dot {
        background: var(--green)
    }

    #toast {
        position: fixed;
        bottom: 24px;
        left: 50%;
        transform: translateX(-50%) translateY(20px);
        padding: 11px 20px;
        border-radius: 12px;
        font-size: 13px;
        font-weight: 700;
        color: #fff;
        box-shadow: 0 8px 24px rgba(0, 0, 0, .15);
        z-index: 9999;
        opacity: 0;
        pointer-events: none;
        transition: opacity .3s, transform .3s;
        white-space: nowrap;
    }

    #toast.show {
        opacity: 1;
        transform: translateX(-50%) translateY(0)
    }

    ::-webkit-scrollbar {
        width: 4px;
        height: 4px
    }

    ::-webkit-scrollbar-thumb {
        background: var(--s200);
        border-radius: 99px
    }

    ::-webkit-scrollbar-track {
        background: transparent
    }
</style>
</head>

<body>

    @include('header.sidebar')

    <div class="app-wrap">

        <!-- NAVBAR -->
        <div class="navbar">
            <div class="navbar-left">
                <button class="back-btn" onclick="window.history.back()">
                    <svg viewBox="0 0 24 24">
                        <path d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <div style="margin-left:4px">
                    <div class="page-title">Tambah Menu Baru</div>
                    <div class="page-sub">Manage Dishes › Tambah Menu</div>
                </div>
            </div>
            <div class="navbar-right">
                <div class="step-pill" id="stepPill">Langkah 1 dari 3</div>
                <button class="nav-icon-btn" onclick="showToast('🔔 Tidak ada notifikasi baru','#475569')">
                    <svg viewBox="0 0 24 24">
                        <path
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    <span class="notif-dot"></span>
                </button>
            </div>
        </div>

        <!-- PAGE BODY -->
        <div class="page-body">

            <!-- STEPPER -->
            <div class="stepper">
                <div class="step">
                    <div class="step-dot active" id="sd1">1</div>
                    <div class="step-info">
                        <div class="step-label" id="sl1">Info Dasar</div>
                        <div class="step-desc">Nama, foto, harga</div>
                    </div>
                </div>
                <div class="step-line" id="sl-line1"></div>
                <div class="step">
                    <div class="step-dot idle" id="sd2">2</div>
                    <div class="step-info">
                        <div class="step-label idle" id="sl2">Kategori</div>
                        <div class="step-desc">Pilih kategori menu</div>
                    </div>
                </div>
                <div class="step-line" id="sl-line2"></div>
                <div class="step">
                    <div class="step-dot idle" id="sd3">3</div>
                    <div class="step-info">
                        <div class="step-label idle" id="sl3">Review</div>
                        <div class="step-desc">Cek &amp; simpan</div>
                    </div>
                </div>
            </div>

            <!-- ── MAIN 2-COLUMN LAYOUT ── -->
            <div class="layout-row">

                <!-- FORM COLUMN (kiri) -->
                <div class="form-col">

                    <!-- CARD 1: Foto -->
                    <form action="{{ url('/addMenu') }}" method="POST" enctype="multipart/form-data" id="menuForm">
                        @csrf
                        <div class="card ">
                            <div class="card-head">
                                <span class="card-num">1</span>
                                <span class="card-title">Foto Menu</span>
                                <span class="card-subtitle">Maks. 2MB</span>
                            </div>
                            <div class="upload-zone" id="uploadZone"
                                onclick="document.getElementById('imgInput').click()"
                                ondragover="event.preventDefault();this.classList.add('drag')"
                                ondragleave="this.classList.remove('drag')" ondrop="handleDrop(event)">
                                <input type="file" id="imgInput" name="photo" accept="image/*"
                                    onchange="handleImg(event)">
                                <div id="uploadPH">
                                    <span class="upload-icon">📷</span>
                                    <div class="upload-title">Klik atau seret foto ke sini</div>
                                    <div class="upload-hint">PNG · JPG · WEBP</div>
                                </div>
                                <div id="uploadPreviewWrap">
                                    <img id="previewImg" src="" alt="">
                                    <div class="upload-fname" id="uploadFname"></div>
                                    <button type="button" class="remove-btn" onclick="removeImg(event)">✕ Hapus
                                        foto</button>
                                </div>
                            </div>
                        </div>

                        <!-- CARD 2: Info -->
                        <div class="card mt-3">
                            <div class="card-head">
                                <span class="card-num">2</span>
                                <span class="card-title">Informasi Menu</span>
                            </div>
                            <div style="display:flex;flex-direction:column;gap:13px">
                                <div class="field">
                                    <label class="lbl">Nama Menu <span class="req">*</span></label>
                                    <input type="text" id="menuName" name="name"
                                        placeholder="cth. Grilled Salmon Steak" oninput="updatePreview();syncStep()">
                                    <span class="field-err" id="err-name">Nama menu wajib diisi</span>
                                </div>
                                <div class="field">
                                    <label class="lbl">Deskripsi <span class="opt">(opsional)</span></label>
                                    <textarea id="menuDesc" rows="3" name="deskripsi" placeholder="Deskripsikan bahan dan keunikan menu ini…"
                                        oninput="updatePreview()"></textarea>
                                </div>
                                <div class="field">
                                    <label class="lbl">Harga <span class="req">*</span></label>
                                    <div class="inp-wrap">
                                        <span class="inp-pre">Rp</span>
                                        <input type="number" id="menuPrice" name="price" placeholder="45000"
                                            min="0" oninput="updatePreview();syncStep()">
                                    </div>
                                    <span class="field-err" id="err-price">Harga wajib diisi</span>
                                </div>
                            </div>
                        </div>

                        <!-- CARD 3: Kategori -->
                        <div class="card mt-3 ">
                            <div class="card-head">
                                <span class="card-num">3</span>
                                <span class="card-title">Kategori</span>
                            </div>
                            <div class="field">
                                <label class="lbl">Kategori <span class="req">*</span></label>
                                <div style="display:flex;flex-direction:row;flex-wrap:wrap;gap:16px">
                                    @foreach ($data as $item)
                                        @php
                                            $icon = '📦';

                                            if (strtolower($item->name_category) == 'makanan') {
                                                $icon = '🍲';
                                            } elseif (strtolower($item->name_category) == 'minuman') {
                                                $icon = '🍵';
                                            } elseif (strtolower($item->name_category) == 'carwash') {
                                                $icon = '🚗';
                                            }
                                        @endphp

                                        <label
                                            style="display:flex;align-items:center;gap:8px;cursor:pointer;font-size:13px">

                                            <input type="radio" name="category_id" value="{{ $item->id }}"
                                                onchange="selectCat('{{ strtolower($item->name_category) }}')">

                                            {{ $icon }} {{ $item->name_category }}

                                        </label>
                                    @endforeach
                                </div>
                                <span class="field-err" id="err-cat">Pilih minimal satu kategori</span>
                            </div>
                        </div>

                        <!-- ACTIONS -->
                        <div class="actions mt-3">
                            <button type="button" class="btn btn-ghost" onclick="resetForm()">🗑 Reset</button>
                            <button type="submit" class="btn btn-main">✅ Simpan Menu</button>
                        </div>

                </div>
                </form>
                <!-- /form-col -->

                <!-- PREVIEW COLUMN (kanan) -->
                <div class="preview-col">
                    <div class="preview-label">Preview Kartu Menu</div>

                    <div class="menu-card">
                        <div class="mc-img" id="mcImg">🍽️</div>
                        <div class="mc-body">
                            <div class="mc-badges" id="mcBadges"></div>
                            <div class="mc-cat" id="mcCat">Kategori</div>
                            <div class="mc-name" id="mcName">Nama Menu</div>
                            <div class="mc-desc" id="mcDesc" style="display:none"></div>
                            <div class="mc-footer">
                                <div>
                                    <div class="mc-price" id="mcPrice">Rp —</div>
                                </div>
                                <div class="mc-qty">
                                    <button class="qty-btn qty-m">−</button>
                                    <span class="qty-v">0</span>
                                    <button class="qty-btn qty-p">+</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Meta Info Card -->
                    <div class="meta-card">
                        <div class="meta-row">
                            <span>Stok</span>
                            <strong id="mvStock">—</strong>
                        </div>
                        <div class="meta-row">
                            <span>Porsi</span>
                            <strong id="mvPortion">—</strong>
                        </div>
                    </div>

                    <!-- Completeness Card -->
                    <div class="complete-card">
                        <div class="complete-head">
                            <span>Kelengkapan</span>
                            <span id="pctText" style="color:var(--s400)">0%</span>
                        </div>
                        <div class="bar-bg">
                            <div class="bar-fill" id="barFill"></div>
                        </div>
                        <div class="complete-list">
                            <div class="complete-item" id="ci-img">
                                <span class="ci-dot"></span> Foto menu
                            </div>
                            <div class="complete-item" id="ci-name">
                                <span class="ci-dot"></span> Nama menu
                            </div>
                            <div class="complete-item" id="ci-price">
                                <span class="ci-dot"></span> Harga
                            </div>
                            <div class="complete-item" id="ci-cat">
                                <span class="ci-dot"></span> Kategori
                            </div>
                            <div class="complete-item" id="ci-desc">
                                <span class="ci-dot"></span> Deskripsi
                            </div>
                        </div>
                    </div>

                </div><!-- /preview-col -->

            </div><!-- /layout-row -->

        </div><!-- /page-body -->
    </div><!-- /app-wrap -->

    <div id="toast"></div>

    <script>
        // ── State ──────────────────────────────────────────────────────────
        var selCat = null;
        var imgSrc = null;

        // Mapping per kategori
        var CE = {
            makanan: '🍲',
            minuman: '🍵',
            carwash: '🚗'
        };

        var CB = {
            makanan: '#fff8f0',
            minuman: '#f0f8ff',
            carwash: '#f5fff0'
        };

        var CL = {
            makanan: 'Makanan',
            minuman: 'Minuman',
            carwash: 'Carwash'
        };

        // ── FIX 1: selectCat menerima value langsung (bukan dari event.target.closest('.pill'))
        function selectCat(cat) {
            selCat = cat;
            document.getElementById('err-cat').classList.remove('show');
            updatePreview();
            syncStep();
        }

        // ── Upload gambar ──────────────────────────────────────────────────
        function handleImg(e) {
            var f = e.target.files[0];
            if (!f) return;
            if (f.size > 2 * 1024 * 1024) {
                showToast('❌ File melebihi 2MB', '#ef4444');
                return;
            }
            var r = new FileReader();
            r.onload = function(ev) {
                imgSrc = ev.target.result;
                document.getElementById('previewImg').src = imgSrc;
                document.getElementById('uploadFname').textContent = f.name;
                document.getElementById('uploadPH').style.display = 'none';
                document.getElementById('uploadPreviewWrap').style.display = 'block';
                updatePreview();
                syncStep();
            };
            r.readAsDataURL(f);
        }

        function handleDrop(e) {
            e.preventDefault();
            document.getElementById('uploadZone').classList.remove('drag');
            var f = e.dataTransfer.files[0];
            if (f && f.type.startsWith('image/')) {
                handleImg({
                    target: {
                        files: [f]
                    }
                });
            }
        }

        // ── FIX 2: removeImg — stopPropagation aman karena ada pengecekan
        function removeImg(e) {
            if (e && e.stopPropagation) e.stopPropagation();
            imgSrc = null;
            document.getElementById('imgInput').value = '';
            document.getElementById('uploadPH').style.display = '';
            document.getElementById('uploadPreviewWrap').style.display = 'none';
            updatePreview();
            syncStep();
        }

        // ── FIX 3: updatePreview — pakai ID yang benar (mvStock, mvPortion, ci-*)
        function updatePreview() {
            var name = (document.getElementById('menuName') && document.getElementById('menuName').value.trim()) || '';
            var desc = (document.getElementById('menuDesc') && document.getElementById('menuDesc').value.trim()) || '';
            var price = (document.getElementById('menuPrice') && document.getElementById('menuPrice').value) || '';
            var st = (document.getElementById('menuStock') && document.getElementById('menuStock').value) || '';
            var por = (document.getElementById('menuPortion') && document.getElementById('menuPortion').value.trim()) || '';

            // Preview card
            document.getElementById('mcName').textContent = name || 'Nama Menu';
            var de = document.getElementById('mcDesc');
            de.textContent = desc;
            de.style.display = desc ? '' : 'none';

            document.getElementById('mcPrice').textContent = price ?
                'Rp ' + parseInt(price).toLocaleString('id-ID') :
                'Rp —';

            document.getElementById('mcCat').textContent = selCat ? CL[selCat] : 'Kategori';

            // Gambar / emoji di preview
            var ia = document.getElementById('mcImg');
            if (imgSrc) {
                ia.innerHTML = '<img src="' + imgSrc + '" alt="">';
                ia.style.background = '';
            } else {
                ia.innerHTML = selCat ? CE[selCat] : '🍽️';
                ia.style.background = selCat ? CB[selCat] : '#e6faf6';
            }

            // Badge kategori
            var badges = document.getElementById('mcBadges');
            if (selCat && selCat !== 'all') {
                badges.innerHTML = '<span class="mc-badge" style="background:' + CB[selCat] + ';color:var(--s600)">' + CL[
                    selCat] + '</span>';
            } else {
                badges.innerHTML = '';
            }

            // FIX: gunakan ID yang sudah ada di HTML (mvStock, mvPortion)
            document.getElementById('mvStock').textContent = st ? st + ' porsi' : '—';
            document.getElementById('mvPortion').textContent = por || '—';

            // FIX: gunakan ID ci-img, ci-name, ci-price, ci-cat, ci-desc yang ada di HTML
            var checks = {
                img: !!imgSrc,
                name: !!name,
                price: !!price && Number(price) > 0,
                cat: !!selCat,
                desc: !!desc
            };
            var keys = Object.keys(checks);
            var filled = keys.filter(function(k) {
                return checks[k];
            }).length;
            var pct = Math.round(filled / keys.length * 100);

            document.getElementById('pctText').textContent = pct + '%';
            document.getElementById('pctText').style.color =
                pct >= 80 ? '#0BAB8C' : pct >= 40 ? '#f97316' : '#94a3b8';

            var bar = document.getElementById('barFill');
            bar.style.width = pct + '%';
            bar.style.background = pct >= 80 ? '#0BAB8C' : pct >= 40 ? '#f97316' : '#e2e8f0';

            keys.forEach(function(k) {
                var el = document.getElementById('ci-' + k);
                if (el) el.classList.toggle('done', checks[k]);
            });
        }

        // ── Sinkronisasi stepper ───────────────────────────────────────────
        function syncStep() {
            var name = document.getElementById('menuName') ? document.getElementById('menuName').value.trim() : '';
            var price = document.getElementById('menuPrice') ? document.getElementById('menuPrice').value : '';
            var step = 1;
            if (name && Number(price) > 0) step = 2;
            if (step >= 2 && selCat) step = 3;

            var dots = ['sd1', 'sd2', 'sd3'];
            var labels = ['sl1', 'sl2', 'sl3'];
            dots.forEach(function(id, i) {
                var el = document.getElementById(id);
                var lbl = document.getElementById(labels[i]);
                if (i + 1 < step) {
                    el.className = 'step-dot done';
                    el.innerHTML = '✓';
                    lbl.className = 'step-label';
                } else if (i + 1 === step) {
                    el.className = 'step-dot active';
                    el.textContent = i + 1;
                    lbl.className = 'step-label';
                } else {
                    el.className = 'step-dot idle';
                    el.textContent = i + 1;
                    lbl.className = 'step-label idle';
                }
            });

            document.getElementById('sl-line1').className = 'step-line' + (step > 1 ? ' done' : '');
            document.getElementById('sl-line2').className = 'step-line' + (step > 2 ? ' done' : '');
            document.getElementById('stepPill').textContent = 'Langkah ' + Math.min(step, 3) + ' dari 3';
        }

        // ── Validasi ──────────────────────────────────────────────────────
        function validate() {
            var ok = true;
            var name = document.getElementById('menuName').value.trim();
            var price = document.getElementById('menuPrice').value;

            if (!name) {
                document.getElementById('menuName').classList.add('err');
                document.getElementById('err-name').classList.add('show');
                ok = false;
            } else {
                document.getElementById('menuName').classList.remove('err');
                document.getElementById('err-name').classList.remove('show');
            }

            if (!price || Number(price) <= 0) {
                document.getElementById('menuPrice').classList.add('err');
                document.getElementById('err-price').classList.add('show');
                ok = false;
            } else {
                document.getElementById('menuPrice').classList.remove('err');
                document.getElementById('err-price').classList.remove('show');
            }

            if (!selCat) {
                document.getElementById('err-cat').classList.add('show');
                ok = false;
            } else {
                document.getElementById('err-cat').classList.remove('show');
            }

            return ok;
        }

        // ── Aksi tombol ───────────────────────────────────────────────────
        function submitForm() {
            if (!validate()) {
                showToast('❌ Lengkapi field yang wajib diisi', '#ef4444');
                return;
            }
            showToast('✅ Menu berhasil disimpan!', '#0BAB8C');
        }

        function saveDraft() {
            var n = document.getElementById('menuName').value.trim();
            if (!n) {
                showToast('❌ Isi nama menu terlebih dahulu', '#ef4444');
                return;
            }
            showToast('💾 Draft berhasil disimpan', '#475569');
        }

        // ── FIX 4: resetForm — panggil removeImg dengan object dummy yang aman
        function resetForm() {
            if (!confirm('Reset semua data?')) return;

            ['menuName', 'menuDesc', 'menuPrice', 'menuStock', 'menuPortion'].forEach(function(id) {
                var el = document.getElementById(id);
                if (el) el.value = '';
            });

            // Reset radio buttons
            document.querySelectorAll('input[name="category"]').forEach(function(r) {
                r.checked = false;
            });
            selCat = null;

            // Hapus gambar dengan object event dummy yang aman
            removeImg({
                stopPropagation: function() {}
            });

            updatePreview();
            syncStep();
            showToast('🗑 Form direset', '#6b7280');
        }

        function showToast(msg, bg) {
            bg = bg || '#0BAB8C';
            var t = document.getElementById('toast');
            t.textContent = msg;
            t.style.background = bg;
            t.classList.add('show');
            setTimeout(function() {
                t.classList.remove('show');
            }, 2800);
        }

        // ── Init ──────────────────────────────────────────────────────────
        updatePreview();
        syncStep();
    </script>
</body>
