<?php

use App\Models\Candidate;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

$factory->define(Candidate::class, function (Faker $faker) {
    $statuses = ['accepted', 'archived', 'deleted'];
    return [
        'first_name' => $faker->firstName,
        'last_name'  => $faker->lastName,
        'email'      => $faker->email,
        'application_date' => Carbon::now(),
        'cv_file' => 'public/files/file1.pdf',
        'avg_rating' => $faker->randomFloat(null, 0, 5),
        'status' => $faker->randomElement($statuses),
        'comment' => $faker->paragraph(2)
    ];
});
