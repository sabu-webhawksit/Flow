<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksSpacesItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worksspacesitems', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tms_id');
            $table->integer('number_of_hire');
            $table->integer('supervisor');
            $table->integer('team_member');
            $table->integer('pc');
            $table->integer('mac');
            $table->string('invoice');
            $table->string('estimate');
            $table->integer('others_one');
            $table->integer('others_two');
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
        Schema::drop('worksspacesitems');
    }
}
