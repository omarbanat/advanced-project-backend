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
        Schema::create('announcements', function (Blueprint $table) {
            $table->id('ID');
            $table->string('title');
            $table->string('description');
            $table->date('publishedDate')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->unsignedBigInteger('receiverID')->nullable();
            $table->unsignedBigInteger('senderID')->nullable();
            $table->foreign('receiverID')->references('id')->on('users');
            $table->foreign('senderID')->references('id')->on('users');
            $table->tinyInteger('isDeleted')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('announcements');
    }
};
