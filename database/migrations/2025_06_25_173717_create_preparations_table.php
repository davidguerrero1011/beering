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
        Schema::create('preparations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('product_id')->constrained()->onDelete('cascade')->comment('Preparations Foreign to products');

            $table->string('preparation')->comment('Preparations name');
            $table->text('description')->comment('Preparations description');
            $table->integer('quantity')->default(0)->comment('Preparations quantity');
            $table->tinyInteger('status')->default(1)->comment('Preparations status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preparations');
    }
};
