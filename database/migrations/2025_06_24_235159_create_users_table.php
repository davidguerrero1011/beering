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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('User name');
            $table->string('last_name')->nullable()->comment('User last name');
            $table->date('birthday')->nullable()->comment('User birthday');
            $table->string('cellphone', 10)->nullable()->comment('User cellphone');
            $table->string('email')->unique()->comment('User email');
            $table->string('address')->nullable()->comment('User address');
            $table->string('neightboarhood')->nullable()->comment('User neightboarhood');
            $table->string('password')->nullable()->comment('User Password');
            $table->rememberToken()->nullable()->comment('Token para la sesión remember me');

            $table->foreignId('city_id')->constrained()->onDelete('cascade')->comment('Users Foreign to Cities');
            $table->foreignId('role_id')->constrained()->onDelete('cascade')->comment('Users Foreign to roles');

            $table->tinyInteger('status')->default(1)->comment('Users status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
