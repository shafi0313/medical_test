<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePregnancyProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pregnancy_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_test_id');
            $table->foreign('patient_test_id')->references('id')->on('patient_tests')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('ref_by_id');
            $table->foreign('ref_by_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('seen_by_id');
            $table->foreign('seen_by_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('patients')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('test_cat_id');
            $table->foreign('test_cat_id')->references('id')->on('test_cats')->onUpdate('cascade')->onDelete('cascade');

            $table->float('bpd');
            $table->integer('bpd_week');
            $table->integer('bpd_day');
            $table->float('hc');
            $table->integer('hc_week');
            $table->integer('hc_day');
            $table->float('ac');
            $table->integer('ac_week');
            $table->integer('ac_day');
            $table->float('fl');
            $table->integer('fl_week');
            $table->integer('fl_day');
            $table->integer('pregnency_week');
            $table->integer('pregnency_day');
            $table->integer('lmp_week');
            $table->integer('lmp_day');
            $table->float('edd');
            $table->float('afi');
            $table->float('heart');
            $table->string('efw');
            $table->string('ri');
            $table->string('impression');

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
        Schema::dropIfExists('pregnancy_profiles');
    }
}
