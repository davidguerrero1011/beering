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
        Schema::table('sessions', function (Blueprint $table) {
            $table->string('ip_address')->nullable()->after('user_id')->comment('register ip address');
            $table->string('operative_system')->nullable()->after('ip_address')->comment('register operative system');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sessions', function (Blueprint $table) {
           $table->dropColumn('ip_address');
           $table->dropColumn('operative_system');
        });
    }
};
