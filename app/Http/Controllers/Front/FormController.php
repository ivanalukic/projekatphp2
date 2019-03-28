<?php

namespace App\Http\Controllers\Front;

use App\Models\Condition;
use App\Models\Field;
use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends FrontController
{
    public function index($id){
            $forma=new Form();
            $field=new Field();
            $cond=new Condition();
            $formId=$forma->getFormId($id);
            $formOptions=$field->getOptions($formId[0]->id);
            $formFields=$field->getFields($formId[0]->id);
            $niz=['formName'=>$formId[0]->name,'jobOfferId'=>$formId[0]->job_offer_id,'formId'=>$formId[0]->id,'fields'=>$formFields,'options'=>$formOptions,'conditions'=>$cond->getConditions($id),'id'=>$id];
    return view('pagesFront.form',$niz);

    }
}
