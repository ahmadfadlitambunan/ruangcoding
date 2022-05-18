<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('playlist_id');
            $table->foreignId('course_id');
            $table->string('name');
            $table->enum('type', ['Multiple Choice', 'Short Answer']);
            $table->text('content');
            $table->string('answer');
            $table->enum('access_type', ['free', 'premium']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quizzes');
    }
}

// $table->foreignId('playslist_id');
            // $table->foreignId('course_id');
            