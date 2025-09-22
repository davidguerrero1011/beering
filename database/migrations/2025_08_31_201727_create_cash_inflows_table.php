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
        Schema::create('cash_inflows', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 15, 2)->nullable()->comment('Cash Inflows amount');
            $table->text('description')->nullable()->comment('Cash Inflows description');

            $table->foreignId('user_id')->constrained()->onDelete('cascade')->comment('Cash inflows Foreign to users');

            $table->date('transaction_Date')->nullable()->comment('Cash Inflows transaction date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cash_inflows');
    }
};
