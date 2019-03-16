<?php
use \App\Models\Field;
use Illuminate\Database\Seeder;
use \App\Models\JobOffer;
use \App\Models\Form;
use \Illuminate\Support\Carbon;
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
        $field = Field::all()->pluck('id')->toArray();

        factory(Form::class, 6)->make()->each(function ($form) use($faker,$offers,$name,$field){
            $form->job_offer_id=$faker->randomElement($offers);
            $form->name=$faker->randomElement($name);
            $form->save();
            $form->formFields()->attach($faker->randomElement($field),
                [
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now()
                ]);
        });
    }
}