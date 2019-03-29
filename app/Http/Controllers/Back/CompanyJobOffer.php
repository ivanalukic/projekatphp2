<?php
/**
 * Created by PhpStorm.
 * User: LogIn
 * Date: 11.03.2019
 * Time: 15:42
 */

namespace App\Http\Controllers\Back;


use App\Models\Condition;
use App\Models\JobOffer;

class CompanyJobOffer extends BackController
{
    public function index($id){
 $jobOffer=new JobOffer();
 $conditions=new Condition();
 $rez=$jobOffer->getCompanyOffers($id);
        $cond=$conditions->getCond();
 return view('pages.company_job_offers',['offers'=>$rez,'condition'=>$cond]);
    }
}