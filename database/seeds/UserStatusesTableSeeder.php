<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
class UserStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = ['Well done!', 'Try harder!' ,'Critical'];

        foreach($status as $s) {
            \DB::table('user_statuses')->insert([
                'name' => $s,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
