<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = "order_items";
    protected $fillable = [
        "order_id",
        "menu_id",
        "category_menu_id",
        "qty",
        "price",
        "subtotal",
    ];


    public function order() {
        return $this->belongsTo(Order::class); 
    }

}
