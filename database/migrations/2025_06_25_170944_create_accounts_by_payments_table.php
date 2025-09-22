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
        Schema::create('accounts_by_payments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('club_table_id')->constrained()->onDelete('cascade')->comment('Accounts Foreign to Club Tables');
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->comment('Accounts Foreign to Users');
            $table->foreignId('payment_type_id')->constrained()->onDelete('cascade')->comment('Accounts Foreign to Payment Type');
            
            $table->double('payment')->default(0)->comment('Account payment');
            $table->tinyInteger('status')->default(1)->comment('Account status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts_by_payments');
    }
};
