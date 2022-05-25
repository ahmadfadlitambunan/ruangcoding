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
            $table->foreignId('transaction_id');
            $table->foreignId('plan_id');
            $table->timestamp('end_at')->nullable();
            $table->enum('status', ['active','expire']);
            $table->timestamps();
        });

        /*
            CREATE TABLE `subscriptions` (
                `id` bigint(20) UNSIGNED NOT NULL,
                `user_id` bigint(20) UNSIGNED NOT NULL,
                `trans_id` bigint(20) UNSIGNED NOT NULL,
                `plan_id` bigint(20) UNSIGNED NOT NULL,
                `end_at` timestamp NULL DEFAULT NULL,
                `status` enum('active','expire') COLLATE utf8mb4_unicode_ci NOT NULL,
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
        Schema::dropIfExists('subscriptions');
    }
}
