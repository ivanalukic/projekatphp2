<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class TaskPrioritiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $priorities = ['Really high','High','Medium', 'Low'];

        foreach($priorities as $pr) {
            \DB::table('task_priorities')->insert([
                'name' => $pr,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
