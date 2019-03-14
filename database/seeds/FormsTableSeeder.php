<?php
use \App\Models\Field;
use Illuminate\Database\Seeder;
use \App\Models\JobOffer;
use \App\Models\Form;
class FormsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        $faker = \Faker\Factory::create();
        $offers = JobOffer::all()->pluck('id')->toArray();
        $name=JobOffer::all()->pluck('name')->toArray();

        factory(Form::class, 6)->make()->each(function ($field) use($faker,$offers,$name){
            $field->job_offer_id=$faker->randomElement($offers);
            $field->name=$faker->randomElement($name);
            $field->save();
        });
    }
}