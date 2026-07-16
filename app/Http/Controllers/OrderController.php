<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Menu;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $menus = Menu::with('category')->get();

        $nextOrderNo = $this->generateNextOrderNumber();

        return view('orders.index', compact('menus', 'nextOrderNo'));
    }

    /**
     * Generate nomor order berikutnya: YYYYMMDD-0001
     * Reset nomor setiap pergantian hari.
     */
    private function generateNextOrderNumber()
    {
        $today = now()->format('Ymd');

        $lastOrder = Order::whereDate('created_at', now()->toDateString())
            ->orderBy('id', 'desc')
            ->first();

        $lastNumber = 0;

        if ($lastOrder && preg_match('/-(\d+)$/', $lastOrder->no_order, $m)) {
            $lastNumber = (int) $m[1];
        }

        $nextNumber = $lastNumber + 1;

        return $today . '-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {

            $request->validate([
                'no_table'       => 'required',
                'payment_method' => 'required',
                'menus'          => 'required|array|min:1',
            ]);

            // ============================
            // HITUNG SUBTOTAL
            // ============================
            $subtotal = 0;

            foreach ($request->menus as $item) {
                $subtotal += $item['price'] * $item['qty'];
            }

            // ============================
            // HITUNG PPN 11%
            // ============================
            $ppn = round($subtotal * 0.11);

            // ============================
            // TOTAL SETELAH PPN
            // ============================
            $total = $subtotal + $ppn;

            // ============================
            // GENERATE NOMOR ORDER
            // ============================
            $noOrder = $this->generateNextOrderNumberLocked();

            // ============================
            // SIMPAN ORDER
            // ============================
            $order = Order::create([
                'no_order'       => $noOrder,
                'no_table'       => $request->no_table,
                'total'          => $total,
                'payment_method' => $request->payment_method,
            ]);

            // ============================
            // SIMPAN DETAIL ORDER
            // ============================
            foreach ($request->menus as $item) {

                OrderItem::create([
                    'order_id'         => $order->id,
                    'menu_id'          => $item['id'],
                    'category_menu_id' => $item['category_id'],
                    'qty'              => $item['qty'],
                    'price'            => $item['price'],
                    'subtotal'         => $item['price'] * $item['qty'],
                ]);

                $menu = Menu::find($item['id']);

                if ($menu) {
                    $menu->increment('sold', $item['qty']);
                }
            }

            DB::commit();

            return response()->json([
                'success'  => true,
                'message'  => 'Order berhasil dibuat',
                'no_order' => $noOrder,
                'subtotal' => $subtotal,
                'ppn'      => $ppn,
                'total'    => $total,
            ]);

        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Generate nomor order dengan lock
     * agar tidak terjadi nomor order ganda.
     */
    private function generateNextOrderNumberLocked()
    {
        $today = now()->format('Ymd');

        $lastOrder = Order::whereDate('created_at', now()->toDateString())
            ->orderBy('id', 'desc')
            ->lockForUpdate()
            ->first();

        $lastNumber = 0;

        if ($lastOrder && preg_match('/-(\d+)$/', $lastOrder->no_order, $m)) {
            $lastNumber = (int) $m[1];
        }

        $nextNumber = $lastNumber + 1;

        return $today . '-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
    }
}