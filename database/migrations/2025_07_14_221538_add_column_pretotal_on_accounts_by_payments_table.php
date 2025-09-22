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
        Schema::table('accounts_by_payments', function (Blueprint $table) {
            $table->double('pre_total')->nullable()->after('payment');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('accounts_by_payments', function (Blueprint $table) {
            $table->dropColumn('pre_total');
        });
    }
};
