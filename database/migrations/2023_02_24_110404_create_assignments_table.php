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
        Schema::create('assignments', function (Blueprint $table) {
            $table->ID()->autoIncrement;
            $table->string('title');
            $table->string('description');
            $table->dateTime('publishedDate');
            $table->dateTime('dueDate');
            $table->integer('grade');
            $table->boolean('isDeleted');
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};
