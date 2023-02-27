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
            $table->ID()->autoIncrement();
            $table->integer('classID');
            $table->integer('sectionID');
            $table->boolean('isDeleted')->default(false);
            $table->dateTime('createdAt');
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
