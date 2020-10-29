<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();

            $table->integer('role')->default(0)->comment('0=User,1=Back User');
            $table->integer('is_')->nullable()->comment('1=Admin,2=Counter,3=Doctor');
            $table->integer('age')->nullable();
            $table->string('gender')->nullable();
            $table->integer('phone')->nullable();
            $table->text('address')->nullable();
            $table->integer('doctor_specialist_id')->nullable();
            $table->decimal('fees',8,2)->nullable();

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
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
        Schema::dropIfExists('users');
    }
}
