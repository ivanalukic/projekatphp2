<?php

use App\Models\Field;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

$factory->define(Field::class, function (Faker $faker) {
    return [
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});
