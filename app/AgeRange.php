<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgeRange extends Model
{
    //
    public function quizzeds(){
        return $this->hasMany(Quizzed::class);
    }
}
