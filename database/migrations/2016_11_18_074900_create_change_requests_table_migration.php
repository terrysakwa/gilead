<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChangeRequestsTableMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('change_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->text('request');
            $table->integer('patient_record_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('patient_record_id')
                  ->references('id')
                  ->on('patient_records');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('change_requests');
    }
}
