<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name', 'description', 'start_date', 'end_date', 'count'
    ];

//    public function difficulty() {
//        return $this->belongsTo(TaskDifficulty::class);
//    }

//    public function status() {
//        return $this->belongsTo(TaskStatuses::class);
//    }

    public function comments()
    {
        return $this->belongsToMany(User::class, 'task_comments');
    }

    public function users() {
        return $this->belongsToMany(User::class);
    }
}
