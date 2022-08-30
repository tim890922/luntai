<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateBomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boms', function (Blueprint $table) {
            $table->id()->comment('物料編號');
            $table->string('product_id')->comment('料號');
            $table->foreign('product_id')->references('id')->on('products');
            $table->string('material_id')->comment('原物料編號');
            $table->foreign('material_id')->references('id')->on('materials');
            $table->integer('quantity')->comment('數量');
            $table->string('unit')->comment('單位');
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
        Schema::dropIfExists('boms');
    }
}
