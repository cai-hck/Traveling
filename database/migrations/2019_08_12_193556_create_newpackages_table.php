<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewpackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newpackages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->string('country');
            $table->string('city');
            $table->date('from');
            $table->date('until');  
            $table->integer('nights');
            $table->integer('star');
            $table->string('hotelname');
            $table->string('subject');
            $table->string('more_details');
            $table->string('seat');
            $table->string('doc');

            $table->string('departure_time');
            $table->string('arrival_time');
            $table->string('departure_airport');
            $table->string('arrival_airport');
            $table->string('airline');

            $table->string('departure_time_1');
            $table->string('arrival_time_1');
            $table->string('departure_airport_1');
            $table->string('arrival_airport_1');
            $table->string('airline_1');

            $table->string('special');
            $table->string('day');

            $table->integer('adult');
            $table->integer('child');
            $table->integer('infant');
            $table->integer('single');
            $table->string('singlestatus');
            $table->integer('childbed');
            $table->string('childbedstatus');
            $table->integer('room');
            $table->string('roomstatus');

            $table->integer('wesell');
            $table->integer('yousell');

            $table->date('offer_from');
            $table->date('offer_until');
            $table->string('photo');
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
        Schema::dropIfExists('newpackages');
    }
}
