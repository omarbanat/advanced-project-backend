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
        Schema::create('course_cycles', function (Blueprint $table) {
            $table->ID()->autoIncrement();
            $table->integer('courseID');
            $table->date('startDate');
            $table->date('endDate');
            $table->boolean('isDeleted');
            $table->dateTime('createdAt');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_cycles');
    }
};
