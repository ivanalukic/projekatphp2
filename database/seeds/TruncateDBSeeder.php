<?php

use Illuminate\Database\Seeder;

class TruncateDBSeeder extends Seeder
{
    public function run()
    {
        DB::statement("SET foreign_key_checks=0");
        $tables = [
            "candidate_condition",
            "ratings",
            "candidates",
            "companies",
            "condition_profession",
            "conditions",
            "fields",
            "form_field",
            "forms",
            "job_offer_condition",
            "job_offers",
            "options",
            "password_resets",
            "professions",
            "roles",
            "task_comments",
            "task_priorities",
            "task_statuses",
            "task_user",
            "tasks",
            "types",
            "user_logs",
            "user_statuses",
            "users",
        ];
        foreach($tables as $table)
        {
            DB::statement("TRUNCATE TABLE $table");
        }
        DB::statement("SET foreign_key_checks=1");
    }
}