<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
//    public  function reply(){
//
//       return  $this->hasOne(Reply::class);
//    }

    protected $fillable =['id','content'];

    public function guide()
    {
        return $this->belongsTo(Guide::class);
    }

    public function givenReplies(){
        return $this->hasMany(GivenReply::class);
    }

}
