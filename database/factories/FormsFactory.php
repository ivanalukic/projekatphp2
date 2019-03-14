<?php

use App\Models\Form;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

$factory->define(Form::class, function (Faker $faker) {
    return [
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});