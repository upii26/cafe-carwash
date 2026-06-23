<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void { 
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id') ->constrained('order') ->onDelete('cascade');
            $table->foreignId('menu_id') ->constrained('menu') ->onDelete('cascade');
            $table->foreignId('category_menu_id') ->constrained('category_menu') ->onDelete('cascade');
            $table->integer('qty') ->default(1);
            $table->bigInteger('price') ->default(0);
            $table->bigInteger('subtotal') ->default(0);
            $table->timestamps(); 
            
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }

};
