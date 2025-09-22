<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product')->comment('Product name');

            $table->foreignId('category_id')->constrained()->onDelete('cascade')->comment('Products Foreign to categories');

            $table->integer('units')->default(0)->comment('Product units');
            $table->double('prize_unit')->default(0)->comment('Product prize unit');
            $table->tinyInteger('status')->default(1)->comment('Product status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
