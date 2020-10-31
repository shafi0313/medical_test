<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKubPvrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kub_pvrs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_test_id');
            $table->foreign('patient_test_id')->references('id')->on('patient_tests')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('patients')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('test_cat_id');
            $table->foreign('test_cat_id')->references('id')->on('test_cats')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('kidney');
            $table->integer('kidney_left');
            $table->integer('rk');
            $table->integer('lk');
            $table->integer('pvr');
            $table->string('interpretation');
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
        Schema::dropIfExists('kub_pvrs');
    }
}
