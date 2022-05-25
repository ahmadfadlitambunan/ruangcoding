<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('name');
            $table->string('password');
            $table->timestamps();
        });
    }

    // Query untuk membuat tabel  login

    //  CREATE TABLE admins(
    //       id INT AUTO_INCREMENT PRIMARY_KEY,
    //       email VARCHAR(255) NOT NULL,
    //       name VARCHAR(255) NOT NULL,
    //       password VARCHAR(255) NOT NULL,
    //       created_at timestamp NULL DEFAULT NULL,
    //       updated_at timestamp NULL DEFAULT NULL
    // );

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
