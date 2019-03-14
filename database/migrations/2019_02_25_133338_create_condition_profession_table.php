<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConditionProfessionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('condition_profession', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('condition_id');
            $table->foreign('condition_id')->references('id')->on('conditions');
            $table->unsignedInteger('profession_id');
            $table->foreign('profession_id')->references('id')->on('professions');
            $table->timestamps();

            $table->unique(['condition_id', 'profession_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('condition_profession');
    }
}
