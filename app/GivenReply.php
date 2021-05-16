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
    public function scopeValueByGivenRepliesGuide($first_items,$second_items, $reply,$question){



        if(in_array($question,$first_items )) {

            switch ($reply) {
                case 1:
                    return 0;
                case 2:
                    return 1;
                case 3:
                    return 2;
                case 4:
                    return 3;
                case 5:
                    return 4;
            }

        }
        elseif (in_array($question, $second_items)){
            switch ($reply) {
                case 1:
                    return 4;
                case 2:
                    return 3;
                case 3:
                    return 2;
                case 4:
                    return 1;
                case 5:
                    return 0;
            }
        }
    }

}
