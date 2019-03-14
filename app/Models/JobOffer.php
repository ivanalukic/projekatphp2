<?php

namespace App\Models;

use App\Models\dto\JobOfferDto;
use \Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use SoftDeletingTrait;

class JobOffer extends Model
{
    private $model;

    public function setModel(JobOfferDto $model){
        $this->model = $model;
    }
    protected $fillable=['name','start_date','end_date','description','is_active'];
    protected $table = 'job_offers';
    public function candidates() {
        return $this->hasMany(Candidate::class);
    }

//    public function profession() {
//        return $this->belongsTo(Profession::class);
//    }
//
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function conditions() {

        return $this->belongsToMany(Condition::class, 'job_offer_condition');
    }
    //back
    public function insert(){
        try{
            \DB::transaction(function() {
            $offer=JobOffer::make(['name'=>$this->model->name,'start_date'=>$this->model->start,'end_date'=>$this->model->end,'description'=>$this->model->description,'is_active'=>'1']);
            $offer->profession_id=$this->model->profession;
            $offer->user_id=$this->model->user;
            $offer->save();
            foreach ($this->model->condition as $cond){
                $offer->conditions()->attach($cond,['created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]);
            }});
        } catch(\Throwable $e) {
            \Log::critical("Failed to insert job offers");
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

