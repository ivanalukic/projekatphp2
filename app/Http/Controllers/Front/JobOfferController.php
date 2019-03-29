<?php
/**
 * Created by PhpStorm.
 * User: LogIn
 * Date: 11.03.2019
 * Time: 12:46
 */

namespace App\Http\Controllers\Front;


use App\Models\Condition;
use App\Models\JobOffer;
use App\Models\Profession;
use Illuminate\Support\Facades\Session;

class JobOfferController extends FrontController
{
    public function getJobOffers(){
        $prof=new Profession();
        $niz=$prof->getProfessions();
        //Session::put('user','ivana');
        return view('pagesFront.all_job_offers',['professions'=>$niz]);
    }
}