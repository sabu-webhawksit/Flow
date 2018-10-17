<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksSpacesProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worksspacesproducts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tms_id');
            $table->integer('group_id');
            $table->string('item');
            $table->integer('qty');
            $table->date('starting_date');
            $table->date('deadline');
            $table->float('cost');
            $table->string('notes');
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
        Schema::drop('worksspacesproducts');
    }
}
