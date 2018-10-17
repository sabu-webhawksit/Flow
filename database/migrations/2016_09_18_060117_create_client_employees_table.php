<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('skill_set');
            $table->integer('tms_id');
            $table->string('level');
            $table->string('quentity');
            $table->string('category');
            $table->string('others_one');
            $table->string('others_two');
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
        Schema::drop('client_employees');
    }
}
