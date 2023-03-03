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
            $table->id();
            $table->unsignedBigInteger('courseID')->nullable();
            $table->foreign('courseID')->references('id')->on('courses')->nullable();
            $table->date('startDate')->nullable();
            $table->date('endDate')->nullable();
            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses_cycle');
    }
};
