<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PravljenjeBaze extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {










        Schema::create('Form', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('annoucement_id');
            $table->foreign('annoucement_id')->references('id')->on('Annoucement');
        });
        Schema::create('Form_Field', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('form_id');
            $table->foreign('form_id')->references('id')->on('Form');
            $table->unsignedInteger('field_id');
            $table->foreign('field_id')->references('id')->on('Field');
        });

        Schema::create('Options', function (Blueprint $table) {
            $table->increments('id');
            $table->string('value');
            $table->unsignedInteger('field_id');
            $table->foreign('field_id')->references('id')->on('Field');
        });
        Schema::create('Candidate', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email');
            $table->integer('mark');
            $table->date('registrationTime');
            $table->string('status');
            $table->unsignedInteger('annoucement_id');
            $table->foreign('annoucement_id')->references('id')->on('Annoucement');
            $table->string('comment');
        });
        Schema::create('Candidate_Conditions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('condition_id');
            $table->foreign('condition_id')->references('id')->on('Condition');
            $table->unsignedInteger('candidate_id');
            $table->foreign('candidate_id')->references('id')->on('Candidate');
        });
        Schema::create('Candidate_Form', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('form_id');
            $table->foreign('form_id')->references('id')->on('Form_Field');
            $table->unsignedInteger('candidate_id');
            $table->foreign('candidate_id')->references('id')->on('Candidate');
            $table->string('value');
            $table->integer('rating');
        });
        Schema::create('Task_Status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status');
        });
        Schema::create('Difficulty', function (Blueprint $table) {
            $table->increments('id');
            $table->string('level');
        });
        Schema::create('Task', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->date('from');
            $table->date('by');
            $table->integer('count');
            $table->unsignedInteger('difficulty_id');
            $table->foreign('difficulty_id')->references('id')->on('Difficulty');
            $table->unsignedInteger('status_id');
            $table->foreign('status_id')->references('id')->on('Task_Status');
        });
        Schema::create('Task_User', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('User');
            $table->unsignedInteger('task_id');
            $table->foreign('task_id')->references('id')->on('Task');
        });
        Schema::create('Log_File', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('login');
            $table->dateTime('logout');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('User');

        });
        Schema::create('Comment', function (Blueprint $table) {
            $table->increments('id');
            $table->string('comment');
            $table->date('date');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('User');
            $table->unsignedInteger('task_id');
            $table->foreign('task_id')->references('id')->on('Task');
        });

        //ubaciti timestemps u svaku tabelu da bi imala polja updated_on i created_on
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Role');
        Schema::dropIfExists('Company');
        Schema::dropIfExists('UserStatus');
        Schema::dropIfExists('User');
        Schema::dropIfExists('Profession');
        Schema::dropIfExists('Annoucement');
        Schema::dropIfExists('Condition');
        Schema::dropIfExists('Conditions_Profession');
        Schema::dropIfExists('Annoucement_Conditions');
        Schema::dropIfExists();
        Schema::dropIfExists();
        Schema::dropIfExists();
        Schema::dropIfExists();
        Schema::dropIfExists();
        Schema::dropIfExists();
        Schema::dropIfExists();
        Schema::dropIfExists();
        Schema::dropIfExists();
        Schema::dropIfExists();
        Schema::dropIfExists();
        Schema::dropIfExists();
        Schema::dropIfExists();
        Schema::dropIfExists();
        Schema::dropIfExists();

    }
}
