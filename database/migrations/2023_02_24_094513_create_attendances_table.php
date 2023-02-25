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
    { Schema::create('attendance', function (Blueprint $table) {
        $table->ID()->autoIncrement;
        $table->unsignedBigInteger('userID');
        $table->foreign('userID');
        $table->string('attendanceType');
        $table->date('date');
        $table->boolean('isDeleted');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
