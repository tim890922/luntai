<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateMachinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machines', function (Blueprint $table) {
            $table->string('id')->primary()->comment('機台別');
            $table->string('manufacturer')->comment('機型');
            $table->decimal('tonnes')->comment('噸數/T');
            $table->decimal('ring')->default('0')->comment('機台定位環');
            $table->string('number')->nullable()->comment('機台號碼');
            $table->string('type')->nullable()->comment('型式');
            $table->string('weight')->nullable()->comment('射出重量');
            $table->string('diameter')->nullable()->comment('螺桿直徑');
            $table->string('tube_material')->nullable()->comment('料管材質');
            $table->decimal('screw_width')->nullable()->comment('柱內寬度/間隔');
            $table->string('min_max')->nullable()->comment('調模最大/最小值');
            $table->string('screw_material')->nullable()->comment('螺桿材質');
            $table->tinyInteger('status')->default(1)->comment('狀態');
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
        Schema::dropIfExists('machines');
    }
}
