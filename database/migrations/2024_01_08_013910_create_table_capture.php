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
        Schema::create('capture', function (Blueprint $table) {
            $table->id();
            $table->string('payroll_no');
            $table->string('path');
            $table->string('captured_by');
            $table->dateTime('captured_at');
            // You can add additional fields if needed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('capture');
    }
};
