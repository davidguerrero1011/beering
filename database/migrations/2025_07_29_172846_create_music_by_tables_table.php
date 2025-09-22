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
        Schema::create('music_by_tables', function (Blueprint $table) {
            $table->id();

            $table->foreignId('music_id')->constrained()->onDelete('cascade')->comment('Music By Tables song field');
            $table->foreignId('club_table_id')->constrained()->onDelete('cascade')->comment('Music By Table field');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('music_by_tables');
    }
};
