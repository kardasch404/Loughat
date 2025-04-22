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
        Schema::table('commandes', function (Blueprint $table) {
            $table->dropForeign(['payment_id']); 
            $table->dropColumn('payment_id');
        });

        // Add command_id to payments table
        Schema::table('payments', function (Blueprint $table) {
            $table->unsignedBigInteger('command_id')->nullable()->after('id');

            $table->foreign('command_id')->references('id')->on('commandes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('commandes', function (Blueprint $table) {
            $table->unsignedBigInteger('payment_id')->nullable()->after('cours_id');
            $table->foreign('payment_id')->references('id')->on('payments')->onDelete('set null');
        });

        Schema::table('payments', function (Blueprint $table) {
            $table->dropForeign(['command_id']);
            $table->dropColumn('command_id');
        });
    }
};
