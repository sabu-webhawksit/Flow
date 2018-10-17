<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follow_ups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('follow_up_list');
            $table->string('next_action_list');
            $table->string('reminder_topics');
            $table->string('reminder_via');
            $table->date('follow_pick_date');
            $table->string('follow_pick_time');
            $table->integer('tmsf_id');
            $table->integer('group_id');
            $table->string('follow_up_comments');  
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
        Schema::drop('follow_ups');
    }
}
