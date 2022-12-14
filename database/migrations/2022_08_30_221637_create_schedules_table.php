<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id()->comment('生產排程編號');
            $table->unsignedBigInteger('order_id')->comment('訂單編號');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->string('product_id')->comment('料號');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->date('today')->comment('日期')->nullable();
            $table->time('period_start')->comment('時段_開始')->nullable();
            $table->time('period_end')->comment('時段_結束')->nullable();
            $table->enum('content', ['確保', '量產', '換模', '試模', '預換', '換色'])->comment('內容');
            $table->integer('total_quantity')->comment('預計總產量')->nullable();
            $table->unsignedBigInteger('workstation_id')->comment('工作站編號')->nullable();
            $table->foreign('workstation_id')->references('id')->on('workstations')->onDelete('cascade');
            $table->boolean('isFinish')->comment('是否完成')->default(0);
            $table->boolean('isAssign')->comment('是否發布')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('schedules');
    }
}
