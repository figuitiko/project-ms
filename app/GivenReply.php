<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GivenReply extends Model
{
    //
    public function question(){
        return $this->belongsTo(Question::class);
    }
    public  function reply(){
        return $this->belongsTo(Reply::class);
    }
    public  function appliedGuide(){
        return $this->belongsTo(AppliedGuide::class);
    }
}
