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
        Schema::table('capture', function (Blueprint $table) {
            //
            $table->string('municipality')->nullable(); // Add municipality column
            $table->string('modality')->nullable(); // Add modality column
            $table->string('year')->nullable(); // Add year column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('capture', function (Blueprint $table) {
            //
        });
    }
};
