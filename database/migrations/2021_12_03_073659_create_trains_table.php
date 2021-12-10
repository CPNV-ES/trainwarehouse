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
            $table->string('manufacturer')->nullable();
            $table->date('constructed')->nullable();
            $table->date('start_service')->nullable();
            $table->date('end_service')->nullable();
            $table->integer('car')->nullable();
            $table->integer('capacity')->nullable();
            $table->integer('capacity_first')->nullable();
            $table->integer('capacity_second')->nullable();
            $table->string('name');
            $table->float('length_m')->nullable();
            $table->integer('width_mm')->nullable();
            $table->integer('height_mm')->nullable();
            $table->integer('max_speed')->nullable();
            $table->integer('weight_t')->nullable();
            $table->integer('power_output_ac')->nullable();
            $table->integer('power_output_dc')->nullable();
            $table->integer('tractive_force')->nullable();
            $table->string('electric_system'); // TODO need to be another table later
            $table->string('current_collection'); // TODO need to be another table later
            $table->string('uic_classification')->nullable();
            $table->integer('track_gauge_mm')->nullable();
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
