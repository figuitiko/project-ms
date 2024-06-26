<?php


namespace App\Repositories;


use App\AppliedGuide;
use Illuminate\Support\Facades\DB;

class AppliedGuideRepository implements AppliedGuideRepositoryInterface
{

    private $appliedGuide;

    public function __construct(AppliedGuide $appliedGuide)
    {

        $this->appliedGuide = $appliedGuide;
    }

    public function appliedGuideSumByGuide($enterpriseId, $guideId,  Array $valuesToCompare, $year){


      return  DB::table('applied_guides')
            ->join('given_replies', 'given_replies.applied_guide_id','=','applied_guides.id' )
            ->join('questions', 'questions.id','=','given_replies.question_id')
            ->select(DB::raw('sum(given_replies.value) as result'))
            ->where('applied_guides.enterprise_id','=',$enterpriseId)
            // where created_at is the current year
            ->whereYear('applied_guides.created_at', '=', $year)            
            // ->where('applied_guides.guide_id','=',$guideId)
            ->whereIn('questions.number',$valuesToCompare)
            ->first();
    }
    public function totalGuideByEnterprise($enterpriseId,$guideId, $year){
        return DB::table('applied_guides')
            ->join('given_replies', 'given_replies.applied_guide_id','=','applied_guides.id' )
            ->join('questions', 'questions.id','=','given_replies.question_id')
            ->select(DB::raw('sum(given_replies.value) as result'))
            ->where('applied_guides.enterprise_id','=',$enterpriseId)
             ->whereYear('applied_guides.created_at', '=', $year)
            // ->where('applied_guides.guide_id','=',$guideId)
            ->first();
    }
    public function questionRepliesReport($enterpriseId,$guideId,Array $valuesToCompare, $year){
        return  DB::table('applied_guides')
            ->join('given_replies', 'given_replies.applied_guide_id','=','applied_guides.id' )
            ->join('questions', 'questions.id','=','given_replies.question_id')
            ->join('replies', 'replies.id','=','given_replies.reply_id')
            ->select('applied_guides.id', 'applied_guides.guide_id',DB::raw('questions.content as question'), 'questions.number','replies.content','given_replies.value')
            ->where('applied_guides.enterprise_id','=',$enterpriseId)
            ->whereYear('applied_guides.created_at', '=', $year)
            // ->where('applied_guides.guide_id','=',$guideId)
            ->whereIn('questions.number',$valuesToCompare)
            ->get();
    }
    public function getGuideAmount($enterpriseId, $year){        
        return DB::table('applied_guides')          
            ->select(DB::raw('count(applied_guides.id) as result'))
            ->where('applied_guides.enterprise_id','=',$enterpriseId)
             ->whereYear('applied_guides.created_at', '=', $year)
            //  ->where('applied_guides.guide_id','=',$guideId)
            ->first();
    }
}
