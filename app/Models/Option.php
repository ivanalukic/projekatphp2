<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    public function fields(){
        return $this->belongsTo(Field::class);
    }

    public function withField(Field $field){
        $this->fields()->associate($field);
        return $this;
    }
}
