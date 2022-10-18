<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateMachineProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machine_products', function (Blueprint $table) {
            $table->id()->comment('排機編號');

            $table->string('product_id')->comment('料號');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            $table->unsignedBigInteger('workstation_id')->comment('工作站編號');
           
            $table->foreign('workstation_id')->references('id')->on('workstations')->onDelete('cascade');

            $table->integer('priority')->comment('優先順序')->nullable();
            $table->integer('cycle_time')->comment('C/Ts')->nullable();
            $table->integer('morning_employee')->comment('日班人數');
            $table->integer('night_employee')->comment('夜班人數');
            $table->integer('cavity')->comment('穴數')->nullable();
            $table->float('non_performing_rate')->comment('不良率');
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
        Schema::dropIfExists('machine_products');
    }
}
