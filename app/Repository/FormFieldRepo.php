<?php
/**
 * Created by PhpStorm.
 * User: Ivana
 * Date: 16.03.2019
 * Time: 14:34
 */

namespace App\Repository;


use App\Models\dto\FieldDto;
use App\Models\dto\FormDto;
use App\Models\dto\OptionsDto;
use App\Models\Field;
use App\Models\Option;
use Illuminate\Support\Carbon;

class FormFieldRepo
{
    public function insert(FieldDto $dto, FormDto $formDto){
        $field=new Field();
        $field->name=$dto->name;
        $field->type_id=$dto->type_id;
        $field->save();
        $formId=$formDto->formId;
         $id=$field->id;
        $field->fieldForms()->attach($formId,['created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]);
        return $id;
    }
    public function insertOption(OptionsDto $options,$id){

        $field=Field::find($id);
        foreach ($options->options as $o) {
            $option=new Option();
            $option->name = $o;
            $option->field_id=$id;
            $option->save();
        }
    }


}