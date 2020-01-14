<?php

use Illuminate\Database\Seeder;
use App\Enterprise;
use App\Guide;
use App\Question;
use App\Reply;
use App\AppliedGuide;
use App\Quizzed;
use App\GuideType;
use App\GivenReply;


class GuidesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Guide::truncate();
        Enterprise::truncate();
        Question::truncate();
        Reply::truncate();
        AppliedGuide::truncate();
        Quizzed::truncate();
        GuideType::truncate();
        GivenReply::truncate();


        $guide_type = new GuideType();
        $guide_type->name ='dos';
        $guide_type->save();
        $guide_type = new GuideType();
        $guide_type->name ='uno';
        $guide_type->save();


        $guide= new Guide();
        $guide->title="Guia uno norma 35";
        $guide->description="norma 35 engie";
        $guide->guide_type_id =1;
        $guide->is_activated = false;
        $guide->link='/guide/1';
        $guide->save();


        $enterprise = new Enterprise();
        $enterprise->name = "Engie";
        $enterprise->social_reason = "coyontural";
        $enterprise->rfc = "abc123zaq123x";
        $enterprise->phone = 2462021212;
        $enterprise->address = "liverpool libramiento";
        $enterprise->activity = "agricola";
        $enterprise->guide_id = 1;
        $enterprise->worker_amount = 25;
        $enterprise->save();

        $question = new Question();
        $question->content = "Mi trabajo me exige hacer mucho esfuerzo físico";

        $question->guide_id = 1;
        $question->save();

        $question = new Question();
        $question->content = "pagan menos de lo necesario";

        $question->guide_id = 1;
        $question->save();


//        $reply_value = new ReplyValue() ;
//        $reply_value->state = 1;
//        $reply_value->reply_id=1;
//        $reply_value->content = 'bien';
//        $reply_value->save();
//
//        $reply_value = new ReplyValue() ;
//        $reply_value->state = 1;
//        $reply_value->reply_id=1;
//        $reply_value->content = 'mas o menos';
//        $reply_value->save();
//
//        $reply_value = new ReplyValue() ;
//        $reply_value->state = 1;
//        $reply_value->reply_id=2;
//        $reply_value->content = 'bien';
//        $reply_value->save();
//
//        $reply_value = new ReplyValue() ;
//        $reply_value->state = 1;
//        $reply_value->reply_id=2;
//        $reply_value->content = 'mas o menos';
//        $reply_value->save();


        $reply = new Reply();

        $reply->content = 'Siempre';
        $reply->save();

        $reply = new Reply();

        $reply->content = 'casi siempre';
        $reply->save();

        $applied_guide= new AppliedGuide();
        $applied_guide->guide_id = 1;
        $applied_guide->save();

        $given_reply= new GivenReply();
        $given_reply->question_id = 1;
        $given_reply->reply_id = 1;
        $given_reply->applied_guide_id = 1;
        $given_reply->save();

        $given_reply= new GivenReply();
        $given_reply->question_id = 1;
        $given_reply->reply_id = 1;
        $given_reply->applied_guide_id = 1;
        $given_reply->save();

        $given_reply= new GivenReply();
        $given_reply->question_id = 1;
        $given_reply->reply_id = 1;
        $given_reply->applied_guide_id = 1;
        $given_reply->save();



        $quizzed =new Quizzed();
        $quizzed->enterprise_id = 1;
        $quizzed->applied_guide_id = 1;
        $quizzed->name ='sergio';
        $quizzed->last_name= 'Garcia';
        $quizzed->job ='gerente';
        $quizzed->age=35;
        $quizzed->studies = 'universitario';
        $quizzed->save();
    }
}
