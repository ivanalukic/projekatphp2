<?php

use App\Models\Option;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

$factory->define(Option::class, function (Faker $faker) {
    return [
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});