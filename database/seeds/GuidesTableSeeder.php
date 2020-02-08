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
use App\Category;


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
        $enterprise->surveyed_amount =$enterprise->getAmountSurveyed() ;
        $enterprise->save();

        $category = new Category();
        $category->content = "amount_job";
        $category->guide_type_id = 1;
        $category->save();

        $category = new Category();
        $category->content = "job_responsibility";
        $category->guide_type_id = 1;
        $category->save();

        $category = new Category();
        $category->content = "job_time";
        $category->guide_type_id = 1;
        $category->save();

        $category = new Category();
        $category->content = "job_decisions";
        $category->guide_type_id = 2;
        $category->save();

        $question = new Question();
        $question->content = "Mi trabajo me exige hacer mucho esfuerzo físico";
        $question->guide_id = 1;
        $question->category_id = 1;
        $question->save();

        $question = new Question();
        $question->content = "Me preocupa sufrir un accidente en mi trabajo";
        $question->guide_id = 1;
        $question->category_id = 1;
        $question->save();

        $question = new Question();
        $question->content = "Considero que las actividades que realizo son peligrosas";
        $question->guide_id = 1;
        $question->category_id = 1;
        $question->save();

        $question = new Question();
        $question->content = "Por la cantidad de trabajo que tengo debo quedarmetiempo adicional a mi turno";
        $question->guide_id = 1;
        $question->category_id = 1;
        $question->save();

        $question = new Question();
        $question->content = "Considero que es necesario mantener un ritmo de trabajo acelerado";
        $question->guide_id = 1;
        $question->category_id = 1;
        $question->save();

        $question = new Question();
        $question->content = "Mi trabajo exige que esté muy concentrado";
        $question->guide_id = 1;
        $question->category_id = 1;
        $question->save();

        $question = new Question();
        $question->content = "Mi trabajo requiere que memorice mucha información";
        $question->guide_id = 1;
        $question->category_id = 1;
        $question->save();

        $question = new Question();
        $question->content = "Mi trabajo exige que atienda varios asuntos al mismo tiempo";
        $question->guide_id = 1;
        $question->category_id = 1;
        $question->save();

        $question = new Question();
        $question->content = "Mi trabajo exige que atienda varios asuntos al mismo tiempo";
        $question->guide_id = 1;
        $question->category_id = 1;
        $question->save();

        $question = new Question();
        $question->content = "En mi trabajo soy responsable de cosas de mucho valor";
        $question->guide_id = 1;
        $question->category_id = 2;
        $question->save();

        $question = new Question();
        $question->content = "Respondo ante mi jefe por los resultados de toda mi área de trabajo";
        $question->guide_id = 1;
        $question->category_id = 2;
        $question->save();

        $question = new Question();
        $question->content = "En mi trabajo me dan órdenes contradictorias";
        $question->guide_id = 1;
        $question->category_id = 2;
        $question->save();

        $question = new Question();
        $question->content = "Considero que en mi trabajo me piden hacer cosas innecesarias";
        $question->guide_id = 1;
        $question->category_id = 2;
        $question->save();

        $question = new Question();
        $question->content = "Trabajo horas extras más de tres veces a la semana";
        $question->guide_id = 1;
        $question->category_id = 3;
        $question->save();

        $question = new Question();
        $question->content = "Mi trabajo me exige laborar en días de descanso, festivos o fines de semana";
        $question->guide_id = 1;
        $question->category_id = 3;
        $question->save();

        $question = new Question();
        $question->content = "Respondo ante mi jefe por los resultados de toda mi área de trabajo";
        $question->guide_id = 1;
        $question->category_id = 3;
        $question->save();



        $reply = new Reply();
        $reply->content = 'Siempre';
        $reply->save();

        $reply = new Reply();
        $reply->content = 'Casi siempre';
        $reply->save();

        $reply = new Reply();
        $reply->content = 'Algunas veces';
        $reply->save();

        $reply = new Reply();
        $reply->content = 'Casi nunca';
        $reply->save();

        $reply = new Reply();
        $reply->content = 'Nunca';
        $reply->save();





        $quizzed =new Quizzed();
        $quizzed->enterprise_id = 1;
        $quizzed->name ='sergio';
        $quizzed->last_name= 'Garcia';
        $quizzed->job ='gerente';
        $quizzed->age=35;
        $quizzed->studies = 'universitario';
        $quizzed->save();

        $applied_guide= new AppliedGuide();
        $applied_guide->guide_id = 1;
        $applied_guide->enterprise_id = 1;
        $applied_guide->quizzed_id = 1;
        $applied_guide->save();






        $given_reply= new GivenReply();
        $given_reply->question_id = 1;
        $given_reply->reply_id = 1;
        $given_reply->value = $given_reply->scopeValueByGivenReplies(1,1);
        $given_reply->applied_guide_id = 1;
        $given_reply->scopeValueByGivenReplies(1,1);
        $given_reply->save();

        $given_reply= new GivenReply();
        $given_reply->question_id = 1;
        $given_reply->reply_id = 3;
        $given_reply->value = $given_reply->scopeValueByGivenReplies(1,1);
        $given_reply->applied_guide_id = 1;
        $given_reply->save();

        $given_reply= new GivenReply();
        $given_reply->question_id = 2;
        $given_reply->reply_id = 4;
        $given_reply->value = $given_reply->scopeValueByGivenReplies(1,1);
        $given_reply->applied_guide_id = 1;
        $given_reply->save();

    }

}
