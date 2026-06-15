<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->type ?? 'food';

        $from = $request->from;
        $to   = $request->to;

        // Apakah user secara eksplisit memberi filter tanggal?
        $hasFilter = $request->filled('from') || $request->filled('to');

        $query = Order::with(['items.menu', 'items.category']);

        // ════════════════════════════════════════
        // FILTER TANGGAL UNTUK TABEL
        // Default: hari ini jika belum ada filter
        // ════════════════════════════════════════
        if (!$hasFilter) {
            $query->whereBetween('created_at', [
                now()->startOfDay(),
                now()->endOfDay(),
            ]);
        } else {
            if ($from) {
                $query->where('created_at', '>=', Carbon::parse($from)->startOfDay());
            }

            if ($to) {
                $query->where('created_at', '<=', Carbon::parse($to)->endOfDay());
            }
        }

        $query->whereHas('items.category', function ($q) use ($type) {
            if ($type == 'food') {
                $q->whereIn('name_category', ['Makanan', 'Minuman']);
            } elseif ($type == 'carwash') {
                $q->where('name_category', 'Carwash');
            }
        });

        $orders = $query->latest()->get();

        // SUMMARY
        $totalTransaction = $orders->count();
        $totalSales = $orders->sum('total');

        // TRANSFORM ORDERS UNTUK PRINT STRUK DI FE
        $ordersJs = $orders->map(function ($order) use ($type) {
            return [
                'id'            => $order->id,
                'order_code'    => $order->no_order,
                'customer'      => $order->name_customer,
                'table'         => $order->no_table,
                'payment'       => $order->payment_method,
                'date'          => $order->created_at->format('Y-m-d'),
                'time'          => $order->created_at->format('H:i'),
                'total'         => (float) $order->total,
                'category_type' => $type,
                'items' => $order->items->map(function ($item) {
                    return [
                        'name'  => $item->menu->name ?? '-',
                        'qty'   => $item->qty,
                        'price' => (float) $item->price,
                    ];
                })->values(),
            ];
        })->values();

        // ════════════════════════════════════════
        // CHART PER BULAN
        // Default: semua bulan tahun ini
        // Jika ada filter from/to, chart ikut filter
        // ════════════════════════════════════════
        $chartFrom = $hasFilter ? $from : null;
        $chartTo   = $hasFilter ? $to : null;

        $chartFood    = $this->getMonthlyChartData(['Makanan', 'Minuman'], $chartFrom, $chartTo);
        $chartCarwash = $this->getMonthlyChartData(['Carwash'], $chartFrom, $chartTo);

        return view('report.index', [
            'orders'           => $orders,
            'ordersJs'         => $ordersJs,
            'chartFood'        => $chartFood,
            'chartCarwash'     => $chartCarwash,
            'totalTransaction' => $totalTransaction,
            'totalSales'       => $totalSales,
            'type'             => $type,
            'from'             => $from,
            'to'               => $to,
            'hasFilter'        => $hasFilter,
        ]);
    }

    private function getMonthlyChartData(array $categories, $from = null, $to = null)
    {
        $query = OrderItem::query()
            ->join('category_menu', 'category_menu.id', '=', 'order_items.category_menu_id')
            ->whereIn('category_menu.name_category', $categories);

        if ($from || $to) {
            if ($from) {
                $query->where('order_items.created_at', '>=', Carbon::parse($from)->startOfDay());
            }

            if ($to) {
                $query->where('order_items.created_at', '<=', Carbon::parse($to)->endOfDay());
            }
        } else {
            $query->whereYear('order_items.created_at', now()->year);
        }

        $monthly = $query
            ->selectRaw('MONTH(order_items.created_at) as month, SUM(order_items.subtotal) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $chartData = [];

        for ($i = 1; $i <= 12; $i++) {
            $found = $monthly->firstWhere('month', $i);

            $chartData[] = [
                'month' => Carbon::create()->month($i)->translatedFormat('M'),
                'total' => $found ? (int) $found->total : 0,
            ];
        }

        return $chartData;
    }
}