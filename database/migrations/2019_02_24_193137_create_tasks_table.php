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
            $table->date('from');
            $table->date('by');
            $table->integer('count');
            $table->unsignedInteger('difficulty_id');
            $table->foreign('difficulty_id')->references('id')->on('difficulties');
            $table->unsignedInteger('status_id');
            $table->foreign('status_id')->references('id')->on('taskstatuses');
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
