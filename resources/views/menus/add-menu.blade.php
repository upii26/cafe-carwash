@include('header.head')
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0;-webkit-tap-highlight-color:transparent}

:root{
  --green:#0BAB8C;--green-2:#089073;--green-3:#065f46;
  --green-bg:#e6faf6;--green-glow:rgba(11,171,140,.18);
  --bg:#EDF7F3;
  --sidebar-w:220px;
  --nav-h:56px;
  --white:#fff;
  --s50:#f8fafb;--s100:#f1f5f9;--s200:#e2e8f0;--s300:#cbd5e1;
  --s400:#94a3b8;--s500:#64748b;--s600:#475569;--s700:#334155;--s800:#1e293b;--s900:#0f172a;
  --red:#ef4444;--red-bg:#fef2f2;
  --amber:#f59e0b;--amber-bg:#fffbeb;
  --blue:#3b82f6;--blue-bg:#eff6ff;
  --card-r:18px;--sm-r:10px;--md-r:13px;
  --shadow:0 1px 3px rgba(0,0,0,.06),0 4px 16px rgba(0,0,0,.06);
  --shadow-lg:0 8px 32px rgba(0,0,0,.10);
  --border:1px solid rgba(0,0,0,.07);
  --transition:.18s cubic-bezier(.4,0,.2,1);
}

html,body{height:100%;overflow:hidden;font-family:'Plus Jakarta Sans',sans-serif}
body{background:var(--bg);color:var(--s800);display:flex;font-size:14px;line-height:1.5}




/* ══════════════════════════════
   MAIN WRAPPER
══════════════════════════════ */
.app-wrap{
  margin-left:var(--sidebar-w);
  flex:1;display:flex;flex-direction:column;
  height:100vh;overflow:hidden;
}

/* ══════════════════════════════
   NAVBAR
══════════════════════════════ */
.navbar{
  height:var(--nav-h);
  background:rgba(255,255,255,.92);
  backdrop-filter:blur(16px);
  border-bottom:var(--border);
  display:flex;align-items:center;justify-content:space-between;
  padding:0 20px;flex-shrink:0;
  position:relative;z-index:40;
}
.navbar-left{display:flex;align-items:center;gap:8px}
.back-btn{
  width:32px;height:32px;border-radius:9px;
  background:var(--s100);border:none;
  display:flex;align-items:center;justify-content:center;
  cursor:pointer;transition:background var(--transition);
  color:var(--s600);
}
.back-btn:hover{background:var(--s200)}
.back-btn svg{width:14px;height:14px;stroke:currentColor;fill:none;stroke-width:2.5;stroke-linecap:round;stroke-linejoin:round}
.page-title{font-size:14px;font-weight:800;color:var(--s900)}
.page-sub{font-size:10.5px;color:var(--s400);margin-top:1px}
.navbar-right{display:flex;align-items:center;gap:8px}
.step-pill{
  background:var(--green-bg);color:var(--green);
  font-size:11px;font-weight:700;
  padding:5px 12px;border-radius:99px;
  border:1px solid rgba(11,171,140,.2);
}
.nav-icon-btn{
  width:34px;height:34px;border-radius:9px;border:none;
  background:transparent;cursor:pointer;
  display:flex;align-items:center;justify-content:center;
  color:var(--s500);transition:background var(--transition);
  position:relative;
}
.nav-icon-btn:hover{background:var(--s100)}
.nav-icon-btn svg{width:18px;height:18px;stroke:currentColor;fill:none;stroke-width:1.8;stroke-linecap:round;stroke-linejoin:round}
.notif-dot{
  width:7px;height:7px;border-radius:50%;background:var(--red);
  position:absolute;top:6px;right:6px;
  border:1.5px solid var(--white);
}

/* ══════════════════════════════
   PAGE BODY
══════════════════════════════ */
.page-body{
  flex:1;overflow-y:auto;overflow-x:hidden;
  -webkit-overflow-scrolling:touch;
  padding:20px 20px 80px;
}

