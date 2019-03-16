<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {     Eloquent::unguard();
        $this->call([
            TruncateDBSeeder::class,
            RolesTableSeeder::class,
            UserStatusesTableSeeder::class,
            UsersTableSeeder::class,
            TaskPrioritiesTableSeeder::class,
            TaskStatusesTableSeeder::class,
            TasksTableSeeder::class,
            JobOffersTableSeeder::class,
            ConditionTableSeeder::class,
            RatingsTableSeeder::class
        ]);
    }
}
