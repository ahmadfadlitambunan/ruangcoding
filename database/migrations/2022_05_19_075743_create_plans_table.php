<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('desc');
            $table->string('duration');
            $table->integer('price');
            $table->timestamps();
        });

        /*
            CREATE TABLE `plans` (
            `id` bigint(20) UNSIGNED NOT NULL,
            `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
            `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
            `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
            `price` int(11) NOT NULL,
            `created_at` timestamp NULL DEFAULT NULL,
            `updated_at` timestamp NULL DEFAULT NULL
            )
        */
    }


    // Query untuk membuat tabel method_pays

    //  CREATE TABLE plans(
    //      id INT AUTO_INCREMENT PRIMARY_KEY,
    //      name VARCHAR(255) NOT NULL,
    //      desc VARCHAR(255) NOT NULL,
    //      duration VARCHAR(255) NOT NULL,
    //      price INT(11) NOT NULL,
    //      created_at TIMESTAMP NULL DEFAULT NULL
    //      updated_at TIMESTAMP NULL DEFAULT NULL
    //  );

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plans');
    }
}
