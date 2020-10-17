<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    //

    protected $fillable =['id','name','social_reason','worker_amount','rfc','phone','address','activity','guide_id'];
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function appliedGuides() {
        return $this->hasMany(AppliedGuide::class);
    }
    public  function guideType(){
        return $this->belongsTo(GuideType::class);
    }
//    public function replies(){
//        return $this->hasMany(Reply::class);
//    }
    public function enterprises(){
        return $this->belongsToMany(Enterprise::class);
    }
}
