<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function guideType(){
        return $this->belongsTo(GuideType::class);
    }
    public  function questions(){
        return $this->hasMany(Question::class);
    }
}
