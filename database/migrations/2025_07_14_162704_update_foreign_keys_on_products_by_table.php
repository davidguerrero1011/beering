<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('products_by_tables', function (Blueprint $table) {
            $table->dropForeign(['club_table_id']);
            $table->renameColumn('club_table_id', 'account_id');
        });

        Schema::table('products_by_tables', function (Blueprint $table) {
            $table->foreign('account_id')->references('id')->on('accounts_by_payments')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('products_by_tables', function (Blueprint $table) {
            $table->dropForeign(['account_id']);
            $table->renameColumn('account_id', 'club_table_id');
        });

        Schema::table('products_by_tables', function (Blueprint $table) {
            $table->foreign('club_table_id')->references('id')->on('club_tables')->onDelete('cascade');
        });
    }
};