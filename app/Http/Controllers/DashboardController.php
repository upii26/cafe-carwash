<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $today = now()->toDateString();

        // ════════════════════════════════════════
        // STAT CARDS — hanya Makanan & Minuman
        // ════════════════════════════════════════

        // Total Revenue hari ini (Makanan & Minuman)
        $totalRevenue = Order::whereHas('items.category', function ($q) {
            $q->whereIn('name_category', ['Makanan', 'Minuman']);
        })
            ->whereDate('created_at', $today)
            ->sum('total');

        // Total Pesanan hari ini (Makanan & Minuman)
        $totalOrders = Order::whereHas('items.category', function ($q) {
            $q->whereIn('name_category', ['Makanan', 'Minuman']);
        })
            ->whereDate('created_at', $today)
            ->count();

        // Rata-rata nilai pesanan hari ini
        $avgOrder = $totalOrders > 0
            ? round($totalRevenue / $totalOrders)
            : 0;

        // Progress pendapatan
        $targetPendapatan = 1500000;
        $pctPendapatan = $targetPendapatan > 0
        ? min(100, ($totalRevenue / $targetPendapatan) * 100)
        : 0;

        // ════════════════════════════════════════
        // CHART — Pendapatan 7 hari terakhir (Makanan & Minuman)
        // ════════════════════════════════════════
        $weeklyChart = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i);

            $total = Order::whereHas('items.category', function ($q) {
                $q->whereIn('name_category', ['Makanan', 'Minuman']);
            })
                ->whereDate('created_at', $date->toDateString())
                ->sum('total');

            $weeklyChart[] = [
                'label' => $date->translatedFormat('D'),
                'total' => (int) $total,
                'date' => $date->toDateString(),
            ];
        }

        // ════════════════════════════════════════
        // PESANAN TERKINI (Makanan & Minuman, 5 terakhir)
        // ════════════════════════════════════════
        $recentOrders = Order::with(['items.menu', 'items.category'])
            ->whereHas('items.category', function ($q) {
                $q->whereIn('name_category', ['Makanan', 'Minuman']);
            })
            ->whereDate('created_at', $today)
            ->latest()
            ->take(5)
            ->get()
            ->map(function ($order) {
                return [
                    'no_order' => $order->no_order,
                    'no_table' => $order->no_table,
                    'item_count' => $order->items->count(),
                    'total' => (int) $order->total,
                    'payment_method' => $order->payment_method,
                    'created_at' => $order->created_at->format('H:i'),
                ];
            });

        // ════════════════════════════════════════
        // TOP MENU (Makanan & Minuman, hari ini)
        // ════════════════════════════════════════
        $topMenus = OrderItem::query()
            ->join('category_menu', 'category_menu.id', '=', 'order_items.category_menu_id')
            ->join('menu', 'menu.id', '=', 'order_items.menu_id')
            ->whereIn('category_menu.name_category', ['Makanan', 'Minuman'])
            ->whereDate('order_items.created_at', $today)
            ->selectRaw('order_items.menu_id, menu.name, SUM(order_items.qty) as total_qty')
            ->groupBy('order_items.menu_id', 'menu.name')
            ->orderByDesc('total_qty')
            ->take(5)
            ->get();

        $maxQty = $topMenus->max('total_qty') ?: 1;

        return view('dashboard', [
            'totalRevenue'     => $totalRevenue,
            'totalOrders'      => $totalOrders,
            'avgOrder'         => $avgOrder,
            'targetPendapatan' => $targetPendapatan,
            'pctPendapatan'    => $pctPendapatan,
            'weeklyChart'      => $weeklyChart,
            'recentOrders'     => $recentOrders,
            'topMenus'         => $topMenus,
            'maxQty'           => $maxQty,
        ]);
    }

    public function indexcarwash()
    {
        $today = Carbon::today();
        $carwashCatId = 3;

        // Order ID yang mengandung item carwash
        $orderIdsCarwash = OrderItem::where('category_menu_id', $carwashCatId)
            ->pluck('order_id')
            ->unique();

        // 1. Pendapatan hari ini
        $pendapatanHariIni = OrderItem::where('category_menu_id', $carwashCatId)
            ->whereHas('order', fn ($q) => $q->whereDate('created_at', $today))
            ->sum('subtotal');

        // 2. Total kendaraan hari ini
        $totalHariIni = Order::whereIn('id', $orderIdsCarwash)
            ->whereDate('created_at', $today)
            ->count();

        // 3. Bar chart 7 hari terakhir
        $weeklyData = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i);
            $idsHariItu = OrderItem::where('category_menu_id', $carwashCatId)
                ->whereHas('order', fn ($q) => $q->whereDate('created_at', $date))
                ->pluck('order_id')
                ->unique();

            $weeklyData[] = [
                'label' => $date->locale('id')->isoFormat('ddd'),
                'count' => Order::whereIn('id', $idsHariItu)
                    ->whereDate('created_at', $date)
                    ->count(),
            ];
        }

        // 4. Tipe layanan hari ini
        $tipeLayanan = OrderItem::where('category_menu_id', $carwashCatId)
            ->whereHas('order', fn ($q) => $q->whereDate('created_at', $today))
            ->with('menu:id,name')
            ->get()
            ->groupBy('menu_id')
            ->map(fn ($items) => (object) [
                'name' => optional($items->first()->menu)->name ?? 'Layanan',
                'total' => $items->sum('qty'),
            ])
            ->values();

        $totalLayanan = $tipeLayanan->sum('total') ?: 1;

        // 5. Transaksi terkini (pakai relasi 'items' sesuai model Order)
        $antrianTerkini = Order::whereIn('id', $orderIdsCarwash)
            ->with(['items' => fn ($q) => $q->where('category_menu_id', $carwashCatId)->with('menu:id,name')])
            ->orderByDesc('created_at')
            ->limit(5)
            ->get()
            ->map(function ($order) {
                $order->layanan = $order->items
                    ->pluck('menu.name')
                    ->filter()
                    ->implode(', ');

                return $order;
            });

        // 6. Layanan terlaris hari ini
        $layananTerlaris = OrderItem::where('category_menu_id', $carwashCatId)
            ->whereHas('order', fn ($q) => $q->whereDate('created_at', $today))
            ->with('menu:id,name')
            ->get()
            ->groupBy('menu_id')
            ->map(fn ($items) => (object) [
                'name' => optional($items->first()->menu)->name ?? 'Layanan',
                'total_terjual' => $items->sum('qty'),
            ])
            ->sortByDesc('total_terjual')
            ->values();

        $maxTerjual = $layananTerlaris->max('total_terjual') ?: 1;

        return view('dashboard_carwash', compact(
            'pendapatanHariIni',
            'totalHariIni',
            'weeklyData',
            'tipeLayanan',
            'totalLayanan',
            'antrianTerkini',
            'layananTerlaris',
            'maxTerjual'
        ));
    }
}
