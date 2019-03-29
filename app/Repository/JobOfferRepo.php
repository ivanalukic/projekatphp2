<?php
/**
 * Created by PhpStorm.
 * User: LogIn
 * Date: 15.03.2019
 * Time: 13:02
 */

namespace App\Repository;
use App\Models\Form;
use App\Models\JobOffer;
use Illuminate\Support\Carbon;
class JobOfferRepo
{
    private $model;
    public function __construct(JobOffer $model)
    {
        $this->model=$model;
    }
    //back
    public function insert(){
        try{

                $offer=JobOffer::make(['name'=>$this->model->getDto()->name,'start_date'=>$this->model->getDto()->start,'end_date'=>$this->model->getDto()->end,'description'=>$this->model->getDto()->description,'is_active'=>'1']);
                $offer->profession_id=$this->model->getDto()->profession;
                $offer->user_id=$this->model->getDto()->user;
            $offer->save();
                foreach ($this->model->getDto()->condition as $cond){
                    $offer->conditions()->attach($cond,['created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]);
                };
                $offer->save();
               $form= Form::create(['job_offer_id'=>$offer->id,'name'=>$offer->name,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]);
                return $form->id;
        } catch(\Throwable $e) {
            \Log::critical($e->getMessage());
            throw new \Exception("Insert error");
        }


    }
    //back id je korisnikov
    public function getActive($id){
        $offers=JobOffer::where('user_id','=',$id)->get();
        //dd($offers);
        $date=time();
        $rez=array();
        foreach ($offers as $offer){
            $start=Carbon::createFromFormat('Y-m-d H:i:s', $offer->start_date)->timestamp;
            $end=Carbon::createFromFormat('Y-m-d H:i:s', $offer->end_date)->timestamp;
            if(($offer->is_active==1) && ($end>=$date) && ($start<=$date)){
                $rez[]=$offer;
            }
        }
        return $rez;
    }
    //back
    public function getInactive($id){
        $offers=JobOffer::where('user_id','=',$id)->get();
        //dd($offers);
        $date=time();
        $rez=array();
        foreach ($offers as $offer){
            $start=Carbon::createFromFormat('Y-m-d H:i:s', $offer->start_date)->timestamp;
            $end=Carbon::createFromFormat('Y-m-d H:i:s', $offer->end_date)->timestamp;
            if(($offer->is_active==0) || ($end<$date) || ($start>$date)){
                $rez[]=$offer;
            }
        }
        return $rez;
    }
//front
    public function getAll(){
        $offers=JobOffer::all();
        $date=time();
        $rez=array();
        foreach ($offers as $offer){
            $start=Carbon::createFromFormat('Y-m-d H:i:s', $offer->start_date)->timestamp;
            $end=Carbon::createFromFormat('Y-m-d H:i:s', $offer->end_date)->timestamp;
            if(($offer->is_active==1) && ($end>=$date) && ($start<=$date)){
                $rez[]=$offer;
            }
        }
        return $rez;
    }
    //back id job offer
    public function off_on($id){
        $offer=JobOffer::find($id);
        $one=JobOffer::where('id', '=', $id);
        if($offer->is_active){
            //deaktivacija
            $rez=$one->update(array('is_active' => 0));
        }else{
            //aktivacija
            $rez=$one->update(array('is_active' => 1));
        }
        return $rez;
    }
    //back
    public function del($id)

    {

        $offer=JobOffer::find($id);
        $offer->delete();
    }

    //back id je id kompanije za koju dohvatamo oglase
    public function getCompanyOffers($id){
        $offers= \DB::table('job_offers')->select('*','job_offers.id as jobOfferId')->join('users','job_offers.user_id','=','users.id')->where('company_id','=',$id)->get();
        $date=time();
        $rez=array();
        foreach ($offers as $offer){
            $start=Carbon::createFromFormat('Y-m-d H:i:s', $offer->start_date)->timestamp;
            $end=Carbon::createFromFormat('Y-m-d H:i:s', $offer->end_date)->timestamp;
            if(($offer->is_active==1) && ($end>=$date) && ($start<=$date)){
                $rez[]=$offer;
            }
        }
        return $rez;
    }

}