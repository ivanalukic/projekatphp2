<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = [
        'first_name','job_offer_id','last_name','email','cv_file'
    ];
    public function offer() {
        return $this->belongsTo(JobOffer::class);
    }

    public function conditions() {
        return $this->belongsToMany(Condition::class, 'candidate_condition');
    }
    public function forms() {
        return $this->belongsToMany(Condition::class, 'candidate_condition');
    }
}
