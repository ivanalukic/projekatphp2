<?php
/**
 * Created by PhpStorm.
 * User: LogIn
 * Date: 27.03.2019
 * Time: 14:58
 */

namespace App\Repository;


use App\Models\Candidate;
use App\Models\dto\CandidateDto;
use App\Models\dto\ConditionDto;
use App\Models\dto\RatingDto;
use App\Models\Rating;
use Carbon\Carbon;

class CandidateRepo
{
    public function insert(CandidateDto $dto,ConditionDto $conditions){
        $candidate=new Candidate();
        $candidate->first_name=$dto->first_name;
        $candidate->last_name=$dto->last_name;
        $candidate->email=$dto->email;
        $candidate->cv_file=$dto->cv;
        $candidate->job_offer_id=$dto->job_offer;
        $candidate->created_at=Carbon::now();
        $candidate->updated_at=Carbon::now();
        $candidate->application_date=Carbon::now();
        $candidate->avg_rating=5;
        $candidate->save();
        if($conditions){
        foreach($conditions as $cond){
            $candidate->conditions()->attach($cond,['created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]);
        }
            return $candidate->id;
        }else{
            return $candidate->id;
        }

    }
    public function rating($id,RatingDto $dto){
        foreach ($dto->value as $v){
        $rating=new Rating();
        $rating->form_field_id=$dto->form_field_id;
        $rating->candidate_id=$id;
        $rating->value=$v;
        $rating->rating=5;
        $rating->created_at=Carbon::now();
        $rating->updated_at=Carbon::now();
        $rating->save();
        }

    }
}