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
    public function scopeValueByGivenReplies($reply,$question){
        $first_items =[1, 4, 23, 24, 25, 26, 27, 28, 30, 31, 32,
            33, 34, 35, 36, 37, 38, 39, 40, 41, 42,
            43, 44, 45, 46, 47, 48, 49, 50, 51, 52,
            53, 55, 56, 57];
        $second_items= [2, 3, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14,
            15, 16, 17, 18, 19, 20, 21, 22, 29, 54,
            58, 59, 60, 61, 62, 63, 64, 65, 66, 67,
            68, 69, 70, 71, 72];



        if(in_array($question,$first_items )) {

            switch ($reply) {
                case 0:
                    return 0;
                case 1:
                    return 1;
                case 2:
                    return 2;
                case 3:
                    return 3;
                case 4:
                    return 4;
            }
        }
        elseif (in_array($question, $second_items)){
            switch ($reply) {
                case 0:
                    return 4;
                case 1:
                    return 3;
                case 2:
                    return 2;
                case 3:
                    return 1;
                case 4:
                    return 0;
            }
        }
    }

}
