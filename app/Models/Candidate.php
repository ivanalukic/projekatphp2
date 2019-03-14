<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    public function offer() {
        return $this->belongsTo(JobOffer::class);
    }

    public function conditions() {
        return $this->belongsToMany(Condition::class, 'candidate_condition');
    }
}
