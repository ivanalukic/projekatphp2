<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    public function jobOffers(){
        return $this->belongsTo(JobOffer::class);
    }
}
