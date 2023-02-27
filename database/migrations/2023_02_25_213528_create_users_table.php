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
      
        Schema::create('users', function (Blueprint $table) {
            $table->ID()->autoIncrement();
            $table->string('fName');
            $table->string('lName');
            $table->string('email')->unique();
            $table->string('password');
            $table->date('DOB');
            $table->integer('phoneNumber');
            $table->string('gender');
            $table->string('role');
            $table->boolean('isDeleted')->default(false);
            $table->dateTime('createdAt');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
