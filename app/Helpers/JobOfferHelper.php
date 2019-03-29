<?php
/**
 * Created by PhpStorm.
 * User: LogIn
 * Date: 06.03.2019
 * Time: 17:39
 */

namespace App\Helpers;


use App\Models\dto\JobOfferDto;
use App\Models\JobOffer;
use App\Repository\JobOfferRepo;
use Illuminate\Http\Request;
use App\Http\Requests\JobOfferRequest;

class JobOfferHelper
{
    public function insert(JobOfferRequest $request,$id)
    {
        $jobOffer=new JobOffer();
        $jobOfferDto = new JobOfferDto($request,$id);
        $jobOffer->setDto($jobOfferDto);
        $offer=new JobOfferRepo($jobOffer);
        return $offer->insert();
    }
}