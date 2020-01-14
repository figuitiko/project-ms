<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
    //
    protected $table = 'enterprises';
    protected $fillable =['id','description','guide_type_id'];


    public function guide(){
        return $this->belongsTo(Guide::class);
    }
    public function quizzeds(){
      return  $this->hasMany(Quizzed::class);
    }

}
