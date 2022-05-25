<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursePlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_plan', function (Blueprint $table) {
            $table->foreignId('plan_id');
            $table->foreignId('course_id');
            $table->timestamps();
        });
        /*
        CREATE TABLE `course_plan` (
            `plan_id` bigint(20) UNSIGNED NOT NULL,
            `course_id` bigint(20) UNSIGNED NOT NULL,
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
        Schema::dropIfExists('course_plan');
    }
}
