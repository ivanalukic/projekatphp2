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
