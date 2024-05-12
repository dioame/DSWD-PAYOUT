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
        Schema::table('mobile_connection', function (Blueprint $table) {
            //
            $table->timestamp('disconnected_at')->nullable();
            $table->timestamp('expired_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mobile_connection', function (Blueprint $table) {
            //
            $table->dropColumn('disconnected_at');
            $table->dropColumn('expired_at');
        });
    }
};
