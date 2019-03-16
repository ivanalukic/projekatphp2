<?php

use App\Models\Rating;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

$factory->define(Rating::class, function (Faker $faker) {
    return [
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});