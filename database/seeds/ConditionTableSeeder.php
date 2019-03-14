<?php

use App\Models\Candidate;
use App\Models\Company;
use App\Models\Condition;
use App\Models\JobOffer;
use App\Models\Profession;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ConditionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $companies = Company::all()->pluck('id')->toArray();
        $professions = Profession::all()->pluck('id')->toArray();
        $offers = JobOffer::all()->pluck('id')->toArray();
        $candidates = Candidate::all()->pluck('id')->toArray();

        factory(Condition::class, 15)->make()->each(function($cond)
        use ($companies, $faker, $professions, $offers, $candidates) {

           $cond->company_id = $faker->randomElement($companies);
           $cond->save();
           $cond->professions()->attach($faker->randomElement($professions),
               [
                   "created_at" => Carbon::now(),
                   "updated_at" => Carbon::now()
               ]);

           $cond->offers()->attach($faker->randomElement($offers),
               [
                   "created_at" => Carbon::now(),
                   "updated_at" => Carbon::now()
               ]);

           $cond->candidates()->attach($faker->randomElement($candidates),
               [
                   "created_at" => Carbon::now(),
                   "updated_at" => Carbon::now()
               ]);
        });
    }
}
