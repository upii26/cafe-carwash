<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "category_menu";
    protected $fillable = ["id", "name_category"];
    
}
