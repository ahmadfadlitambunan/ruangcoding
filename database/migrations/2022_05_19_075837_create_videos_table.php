<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('playlist_id');
            $table->string('file_name');
            $table->string('thumb_img')->nullable();
            $table->string('title');
            $table->text('desc');
            $table->enum('access_type', ['free', 'premium']);
            $table->timestamps();
        });

        /*
            CREATE TABLE `videos` (
                `id` bigint(20) UNSIGNED NOT NULL,
                `playlist_id` bigint(20) UNSIGNED NOT NULL,
                `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                `thumb_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
                `access_type` enum('free','premium') COLLATE utf8mb4_unicode_ci NOT NULL,
                `created_at` timestamp NULL DEFAULT NULL,
                `updated_at` timestamp NULL DEFAULT NULL
                PRIMARY KEY (`id`)
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
        Schema::dropIfExists('videos');
    }
}
