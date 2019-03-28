<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{

    public function professions() {
        return $this->belongsToMany(Profession::class,'condition_profession');
    }

    public function offers() {
        return $this->belongsToMany(JobOffer::class, 'job_offer_condition');
    }

    public function candidates() {
        return $this->belongsToMany(Candidate::class, 'candidate_condition');
    }
    public function formConditions(){
        return Condition::all();
    }
    public function formCondition($id){
        if($id){
            return Profession::find($id)->conditions()->get();
        }
        else{
            return Profession::all();
        }
    }
    public function getCond(){
//        $niz=[];
//        $rez=Condition::all();
//        foreach ($rez as $r){
//             $niz[]=$r->offers()->get();
//             $niz[]=$r;
//        }
//        return $niz;
        return\DB::table('conditions')->join('job_offer_condition','conditions.id','=','job_offer_condition.condition_id')->get();
    }
    public function getConditions($id){
        return JobOffer::find($id)->conditions()->get();
}
}
