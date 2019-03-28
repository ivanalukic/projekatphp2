<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = [
        'name','job_offer_id'
    ];
    public function jobOffers(){
        return $this->belongsTo(JobOffer::class);
    }
    public function formFields(){
        return $this->belongsToMany(Field::class,'form_field');
    }
    public function getFormId($id){
    return Form::where('job_offer_id',$id)->get();
}
}
