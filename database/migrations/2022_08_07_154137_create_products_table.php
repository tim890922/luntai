<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id()->comment('料號');
            $table->string('clinet')->comment('客戶');
            $table->string('product_name')->comment('產品名稱');
            $table->decimal('price')->comment('材料單價');
            $table->string('material')->comment('材質');
            $table->decimal('weight')->comment('單重');
            $table->decimal('tonnes')->comment('射出噸數');
            $table->softDeletes();
            $table->timestamps();//自動生成時間戳記(更新時間創建時間)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
