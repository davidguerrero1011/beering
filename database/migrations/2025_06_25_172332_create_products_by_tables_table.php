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
        Schema::create('products_by_tables', function (Blueprint $table) {
            $table->id();

            $table->foreignId('product_id')->constrained()->onDelete('cascade')->comment('Products By Table Foreign to products');
            $table->foreignId('club_table_id')->constrained()->onDelete('cascade')->comment('Products By Table Foreign to Club Tables');
            
            $table->integer('amont')->default(0)->comment('Products By Table amont');
            $table->double('prize')->default(0)->comment('Products By Table prize');
            $table->tinyInteger('status')->default(1)->comment('Account status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productsby_tables');
    }
};
