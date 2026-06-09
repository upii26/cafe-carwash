<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("order", function (Blueprint $table) {
            $table->id();
            $table->string("no_order");
            $table->string("name_customer");
            $table->string("no_table");
            $table->integer("menus_id");
            $table->integer("category_menu_id");
            $table->decimal("total")->nullable();
            $table->decimal("tax")->nullable();
            $table->string("payment_method")->nullable();
            $table->string("notes")->nullable();
            $table->string("status")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
