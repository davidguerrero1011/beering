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
        Schema::create('preparations__promotions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('preparation_id')->constrained()->onDelete('cascade')->comment('Preparations Promotions Foreign to Preparations');
            $table->foreignId('promotion_id')->constrained()->onDelete('cascade')->comment('Preparations Promotions Foreign to Promotions');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preparations__promotions');
    }
};
