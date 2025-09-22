<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("ALTER TABLE booking_table_by_users MODIFY COLUMN status ENUM('ocupada', 'libre', 'reservada') DEFAULT 'libre' COMMENT 'Booking State table'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("ALTER TABLE booking_table_by_users MODIFY COLUMN status TINYINT(1) DEFAULT 1 COMMENT 'Booking State table'");
    }
};
