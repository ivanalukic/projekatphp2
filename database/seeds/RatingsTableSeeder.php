<?php

use Illuminate\Database\Seeder;
use \App\Models\Rating;
class RatingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $formField=\DB::table('form_field')->get();
        $candidate=\App\Models\Candidate::all()->pluck('id')->toArray();
        $name=['pera','mika','laza'];
        $id=$formField->pluck('id')->toArray();
        factory(Rating::class, 6)->make()->each(function ($rating) use($faker,$id,$name,$candidate){
            $rating->form_field_id=$faker->randomElement($id);
            $rating->value=$faker->randomElement($name);
            $rating->candidate_id=$faker->randomElement($candidate);
            $rating->rating=$faker->randomNumber();
            $rating->save();

        });
    }
}
