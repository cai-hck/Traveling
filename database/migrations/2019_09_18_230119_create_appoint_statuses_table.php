<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appoint_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('appointment_id');
            $table->integer('company_id');
            $table->string('current');
            $table->string('approve_info');
            $table->string('pending_info');
            $table->string('not_approve_info');
            $table->string('file');
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
        Schema::dropIfExists('appoint_statuses');
    }
}
