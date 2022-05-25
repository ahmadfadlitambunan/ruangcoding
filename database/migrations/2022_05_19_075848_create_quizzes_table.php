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
            $table->string('name');
            $table->string('question');
            $table->string('answer');
            $table->string('option1');
            $table->string('option2');
            $table->string('option3');
            $table->string('option4');
            $table->enum('access_type', ['free', 'premium']);
            $table->timestamps();
        });

        /*
        CREATE TABLE `quizzes` (
            `id` bigint(20) UNSIGNED NOT NULL,
            `playlist_id` bigint(20) UNSIGNED NOT NULL,
            `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
            `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
            `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
            `option1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
            `option2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
            `option3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
            `option4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
            `access_type` enum('free','premium') COLLATE utf8mb4_unicode_ci NOT NULL,
            `created_at` timestamp NULL DEFAULT NULL,
            `updated_at` timestamp NULL DEFAULT NULL
            )
        */
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
