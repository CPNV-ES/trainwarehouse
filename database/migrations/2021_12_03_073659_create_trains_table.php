<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trains', function (Blueprint $table) {
            $table->id();
            $table->string('manufacturer');
            $table->date('constructed');
            $table->integer('capacity');
            $table->string('operator'); //TODO There can be multiple, need to be another table later
            $table->string('name');
            $table->integer('length_m');
            $table->integer('width_mm');
            $table->integer('height_mm');
            $table->integer('max_speed');
            $table->integer('weight_t');
            $table->string('motor_type'); // TODO need to be another table later
            $table->integer('power_output_ac');
            $table->integer('power_output_dc');
            $table->integer('tractive_force');
            $table->string('electric_system'); // TODO need to be another table later
            $table->string('current_collection'); // TODO need to be another table later
            $table->string('uic_classification');
            $table->integer('track_gauge_mm');
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
        Schema::dropIfExists('trains');
    }
}
