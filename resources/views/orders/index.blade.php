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
                        class="cat-btn flex-shrink-0 tab-active px-3 py-2 rounded-xl text-xs font-semibold">🍽️
                        All</button>
                    <button onclick="filterCategory('soup')" data-cat="soup"
                        class="cat-btn flex-shrink-0 bg-white text-gray-500 px-3 py-2 rounded-xl text-xs font-semibold">🍲
                        Makanan</button>
                    <button onclick="filterCategory('dessert')" data-cat="dessert"
                        class="cat-btn flex-shrink-0 bg-white text-gray-500 px-3 py-2 rounded-xl text-xs font-semibold">🍵
                        Minuman</button>
                    <button onclick="filterCategory('chicken')" data-cat="chicken"
                        class="cat-btn flex-shrink-0 bg-white text-gray-500 px-3 py-2 rounded-xl text-xs font-semibold">🚗
                        Carwash</button>
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
                <!-- Table Info -->
                <div class="px-4 py-3 border-b border-gray-100 flex-shrink-0">
                    <div class="flex items-center justify-between">
                        <div>
                            <!-- Table No (editable) -->
                            <div class="flex items-center gap-1.5">
                                <span class="text-xs text-gray-400 font-medium">Table No</span>
                                <div class="relative flex items-center">
                                    <span class="text-sm font-bold text-gray-900">#</span>
                                    <input id="tableNoInput"
                                        type="text"
                                        value="04"
                                        maxlength="4"
                                        oninput="updateTableInfo()"
                                        class="w-10 text-sm font-bold text-gray-900 bg-transparent border-b-2 border-dashed border-gray-300 focus:border-[#0BAB8C] focus:outline-none text-center transition-colors" />
                                </div>
                            </div>
                            <!-- Order info (editable people count) -->
                            <div class="flex items-center gap-1 mt-0.5">
                                <span id="orderLabel" class="text-xs text-gray-400">Order #F0030 ·</span>
                                <input id="peopleInput"
                                    type="number"
                                    value="2"
                                    min="1"
                                    max="99"
                                    oninput="updateTableInfo()"
                                    class="w-7 text-xs text-gray-400 bg-transparent border-b border-dashed border-gray-300 focus:border-[#0BAB8C] focus:outline-none text-center transition-colors" />
                                <span class="text-xs text-gray-400">People</span>
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
                    <div class="text-xs font-bold text-gray-900 mb-2">Payment Summary</div>
                    <div class="flex flex-col gap-1.5">
                        <div class="flex justify-between text-xs"><span class="text-gray-500">Subtotal</span><span
                                id="subtotal" class="font-semibold text-gray-800">$0.00</span></div>
                        <div class="flex justify-between text-xs"><span class="text-gray-500">Tax (6%)</span><span
                                id="tax" class="font-semibold text-gray-800">$0.00</span></div>
                        <div class="flex justify-between text-xs"><span class="text-gray-500">Donation
                                Palestine</span><span class="font-semibold text-gray-800">$1.00</span></div>
                        <div class="border-t border-gray-100 mt-1.5 pt-1.5 flex justify-between">
                            <span class="font-bold text-gray-900 text-sm">Total Payable</span>
                            <span id="total" class="font-bold text-[#0BAB8C] text-sm">$0.00</span>
                        </div>
                    </div>
                </div>

                <!-- Notes -->
                <div class="px-4 pb-3 border-t border-gray-100 flex-shrink-0">
                    <div class="text-xs font-bold text-gray-900 mb-2 mt-3">Notes</div>
                    <div class="relative">
                        <textarea id="orderNotes"
                            placeholder="Tambahkan catatan untuk dapur... (alergi, tingkat kematangan, dll)"
                            maxlength="200"
                            oninput="updateNoteCount()"
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
                            class="payment-btn flex-1 py-2 rounded-xl text-x    s font-semibold text-gray-500">💵
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
                    <button
                        class="flex-1 py-2.5 bg-[#0BAB8C] hover:bg-teal-700 rounded-xl text-sm font-semibold text-white transition-colors">Place
                        Order</button>
                </div>
            </div>
        </div>

    </div><!-- end #appWrapper -->

    <!-- ═══ FAB (tablet + phone only) ═══ -->
    <button id="orderFab" onclick="openPanel()"
        class="bg-[#0BAB8C] text-white px-5 py-3 rounded-2xl shadow-xl items-center gap-2 font-semibold text-sm active:scale-95 transition-all"
        style="bottom:72px">
        🛒 Pesanan (<span id="fabCount">0</span>)
    </button>

    <script>
        /* ═══════════════════════════════════════
               MENU DATA & LOGIC
            ═══════════════════════════════════════ */
        const menuItems = [{
                id: 1,
                name: 'Grilled Salmon Steak',
                type: 'Lunch',
                price: 15,
                cat: 'special',
                emoji: '🍣',
                color: '#FFF5F0'
            },
            {
                id: 2,
                name: 'Tofu Poke Bowl',
                type: 'Salad',
                price: 7,
                cat: 'special',
                emoji: '🥗',
                color: '#F0FFF4'
            },
            {
                id: 3,
                name: 'Pasta with Roast Beef',
                type: 'Pasta',
                price: 10,
                cat: 'all',
                emoji: '🍝',
                color: '#FFF9F0'
            },
            {
                id: 4,
                name: 'Beef Steak',
                type: 'Beef',
                price: 30,
                cat: 'all',
                emoji: '🥩',
                color: '#FFF0F0'
            },
            {
                id: 5,
                name: 'Shrimp Rice Bowl',
                type: 'Rice',
                price: 6,
                cat: 'all',
                emoji: '🍤',
                color: '#F0F8FF'
            },
            {
                id: 6,
                name: 'Apple Stuffed Pancake',
                type: 'Dessert',
                price: 35,
                cat: 'dessert',
                emoji: '🥞',
                color: '#FFFFF0'
            },
            {
                id: 7,
                name: 'Chicken Quinoa & Herbs',
                type: 'Chicken',
                price: 12,
                cat: 'chicken',
                emoji: '🍗',
                color: '#F5FFF0'
            },
            {
                id: 8,
                name: 'Vegetable Shrimp',
                type: 'Salad',
                price: 10,
                cat: 'all',
                emoji: '🥦',
                color: '#F0FFF8'
            },
            {
                id: 9,
                name: 'Tom Yum Soup',
                type: 'Soup',
                price: 8,
                cat: 'soup',
                emoji: '🍜',
                color: '#FFF8F0'
            },
            {
                id: 10,
                name: 'Chocolate Lava Cake',
                type: 'Dessert',
                price: 9,
                cat: 'dessert',
                emoji: '🍫',
                color: '#FDF0FF'
            },
        ];

        const order = {};
        let currentCat = 'all';

        function initOrder() {
            _add(3, 2);
            _add(5, 2);
            _add(6, 1);
            _add(8, 1);
        }

        function _add(id, qty) {
            const item = menuItems.find(m => m.id === id);
            if (!item) return;
            if (!order[id]) order[id] = {
                ...item,
                qty: 0
            };
            order[id].qty += qty;
        }

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
            const list = currentCat === 'all' ? menuItems : menuItems.filter(m => m.cat === currentCat || m.cat === 'all');
            grid.innerHTML = list.map(item => {
                const qty = order[item.id]?.qty || 0;
                return `
                <div class="menu-card bg-white rounded-2xl p-3 select-none">
                    <div class="w-full h-20 rounded-xl flex items-center justify-center text-4xl mb-2" style="background:${item.color}">${item.emoji}</div>
                    <div class="text-[10px] text-gray-400 font-medium">${item.type}</div>
                    <div class="text-xs font-bold text-gray-800 mb-2 leading-tight">${item.name}</div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-bold text-gray-900">$${item.price.toFixed(2)}</span>
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
                    <div class="w-9 h-9 rounded-xl flex items-center justify-center text-xl flex-shrink-0" style="background:${o.color}">${o.emoji}</div>
                    <div class="flex-1 min-w-0">
                        <div class="text-xs font-semibold text-gray-800 truncate">${o.name}</div>
                        <div class="text-xs text-[#0BAB8C] font-bold">$${(o.price * o.qty).toFixed(2)}</div>
                    </div>
                    <div class="flex items-center gap-1 flex-shrink-0">
                        <button onclick="changeOrderQty(${o.id},-1)" class="qty-btn w-6 h-6 bg-gray-100 rounded-full flex items-center justify-center text-gray-600 text-sm font-bold leading-none">−</button>
                        <span class="text-xs font-bold text-gray-800 w-4 text-center">${o.qty}</span>
                        <button onclick="changeOrderQty(${o.id},1)" class="qty-btn w-6 h-6 bg-[#0BAB8C] rounded-full flex items-center justify-center text-white text-sm font-bold leading-none">+</button>
                    </div>
                </div>`).join('');

            const totalQty = items.reduce((s, o) => s + o.qty, 0);
            const subtotal = items.reduce((s, o) => s + o.price * o.qty, 0);
            const tax = subtotal * 0.06;
            const total = subtotal + tax + 1;

            document.getElementById('itemCount').textContent = String(totalQty).padStart(2, '0');
            document.getElementById('subtotal').textContent = '$' + subtotal.toFixed(2);
            document.getElementById('tax').textContent = '$' + tax.toFixed(2);
            document.getElementById('total').textContent = '$' + total.toFixed(2);

            // FAB: show only on non-desktop when there are items
            const fab = document.getElementById('orderFab');
            document.getElementById('fabCount').textContent = totalQty;
            fab.style.display = (window.innerWidth < 1024 && totalQty > 0) ? 'flex' : 'none';
        }

        function selectPayment(btn) {
            document.querySelectorAll('.payment-btn').forEach(b => {
                b.classList.remove('selected');
                b.classList.add('text-gray-500');
            });
            btn.classList.add('selected');
            btn.classList.remove('text-gray-500');
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
            const people  = document.getElementById('peopleInput').value || '1';
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

        initOrder();
        renderMenu();
        renderOrderPanel();
    </script>
    @include('footer.footer')
