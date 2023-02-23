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
        Schema::create('enrollments', function (Blueprint $table) {
            $table->ID()->autoIncrement();
            $table->integer('userID');
            $table->integer('courseCycleID');
            $table->integer('classID');
            $table->boolean('cancelled');
            $table->string('cancelationReason');
            $table->boolean('isDeleted');
            $table->dateTime('createdAt');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
