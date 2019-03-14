<?php

use App\Models\UserLog;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

$factory->define(UserLog::class, function (Faker $faker) {
    return [
        'login' => Carbon::now(),
        'logout' => Carbon::now(),
    ];
});
