<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id()->comment('進度回報編號');
            $table->unsignedBigInteger('schedule_id')->comment('生產批號');
            $table->foreign('schedule_id')->references('id')->on('schedules')->onDelete('cascade');
            $table->string('product_id')->comment('料號');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->string('employee_id')->comment('員工編號');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->enum('shift', ['A','B','C'])->default('A')->comment('班別');
            $table->time('time_start')->comment('生產時段_開始');
            $table->time('time_end')->comment('生產時段_結束');
            $table->integer('good_product_quantity')->comment('良品數量');
            $table->integer('defective_product_quantity')->comment('不良品數量');
            $table->boolean('record')->default(0)->comment('查核紀錄');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
