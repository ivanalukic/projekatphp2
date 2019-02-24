<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidteconditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidteconditions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('condition_id');
            $table->foreign('condition_id')->references('id')->on('conditions');
            $table->unsignedInteger('candidate_id');
            $table->foreign('candidate_id')->references('id')->on('candidates');
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
        Schema::dropIfExists('candidteconditions');
    }
}
