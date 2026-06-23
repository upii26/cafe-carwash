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

        return view('orders.index', compact('menus'));
    }

    public function store(Request $request)
{
    DB::beginTransaction();

    try {

        $request->validate([
            'name_customer'  => 'required',
            'no_table'       => 'required',
            'payment_method' => 'required',
            'menus'          => 'required|array|min:1',
        ]);

        // HITUNG TOTAL
        $total = 0;

        foreach ($request->menus as $item) {
            $total += $item['price'] * $item['qty'];
        }

        // BUAT ORDER
        $order = Order::create([
            'no_order'       => 'ORD-' . time(),
            'name_customer'  => $request->name_customer,
            'no_table'       => $request->no_table,
            'total'          => $total,
            'payment_method' => $request->payment_method,
        ]);

        // LOOP MENU
        foreach ($request->menus as $item) {

            // SIMPAN ITEM
            OrderItem::create([
                'order_id'         => $order->id,
                'menu_id'          => $item['id'],
                'category_menu_id' => $item['category_id'],
                'qty'              => $item['qty'],
                'price'            => $item['price'],
                'subtotal'         => $item['price'] * $item['qty'],
            ]);

            // UPDATE SOLD MENU
            $menu = Menu::where('id', $item['id'])->first();

            if ($menu) {

                $currentSold = $menu->sold ?? 0;

                $menu->update([
                    'sold' => $currentSold + $item['qty']
                ]);
            }
        }

        DB::commit();

        return response()->json([
            'success' => true,
            'message' => 'Order berhasil dibuat',
        ]);

    } catch (\Exception $e) {

        DB::rollBack();

        return response()->json([
            'success' => false,
            'message' => $e->getMessage(),
        ], 500);
    }
}
}
