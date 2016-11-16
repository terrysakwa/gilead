<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientRecordsMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_records', function (Blueprint $table) {
            $table->increments('id');
            $table->text('symptoms');
            $table->string('tests');
            $table->string('test_results');
            $table->string('diagnosis');
            $table->text('prescription');
            $table->integer('user_id')->index()->unsigned();

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users');
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
        Schema::drop('patient_records');
    }
}
