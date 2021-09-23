<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoneyflightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moneyflights', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->integer('approve_id');
            $table->integer('balance');
            $table->integer('remain');
            $table->integer('admin_balance');
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
        Schema::dropIfExists('moneyflights');
    }
}
