<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quizzed extends Model
{
    public function enterprises(){
      return   $this->belongsTo(Enterprise::class);
    }
    public function appliedGuide(){
        return $this->hasOne(AppliedGuide::class);
    }
    public function ageRange(){
        return $this->belongsTo(AgeRange::class);
    }
    public function studiesLevel(){
        return $this->belongsTo(StudiesLevel::class);
    }
}
