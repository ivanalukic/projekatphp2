<?php
/**
 * Created by PhpStorm.
 * User: Ivana
 * Date: 11.03.2019
 * Time: 12:46
 */

namespace App\Http\Controllers\Front;


use App\Models\Condition;
use App\Models\JobOffer;

class JobOfferController extends FrontController
{
    public function getJobOffers(){
        $joboffer=new JobOffer();
        $conditions=new Condition();
        $rez=$joboffer->getAll();
        $cond=$conditions->getCond();
        return view('pagesFront.all_job_offers',['offers'=>$rez,'condition'=>$cond]);
    }
}