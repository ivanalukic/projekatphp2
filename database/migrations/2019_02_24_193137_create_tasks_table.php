<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('count');
            $table->unsignedInteger('task_difficulties_id');
            $table->foreign('task_difficulties_id')->references('id')->on('task_difficulties');
            $table->unsignedInteger('task_statuses_id');
            $table->foreign('task_statuses_id')->references('id')->on('task_statuses');
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
        Schema::dropIfExists('tasks');
    }
}
