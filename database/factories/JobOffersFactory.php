<?php

use App\Models\JobOffer;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

$factory->define(JobOffer::class, function (Faker $faker) {
    return [
        'name' => $faker->catchPhrase,
        'description' => $faker->paragraph,
        'start_date' => Carbon::now(),
        'end_date' => Carbon::now(),
        'is_active' => rand(0,1)
    ];
});
