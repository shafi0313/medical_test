<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWholeAbdomenMalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('whole_abdomen_males', function (Blueprint $table) {
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

            $table->float('kidney',8,2);
            $table->float('kidney_left',8,2);
            $table->float('rk',8,2);
            $table->float('lk',8,2);
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
        Schema::dropIfExists('whole_abdomen_males');
    }
}
