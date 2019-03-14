<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormFieldTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_field', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('form_id');
            $table->foreign('form_id')->references('id')->on('forms');
            $table->unsignedInteger('field_id');
            $table->foreign('field_id')->references('id')->on('fields');
            $table->timestamps();

            $table->unique(['form_id', 'field_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_field');
    }
}
