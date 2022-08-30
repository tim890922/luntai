<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateProductStoragesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_storages', function (Blueprint $table) {
            $table->id()->comment('id');
            $table->string('product_id')->comment('料號');
            $table->foreign('product_id')->references('id')->on('products');
            $table->string('storage_id')->comment('儲位編號');
            $table->foreign('storage_id')->references('id')->on('storages');
            $table->integer('quantity')->comment('數量');
            $table->integer('basket_number')->comment('籃子數');
            $table->enum('change_status',['入庫','出庫'])->comment('異動狀態');
            $table->time('time')->comment('時間');
            $table->string('responsible')->comment('負責人');
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
        Schema::dropIfExists('product_storages');
    }
}
