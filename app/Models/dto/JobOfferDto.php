<?php
/**
 * Created by PhpStorm.
 * User: LogIn
 * Date: 11.03.2019
 * Time: 13:13
 */

namespace App\Models\dto;


class JobOfferDto
{
    public $name;
    public $start;
    public $end;
    public $description;
    public $profession;
    public $condition;
    public $user;

    public function __construct($request,$id)
    {
        $this->name=$request->input('name');
        $this->start=$request->input('start');
        $this->end=$request->input('end');
        $this->description=$request->input('description');
        $this->profession=$request->input('selected');
        $this->condition=$request->input('checked');
        $this->user=$id; //ovaj id treba da se uzme iz sesije logovanog korisnika

    }
}