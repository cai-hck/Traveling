<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('package_id');
            $table->string('name');
            $table->string('last_name');
            $table->string('mobile_number');
            $table->string('email');
            $table->date('booking_date');
            $table->integer('adult');
            $table->string('single');
            $table->integer('child');
            $table->integer('childbed');
            $table->integer('infant');
            $table->integer('room');
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
        Schema::dropIfExists('appointments');
    }
}
