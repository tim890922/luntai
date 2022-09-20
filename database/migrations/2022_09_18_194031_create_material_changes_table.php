<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialChangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_changes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('material_id')->comment('原物料編號');
            $table->foreign('material_id')->references('id')->on('materials')->onDelete('cascade');
            $table->enum('change_status',['入庫','出庫'])->comment('異動狀態');
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
        Schema::dropIfExists('material_changes');
    }
}
