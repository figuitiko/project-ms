<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppliedGuide extends Model
{
    protected $with= ['guide', 'enterprise','quizzed'];
    public function enterprise(){
        return $this->belongsTo(Enterprise::class);
    }
    public function quizzed(){
        return $this->belongsTo(Quizzed::class);
    }
    public function guide(){
        return $this->belongsTo(Guide::class);
    }
    public  function givenReplies(){
        return $this->hasMany(GivenReply::class);
    }


}
