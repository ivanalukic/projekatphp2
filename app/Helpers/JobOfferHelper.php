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
use App\Repository\JobOfferRepo;
use Illuminate\Http\Request;

class JobOfferHelper
{
    public function insert(Request $request)
    {
        $jobOffer=new JobOffer();
        $jobOfferDto = new JobOfferDto($request);
        $jobOffer->setDto($jobOfferDto);
        $offer=new JobOfferRepo($jobOffer);
        return $offer->insert();
    }
}