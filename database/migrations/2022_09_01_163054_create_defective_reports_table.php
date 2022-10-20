<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateDefectiveReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('defective_reports', function (Blueprint $table) {
            $table->id()->comment('生產不良品編號流水號');
            $table->unsignedBigInteger('defective_id')->comment('不良原因編號');
            $table->foreign('defective_id')->references('id')->on('defectives')->onDelete('cascade');
            $table->unsignedBigInteger('report_id')->comment('進度回報編號');
            $table->foreign('report_id')->references('id')->on('reports')->onDelete('cascade');
            $table->integer('quantity')->comment('數量');
            $table->string('detail')->comment('詳細說明')->nullable();
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
        Schema::dropIfExists('defective_schedule');
    }
}
