<?php


namespace App\Repositories;


    use App\Quizzed;
    use Illuminate\Support\Facades\DB;

    class QuizzedRepository implements QuizzedRepositoryInterface
    {


        private $quizzed;

            public function __construct(Quizzed $quizzed)
             {
                 $this->quizzed = $quizzed;
             }
             public function quizzedsYesByEnterprise($enterpriseId)
             {
                return DB::table('quizzeds')
                    ->join('applied_guides', 'quizzeds.id', '=','applied_guides.quizzed_id')
                    ->join('given_replies','given_replies.applied_guide_id','=','applied_guides.id' )
                    ->join('replies','replies.id','=', 'given_replies.reply_id')
                    ->join('questions','questions.id', '=','given_replies.question_id' )
                    ->select('quizzeds.name', 'quizzeds.last_name', DB::raw('replies.content as contentReply' ), 'questions.content')
                    ->where('quizzeds.enterprise_id',$enterpriseId  )
                    ->having('contentReply','=','Si')
                    ->get();
             }
             public  function quizzedsYesWithTotal($enterpriseId){
                return  DB::table('quizzeds')
                    ->join('applied_guides', 'quizzeds.id', '=','applied_guides.quizzed_id')
                    ->join('given_replies','given_replies.applied_guide_id','=','applied_guides.id' )
                    ->join('replies','replies.id','=', 'given_replies.reply_id')
                    ->join('questions','questions.id', '=','given_replies.question_id' )
                    ->select('quizzeds.name', 'quizzeds.last_name','replies.content', DB::raw('count(quizzeds.name) as total'))
                    ->where('quizzeds.enterprise_id',$enterpriseId )
                    ->groupBy('quizzeds.name', 'quizzeds.last_name','replies.content')
                    ->having('replies.content','=','Si')
                    ->get();
             }

    }
