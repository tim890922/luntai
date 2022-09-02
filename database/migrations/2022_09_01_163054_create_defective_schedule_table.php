<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefectiveScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('defective_schedule', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('defective_id')->comment('不良原因編號');
            $table->foreign('defective_id')->references('id')->on('defectives')->onDelete('cascade');
            $table->unsignedBigInteger('schedule_id')->comment('生產批號');
            $table->foreign('schedule_id')->references('id')->on('schedules')->onDelete('cascade');
            $table->integer('quantity')->comment('數量');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('defective_schedule');
    }
}
