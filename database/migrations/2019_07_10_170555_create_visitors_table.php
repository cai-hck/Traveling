<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('appointment_id');
            $table->string('type');
            $table->string('first_name');
            $table->string('last_name');
            $table->date('day_of_birth');
            $table->date('passport_issue_date');
            $table->date('passport_expire_date');
            $table->string('pssport_no');
            $table->string('photo');
            $table->string('personalphoto');
            $table->string('personal');
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
        Schema::dropIfExists('visitors');
    }
}
