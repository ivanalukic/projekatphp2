<?php
/**
 * Created by PhpStorm.
 * User: Ivana
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

    public function __construct($request)
    {
        $this->name=$request->input('name');
        $this->start=$request->input('start');
        $this->end=$request->input('end');
        $this->description=$request->input('description');
        $this->profession=$request->input('selected');
        $this->condition=$request->input('checked');
        $this->user=1; //ovaj id treba da se uzme iz sesije logovanog korisnika

    }
}