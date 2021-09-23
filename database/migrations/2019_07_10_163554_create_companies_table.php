<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('travel_agency_name');
            $table->string('city');
            $table->string('area');
            $table->string('mobile_number');
            $table->string('email');
            $table->string('password');
            $table->string('photo');
            $table->string('travel_agency_phone_number');
            $table->string('address');
            $table->string('service');
            $table->string('more_info');
            $table->integer('start_time');
            $table->integer('end_time');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('qr');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('instagram');
            $table->string('youtube');
            $table->string('whatsapp');
            $table->string('addflight');
            $table->string('addpackage');
            $table->string('bookflight');
            $table->string('bookpackage');
            $table->string('addvisa');
            $table->string('bookvisa');
            $table->string('approve_number');
            $table->string('status');
            $table->integer('balance');
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
        Schema::dropIfExists('companies');
    }
}
