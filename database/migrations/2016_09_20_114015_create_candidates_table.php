<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('candidate_name');
            $table->string('candidate_skills');
            $table->integer('candidate_experience');
            $table->date('joining_date');
            $table->string('candidate_cv');
            $table->integer('tmsf_id');
            $table->integer('reporting_status');
            $table->string('initial_report');
            $table->string('category');
            $table->integer('rating');
            $table->string('reported_by');
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
        Schema::drop('candidates');
    }
}
