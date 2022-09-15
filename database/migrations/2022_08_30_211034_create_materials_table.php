<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->string('id')->primary()->comment('原物料編號');
            $table->unsignedBigInteger('supplier_id')->comment('供應商編號');
            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->string('name')->comment('名稱');
            $table->enum('type',['原料','物料'])->comment('類型');
            $table->integer('inventory')->comment('庫存量');
            $table->integer('safety')->comment('安全庫存量');
            $table->string('unit')->comment('單位');
            $table->string('material')->comment('材質');
            $table->string('specification')->comment('規格');
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
        Schema::dropIfExists('materials');
    }
}
