<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{

    protected $fillable =['id','content'];

   public function givenReplies(){
        return $this->hasMany(GivenReply::class);
   }
}
