<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('no_phone')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('gender', ['male', 'female']);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    // Query untuk membuat tabel  login

    // // CREATE TABLE users(
    // //     id INT AUTO_INCREMENT PRIMARY_KEY,
    //         name VARCHAR(255) NOT NULL,
    //         email VARCHAR(255) NOT NULL,
    //         no_phone VARCHAR(255) NOT_NULL,
    //         email_verified_at TIMESTAMP DEFAULT NULL,
    //         password VARCHAR(255) NOT NULL,
    //         gender (enum('male', 'female')),
    //         remember_token VARCHAR(100) DEFAULT NULL

    // // );

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
