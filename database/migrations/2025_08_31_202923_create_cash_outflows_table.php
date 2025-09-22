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
        Schema::create('cash_outflows', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 15, 2)->nullable()->comment('Cash Outflows amount');
            $table->text('description')->nullable()->comment('Cash Outflows description');

            $table->foreignId('user_id')->constrained()->onDelete('cascade')->comment('Cash Outflows Foreign to users');

            $table->date('transaction_Date')->nullable()->comment('Cash Outflows transaction date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cash_outflows');
    }
};
