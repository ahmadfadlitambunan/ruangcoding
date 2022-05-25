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
