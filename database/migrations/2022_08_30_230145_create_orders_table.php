<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;

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
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->string('clientuser_id')->comment('用方編號');
            $table->foreign('clientuser_id')->references('id')->on('clientusers')->onDelete('cascade');
            $table->string('position')->comment('出貨位');
            $table->string('P_F')->comment('P/F')->nullable();
            $table->date('delivery')->comment('交貨日');
            $table->string('order_number')->comment('訂單號')->nullable();
            $table->integer('quantity')->comment('數量');
            $table->integer('packages_quantity')->comment('包裝數');
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
        Schema::dropIfExists('orders');
    }
}
