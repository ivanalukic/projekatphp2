<?php
/**
 * Created by PhpStorm.
 * User: Ivana
 * Date: 15.03.2019
 * Time: 10:03
 */

namespace App\Http\Controllers\Back;


use App\Models\Profession;

class ProfessionController extends BackController
{
   public function index(){
       $prof=new Profession();
       $niz=$prof->getProfessions();
       return view('pages.all_job_offers',['professions'=>$niz]);
   }
}