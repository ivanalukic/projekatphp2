<?php
/**
 * Created by PhpStorm.
 * User: Ivana
 * Date: 15.03.2019
 * Time: 12:40
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
        function formField(){
            return $this->belongsTo('form_field');
        }
}