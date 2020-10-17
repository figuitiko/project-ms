<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudiesLevel extends Model
{
    //
    public function quizzeds(){
        return $this->hasMany(Quizzed::class);
    }
}
