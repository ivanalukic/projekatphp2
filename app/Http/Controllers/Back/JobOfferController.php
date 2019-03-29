<?php

namespace App\Http\Controllers\Back;

use App\Helpers\JobOfferHelper;
use App\Models\Condition;
use App\Models\JobOffer;
use App\Models\Profession;
use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Psy\Util\Json;
use App\Http\Requests\JobOfferRequest;

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
    public function save(JobOfferRequest $request,$id){
        $helper = new JobOfferHelper();
        try{
        $rez=$helper->insert($request,$id);}
        catch (\Exception $e){
            \Log::error($e->getMessage());
            return  redirect('/all')->with(['error'=>'Fail insert, try again']);
        }
       return redirect(route('formJobOffer',$rez));
    }
    public function getJobOffers($id){
        return view('pages.my_job_offers');
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
