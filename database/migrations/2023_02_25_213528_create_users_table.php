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
            $table->id();
            $table->string('fName')->nullable();
            $table->string('lName')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->date('DOB')->nullable();
            $table->string('phoneNumber')->nullable();
            $table->string('gender')->nullable();
            $table->string('role')->nullable();
            $table->softDeletes();
            $table->timestamps();
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
