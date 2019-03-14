<?php

use App\Models\Profession;
use Faker\Generator as Faker;

$factory->define(Profession::class, function (Faker $faker) {
    return [
        'name' => $faker->jobTitle
    ];
});
