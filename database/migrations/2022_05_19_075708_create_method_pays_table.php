<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMethodPaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('method_pays', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('no_account');
            $table->timestamps();
        });

        /*
            CREATE TABLE `method_pays` (
                    `id` bigint(20) UNSIGNED NOT NULL,
                    `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                    `no_account` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                    `created_at` timestamp NULL DEFAULT NULL,
                    `updated_at` timestamp NULL DEFAULT NULL
                )
        */
    }

    // Query untuk membuat tabel method_pays

    //  CREATE TABLE transactions(
    //      id INT AUTO_INCREMENT PRIMARY_KEY NOT NULL,
    //      name VARCHAR(255) NOT NULL,
    //      no_account VARCHAR(255) NOT NULL
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
        Schema::dropIfExists('method_pays');
    }
}
