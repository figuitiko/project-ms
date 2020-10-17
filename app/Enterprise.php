<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
    //
    protected $table = 'enterprises';
    protected $fillable =['id','description'];



    public function guides(){
        return $this->belongsToMany(Guide::class);
    }
    public function appliedGuides(){
        return $this->hasMany(AppliedGuide::class);
    }
    public function quizzeds(){
      return  $this->hasMany(Quizzed::class);
    }
    /**
     * Get the enterprise name
     *
     * @param  string  $value
     * @return string
     */
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
    public function scopeGetAmountSurveyed()
    {
       return  intval( (0.9604 * $this->worker_amount) /(0.0025*($this->worker_amount - 1) + 0.9604));
    }

}
