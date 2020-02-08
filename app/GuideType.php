<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuideType extends Model
{
    //
    public function guides(){
        return $this->hasMany(Guide::class);
    }
    public function categories(){
        return $this->hasMany(Category::class);
    }

}
