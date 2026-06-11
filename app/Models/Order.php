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
        "total",
        "payment_method",
    ];

    public function items() { 
    
        return $this->hasMany(OrderItem::class); 
    
    }
}
