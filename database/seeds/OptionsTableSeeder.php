<?php

use Illuminate\Database\Seeder;
use \App\Models\Field;
use \App\Models\Option;
class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $field = Field::all()->pluck('id')->toArray();
        $values=['php','pizza','english','C#','C++','cooke','economy'];
        factory(Option::class, 6)->make()->each(function ($option) use($faker,$field,$values){
            $option->field_id=$faker->randomElement($field);
            $option->name=$faker->randomElement($values);
            $option->save();
        });
    }
}
