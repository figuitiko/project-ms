<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppliedGuide extends Model
{

    public function enterprise(){
        return $this->hasOne(Enterprise::class);
    }
    public function quizzeds(){
        return $this->hasMany(AppliedGuide::class);
    }
    public function guide(){
        return $this->belongsTo(Guide::class);
    }
    public  function givenReplies(){
        return $this->hasMany(GivenReply::class);
    }


}
