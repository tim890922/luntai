<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id()->comment('訂單編號');
            $table->string('product_id')->comment('料號');
            $table->integer('shipping')->comment('出貨位');
            $table->integer('user')->comment('用方');
            $table->string('user_name')->comment('用方名稱');
            $table->string('P/F')->comment('P/F')->nullable();
            $table->integer('order_number')->comment('訂單號')->nullable();
            $table->date('delivery')->comment('交貨日');
            $table->integer('quantity')->comment('數量');
            $table->integer('package')->comment('包裝數');
            $table->tinyInteger('status')->comment('狀態(已出貨、未出貨)')->default(0);
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
        Schema::dropIfExists('orders');
    }
}
