<?php

namespace App\Http\Controllers\Back;

use App\Helpers\JobOfferHelper;
use App\Models\Condition;
use App\Models\JobOffer;
use App\Models\Profession;
use http\Client\Response;
use Illuminate\Http\Request;
use Psy\Util\Json;

class JobOfferController extends BackController
{
    //ovaj kontroler radi samo sa oglasima u njemu se nalaze svi metodi koji su potrebni da dohvataju oglase, da ih brisu, da ih dodaju..

    //prikaz forme za pravljenje oglasa prosledjuje se id kompanije
    public function jobOfferForm($id=null){
    $data=[];
        $conditions=new Condition();
        $professions=new Profession();
       $this->data['cond']=$conditions->formConditions();
        $this->data['professions']=$professions->getProfessions();
        return view('pages.create_job_offer',$this->data);
    }

    public function jobOfferFormProfession($id){
        $data=[];
        $conditions=new Condition();
      $cond=$conditions->formCondition($id);
      return Json::encode($cond);
    }
    public function save(Request $request){
        $helper = new JobOfferHelper();
        $helper->insert($request);
    }
    //napraviti api controller za ovaj metod i klasu helper
    public function getJobOffers($id){
        $joboffer=new JobOffer();
        $conditions=new Condition();
        $data=[];
        $data['offers']=$joboffer->getActive($id);
        $data['offOffers']=$joboffer->getInactive($id);
        $data['condition']=$conditions->getCond();
        return view('pages.my_job_offers',$data);
    }
    public function edit($id){
        $joboffer=new JobOffer();
        $offer=$joboffer->off_on($id);
         return $offer;
    }
    public function destroy($id){
        $joboffer=new JobOffer();
        $rez=$joboffer->del($id);
        return $rez;
    }
}
