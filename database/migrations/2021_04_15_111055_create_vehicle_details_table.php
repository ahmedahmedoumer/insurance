<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_details', function (Blueprint $table) {
            $table->string('vehicle_chance_no')->primary();
            $table->integer('customer_id');
            $table->string('vehicle_type');
            $table->string('vehicle_force');
            $table->string('oil_or_benzyl');
            $table->string('height_and_width');
            $table->string('load_capacity');
            $table->string('contract_status');
            $table->string('vehicle_model');
            $table->string('vehicle_number_tire');
            $table->string('vehicle_targa');
            $table->string('vehicle_color');
            $table->string('vehicle_price');
            $table->string('vehicle_code_no');
            $table->foreign('customer_id')->references('id')->on('customers');
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
        Schema::dropIfExists('vehicle_details');
    }
}
