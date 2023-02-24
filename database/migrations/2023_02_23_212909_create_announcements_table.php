<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnouncementsTable extends Migration
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
            $table->date('publishedDate');
            $table->date('dueDate');
            $table->unsignedBigInteger('receiverID');
            $table->unsignedBigInteger('senderID');
            $table->foreign('receiverID')->references('id')->on('courses');
            $table->foreign('senderID')->references('id')->on('courses');
            $table->tinyInteger('isDeleted')->default(0);
            $table->timestamps();
        });
    }

 public function down(): void
    {
        Schema::dropIfExists('announcements');
    }
}




