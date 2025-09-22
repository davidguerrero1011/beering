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
        Schema::create('club_tables', function (Blueprint $table) {
            $table->id();
            $table->string('table')->comment('Club Tables name');
            $table->string('number')->comment('Club Tables number');
            $table->enum('state', ['Disponible', 'Reservado', 'Ocupado'])->default('Disponible')->comment('Club Tables state');
            $table->tinyInteger('status')->default(1)->comment('Club Tables status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('club_tables');
    }
};
