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
            $table->id();
            $table->unsignedBigInteger('userID')->nullable();
            $table->foreign('userID')->references('id')->on('users')->nullable();
            $table->unsignedBigInteger('courseCycleID')->nullable();
            $table->foreign('courseCycleID')->references('id')->on('course_cycles')->nullable();
            $table->unsignedBigInteger('classSectionID')->nullable();
            $table->foreign('classSectionID')->references('id')->on('classes_sections')->nullable();
            $table->boolean('cancelled')->default(false);
            $table->boolean('enrolled')->default(false);
            $table->longText('cancellationReason')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollment');
    }
};
