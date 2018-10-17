<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_leads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('position');
            $table->string('company');
            $table->string('country');
            $table->string('state');
            $table->string('zip_code');
            $table->string('linkdin');
            $table->string('others_link');
            $table->string('pitching_for');
            $table->string('reference');
            $table->integer('country_manager');
            $table->integer('create_by');
            $table->integer('client_id');
            $table->string('comments');
            $table->string('pack');
            $table->string('extras');
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
        Schema::drop('sales_leads');
    }
}
