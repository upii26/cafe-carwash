<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('order', function (Blueprint $table) {
            $table->dropColumn([
                'menus_id',
                'category_menu_id'
            ]);
        });
    }

    public function down(): void
    {
        Schema::table('order', function (Blueprint $table) {
            $table->unsignedBigInteger('menus_id')->nullable();
            $table->unsignedBigInteger('category_menu_id')->nullable();
        });
    }
};