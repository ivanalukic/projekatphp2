<?php

use App\Models\Task;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'description' => $faker->text(100),
        'start_date' => Carbon::now(),
        'end_date' => Carbon::now()->addDays(15),
        'count' => $faker->numberBetween(1,5)
    ];
});
