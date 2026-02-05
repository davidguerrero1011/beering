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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->onDelete('cascade')->comment('Sessions Foreign to users');

            $table->string('supplier_name')->nullable()->comment('Suppliers name');
            $table->string('address')->nullable()->comment('Suppliers address');
            $table->string('nit')->nullable()->comment('Suppliers nit');

            $table->foreignId('city_id')->constrained()->onDelete('cascade')->comment('Sessions Foreign to users');

            $table->string('email')->unique()->comment('Suppliers email');
            $table->string('cellphone')->nullable()->comment('Suppliers cellphone');
            $table->string('phone')->nullable()->comment('Suppliers phone');
            $table->tinyInteger('status')->default(1)->nullable()->comment('Sessions status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
