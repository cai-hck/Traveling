<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->string('country');
            $table->string('city');
            $table->date('from');
            $table->date('until');
            $table->integer('nights');
            $table->integer('star');
            $table->string('subject');
            $table->string('more_details');
            $table->string('service');
            $table->string('term_condition');
            $table->integer('adult');
            $table->integer('child');
            $table->integer('infant');
            $table->integer('single');
            $table->string('singlestatus');
            $table->integer('childbed');
            $table->string('childbedstatus');
            $table->date('offer_from');
            $table->date('offer_until');
            $table->string('photo');
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
        Schema::dropIfExists('packages');
    }
}
