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
        Schema::create('history_cash_boxes', function (Blueprint $table) {
            $table->id();
            $table->double('net_income')->default(0)->comment('Cash Boxes historical net income');
            $table->text('description')->comment('Cash Boxes historical description');

            $table->foreignId('user_id')->constrained()->onDelete('cascade')->comment('Cash Boxes historical Foreign to users');

            $table->timestamp('date_entry')->nullable()->comment('Cash Boxes historical date entry');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_cash_boxes');
    }
};
