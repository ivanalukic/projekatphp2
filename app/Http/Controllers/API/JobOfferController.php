<?php

namespace App\Http\Controllers\API;

use App\Helpers\JobOfferHelper;
use App\Http\Requests\JobOfferRequest;
use App\Models\Condition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JobOffer;
use Illuminate\Support\Facades\Session;

class JobOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public $model;
   public $helper;
 function __construct()
 {
     $this->model=new JobOffer();
     $this->helper = new JobOfferHelper();
 }

    public function index($id=null)
    {
        //ovaj metod ce da gadja ajax back-a i ajax front-a i imace mogucnost filtriranja po zanimanju
        $data=[];
        $conditions=new Condition();
        $data['offers']=$this->model->getAll();
        $data['condition']=$conditions->getCond();
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobOfferRequest $request)
    {
//        $this->helper->insert($request);
//        return response(['message'=>'Success'],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $joboffer=new JobOffer();
        $conditions=new Condition();
        $data=[];
        $data['offers']=$joboffer->getActive($id);
        $data['offOffers']=$joboffer->getInactive($id);
        $data['condition']=$conditions->getCond();
        return response($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $offer=$this->model->off_on($id);
        return response(['message'=>'Success'],204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rez=$this->model->del($id);
        return response(['message'=>'Success'],204);
    }
}
