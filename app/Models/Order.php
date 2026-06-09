<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "order";
    protected $fillable = [
        "no_order",
        "name_customer",
        "no_table",
        "menus_id",
        "category_menu_id",
        "total",
        "tax",
        "payment_method",
        "status",
    ];
}
