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
        Schema::create('music', function (Blueprint $table) {
            $table->id();
            $table->string('song')->comment('Music song');
            
            $table->foreignId('club_table_id')->constrained()->onDelete('cascade')->comment('Club Tables Foreign to Music');
            
            $table->string('order')->comment('Music order');
            $table->tinyInteger('status')->default(1)->comment('Music status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('music');
    }
};
