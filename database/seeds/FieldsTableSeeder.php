<?php
use \App\Models\Field;
use Illuminate\Database\Seeder;
use \App\Models\Type;
class FieldsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        $faker = \Faker\Factory::create();
        $niz = ['First name','Last name','Phone','Language','Hobby','Program languages'];
        $types = Type::all()->pluck('id')->toArray();
        factory(Field::class, 6)->make()->each(function ($field) use($faker,$types,$niz){
            $field->type_id=$faker->randomElement($types);
            $field->name=$faker->randomElement($niz);
            $field->save();
        });
    }
}
