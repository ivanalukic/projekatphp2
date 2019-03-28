<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
//    public function users()
//    {
//        return $this->hasMany(User::class);
//    }
    public static function boot()
    {
        parent::boot();
        static::creating(function($model) {
            $model->generateHash();
        });
    }
    protected function generateHash()
    {
        $random_bytes = md5(uniqid(mt_rand(), true));
        $this->api_token = $random_bytes;
    }
}
