<?php
/**
 * Created by PhpStorm.
 * User: Ivana
 * Date: 06.03.2019
 * Time: 17:39
 */

namespace App\Helpers;


use App\Models\dto\JobOfferDto;
use App\Models\JobOffer;
use Illuminate\Http\Request;

class JobOfferHelper
{
    public function insert(Request $request)
    {
        $jobOffer=new JobOffer();
        $jobOfferDto = new JobOfferDto();
        $jobOfferDto->name=$request->input('name');
        $jobOfferDto->start=$request->input('start');
        $jobOfferDto->end=$request->input('end');
        $jobOfferDto->description=$request->input('description');
        $jobOfferDto->profession=$request->input('selected');
        $jobOfferDto->condition=$request->input('checked');
        $jobOfferDto->user=1; //ovaj id treba da se uzme iz sesije logovanog korisnika

        $jobOffer->setModel($jobOfferDto);
        return $jobOffer->insert();
    }
}