<?php

use App\Models\Condition;
use Faker\Generator as Faker;

$factory->define(Condition::class, function (Faker $faker) {
    return [
        'name' => $faker->company
    ];
});
