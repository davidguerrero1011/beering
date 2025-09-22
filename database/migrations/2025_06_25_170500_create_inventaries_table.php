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
        Schema::create('inventaries', function (Blueprint $table) {
            $table->id();

            $table->foreignId('product_id')->constrained()->onDelete('cascade')->comment('Inventy Foreign to Products');
            $table->foreignId('supplier_id')->constrained()->onDelete('cascade')->comment('Inventy Foreign to Suppliers');
            
            $table->integer('amont')->default(0)->comment('Inventaties amont');
            $table->double('prize')->default(0)->comment('Inventaties prize');
            $table->tinyInteger('status')->default(1)->comment('Inventaties status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventaries');
    }
};
