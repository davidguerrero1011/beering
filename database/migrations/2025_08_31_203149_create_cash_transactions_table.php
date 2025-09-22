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
        Schema::create('cash_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cash_box_id')->constrained()->onDelete('cascade')->comment('Cash transactions Foreign to cash boxes');
            $table->enum('transaction_type', ['inflow', 'outflow'])->nullable()->comment('Cash transactions type');

            $table->unsignedBigInteger('transaction_id')->comment('Cash transactions id to cash inflows or cash inflows');

            $table->decimal('amount', 15, 2)->nullable()->comment('Cash Outflows amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cash_transactions');
    }
};
