<?php

use App\Models\Task;
use App\Models\User;
use function foo\func;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $users = User::all()->pluck('id')->toArray();


        factory(Task::class, 10)->make()->each(function ($task)  use($users, $faker) {
            $task->task_priority_id = rand(1,4);
            $task->task_status_id = rand(1,5);
            $task->save();
            $task->comments()->attach($faker->randomElement($users),
                                      ["comment" => $faker->text(100),
                                       "date" => Carbon::now(),
                                       "created_at" => Carbon::now(),
                                       "updated_at" => Carbon::now(),
                                      ]);

            $task->users()->attach($faker->randomElement($users),
                [
                    "is_accepted" => rand(0,1),
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now()
                ]);
        });
    }
}
