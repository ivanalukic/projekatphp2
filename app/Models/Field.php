<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    public function types(){
        return $this->belongsTo(Type::class);
    }
}
