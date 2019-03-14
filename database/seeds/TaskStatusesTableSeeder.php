<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class TaskStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = ['Done','Currently working on','On hold', 'Dropped', 'I need some more time'];

        foreach($statuses as $status) {
            \DB::table('task_statuses')->insert([
                'name' => $status,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
