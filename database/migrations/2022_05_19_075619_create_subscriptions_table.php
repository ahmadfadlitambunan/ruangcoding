<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('trans_id');
            $table->foreignId('plan_id');
            $table->timestamp('end_at')->nullable();
            $table->enum('status', ['active', 'expire']);
            $table->timestamps();
        });
    }

    // Query untuk membuat tabel subcriptions

    //  CREATE TABLE transactions(
    //      id INT AUTO_INCREMENT PRIMARY_KEY,
    //      user_id INT FOREIGN_KEY,
    //      trans_id INT FOREIGN_KEY,
    //      plan_id_id INT FOREIGN_KEY,
    //      status enum('active', 'expire'),
    //      paid_at timestamp
    //      created_at timestamp NULL DEFAULT NULL,
    //      updated_at timestamp NULL DEFAULT NULL
    // // );

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
}
