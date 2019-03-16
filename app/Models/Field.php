<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    public function types(){
        return $this->belongsTo(Type::class);
    }
    public function fieldForms(){
        return $this->belongsToMany(Form::class,'form_field');
    }
    public function options(){
        return $this->hasMany(Option::class);
    }
}
