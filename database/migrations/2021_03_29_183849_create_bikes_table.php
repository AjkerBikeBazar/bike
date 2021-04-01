<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bikes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');

            //basic details
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('price')->nullable();
            $table->string('cc')->nullable();
            $table->string('product_availability')->nullable();

            //engine & Transmission
            $table->string('displacement')->nullable();
            $table->string('max_power')->nullable();
            $table->string('max_torque')->nullable();
            $table->string('bore')->nullable();
            $table->string('stroke')->nullable();
            $table->string('gear')->nullable();
            $table->string('clutch')->nullable();
            $table->string('cooling_system')->nullable();
            $table->string('fuel_supply')->nullable();
            $table->string('starting_method')->nullable();

            //dimensions
            $table->string('fuel_tank_capacity')->nullable();
            $table->string('fuel_reserve')->nullable();
            $table->string('ground_clearance')->nullable();
            $table->string('height')->nullable();
            $table->string('length')->nullable();
            $table->string('width')->nullable();
            $table->string('weight')->nullable();
            $table->string('wheelbase')->nullable();

            //Brakes & Tyres
            $table->string('braking_system')->nullable();
            $table->string('front_brake')->nullable();
            $table->string('rear_brake')->nullable();
            $table->string('front_tyre')->nullable();
            $table->string('rear_tyre')->nullable();

            //Suspension & cheassis
            $table->string('chassis_type')->nullable();
            $table->string('front_suspension')->nullable();
            $table->string('rear_suspension')->nullable();

            //Electical
            $table->string('battery')->nullable();
            $table->string('head_light')->nullable();
            $table->string('tail_light')->nullable();
            $table->string('indicator_light')->nullable();

            //Features
            $table->string('clock')->nullable();
            $table->string('engine_kill_switch')->nullable();
            $table->string('pass_light')->nullable();
            $table->string('speedometer')->nullable();
            $table->string('techometer')->nullable();
            $table->string('gear_indicator')->nullable();
            $table->string('low_battery_indicator')->nullable();
            $table->string('low_fuel_indicator')->nullable();

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
        Schema::dropIfExists('bikes');
    }
}
