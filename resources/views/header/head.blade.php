<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>GG Cafe & Carwash</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/gglogo.png') }}">

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display="
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<style>
    * {
        font-family: 'Plus Jakarta Sans', sans-serif;
        box-sizing: border-box;
        -webkit-tap-highlight-color: transparent;
    }

    html,
    body {
        height: 100%;
        overflow: hidden;
    }

    /* ── Sidebar ── */
    .sidebar-item {
        transition: background .15s, color .15s;
    }

    .sidebar-item.active {
        background: #e6faf6;
        color: #000000;
    }

    .sidebar-item.active svg {
        color: #000000;
    }

    /* ── Cards ── */
    .order-card {
        transition: transform .2s, box-shadow .2s;
        cursor: pointer;
    }

    .order-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, .09);
    }

    .order-card.selected {
        border-color: #000000 !important;
    }

    .menu-card {
        transition: transform .2s, box-shadow .2s;
    }

    .menu-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 16px rgba(0, 0, 0, .1);
    }

    /* ── Qty buttons ── */
    .qty-btn {
        transition: transform .15s, background .15s;
        touch-action: manipulation;
        user-select: none;
    }

    .qty-btn:active {
        transform: scale(.85);
    }

    .cat-btn {
        touch-action: manipulation;
    }

    /* ── Tabs / payment ── */
    .tab-active {
        background: #0BAB8C !important;
        color: white !important;
    }

    .payment-btn {
        border: 1.5px solid #e5e7eb;
        transition: all .15s;
    }

    .payment-btn.selected {
        border-color: #000000;
        background: #e6faf6;
        color: #000000;
    }

    /* ── Badges ── */
    .badge-kitchen {
        background: #FFF3CD;
        color: #B45309;
    }

    .badge-waitlist {
        background: #FEE2E2;
        color: #B91C1C;
    }

    .badge-ready {
        background: #D1FAE5;
        color: #000000;
    }

    /* ── Scrollbar ── */
    ::-webkit-scrollbar {
        width: 3px;
        height: 3px;
    }

    ::-webkit-scrollbar-thumb {
        background: #ddd;
        border-radius: 99px;
    }

    /* ════════════════════════════════════════
       SIDEBAR — mobile drawer
    ════════════════════════════════════════ */
    #sidebar {
        position: fixed;
        left: 0;
        top: 0;
        bottom: 0;
        z-index: 60;

        background: linear-gradient(180deg,
                #14110A 0%,
                #1B160D 50%,
                #2A2112 100%);

        width: 220px;
        display: flex;
        flex-direction: column;
        padding: 20px 12px;

        box-shadow: 6px 0 24px rgba(0, 0, 0, .35);

        transition: transform .3s cubic-bezier(.4, 0, .2, 1);
        transform: translateX(-100%);
    }

    #sidebar.open {
        transform: translateX(0);
    }

    /* ── Sidebar overlay ── */
    #sidebarOverlay {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, .45);
        z-index: 59;
        display: none;
    }

    #sidebarOverlay.open {
        display: block;
    }

    /* ════════════════════════════════════════
       RIGHT PANEL — bottom sheet (mobile/tablet)
       & inline panel (desktop)
    ════════════════════════════════════════ */
    #rightPanel {
        background: white;
        display: flex;
        flex-direction: column;
        overflow: hidden;
        flex-shrink: 0;

        /* Mobile/tablet: fixed bottom sheet */
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        width: 100% !important;
        max-height: 80vh;
        border-radius: 22px 22px 0 0;
        box-shadow: 0 -8px 40px rgba(0, 0, 0, .18);
        z-index: 50;
        /* below sidebar (60) */
        transform: translateY(110%);
        transition: transform .35s cubic-bezier(.4, 0, .2, 1);
    }

    #rightPanel.open {
        transform: translateY(0);
    }

    /* ── Right panel overlay (shares class but different element) ── */
    #panelOverlay {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, .4);
        z-index: 49;
        /* below right panel */
        display: none;
    }

    #panelOverlay.open {
        display: block;
    }

    /* ── FAB ── */
    #orderFab {
        position: fixed;
        right: 16px;
        z-index: 45;
        display: none;
    }

    /* ════════════════════════════════════════
       DESKTOP ≥1024px
    ════════════════════════════════════════ */
    @media (min-width: 1024px) {
        #appWrapper {
            padding-left: 220px;
        }

        /* Sidebar always visible, no drawer needed */
        #sidebar {
            transform: translateX(0) !important;
            box-shadow: none;
            border-right: 1px solid #f3f4f6;
            z-index: 30;
        }

        #sidebarOverlay {
            display: none !important;
        }

        #hamburger {
            display: none !important;
        }

        /* Right panel: inline */
        #rightPanel {
            position: relative !important;
            transform: none !important;
            width: 280px !important;
            max-height: unset !important;
            border-radius: 0 !important;
            box-shadow: none !important;
            border-left: 1px solid #f3f4f6;
            z-index: auto !important;
        }

        #panelOverlay {
            display: none !important;
        }

        #orderFab {
            display: none !important;
        }

        .bottom-nav {
            display: none !important;
        }

        .drag-handle {
            display: none !important;
        }

        .close-panel-btn {
            display: none !important;
        }

        .main-layout {
            height: calc(100vh - 56px) !important;
        }
    }

    /* ════════════════════════════════════════
       TABLET LANDSCAPE 768–1023px
    ════════════════════════════════════════ */
    @media (min-width: 768px) and (max-width: 1023px) {
        #appWrapper {
            padding-left: 0;
        }

        .bottom-nav {
            display: none !important;
        }

        /* Right panel bottom sheet */
        #rightPanel {
            bottom: 0;
        }

        #orderFab {
            display: none;
            bottom: 16px;
        }

        .main-layout {
            height: calc(100vh - 56px);
        }

        .menu-grid {
            grid-template-columns: repeat(3, 1fr) !important;
        }
    }

    /* ════════════════════════════════════════
       MOBILE <768px
    ════════════════════════════════════════ */
    @media (max-width: 767px) {
        #appWrapper {
            padding-left: 0;
        }

        /* Right panel sits above bottom nav */
        #rightPanel {
            bottom: 56px;
            max-height: 75vh;
        }

        #orderFab {
            bottom: 68px;
        }

        .bottom-nav {
            display: flex !important;
        }

        .main-layout {
            height: calc(100vh - 56px - 56px);
        }

        .search-input {
            width: 150px !important;
        }

        .menu-grid {
            grid-template-columns: repeat(2, 1fr) !important;
        }
    }
</style>
