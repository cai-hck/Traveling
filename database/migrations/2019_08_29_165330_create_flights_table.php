<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->string('o_country');
            $table->string('o_city');
            $table->string('o_airport');
            $table->date('o_departure');
            $table->date('o_arrival');
            $table->string('o_departure_time');
            $table->string('o_arrival_time');
            $table->string('o_airline');
            $table->date('o_from');
            $table->date('o_until');
            $table->string('o_adult');
            $table->string('o_child');
            $table->string('o_infant');
            $table->string('o_adult_b_status');
            $table->string('o_adult_b');
            $table->string('o_child_b_status');
            $table->string('o_child_b');
            $table->string('o_infant_b_status');
            $table->string('o_infant_b');
            $table->string('o_more');
            $table->string('inbound');
            $table->string('i_country');
            $table->string('i_city');
            $table->string('i_airport');
            $table->date('i_departure');
            $table->date('i_arrival');
            $table->string('i_departure_time');
            $table->string('i_arrival_time');
            $table->string('i_airline');
            $table->date('i_from');
            $table->date('i_until');
            $table->string('i_adult');
            $table->string('i_child');
            $table->string('i_infant');
            $table->string('i_adult_b_status');
            $table->string('i_adult_b');
            $table->string('i_child_b_status');
            $table->string('i_child_b');
            $table->string('i_infant_b_status');
            $table->string('i_infant_b');
            $table->string('i_more');
            $table->string('wesell');
            $table->string('yousell');
            $table->string('seat');
            $table->string('special');
            $table->string('day');
            $table->integer('oldid');
            $table->string('status');
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
        Schema::dropIfExists('flights');
    }
}
