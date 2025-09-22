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
        Schema::create('cash_boxes', function (Blueprint $table) {
            $table->id();
            $table->double('cash_inflow')->default(0)->comment('Cash Boxes inflow');
            $table->double('cash_outflow')->default(0)->comment('Cash Boxes outflow');
            $table->double('net_income')->default(0)->comment('Cash Boxes net income');
            $table->text('description')->nullable()->comment('Cash Boxes description');

            $table->foreignId('user_id')->constrained()->onDelete('cascade')->comment('Cash Boxes Foreign to users');
            
            $table->timestamp('date_entry')->nullable()->comment('Cash Boxes date entry');
            $table->tinyInteger('status')->default(1)->comment('Cash Boxes status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cash_boxes');
    }
};
