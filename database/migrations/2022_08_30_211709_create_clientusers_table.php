<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateClientusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientusers', function (Blueprint $table) {
            $table->string('id')->primary()->comment('用方編號');
            $table->unsignedBigInteger('client_id')->comment('客戶編號');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade'); 
            $table->string('name')->comment('用方名稱');
            $table->string('address')->comment('用方地址');
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
        Schema::dropIfExists('clientusers');
    }
}
