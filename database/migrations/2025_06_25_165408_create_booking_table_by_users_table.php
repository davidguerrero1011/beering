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
        Schema::create('booking_table_by_users', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->onDelete('cascade')->comment('Booking Foreign to users');
            $table->foreignId('club_table_id')->constrained()->onDelete('cascade')->comment('Booking Foreign to Club Tables');

            $table->date('start_date')->nullable()->comment('Booking start date');
            $table->date('end_date')->nullable()->comment('Booking end date');
            $table->tinyInteger('status')->default(1)->comment('Sessions status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_table_by_users');
    }
};
