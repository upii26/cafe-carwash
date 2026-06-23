@include('header.head')


<body class="bg-[#F2F2F0] h-screen overflow-hidden">
    @include('header.sidebar')
    <div id="panelOverlay" onclick="closePanel()"></div>
    <div id="appWrapper" class="flex flex-col h-screen">
        @include('header.navbar')

        <!-- ═══ MAIN LAYOUT ROW ═══ -->
        <div class="main-layout flex flex-1 overflow-hidden" style="height:calc(100vh - 56px)">

            <!-- CENTER SCROLL -->
            <div class="flex-1 p-4 flex flex-col overflow-hidden">

                <!-- Foodies Menu -->
                <div class="flex items-center justify-between mb-3 flex-shrink-0">
                    <h2 class="font-bold text-gray-900">Menu Orders</h2>
                </div>

                <!-- Category Filter -->
                <div class="flex gap-2 mb-4 overflow-x-auto pb-1 flex-shrink-0">

                    <button onclick="filterCategory('all')" data-cat="all"
                        class="cat-btn flex-shrink-0 tab-active px-3 py-2 rounded-xl text-xs font-semibold">
                        🍽️ All
                    </button>

                    @php
                        $icons = [
                            'Makanan' => '🍲',
                            'Minuman' => '🍵',
                            'Carwash' => '🚗',
                        ];
                    @endphp

                    @foreach ($menus->pluck('category')->unique('id') as $category)
                        <button onclick="filterCategory('{{ strtolower($category->name_category) }}')"
                            data-cat="{{ strtolower($category->name_category) }}"
                            class="cat-btn flex-shrink-0 bg-white text-gray-500 px-3 py-2 rounded-xl text-xs font-semibold">

                            {{ $icons[strtolower($category->name_category)] ?? '📦' }}
                            {{ $category->name_category }}
                        </button>
                    @endforeach

                </div>

                <!-- Menu Grid -->
                <div class="flex-1 overflow-y-auto">
                    <div id="menuGrid" class="menu-grid grid grid-cols-3 gap-3 pb-20 lg:pb-6"></div>
                </div>
            </div>

            <!-- ═══ RIGHT PANEL ═══ -->
            <div id="rightPanel">

                <!-- Drag handle (mobile/tablet only) -->
                <div class="drag-handle flex justify-center pt-3 pb-1 flex-shrink-0">
                    <div class="w-10 h-1 bg-gray-300 rounded-full"></div>
                </div>

                <!-- Table Info -->
                <div class="px-4 py-3 border-b border-gray-100 flex-shrink-0">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <!-- Table No (editable) -->
                            <div class="flex items-center gap-1.5">
                                <span class="text-xs text-gray-400 font-medium">Table No</span>
                                <div class="relative flex items-center">
                                    <span class="text-sm font-bold text-gray-900">#</span>
                                    <input id="tableNoInput" type="text" value="04" maxlength="4"
                                        oninput="updateTableInfo()"
                                        class="w-10 text-sm font-bold text-gray-900 bg-transparent border-b-2 border-dashed border-gray-300 focus:border-[#0BAB8C] focus:outline-none text-center transition-colors" />
                                </div>
                            </div>
                            <!-- Order info (editable people count) -->
                            <div class="flex items-center gap-1 mt-0.5">
                                <span id="orderLabel" class="text-xs text-gray-400">Order #F0030 ·</span>
                                <input id="peopleInput" type="number" value="2" min="1" max="99"
                                    oninput="updateTableInfo()"
                                    class="w-7 text-xs text-gray-400 bg-transparent border-b border-dashed border-gray-300 focus:border-[#0BAB8C] focus:outline-none text-center transition-colors" />
                                <span class="text-xs text-gray-400">People</span>
                            </div>
                            <!-- Customer Name -->
                            <div class="mt-2">
                                <label for="customerName" class="text-[10px] text-gray-400 font-medium mb-1 block">Nama
                                    Customer</label>
                                <div class="relative">
                                    <svg class="w-3.5 h-3.5 text-gray-300 absolute left-3 top-1/2 -translate-y-1/2"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <input id="customerName" type="text" placeholder="Masukkan nama customer"
                                        class="w-full text-xs border border-gray-200 rounded-xl pl-8 pr-3 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#0BAB8C]/30 focus:border-[#0BAB8C] transition-all">
                                </div>
                            </div>
                        </div>
                        <div class="flex gap-1.5">
                            <button
                                class="w-8 h-8 bg-gray-50 rounded-lg flex items-center justify-center hover:bg-gray-100">
                                <svg class="w-3.5 h-3.5 text-gray-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </button>
                            <button
                                class="w-8 h-8 bg-gray-50 rounded-lg flex items-center justify-center hover:bg-red-50 group">
                                <svg class="w-3.5 h-3.5 text-gray-500 group-hover:text-red-500" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                            <button onclick="closePanel()"
                                class="close-panel-btn w-8 h-8 bg-gray-50 rounded-lg flex items-center justify-center hover:bg-gray-100 lg:hidden">
                                <svg class="w-3.5 h-3.5 text-gray-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Ordered Items -->
                <div class="px-4 pt-3 pb-2 flex-1 overflow-y-auto">
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-sm font-bold text-gray-900">Ordered Items</span>
                        <span id="itemCount"
                            class="bg-[#0BAB8C] text-white text-xs font-bold px-2 py-0.5 rounded-full">00</span>
                    </div>
                    <div id="orderedItems" class="flex flex-col gap-3"></div>
                </div>

                <!-- Payment Summary -->
                <div class="px-4 pt-3 pb-2 border-t border-gray-100 flex-shrink-0">

                    <div class="text-xs font-bold text-gray-900 mb-2">
                        Payment Summary
                    </div>

                    <div class="flex flex-col gap-1.5">

                        <div class="flex justify-between text-xs">
                            <span class="text-gray-500">Subtotal</span>

                            <span id="subtotal" class="font-semibold text-gray-800">
                                Rp 0
                            </span>
                        </div>

                        <div class="border-t border-gray-100 mt-1.5 pt-1.5 flex justify-between">

                            <span class="font-bold text-gray-900 text-sm">
                                Total Payable
                            </span>

                            <span id="total" class="font-bold text-[#0BAB8C] text-sm">
                                Rp 0
                            </span>

                        </div>
                    </div>
                </div>

                <!-- Notes -->
                <div class="px-4 pb-3 border-t border-gray-100 flex-shrink-0">
                    <div class="text-xs font-bold text-gray-900 mb-2 mt-3">Notes</div>
                    <div class="relative">
                        <textarea id="orderNotes" placeholder="Tambahkan catatan untuk dapur... (alergi, tingkat kematangan, dll)"
                            maxlength="200" oninput="updateNoteCount()"
                            class="w-full text-xs text-gray-700 placeholder-gray-300 bg-gray-50 border border-gray-200 rounded-xl px-3 py-2.5 resize-none focus:outline-none focus:ring-2 focus:ring-[#0BAB8C]/30 focus:border-[#0BAB8C] transition-all"
                            rows="3"></textarea>
                        <span id="noteCount" class="absolute bottom-2 right-3 text-[10px] text-gray-300">0/200</span>
                    </div>
                    <!-- Quick note chips -->
                    <div class="flex flex-wrap gap-1.5 mt-2">
                        <button onclick="addQuickNote('Tidak pedas')"
                            class="quick-note-chip text-[10px] px-2 py-1 bg-gray-100 text-gray-500 rounded-lg hover:bg-[#0BAB8C]/10 hover:text-[#0BAB8C] transition-colors font-medium">
                            🌶️ Tidak pedas
                        </button>
                        <button onclick="addQuickNote('Extra saus')"
                            class="quick-note-chip text-[10px] px-2 py-1 bg-gray-100 text-gray-500 rounded-lg hover:bg-[#0BAB8C]/10 hover:text-[#0BAB8C] transition-colors font-medium">
                            🥫 Extra saus
                        </button>
                        <button onclick="addQuickNote('Tanpa bawang')"
                            class="quick-note-chip text-[10px] px-2 py-1 bg-gray-100 text-gray-500 rounded-lg hover:bg-[#0BAB8C]/10 hover:text-[#0BAB8C] transition-colors font-medium">
                            🧅 Tanpa bawang
                        </button>
                        <button onclick="addQuickNote('Take Away')"
                            class="quick-note-chip text-[10px] px-2 py-1 bg-gray-100 text-gray-500 rounded-lg hover:bg-[#0BAB8C]/10 hover:text-[#0BAB8C] transition-colors font-medium">
                            🛵 Take Away
                        </button>
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="px-4 pb-3 flex-shrink-0">
                    <div class="text-xs font-bold text-gray-900 mb-2">Payment Method</div>
                    <div class="flex gap-2">
                        <button onclick="selectPayment(this)"
                            class="payment-btn flex-1 py-2 rounded-xl text-xs font-semibold text-gray-500">💵
                            Cash</button>
                        <button onclick="selectPayment(this)"
                            class="payment-btn selected flex-1 py-2 rounded-xl text-xs font-semibold">💳 Card</button>
                        <button onclick="selectPayment(this)"
                            class="payment-btn flex-1 py-2 rounded-xl text-xs font-semibold text-gray-500">📷
                            Scan</button>
                    </div>
                </div>

                <!-- Actions -->
                <div class="px-4 pb-5 flex gap-2 flex-shrink-0">
                    <button
                        class="flex-1 py-2.5 bg-gray-50 hover:bg-gray-100 rounded-xl text-sm font-semibold text-gray-700 transition-colors">🖨
                        Print</button>
                    <button onclick="placeOrder()"
                        class="flex-1 py-2.5 bg-[#0BAB8C] hover:bg-teal-700 rounded-xl text-sm font-semibold text-white transition-colors">
                        Place Order
                    </button>
                </div>
            </div>    
        </div>

    </div>

    <!-- ═══ FAB (tablet + phone only) ═══ -->
    <button id="orderFab" onclick="openPanel()"
        class="bg-[#0BAB8C] text-white px-5 py-3 rounded-2xl shadow-xl items-center gap-2 font-semibold text-sm active:scale-95 transition-all"
        style="bottom:72px">
        🛒 Pesanan (<span id="fabCount">0</span>)
    </button>

    <!-- SUCCESS MODAL -->
    <div id="successModal" class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50 p-4">
        <div class="bg-white rounded-2xl p-6 w-full max-w-sm">
            <div class="text-center">
                <div
                    class="w-16 h-16 rounded-full bg-green-100 mx-auto flex items-center justify-center text-3xl mb-4">
                    ✅
                </div>

                <h2 class="text-lg font-bold text-gray-800 mb-1">
                    Order Berhasil
                </h2>

                <p class="text-sm text-gray-500 mb-4">
                    Pesanan berhasil dibuat & dikirim ke dapur.
                </p>

                <!-- Ringkasan Order -->
                <div class="bg-gray-50 rounded-xl p-3 text-left mb-5">
                    <div class="flex justify-between text-xs mb-1">
                        <span class="text-gray-400">Customer</span>
                        <span id="modalCustomer" class="font-semibold text-gray-800">-</span>
                    </div>
                    <div class="flex justify-between text-xs mb-1">
                        <span class="text-gray-400">No. Meja</span>
                        <span id="modalTable" class="font-semibold text-gray-800">-</span>
                    </div>
                    <div class="flex justify-between text-xs mb-2">
                        <span class="text-gray-400">Pembayaran</span>
                        <span id="modalPayment" class="font-semibold text-gray-800">-</span>
                    </div>
                    <div class="border-t border-gray-200 pt-2 flex justify-between">
                        <span class="text-sm font-bold text-gray-900">Total</span>
                        <span id="modalTotal" class="text-sm font-bold text-[#0BAB8C]">Rp 0</span>
                    </div>
                </div>

                <div class="flex gap-2">
                    <button onclick="closeSuccessModal()"
                        class="flex-1 py-2 rounded-xl border border-gray-200 text-gray-600 text-sm font-semibold hover:bg-gray-50 transition-colors">
                        Tutup
                    </button>

                    <button onclick="printReceipt()"
                        class="flex-1 py-2 rounded-xl bg-[#0BAB8C] text-white font-semibold text-sm hover:bg-teal-700 transition-colors">
                        🖨 Print Struk
                    </button>
                </div>
            </div>

        </div>
    </div>

    @php
        $menuData = $menus->map(function ($m) {
            return [
                'id' => $m->id,
                'name' => $m->name,
                'price' => $m->price,
                'photo' => $m->photo,
                'category' => $m->category->name_category ?? '-',
                'category_id' => $m->category_id,
            ];
        });
    @endphp

    <script>
        const menuItems = @json($menuData);

        const order = {};
        let currentCat = 'all';


        function filterCategory(cat) {
            currentCat = cat;
            document.querySelectorAll('.cat-btn').forEach(b => {
                const on = b.dataset.cat === cat;
                b.classList.toggle('tab-active', on);
                b.classList.toggle('bg-white', !on);
                b.classList.toggle('text-gray-500', !on);
            });
            renderMenu();
        }

        function renderMenu() {
            const grid = document.getElementById('menuGrid');
            const list = currentCat === 'all' ? menuItems : menuItems.filter(m => m.category.toLowerCase() === currentCat);
            grid.innerHTML = list.map(item => {
                const qty = order[item.id]?.qty || 0;
                return `
                <div class="menu-card bg-white rounded-2xl p-3 select-none">
                  <div class="w-full rounded-xl overflow-hidden mb-2 bg-gray-100">
                    <img
                        src="/storage/${item.photo}"
                        class=" object-cover"
                        onerror="this.src='https://placehold.co/300x200'">
                </div>
                    <div class="text-[10px] text-gray-400 font-medium">${item.category}</div>
                    <div class="text-xs font-bold text-gray-800 mb-2 leading-tight">${item.name}</div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-bold text-gray-900">Rp ${Number(item.price).toLocaleString('id-ID')}</span>
                        <div class="flex items-center gap-1.5">
                            <button onclick="changeQty(${item.id},-1)" class="qty-btn w-7 h-7 bg-gray-100 rounded-full flex items-center justify-center text-gray-600 font-bold text-base leading-none">−</button>
                            <span id="qty-${item.id}" class="text-sm font-semibold text-gray-800 min-w-[20px] text-center">${qty}</span>
                            <button onclick="changeQty(${item.id},1)" class="qty-btn w-7 h-7 bg-[#0BAB8C] rounded-full flex items-center justify-center text-white font-bold text-base leading-none">+</button>
                        </div>
                    </div>
                </div>`;
            }).join('');
        }

        function changeQty(id, delta) {
            const item = menuItems.find(m => m.id === id);
            if (!item) return;
            if (!order[id]) order[id] = {
                ...item,
                qty: 0
            };
            order[id].qty = Math.max(0, order[id].qty + delta);
            if (order[id].qty === 0) delete order[id];
            const el = document.getElementById('qty-' + id);
            if (el) el.textContent = order[id]?.qty || 0;
            renderOrderPanel();
        }

        function changeOrderQty(id, delta) {
            changeQty(id, delta);
            renderMenu();
        }

        function renderOrderPanel() {
            const container = document.getElementById('orderedItems');
            const items = Object.values(order).filter(o => o.qty > 0);

            container.innerHTML = items.length === 0 ?
                `<div class="text-center text-gray-300 py-8 text-sm">Belum ada pesanan 🍽️</div>` :
                items.map(o => `
    <div class="flex items-center gap-2">

        <div class="w-10 h-10 rounded-xl overflow-hidden flex-shrink-0 bg-gray-100">
            <img
                src="/storage/${o.photo}"
                class="w-full h-full object-cover"
                onerror="this.src='https://placehold.co/100x100'"
            >
        </div>

        <div class="flex-1 min-w-0">
            <div class="text-xs font-semibold text-gray-800 truncate">${o.name}</div>
            <div class="text-xs text-[#0BAB8C] font-bold">
                Rp ${Number(o.price * o.qty).toLocaleString('id-ID')}
            </div>
        </div>

        <div class="flex items-center gap-1 flex-shrink-0">
            <button onclick="changeOrderQty(${o.id},-1)"
                class="qty-btn w-6 h-6 bg-gray-100 rounded-full flex items-center justify-center text-gray-600 text-sm font-bold leading-none">
                −
            </button>

            <span class="text-xs font-bold text-gray-800 w-4 text-center">${o.qty}</span>

            <button onclick="changeOrderQty(${o.id},1)"
                class="qty-btn w-6 h-6 bg-[#0BAB8C] rounded-full flex items-center justify-center text-white text-sm font-bold leading-none">
                +
            </button>
        </div>

    </div>
`).join('');

            const subtotal = items.reduce((s, o) => s + (o.price * o.qty), 0);

            const total = subtotal;

            document.getElementById('subtotal').textContent = 'Rp ' + subtotal.toLocaleString('id-ID');

            document.getElementById('total').textContent = 'Rp ' + total.toLocaleString('id-ID');

            // Item count badge
            const totalQty = items.reduce((s, o) => s + o.qty, 0);
            document.getElementById('itemCount').textContent = String(totalQty).padStart(2, '0');

            // FAB: show only on non-desktop when there are items
            const fab = document.getElementById('orderFab');
            document.getElementById('fabCount').textContent = totalQty;
            fab.style.display = (window.innerWidth < 1024 && totalQty > 0) ? 'flex' : 'none';
        }

        let paymentMethod = 'Card';

        function selectPayment(btn) {

            document.querySelectorAll('.payment-btn').forEach(b => {
                b.classList.remove('selected');
                b.classList.add('text-gray-500');
            });

            btn.classList.add('selected');
            btn.classList.remove('text-gray-500');

            paymentMethod = btn.innerText.trim();
        }

        function updateNoteCount() {
            const textarea = document.getElementById('orderNotes');
            const counter = document.getElementById('noteCount');
            const len = textarea.value.length;
            counter.textContent = len + '/200';
            counter.classList.toggle('text-orange-400', len >= 160);
            counter.classList.toggle('text-gray-300', len < 160);
        }

        function addQuickNote(text) {
            const textarea = document.getElementById('orderNotes');
            const current = textarea.value.trim();
            const separator = current ? ', ' : '';
            const newVal = current + separator + text;
            if (newVal.length <= 200) {
                textarea.value = newVal;
                updateNoteCount();
                textarea.focus();
            }
        }

        function updateTableInfo() {
            const tableNo = document.getElementById('tableNoInput').value || '00';
            const people = document.getElementById('peopleInput').value || '1';
            // bisa dipakai saat Place Order untuk kirim ke backend
            console.log('Table:', tableNo, '| People:', people);
        }

        // Close panels on resize to desktop
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1024) {
                closeSidebar();
                document.getElementById('panelOverlay').classList.remove('open');
            }
            renderOrderPanel();
        });

        renderMenu();
        renderOrderPanel();

        let lastOrderData = null;

        async function placeOrder() {

            const items = Object.values(order);

            if (items.length === 0) {
                alert('Pesanan kosong');
                return;
            }

            const customerName =
                document.getElementById('customerName').value || 'Guest';

            const tableNo =
                document.getElementById('tableNoInput').value || '00';

            const paymentMethod =
                document.querySelector('.payment-btn.selected')
                ?.innerText
                ?.trim() || 'Cash';

            const menus = items.map(i => ({
                id: i.id,
                name: i.name,
                qty: i.qty,
                price: i.price,
                category_id: i.category_id
            }));

            try {

                const response = await fetch('/orders/store', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },

                    body: JSON.stringify({
                        name_customer: customerName,
                        no_table: tableNo,
                        payment_method: paymentMethod,
                        menus: menus
                    })
                });

                const result = await response.json();

                if (result.success) {

                    // Hitung subtotal dari items (client-side)
                    const subtotal = items.reduce((s, o) => s + (o.price * o.qty), 0);

                    // Pakai total dari server kalau valid, kalau tidak fallback ke subtotal
                    const total = (result.total !== undefined && !isNaN(Number(result.total))) ?
                        Number(result.total) :
                        subtotal;

                    lastOrderData = {
                        customer: customerName,
                        table: tableNo,
                        payment: paymentMethod,
                        items: items,
                        total: total
                    };

                    // Isi ringkasan ke modal
                    document.getElementById('modalCustomer').textContent = customerName;
                    document.getElementById('modalTable').textContent = '#' + tableNo;
                    document.getElementById('modalPayment').textContent = paymentMethod;
                    document.getElementById('modalTotal').textContent =
                        'Rp ' + total.toLocaleString('id-ID');

                    document
                        .getElementById('successModal')
                        .classList.remove('hidden');

                    document
                        .getElementById('successModal')
                        .classList.add('flex');

                    // RESET ORDER
                    Object.keys(order).forEach(k => delete order[k]);

                    renderMenu();
                    renderOrderPanel();

                    document.getElementById('orderNotes').value = '';
                    document.getElementById('customerName').value = '';

                } else {
                    alert(result.message);
                }

            } catch (err) {
                console.error(err);
                alert('Terjadi kesalahan server');
            }
        }

        function closeSuccessModal() {

            document
                .getElementById('successModal')
                .classList.add('hidden');

            document
                .getElementById('successModal')
                .classList.remove('flex');
        }

        function printReceipt() {

            if (!lastOrderData) return;

            let itemsHtml = '';
            let subtotal = 0;

            lastOrderData.items.forEach(item => {
                const lineTotal = item.price * item.qty;
                subtotal += lineTotal;
                itemsHtml += `
                    <tr>
                        <td colspan="2" style="padding-top:6px;font-weight:bold;">${item.name}</td>
                    </tr>
                    <tr>
                        <td>${item.qty} x Rp ${Number(item.price).toLocaleString('id-ID')}</td>
                        <td style="text-align:right">Rp ${lineTotal.toLocaleString('id-ID')}</td>
                    </tr>
                `;
            });

            const now = new Date();
            const dateStr = now.toLocaleDateString('id-ID', {
                day: '2-digit',
                month: 'long',
                year: 'numeric'
            });
            const timeStr = now.toLocaleTimeString('id-ID', {
                hour: '2-digit',
                minute: '2-digit'
            });

            const win = window.open('', '', 'width=350,height=600');

            win.document.write(`
        <html>
        <head>
            <title>Print Struk</title>

            <style>
                * { box-sizing: border-box; }
                body {
                    font-family: 'Courier New', monospace;
                    padding: 16px;
                    font-size: 12px;
                    color: #222;
                }
                .center { text-align: center; }
                h2 { margin: 0; font-size: 16px; letter-spacing: 1px; }
                .sub { font-size: 10px; color: #777; margin-top: 2px; }
                hr { border: none; border-top: 1px dashed #999; margin: 10px 0; }
                table { width: 100%; border-collapse: collapse; }
                td { padding: 2px 0; vertical-align: top; }
                .info td { font-size: 11px; color: #555; }
                .total td { font-weight: bold; font-size: 14px; padding-top: 6px; }
                .footer { margin-top: 14px; font-size: 11px; }
            </style>
        </head>

        <body>

            <div class="center">
                <h2>GG CAFE & CARWASH</h2>
                <div class="sub">Jl. Contoh Alamat No. 123</div>
                <div class="sub">${dateStr} • ${timeStr}</div>
            </div>

            <hr>

            <table class="info">
                <tr>
                    <td>Customer</td>
                    <td style="text-align:right">${lastOrderData.customer}</td>
                </tr>
                <tr>
                    <td>No. Meja</td>
                    <td style="text-align:right">#${lastOrderData.table}</td>
                </tr>
                <tr>
                    <td>Pembayaran</td>
                    <td style="text-align:right">${lastOrderData.payment}</td>
                </tr>
            </table>

            <hr>

            <table>
                ${itemsHtml}
            </table>

            <hr>

            <table>
                <tr>
                    <td>Subtotal</td>
                    <td style="text-align:right">Rp ${subtotal.toLocaleString('id-ID')}</td>
                </tr>
                <tr class="total">
                    <td>TOTAL</td>
                    <td style="text-align:right">Rp ${Number(lastOrderData.total).toLocaleString('id-ID')}</td>
                </tr>
            </table>

            <div class="footer center">
                Terima kasih atas kunjungan Anda 🙏<br>
                Sampai jumpa kembali!
            </div>

        </body>
        </html>
    `);

            win.document.close();

            win.print();
        }
    </script>
    @include('footer.footer')
