<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateDefectivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('defectives', function (Blueprint $table) {
            $table->id()->comment('不良品編號');
            $table->unsignedBigInteger('schedule_id')->comment('生產批號');
            $table->foreign('schedule_id')->references('id')->on('schedules');
            $table->enum('reason',['缺料','縮水','包風','拉傷','油點','噴痕','刮傷','頂白','黑點'])->comment('不良原因');
            $table->integer('quantity')->comment('數量');
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
        Schema::dropIfExists('defectives');
    }
}
