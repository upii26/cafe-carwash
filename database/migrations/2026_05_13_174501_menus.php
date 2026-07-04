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
        Schema::create("menu", function (Blueprint $table) {
            $table->id();
            $table->string("photo");
            $table->string("name");
            $table->integer("category_id")->nullable();
            $table->decimal("price")->nullable();
            $table->integer("terjual")->nullable();
            $table->text("deskripsi")->nullable();
            $table->string("status");
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
