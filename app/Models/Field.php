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
    public function getFields($id){
        return Form::find($id)->formFields()->addSelect('form_field.id as formFieldId','type_id','fields.name as name','fields.id as id')->get();
    }
    public function getOptions($id){
        return Form::find($id)->formFields()->leftjoin('options as o','o.field_id', '=', 'fields.id')->whereNotNull('o.field_id')->addSelect('fields.id as fieldId','fields.type_id','fields.name as fieldName','o.name as optionName','o.field_id as option_field_id')->get();


//        SELECT * FROM `fields` INNER JOIN form_field ON fields.id=form_field.field_id INNER JOIN forms ON form_field.form_id=forms.id LEFT OUTER JOIN options on fields.id=options.field_id where forms.id=12 AND options.field_id is NOT null
        //ovo je upit koji dohvata sve kako treba
    }
}
