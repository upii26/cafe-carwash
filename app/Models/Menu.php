<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = "menu";
    protected $fillable = [
        "name",
        "category_id",
        "price",
        "sold",
        "photo",
        "deskripsi",
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, "category_id");
    }
}
