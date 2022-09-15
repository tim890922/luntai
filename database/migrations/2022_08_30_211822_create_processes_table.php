<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;
use phpDocumentor\Reflection\Types\Nullable;

class CreateProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processes', function (Blueprint $table) {
            $table->string('id')->primary()->comment('製程編號');
            $table->string('product_id')->comment('料號');
            $table->foreign('product_id')->references('id')->on('machines')->onDelete('cascade');
            $table->string('machine_id')->comment('機台編號')->nullable();
            $table->foreign('machine_id')->references('id')->on('machines')->onDelete('cascade');
            $table->unsignedBigInteger('workstation_id')->comment('工作站編號')->nullable();
            $table->foreign('workstation_id')->references('id')->on('workstations')->onDelete('cascade');
            $table->integer('ct')->comment('週期時間');
            $table->integer('queue')->comment('順序');
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
        Schema::dropIfExists('processes');
    }
}
