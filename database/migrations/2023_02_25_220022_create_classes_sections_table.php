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
        Schema::create('classes_sections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('classID');
            $table->foreign('classID')->references('id')->on('classes')->nullable();
            $table->unsignedBigInteger('sectionID');
            $table->foreign('sectionID')->references('id')->on('sections')->nullable();
            $table->boolean('isDeleted')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes_sections');
    }
};