/* progress stepper */
.stepper{
  display:flex;align-items:center;gap:0;
  margin-bottom:20px;
  background:var(--white);border-radius:12px;padding:14px 16px;
  box-shadow:var(--shadow);border:var(--border);
}
.step{display:flex;align-items:center;gap:8px;flex:1}
.step-dot{
  width:26px;height:26px;border-radius:50%;flex-shrink:0;
  display:flex;align-items:center;justify-content:center;
  font-size:10px;font-weight:800;
  transition:all var(--transition);
}
.step-dot.done{background:var(--green);color:#fff}
.step-dot.active{background:var(--green);color:#fff;box-shadow:0 0 0 4px var(--green-bg)}
.step-dot.idle{background:var(--s100);color:var(--s400)}
.step-info{flex:1}
.step-label{font-size:11px;font-weight:700;color:var(--s700)}
.step-label.idle{color:var(--s400)}
.step-desc{font-size:9.5px;color:var(--s400);margin-top:1px}
.step-line{flex:1;height:1.5px;background:var(--s200);border-radius:1px;max-width:40px;margin:0 6px}
.step-line.done{background:var(--green)}

/* layout */
.layout-row{display:flex;gap:18px;align-items:flex-start}
.form-col{flex:1;min-width:0;display:flex;flex-direction:column;gap:14px}
.preview-col{width:244px;flex-shrink:0;position:sticky;top:0}

/* ══════════════════════════════
   SECTION CARDS
══════════════════════════════ */
.card{
  background:var(--white);border-radius:var(--card-r);
  padding:18px;box-shadow:var(--shadow);border:var(--border);
  animation:fadeUp .35s ease both;
}
.card:nth-child(1){animation-delay:.04s}
.card:nth-child(2){animation-delay:.08s}
.card:nth-child(3){animation-delay:.12s}
.card:nth-child(4){animation-delay:.16s}
.card:nth-child(5){animation-delay:.20s}

@keyframes fadeUp{
  from{opacity:0;transform:translateY(10px)}
  to{opacity:1;transform:translateY(0)}
}

.card-head{display:flex;align-items:center;gap:8px;margin-bottom:16px}
.card-num{
  width:22px;height:22px;border-radius:7px;
  background:var(--green);color:#fff;
  font-size:9.5px;font-weight:800;
  display:flex;align-items:center;justify-content:center;flex-shrink:0;
}
.card-title{font-size:13px;font-weight:800;color:var(--s900)}
.card-subtitle{font-size:11px;color:var(--s400);margin-left:auto}

/* ══════════════════════════════
   FORM ELEMENTS
══════════════════════════════ */
.field{display:flex;flex-direction:column;gap:5px}
.field-row{display:grid;grid-template-columns:1fr 1fr;gap:12px}
.field-3{display:grid;grid-template-columns:1fr 1fr 1fr;gap:12px}
label.lbl{font-size:10.5px;font-weight:700;color:var(--s500);text-transform:uppercase;letter-spacing:.04em}
.req{color:var(--red)}
.opt{font-weight:500;color:var(--s300);text-transform:none;letter-spacing:0}

input[type=text],input[type=number],select,textarea{
  padding:9px 12px;background:var(--s50);
  border:1.5px solid var(--s200);border-radius:var(--sm-r);
  font-size:13px;color:var(--s800);font-family:inherit;
  outline:none;transition:all var(--transition);width:100%;
}
input:focus,select:focus,textarea:focus{
  border-color:var(--green);background:var(--white);
  box-shadow:0 0 0 3px var(--green-glow);
}
input::placeholder,textarea::placeholder{color:var(--s300)}
input.err,select.err{border-color:var(--red);background:var(--red-bg)}
textarea{resize:vertical;min-height:70px}
.inp-wrap{position:relative}
.inp-pre{
  position:absolute;left:11px;top:50%;transform:translateY(-50%);
  font-size:11.5px;font-weight:700;color:var(--s400);pointer-events:none;
}
.inp-wrap input{padding-left:34px}
.field-err{font-size:10.5px;color:var(--red);display:none}
.field-err.show{display:block}

/* ══════════════════════════════
   UPLOAD ZONE
══════════════════════════════ */
.upload-zone{
  border:2px dashed var(--s200);border-radius:14px;
  background:var(--s50);text-align:center;padding:22px 16px;
  cursor:pointer;transition:all var(--transition);
}
.upload-zone:hover,.upload-zone.drag{border-color:var(--green);background:var(--green-bg)}
.upload-zone input{display:none}
.upload-icon{font-size:2.2rem;margin-bottom:8px;display:block}
.upload-title{font-size:13px;font-weight:700;color:var(--s700)}
.upload-hint{font-size:11px;color:var(--s400);margin-top:3px}
#uploadPreviewWrap{display:none}
#uploadPreviewWrap img{width:100px;height:100px;object-fit:cover;border-radius:12px;margin:0 auto 8px;display:block;box-shadow:0 4px 12px rgba(0,0,0,.12)}
.upload-fname{font-size:11px;color:var(--green);font-weight:600}
.remove-btn{margin-top:5px;background:none;border:none;font-size:11px;color:var(--red);cursor:pointer;font-weight:600}
.remove-btn:hover{text-decoration:underline}

/* ══════════════════════════════
   CATEGORY PILLS
══════════════════════════════ */
.pills{display:flex;flex-wrap:wrap;gap:6px}
.pill{
  padding:5px 12px;border-radius:99px;
  border:1.5px solid var(--s200);
  font-size:11.5px;font-weight:600;color:var(--s500);
  background:var(--white);cursor:pointer;
  transition:all var(--transition);white-space:nowrap;
}
.pill:hover{border-color:var(--green);color:var(--green);background:var(--green-bg)}
.pill.sel{border-color:var(--green);color:var(--white);background:var(--green);box-shadow:0 2px 8px var(--green-glow)}

/* ══════════════════════════════
   CHECKBOXES (custom)
══════════════════════════════ */
.check-group{display:flex;flex-wrap:wrap;gap:8px;margin-top:12px}
.check-item{
  display:flex;align-items:center;gap:7px;
  padding:6px 12px;border-radius:99px;
  border:1.5px solid var(--s200);
  background:var(--white);cursor:pointer;
  transition:all var(--transition);user-select:none;
}
.check-item:hover{border-color:var(--s300);background:var(--s50)}
.check-item.checked{border-color:var(--green);background:var(--green-bg)}
.check-item input{display:none}
.check-box{
  width:14px;height:14px;border-radius:4px;
  border:1.5px solid var(--s300);
  display:flex;align-items:center;justify-content:center;
  transition:all var(--transition);flex-shrink:0;
}
.check-item.checked .check-box{background:var(--green);border-color:var(--green)}
.check-box svg{width:9px;height:9px;stroke:#fff;fill:none;stroke-width:3;stroke-linecap:round;stroke-linejoin:round;display:none}
.check-item.checked .check-box svg{display:block}
.check-text{font-size:12px;font-weight:600;color:var(--s600);transition:color var(--transition)}
.check-item.checked .check-text{color:var(--green-3)}

/* ══════════════════════════════
   TOGGLE
══════════════════════════════ */
.toggle-list{display:flex;flex-direction:column}
.toggle-row{
  display:flex;align-items:center;justify-content:space-between;
  padding:12px 0;border-bottom:1px solid var(--s100);
}
.toggle-row:last-child{border-bottom:none;padding-bottom:0}
.toggle-info .t-title{font-size:13px;font-weight:600;color:var(--s800)}
.toggle-info .t-sub{font-size:11px;color:var(--s400);margin-top:2px}
.toggle{position:relative;width:40px;height:22px;flex-shrink:0}
.toggle input{opacity:0;width:0;height:0;position:absolute}
.toggle-track{
  position:absolute;inset:0;border-radius:99px;
  background:var(--s200);cursor:pointer;transition:background .2s;
}
.toggle-thumb{
  position:absolute;width:16px;height:16px;
  left:3px;top:3px;border-radius:50%;
  background:var(--white);transition:transform .2s;
  box-shadow:0 1px 4px rgba(0,0,0,.18);
}
.toggle input:checked~.toggle-track{background:var(--green)}
.toggle input:checked~.toggle-thumb{transform:translateX(18px)}
/* make label clickable */
.toggle input,
.toggle-track,
.toggle-thumb{pointer-events:none}
.toggle{cursor:pointer}

/* ══════════════════════════════
   ACTION BUTTONS
══════════════════════════════ */
.actions{display:flex;gap:10px;animation:fadeUp .35s .24s ease both}
.btn{
  display:inline-flex;align-items:center;justify-content:center;gap:6px;
  padding:10px 16px;border-radius:11px;font-size:13px;font-weight:700;
  cursor:pointer;border:none;transition:all var(--transition);
  font-family:inherit;white-space:nowrap;
}
.btn-ghost{background:var(--white);color:var(--s600);flex:1;border:1.5px solid var(--s200)}
.btn-ghost:hover{background:var(--s50);border-color:var(--s300)}
.btn-main{background:var(--green);color:#fff;flex:1.6;box-shadow:0 4px 14px var(--green-glow)}
.btn-main:hover{background:var(--green-2);box-shadow:0 6px 18px var(--green-glow)}
.btn-main:active,.btn-ghost:active{transform:scale(.97)}

/* ══════════════════════════════
   PREVIEW CARD (right column)
══════════════════════════════ */
.preview-label{
  font-size:9.5px;font-weight:800;color:var(--s400);
  letter-spacing:.1em;text-transform:uppercase;margin-bottom:10px;
}
.menu-card{
  background:var(--white);border-radius:18px;
  overflow:hidden;box-shadow:var(--shadow-lg);border:var(--border);
  animation:fadeUp .3s .28s ease both;
  transition:transform .2s,box-shadow .2s;
}
.menu-card:hover{transform:translateY(-3px);box-shadow:0 12px 40px rgba(0,0,0,.13)}
.mc-img{
  width:100%;height:148px;
  display:flex;align-items:center;justify-content:center;
  font-size:2.8rem;overflow:hidden;
  background:var(--green-bg);transition:background .3s;
}
.mc-img img{width:100%;height:100%;object-fit:cover;display:block}
.mc-body{padding:14px}
.mc-badges{display:flex;gap:4px;flex-wrap:wrap;margin-bottom:5px;min-height:16px}
.mc-badge{font-size:9px;font-weight:800;padding:2px 6px;border-radius:5px}
.mc-cat{font-size:9.5px;color:var(--s400);font-weight:500;margin-bottom:2px}
.mc-name{font-size:13px;font-weight:800;color:var(--s900);line-height:1.3;margin-bottom:4px}
.mc-desc{
  font-size:10.5px;color:var(--s400);line-height:1.5;margin-bottom:10px;
  display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;
}
.mc-footer{display:flex;align-items:center;justify-content:space-between;gap:8px}
.mc-price{font-size:14px;font-weight:800;color:var(--s900)}
.mc-oldprice{font-size:10px;color:var(--s400);text-decoration:line-through;margin-top:1px}
.mc-qty{display:flex;align-items:center;gap:6px}
.qty-btn{
  width:25px;height:25px;border-radius:50%;border:none;
  cursor:pointer;font-size:13px;font-weight:800;
  display:flex;align-items:center;justify-content:center;line-height:1;
}
.qty-m{background:var(--s100);color:var(--s600)}
.qty-p{background:var(--green);color:#fff}
.qty-v{font-size:12px;font-weight:700;color:var(--s800);width:14px;text-align:center}

/* meta box */
.meta-card{
  margin-top:10px;background:var(--white);
  border-radius:12px;padding:10px 13px;
  box-shadow:var(--shadow);border:var(--border);
  animation:fadeUp .3s .32s ease both;
}
.meta-row{
  display:flex;justify-content:space-between;
  padding:5px 0;font-size:11px;
  color:var(--s400);border-bottom:1px solid var(--s100);
  align-items:center;gap:6px;
}
.meta-row:last-child{border-bottom:none}
.meta-row strong{color:var(--s700);font-weight:600;text-align:right}

/* completeness */
.complete-card{
  margin-top:10px;background:var(--white);
  border-radius:12px;padding:10px 13px;
  box-shadow:var(--shadow);border:var(--border);
  animation:fadeUp .3s .36s ease both;
}
.complete-head{display:flex;justify-content:space-between;font-size:11px;margin-bottom:7px;align-items:center}
.complete-head span{font-weight:700}
.bar-bg{height:6px;background:var(--s100);border-radius:99px;overflow:hidden}
.bar-fill{height:100%;border-radius:99px;transition:width .5s ease,background .4s;width:0%}
.complete-list{margin-top:10px;display:flex;flex-direction:column;gap:4px}
.complete-item{display:flex;align-items:center;gap:6px;font-size:10.5px;color:var(--s400)}
.complete-item.done{color:var(--green)}
.ci-dot{width:6px;height:6px;border-radius:50%;background:var(--s200);flex-shrink:0;transition:background .2s}
.complete-item.done .ci-dot{background:var(--green)}

/* ══════════════════════════════
   TOAST
══════════════════════════════ */
#toast{
  position:fixed;bottom:24px;left:50%;
  transform:translateX(-50%) translateY(20px);
  padding:11px 20px;border-radius:12px;
  font-size:13px;font-weight:700;color:#fff;
  box-shadow:0 8px 24px rgba(0,0,0,.15);
  z-index:9999;opacity:0;pointer-events:none;
  transition:opacity .3s,transform .3s;white-space:nowrap;
}
#toast.show{opacity:1;transform:translateX(-50%) translateY(0)}

/* scrollbar */
::-webkit-scrollbar{width:4px;height:4px}
::-webkit-scrollbar-thumb{background:var(--s200);border-radius:99px}
::-webkit-scrollbar-track{background:transparent}
</style>
</head>
<body>

<!-- ══ SIDEBAR ══ -->
@include('header.sidebar')

<!-- ══ MAIN ══ -->
<div class="app-wrap">

  <!-- NAVBAR -->
  <div class="navbar">
    <div class="navbar-left">
      <button class="back-btn" onclick="window.history.back()">
        <svg viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7"/></svg>
      </button>
      <div style="margin-left:4px">
        <div class="page-title">Tambah Menu Baru</div>
        <div class="page-sub">Manage Dishes › Tambah Menu</div>
      </div>
    </div>
    <div class="navbar-right">
      <div class="step-pill" id="stepPill">Langkah 1 dari 2</div>
      <button class="nav-icon-btn" onclick="showToast('🔔 Tidak ada notifikasi baru','#475569')">
        <svg viewBox="0 0 24 24"><path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
        <span class="notif-dot"></span>
      </button>
    </div>
  </div>

  <!-- PAGE BODY -->
  <div class="page-body">

    <!-- Stepper -->
    <div class="stepper">
      <div class="step">
        <div class="step-dot active" id="sd1">1</div>
        <div class="step-info">
          <div class="step-label" id="sl1">Info Dasar</div>
          <div class="step-desc">Foto, nama & harga</div>
        </div>
      </div>
      <div class="step-line" id="sl-line1"></div>
      <div class="step">
        <div class="step-dot idle" id="sd2">2</div>
        <div class="step-info">
          <div class="step-label idle" id="sl2">Kategori</div>
          <div class="step-desc">Kategori & label</div>
        </div>
      </div>
      <div class="step-line" id="sl-line2"></div>
      <div class="step">
        <div class="step-dot idle" id="sd3">3</div>
        <div class="step-info">
          <div class="step-label idle" id="sl3">Detail</div>
          <div class="step-desc">Sajian & setting</div>
        </div>
      </div>
    </div>

    <div class="layout-row">

      <!-- FORM -->
      <div class="form-col">

        <!-- CARD 1: Foto -->
        <div class="card">
          <div class="card-head">
            <span class="card-num">1</span>
            <span class="card-title">Foto Menu</span>
            <span class="card-subtitle">Maks. 2MB</span>
          </div>
          <div class="upload-zone" id="uploadZone"
            onclick="document.getElementById('imgInput').click()"
            ondragover="event.preventDefault();this.classList.add('drag')"
            ondragleave="this.classList.remove('drag')"
            ondrop="handleDrop(event)">
            <input type="file" id="imgInput" accept="image/*" onchange="handleImg(event)">
            <div id="uploadPH">
              <span class="upload-icon">📷</span>
              <div class="upload-title">Klik atau seret foto ke sini</div>
              <div class="upload-hint">PNG · JPG · WEBP</div>
            </div>
            <div id="uploadPreviewWrap">
              <img id="previewImg" src="" alt="">
              <div class="upload-fname" id="uploadFname"></div>
              <button type="button" class="remove-btn" onclick="removeImg(event)">✕ Hapus foto</button>
            </div>
          </div>
        </div>

        <!-- CARD 2: Info -->
        <div class="card">
          <div class="card-head">
            <span class="card-num">2</span>
            <span class="card-title">Informasi Menu</span>
          </div>
          <div style="display:flex;flex-direction:column;gap:13px">
            <div class="field">
              <label class="lbl">Nama Menu <span class="req">*</span></label>
              <input type="text" id="menuName" placeholder="cth. Grilled Salmon Steak" oninput="updatePreview();syncStep()">
              <span class="field-err" id="err-name">Nama menu wajib diisi</span>
            </div>
            <div class="field">
              <label class="lbl">Deskripsi <span class="opt">(opsional)</span></label>
              <textarea id="menuDesc" rows="3" placeholder="Deskripsikan bahan dan keunikan menu ini…" oninput="updatePreview()"></textarea>
            </div>
            <div class="field-row">
              <div class="field">
                <label class="lbl">Harga <span class="req">*</span></label>
                <div class="inp-wrap">
                  <span class="inp-pre">Rp</span>
                  <input type="number" id="menuPrice" placeholder="45000" min="0" oninput="updatePreview();syncStep()">
                </div>
                <span class="field-err" id="err-price">Harga wajib diisi</span>
              </div>
              <div class="field">
                <label class="lbl">Harga Coret <span class="opt">(opsional)</span></label>
                <div class="inp-wrap">
                  <span class="inp-pre">Rp</span>
                  <input type="number" id="menuOldPrice" placeholder="55000" min="0" oninput="updatePreview()">
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- CARD 3: Kategori -->
        <div class="card">
          <div class="card-head">
            <span class="card-num">3</span>
            <span class="card-title">Kategori & Label</span>
          </div>
          <div class="field">
            <label class="lbl">Kategori <span class="req">*</span></label>
            <div class="pills" id="catPills">
              <button type="button" class="pill" onclick="selectCat(this,'all')">🍽️ Semua</button>
              <button type="button" class="pill" onclick="selectCat(this,'special')">⭐ Special</button>
              <button type="button" class="pill" onclick="selectCat(this,'soup')">🍲 Soup</button>
              <button type="button" class="pill" onclick="selectCat(this,'dessert')">🍰 Dessert</button>
              <button type="button" class="pill" onclick="selectCat(this,'chicken')">🍗 Chicken</button>
              <button type="button" class="pill" onclick="selectCat(this,'beverage')">🥤 Minuman</button>
              <button type="button" class="pill" onclick="selectCat(this,'snack')">🍟 Snack</button>
            </div>
            <span class="field-err" id="err-cat">Pilih minimal satu kategori</span>
          </div>
          <div style="margin-top:14px">
            <label class="lbl">Label Tambahan</label>
            <div class="check-group">
              <label class="check-item" onclick="toggleCheck(this,'lbl-new')">
                <input type="checkbox" id="lbl-new">
                <span class="check-box"><svg viewBox="0 0 12 12"><polyline points="2,6 5,9 10,3"/></svg></span>
                <span class="check-text">Baru 🆕</span>
              </label>
              <label class="check-item" onclick="toggleCheck(this,'lbl-best')">
                <input type="checkbox" id="lbl-best">
                <span class="check-box"><svg viewBox="0 0 12 12"><polyline points="2,6 5,9 10,3"/></svg></span>
                <span class="check-text">Best Seller 🔥</span>
              </label>
              <label class="check-item" onclick="toggleCheck(this,'lbl-spicy')">
                <input type="checkbox" id="lbl-spicy">
                <span class="check-box"><svg viewBox="0 0 12 12"><polyline points="2,6 5,9 10,3"/></svg></span>
                <span class="check-text">Pedas 🌶️</span>
              </label>
              <label class="check-item" onclick="toggleCheck(this,'lbl-vege')">
                <input type="checkbox" id="lbl-vege">
                <span class="check-box"><svg viewBox="0 0 12 12"><polyline points="2,6 5,9 10,3"/></svg></span>
                <span class="check-text">Vegetarian 🌿</span>
              </label>
            </div>
          </div>
        </div>


        <!-- ACTIONS -->
        <div class="actions">
          <button type="button" class="btn btn-ghost" onclick="resetForm()">🗑 Reset</button>
          <button type="button" class="btn btn-ghost" onclick="saveDraft()">💾 Simpan Draft</button>
          <button type="button" class="btn btn-main" onclick="submitForm()">✅ Simpan Menu</button>
        </div>

      </div><!-- /form-col -->

      <!-- PREVIEW -->
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
                <div class="mc-oldprice" id="mcOld" style="display:none"></div>
              </div>
              <div class="mc-qty">
                <button class="qty-btn qty-m">−</button>
                <span class="qty-v">0</span>
                <button class="qty-btn qty-p">+</button>
              </div>
            </div>
          </div>
        </div>

        <div class="meta-card">
          <div class="meta-row"><span>⏱ Waktu masak</span><strong id="mvTime">—</strong></div>
          <div class="meta-row"><span>🔥 Kalori</span><strong id="mvCal">—</strong></div>
          <div class="meta-row"><span>📦 Stok harian</span><strong id="mvStock">—</strong></div>
        </div>

        <div class="complete-card">
          <div class="complete-head">
            <span style="color:var(--s500);font-weight:600;font-size:11px">Kelengkapan</span>
            <span id="pctText" style="color:var(--green);font-size:12px">0%</span>
          </div>
          <div class="bar-bg"><div class="bar-fill" id="barFill"></div></div>
          <div class="complete-list">
            <div class="complete-item" id="ci-img"><span class="ci-dot"></span>Foto menu</div>
            <div class="complete-item" id="ci-name"><span class="ci-dot"></span>Nama menu</div>
            <div class="complete-item" id="ci-price"><span class="ci-dot"></span>Harga</div>
            <div class="complete-item" id="ci-cat"><span class="ci-dot"></span>Kategori</div>
            <div class="complete-item" id="ci-desc"><span class="ci-dot"></span>Deskripsi</div>
          </div>
        </div>

      </div><!-- /preview-col -->

    </div><!-- /layout-row -->
  </div><!-- /page-body -->
</div><!-- /app-wrap -->

<div id="toast"></div>

<script>
let selCat=null,imgSrc=null;
const CE={all:'🍽️',special:'⭐',soup:'🍲',dessert:'🍰',chicken:'🍗',beverage:'🥤',snack:'🍟'};
const CB={all:'#e6faf6',special:'#fff9f0',soup:'#fff8f0',dessert:'#fffff0',chicken:'#f5fff0',beverage:'#f0f8ff',snack:'#fff0f0'};
const CL={all:'Semua',special:'Special',soup:'Soup',dessert:'Dessert',chicken:'Chicken',beverage:'Minuman',snack:'Snack'};

/* ── toggle switch ── */
function toggleSwitch(label){
  const inp=label.querySelector('input');
  inp.checked=!inp.checked;
}

/* ── custom checkbox ── */
function toggleCheck(label,id){
  event.preventDefault();
  const inp=document.getElementById(id);
  inp.checked=!inp.checked;
  label.classList.toggle('checked',inp.checked);
  updatePreview();
}

/* ── category ── */
function selectCat(el,cat){
  document.querySelectorAll('.pill').forEach(p=>p.classList.remove('sel'));
  el.classList.add('sel');
  selCat=cat;
  document.getElementById('err-cat').classList.remove('show');
  updatePreview();syncStep();
}

/* ── image ── */
function handleImg(e){
  const f=e.target.files[0];if(!f)return;
  if(f.size>2*1024*1024){showToast('❌ File melebihi 2MB','#ef4444');return}
  const r=new FileReader();
  r.onload=ev=>{
    imgSrc=ev.target.result;
    document.getElementById('previewImg').src=imgSrc;
    document.getElementById('uploadFname').textContent=f.name;
    document.getElementById('uploadPH').style.display='none';
    document.getElementById('uploadPreviewWrap').style.display='block';
    updatePreview();syncStep();
  };r.readAsDataURL(f);
}
function handleDrop(e){
  e.preventDefault();document.getElementById('uploadZone').classList.remove('drag');
  const f=e.dataTransfer.files[0];
  if(f&&f.type.startsWith('image/'))handleImg({target:{files:[f]}});
}
function removeImg(e){
  e.stopPropagation();imgSrc=null;
  document.getElementById('imgInput').value='';
  document.getElementById('uploadPH').style.display='';
  document.getElementById('uploadPreviewWrap').style.display='none';
  updatePreview();syncStep();
}

/* ── update preview ── */
function updatePreview(){
  const name=document.getElementById('menuName')?.value.trim()||'';
  const desc=document.getElementById('menuDesc')?.value.trim()||'';
  const price=document.getElementById('menuPrice')?.value||'';
  const oldp=document.getElementById('menuOldPrice')?.value||'';
  const ct=document.getElementById('menuCookTime')?.value||'';
  const cal=document.getElementById('menuCalorie')?.value||'';
  const st=document.getElementById('menuStock')?.value||'';

  document.getElementById('mcName').textContent=name||'Nama Menu';
  const de=document.getElementById('mcDesc');de.textContent=desc;de.style.display=desc?'':'none';
  document.getElementById('mcPrice').textContent=price?'Rp '+parseInt(price).toLocaleString('id-ID'):'Rp —';
  const oe=document.getElementById('mcOld');
  if(oldp){oe.textContent='Rp '+parseInt(oldp).toLocaleString('id-ID');oe.style.display='';}else oe.style.display='none';
  document.getElementById('mcCat').textContent=selCat?CL[selCat]:'Kategori';

  const ia=document.getElementById('mcImg');
  if(imgSrc){ia.innerHTML=`<img src="${imgSrc}" alt="">`;ia.style.background='';}
  else{ia.innerHTML=selCat?CE[selCat]:'🍽️';ia.style.background=selCat?CB[selCat]:'#e6faf6';}

  const lbs=[];
  if(document.getElementById('lbl-new')?.checked)lbs.push({t:'Baru',c:'#3b82f6',bg:'#eff6ff'});
  if(document.getElementById('lbl-best')?.checked)lbs.push({t:'🔥 Best',c:'#ea580c',bg:'#fff7ed'});
  if(document.getElementById('lbl-spicy')?.checked)lbs.push({t:'🌶️ Pedas',c:'#dc2626',bg:'#fef2f2'});
  if(document.getElementById('lbl-vege')?.checked)lbs.push({t:'🌿 Vege',c:'#16a34a',bg:'#f0fdf4'});
  document.getElementById('mcBadges').innerHTML=lbs.map(l=>`<span class="mc-badge" style="color:${l.c};background:${l.bg}">${l.t}</span>`).join('');

  document.getElementById('mvTime').textContent=ct?ct+' menit':'—';
  document.getElementById('mvCal').textContent=cal?cal+' kkal':'—';
  document.getElementById('mvStock').textContent=st?st+' porsi':'—';

  const checks={img:!!imgSrc,name:!!name,price:!!price&&Number(price)>0,cat:!!selCat,desc:!!desc};
  const keys=Object.keys(checks);
  const filled=keys.filter(k=>checks[k]).length;
  const pct=Math.round(filled/keys.length*100);
  document.getElementById('pctText').textContent=pct+'%';
  document.getElementById('pctText').style.color=pct>=80?'#0BAB8C':pct>=40?'#f97316':'#94a3b8';
  const bar=document.getElementById('barFill');
  bar.style.width=pct+'%';
  bar.style.background=pct>=80?'#0BAB8C':pct>=40?'#f97316':'#e2e8f0';
  ['img','name','price','cat','desc'].forEach(k=>{
    document.getElementById('ci-'+k).classList.toggle('done',checks[k]);
  });
}

/* ── sync stepper ── */
function syncStep(){
  const name=document.getElementById('menuName')?.value.trim()||'';
  const price=document.getElementById('menuPrice')?.value||'';
  let step=1;
  if(name&&price>0)step=2;
  if(step>=2&&selCat)step=3;
  ['sd1','sd2','sd3'].forEach((id,i)=>{
    const el=document.getElementById(id);
    const lbl=document.getElementById(['sl1','sl2','sl3'][i]);
    if(i+1<step){el.className='step-dot done';el.innerHTML='✓';lbl.className='step-label';}
    else if(i+1===step){el.className='step-dot active';el.textContent=i+1;lbl.className='step-label';}
    else{el.className='step-dot idle';el.textContent=i+1;lbl.className='step-label idle';}
  });
  const line1=document.getElementById('sl-line1');
  const line2=document.getElementById('sl-line2');
  line1.className='step-line'+(step>1?' done':'');
  line2.className='step-line'+(step>2?' done':'');
  document.getElementById('stepPill').textContent=`Langkah ${Math.min(step,2)} dari 2`;
}

/* ── validation ── */
function validate(){
  let ok=true;
  const name=document.getElementById('menuName').value.trim();
  const price=document.getElementById('menuPrice').value;
  if(!name){document.getElementById('menuName').classList.add('err');document.getElementById('err-name').classList.add('show');ok=false;}
  else{document.getElementById('menuName').classList.remove('err');document.getElementById('err-name').classList.remove('show');}
  if(!price||Number(price)<=0){document.getElementById('menuPrice').classList.add('err');document.getElementById('err-price').classList.add('show');ok=false;}
  else{document.getElementById('menuPrice').classList.remove('err');document.getElementById('err-price').classList.remove('show');}
  if(!selCat){document.getElementById('err-cat').classList.add('show');ok=false;}
  return ok;
}

/* ── form actions ── */
function submitForm(){
  if(!validate()){showToast('❌ Lengkapi field yang wajib diisi','#ef4444');return;}
  showToast('✅ Menu berhasil disimpan!','#0BAB8C');
}
function saveDraft(){
  const n=document.getElementById('menuName').value.trim();
  if(!n){showToast('❌ Isi nama menu terlebih dahulu','#ef4444');return;}
  showToast('💾 Draft berhasil disimpan','#475569');
}
function resetForm(){
  if(!confirm('Reset semua data?'))return;
  ['menuName','menuDesc','menuPrice','menuOldPrice','menuCookTime','menuCalorie','menuStock'].forEach(id=>{
    const e=document.getElementById(id);if(e)e.value='';
  });
  document.getElementById('menuPortion').value='';
  document.querySelectorAll('.pill').forEach(p=>p.classList.remove('sel'));
  selCat=null;
  ['lbl-new','lbl-best','lbl-spicy','lbl-vege'].forEach(id=>{
    const cb=document.getElementById(id);if(cb)cb.checked=false;
    const lbl=cb?.closest('.check-item');if(lbl)lbl.classList.remove('checked');
  });
  removeImg({stopPropagation:()=>{}});
  updatePreview();syncStep();
  showToast('🗑 Form direset','#6b7280');
}

/* ── toast ── */
function showToast(msg,bg='#0BAB8C'){
  const t=document.getElementById('toast');
  t.textContent=msg;t.style.background=bg;
  t.classList.add('show');
  setTimeout(()=>t.classList.remove('show'),2800);
}

updatePreview();syncStep();
</script>
</body>
</html>
