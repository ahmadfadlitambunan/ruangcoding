<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plan_id');
            $table->foreignId('admin_id')->nullable();
            $table->foreignId('method_pay_id');
            $table->enum('paid_status', ['success', 'failed'])->nullable();
            $table->string('proof_of_payment')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
        });

        /*
            CREATE TABLE `transactions` (
                `id` bigint(20) UNSIGNED NOT NULL,
                `user_id` bigint(20) UNSIGNED NOT NULL,
                `plan_id` bigint(20) UNSIGNED NOT NULL,
                `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
                `method_pay_id` bigint(20) UNSIGNED NOT NULL,
                `paid_status` enum('success','failed') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                `proof_of_payment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                `paid_at` timestamp NULL DEFAULT NULL,
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
        Schema::dropIfExists('transactions');
    }
}
