<?php

use Illuminate\Database\Seeder;
use \App\Models\Type;
use Illuminate\Support\Carbon;
class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $niz=['text','checkbox','radio','reset','submit','select'];
        foreach ($niz as $item) {
            $type=new Type();
            $type->name=$item;
            $type-> created_at = Carbon::now();
             $type->updated_at = Carbon::now();
             $type->save();
        }
    }
}
