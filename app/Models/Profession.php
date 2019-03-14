<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{

//    public function offers() {
//        return $this->hasMany(JobOffer::class);
//    }

    public function conditions() {
        return $this->belongsToMany(Condition::class );
    }
    public function getProfessions(){
        return Profession::all();
    }

}
