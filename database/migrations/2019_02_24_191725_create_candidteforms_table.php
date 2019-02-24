<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidteformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidteforms', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('form_id');
            $table->foreign('form_id')->references('id')->on('formfields');
            $table->unsignedInteger('candidate_id');
            $table->foreign('candidate_id')->references('id')->on('candidates');
            $table->string('value');
            $table->integer('rating');
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
        Schema::dropIfExists('candidteforms');
    }
}
