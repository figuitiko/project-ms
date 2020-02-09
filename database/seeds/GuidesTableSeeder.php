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
        $guide_type->name ='Dos';
        $guide_type->save();
        $guide_type = new GuideType();
        $guide_type->name ='Tres';
        $guide_type->save();


        $first_items_quide1 =[18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28,
            29, 30, 31, 32, 33];
        $second_items_guide1= [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14,
            15, 16, 17, 34, 35, 36, 37, 38, 39, 40, 41,
            42, 43, 44, 45, 46];
        $serial_first_items1= serialize($first_items_quide1);
        $serial_second_items1= serialize($second_items_guide1);

        $guide= new Guide();
        $guide->title="Guia Tipo Dos";
        $guide->description="norma 35 engie";
        $guide->guide_type_id =1;
        $guide->is_activated = false;
        $guide->first_items =$serial_first_items1;
        $guide->second_items =$serial_second_items1;
        $guide->link='/guide/1';
        $guide->save();


        $first_items_quide2 = [1, 4, 23, 24, 25, 26, 27, 28, 30, 31, 32,
            33, 34, 35, 36, 37, 38, 39, 40, 41, 42,
            43, 44, 45, 46, 47, 48, 49, 50, 51, 52,
            53, 55, 56, 57];

        $second_items_guide2 = [2, 3, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14,
            15, 16, 17, 18, 19, 20, 21, 22, 29, 54,
            58, 59, 60, 61, 62, 63, 64, 65, 66, 67,
            68, 69, 70, 71, 72];
        $serial_first_items2= serialize($first_items_quide2);
        $serial_second_items2= serialize($second_items_guide2);


        $guide= new Guide();
        $guide->title="Guia Tipo tres";
        $guide->description="norma 35 guia tipo Tres";
        $guide->guide_type_id =2;
        $guide->is_activated = false;
        $guide->first_items =$serial_first_items2;
        $guide->second_items =$serial_second_items2;
        $guide->link='/guide/2';
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

        $enterprise = new Enterprise();
        $enterprise->name = "Pemex";
        $enterprise->social_reason = "coyontural";
        $enterprise->rfc = "abc123zaq576x";
        $enterprise->phone = 2462021212;
        $enterprise->address = "liverpool libramiento";
        $enterprise->activity = "petroleo";
        $enterprise->guide_id = 1;
        $enterprise->worker_amount = 100;
        $enterprise->surveyed_amount =$enterprise->getAmountSurveyed() ;
        $enterprise->save();

//------------------category guide type two-------------------------------------------------------------------
       function populateCategories($contentArray, $guide_id){
           foreach ($contentArray as $content){
               $category = new Category();
               $category->content = $content;
               $category->guide_type_id = $guide_id;
               $category->save();
           }
       }

       $contentCategoryArray = ['amount_job', 'job_responsibility', 'job_time', 'job_decisions','job_information','job_relationships','client_attention','is_boss'];
        populateCategories($contentCategoryArray, 1);


 //------------------------------ category guia type tres--------------------------
        $contentCategoryArray1 = ['environment_job', 'amount_rhythm', 'mental_effort', 'act_responsibilities',
            'work_journey','can_decision', 'work_changes','work_training', 'contact_boss','coworker_relationships',
            'given_information', 'violence_act','clients_attention', 'is_boss'];
        populateCategories($contentCategoryArray1, 2);






//----------------------category 1 -------------------------------------------------------------------
        function populateQuestions($category,$guide_id, $questionsArray, $iterator){
            foreach ($questionsArray as $content){
                $question = new Question();
                $question->content = $content;
                $question->number = $iterator;
                $question->guide_id = $guide_id;
                $question->category_id = $category;
                $question->save();
                $iterator++;

            }
        }
        $questionsContentArray1= ['Mi trabajo me exige hacer mucho esfuerzo físico', 'Me preocupa sufrir un accidente en mi trabajo', 'Considero que las actividades que realizo son peligrosas', 'Por la cantidad de trabajo que tengo debo quedarmetiempo adicional a mi turno',
            'Considero que es necesario mantener un ritmo de trabajo acelerado', 'Mi trabajo exige que esté muy concentrado','Mi trabajo requiere que memorice mucha información','Mi trabajo exige que atienda varios asuntos al mismo tiempo','Mi trabajo exige que atienda varios asuntos al mismo tiempo'];
        populateQuestions(1,1,$questionsContentArray1, 1 );


//-----------------------------------------category 2----------------------------------------------------------------------------
        $questionsContentArray2 = ['En mi trabajo soy responsable de cosas de mucho valor','Respondo ante mi jefe por los resultados de toda mi área de trabajo','En mi trabajo me dan órdenes contradictorias','Considero que en mi trabajo me piden hacer cosas innecesarias' ];
        populateQuestions(2, 1,$questionsContentArray2, 10);



//----------------------------------- category 3---------------------------------------------------------------------------
        $questionsContentArray3 = ['Trabajo horas extras más de tres veces a la semana','Mi trabajo me exige laborar en días de descanso, festivos o fines de semana','Respondo ante mi jefe por los resultados de toda mi área de trabajo','Pienso en las actividades familiares o personales cuando estoy en mi trabajo'];
        populateQuestions(3,1,$questionsContentArray3, 14);



//-----------------------category 4---------------------------------------------------------------------------------------------

        $questionsContentArray4 = ['Mi trabajo permite que desarrolle nuevas habilidades', 'En mi trabajo puedo aspirar a un mejor puesto','Durante mi jornada de trabajo puedo tomar pausas cuando las necesito','Puedo decidir la velocidad a la que realizo mis actividades en mi trabajo',
            'Puedo cambiar el orden de las actividades que realizo en mi trabajo'];
        populateQuestions(4,1, $questionsContentArray4, 18);


//----------------------------category 5 ---------------------------------------------------------------

        $questionsContentArray5 = ['Me informan con claridad cuáles son mis funciones','Me explican claramente los resultados que debo obtener en mi trabajo', 'Me informan con quién puedo resolver problemas o asuntos de trabajo', 'Me permiten asistir a capacitaciones relacionadas con mi trabajo',
        'Recibo capacitación útil para hacer mi trabajo' ];
        populateQuestions(5, 1 , $questionsContentArray5, 23);


//---------------------------------------category 6------------------------------------------------------------------------------------------

        $questionsContentArray6 = ['Mi jefe tiene en cuenta mis puntos de vista y opiniones', 'Mi jefe ayuda a solucionar los problemas que se presentan en el trabajo','Puedo confiar en mis compañeros de trabajo','Cuando tenemos que realizar trabajo de equipo los compañeros colaboran',
            'Mis compañeros de trabajo me ayudan cuando tengo dificultades', 'En mi trabajo  puedo expresarme libremente sin interrupciones','Recibo críticas constantes a mi persona y/o trabajo',
            'Recibo burlas, calumnias, difamaciones, humillaciones o ridiculizaciones','Se ignora mi presencia o se me excluye de las reuniones de trabajo y en la toma de decisiones','Se manipulan las situaciones de trabajo para hacerme parecer un mal trabajador',
            'Se ignoran mis éxitos laborales y se atribuyen a otros trabajadores', 'Me bloquean o impiden las oportunidades que tengo para obtener ascenso o mejora en mi trabajo','He presenciado actos de violencia en mi centro de trabajo'];
        populateQuestions(6,1,$questionsContentArray6 , 28);


//------------------------------------category 7-------------------------------------------------------------------------------
        $questionsContentArray7 = ['Atiendo clientes o usuarios muy enojados','Mi trabajo me exige atender personas muy necesitadas de ayuda o enfermas', 'Para hacer mi trabajo debo demostrar sentimientos distintos a los míos'];
        populateQuestions(7 ,1 , $questionsContentArray7, 41);


//------------------------------------------category 8-----------------------------------------------------------------
        $questionsContentArray8 = ['Comunican tarde los asuntos de trabajo','Dificultan el logro de los resultados del trabajo', 'Ignoran las sugerencias para mejorar su trabajo'];
        populateQuestions(8,1, $questionsContentArray8, 44);


//----------------------------------------------------category 9 start type guide tres----------------------------------------------


//-----------------------------------category 9-----------------------------------------------------------------

        $questionsContent1 = ['El espacio donde trabajo me permite realizar mis
actividades de manera segura e higiénica','Mi trabajo me exige hacer mucho esfuerzo físico','Me preocupa sufrir un accidente en mi trabajo','Considero que en mi trabajo se aplican las normas de
seguridad y salud en el trabajo','Considero que las actividades que realizo son peligrosas'];

        populateQuestions(9,2,$questionsContent1, 1 );

//------------------------------------------------------------category 10 ---------------------------------------------------------------------------------------------

        $questionsContent2 = ['Por la cantidad de trabajo que tengo debo quedarmetiempo adicional a mi turno','Por la cantidad de trabajo que tengo debo trabajar sin parar', 'Considero que es necesario mantener un ritmo de trabajo
acelerado'];
        populateQuestions(10,2,$questionsContent2, 6);

//---------------------------------------------------category 11----------------------------------------------------------------------------------------------------------

        $questionsContent3 = ['Mi trabajo exige que esté muy concentrado', 'Mi trabajo requiere que memorice mucha información','En mi trabajo tengo que tomar decisiones difíciles muy
rápido', 'Mi trabajo exige que atienda varios asuntos al mismo tiempo'];
        populateQuestions(11, 2,$questionsContent3, 9 );

//------------------------------------------category 12----------------------------------------------------------------------------------------------------------------------------------------------
        $questionsContent4 = ['En mi trabajo soy responsable de cosas de mucho valor','Respondo ante mi jefe por los resultados de toda mi área de trabajo','En el trabajo me dan órdenes contradictorias', 'Considero que en mi trabajo me piden hacer cosas innecesarias'];
        populateQuestions(12, 2, $questionsContent4, 13);

//--------------------------------------category 13--------------------------------------------------------------
        $questionsContent5 = ['Trabajo horas extras más de tres veces a la semana','Mi trabajo me exige laborar en días de descanso,festivos o fines de semana',
            'Considero que el tiempo en el trabajo es mucho y perjudica mis actividades familiares o personales', 'Debo atender asuntos de trabajo cuando estoy en casa', 'Pienso en las actividades familiares o personales cuando
            estoy en mi trabajo', 'Pienso que mis responsabilidades familiares afectan mi trabajo'];
        populateQuestions(13, 2 , $questionsContent5, 17);

// ------------------------------------------category 14 ---------------------------------------------------

        $questionsContent6 = ['Mi trabajo permite que desarrolle nuevas habilidades', 'En mi trabajo puedo aspirar a un mejor puesto', 'Durante mi jornada de trabajo puedo tomar pausascuando las necesito',
            'Puedo decidir cuánto trabajo realizo durante la jornada laboral' ,'Puedo decidir la velocidad a la que realizo mis actividades en mi trabajo', 'Puedo cambiar el orden de las actividades que realizo en mi trabajo'];
        populateQuestions(14 , 2,$questionsContent6, 23 );

// ------------------------------------------category 15 ---------------------------------------------------------
        $questionsContent7 = ['Los cambios que se presentan en mi trabajo dificultan mi labor', 'Cuando se presentan cambios en mi trabajo se tienen en cuenta mis ideas o aportaciones'];
        populateQuestions(15, 2, $questionsContent7, 29);

// ------------------------------------------category 16 ---------------------------------------------------------

        $questionsContent8 = ['Me informan con claridad cuáles son mis funciones', 'Me explican claramente los resultados que debo obtener en mi trabajo',
            'Me explican claramente los objetivos de mi trabajo','Me informan con quién puedo resolver problemas o asuntos de trabajo',
            'Me permiten asistir a capacitaciones relacionadas con mi trabajo', 'Recibo capacitación útil para hacer mi trabajo'];
        populateQuestions(16, 2, $questionsContent8, 31);

// ------------------------------------------category 17 ---------------------------------------------------------

        $questionsContent9 =['Mi jefe ayuda a organizar mejor el trabajo', 'Mi jefe tiene en cuenta mis puntos de vista y opiniones', 'Mi jefe me comunica a  tiempo  la información relacionada con el trabajo',
                'La orientación que me da mi jefe me ayuda a realizar mejor mi trabajo', 'Mi jefe ayuda a solucionar los problemas que se presentan en el trabajo'];
        populateQuestions(17,2, $questionsContent9, 37 );

// ------------------------------------------category 18 ---------------------------------------------------------
        $questionsContent10 = ['Puedo confiar en mis compañeros de trabajo', 'Entre compañeros solucionamos los problemas de trabajo de forma respetuosa',
            'En mi trabajo me hacen sentir parte del grupo', 'Cuando tenemos que realizar trabajo de equipo los compañeros colaboran',
            'Mis compañeros de trabajo me ayudan cuando tengo dificultades'];
        populateQuestions(18, 2, $questionsContent10, 42 );

// ------------------------------------------category 19 ---------------------------------------------------------
        $questionsContent11 = ['Me informan sobre lo que hago bien en mi trabajo', 'La forma como evalúan mi trabajo en mi centro de trabajo me ayuda a mejorar mi desempeño',
            'En mi centro de trabajo me pagan a tiempo mi salario', 'El pago que recibo es el que merezco por el trabajo que realizo',
            'Si obtengo los resultados esperados en mi trabajo me recompensan o reconocen', 'Las personas que hacen bien el trabajo pueden crecer laboralmente',
            'Considero que mi trabajo es estable', 'En mi trabajo existe continua rotación de personal', 'Siento orgullo de laborar en este centro de trabajo',
            'Me siento comprometido con mi trabajo'];
        populateQuestions(19, 2, $questionsContent11, 47);

// ------------------------------------------category 20 ---------------------------------------------------------

        $questionsContent12 = ['En mi trabajo puedo expresarme sin interrupciones ', 'Recibo críticas constantes a mi persona y/o trabajo' ,'Recibo burlas, calumnias, difamaciones, humillaciones o ridiculizaciones',
            'Se ignora mi presencia o se me excluye de las reuniones de trabajo y en la toma de decisiones' , 'Se manipulan las situaciones de trabajo para hacerme parecer un mal trabajador',
            'Se ignoran mis éxitos laborales y se atribuyen a otros trabajadores', 'Me bloquean o impiden las oportunidades que tengo para obtener ascenso o mejora en mi trabajo', 'He presenciado actos de violencia en mi centro de trabajo' ];
        populateQuestions(20, 2, $questionsContent12, 57);

// ------------------------------------------category 21 ---------------------------------------------------------

        $questionsContent13 = ['Atiendo clientes o usuarios muy enojados', 'Mi trabajo me exige atender personas muy necesitadas de ayuda o enfermas', 'Para hacer mi trabajo debo demostrar sentimientos distintos a los míos',
            'Mi trabajo me exige atender situaciones de violencia'];
        populateQuestions(21, 2, $questionsContent13, 65);


// ------------------------------------------category 22 ---------------------------------------------------------

        $questionsContent14 = ['Comunican tarde los asuntos de trabajo', 'Dificultan el logro de los resultados del trabajo', 'Cooperan poco cuando se necesita',
            'Ignoran las sugerencias para mejorar su trabajo'];
        populateQuestions(22, 2, $questionsContent14, 69);



//-------------------------Replies-------------------------------------------------------------------------------------


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




        $the_first_items = unserialize($serial_first_items1);
        $the_second_items = unserialize($serial_second_items1);

        $given_reply= new GivenReply();
        $given_reply->question_id = 1;
        $given_reply->reply_id = 1;
        $given_reply->value = $given_reply->scopeValueByGivenRepliesGuide($the_first_items,$the_second_items,1,1);
        $given_reply->applied_guide_id = 1;
        $given_reply->save();

        $given_reply= new GivenReply();
        $given_reply->question_id = 1;
        $given_reply->reply_id = 3;
        $given_reply->value = $given_reply->scopeValueByGivenRepliesGuide($the_first_items,$the_second_items,1,1);
        $given_reply->applied_guide_id = 1;
        $given_reply->save();

        $given_reply= new GivenReply();
        $given_reply->question_id = 2;
        $given_reply->reply_id = 4;
        $given_reply->value = $given_reply->scopeValueByGivenRepliesGuide($the_first_items,$the_second_items,1,1);
        $given_reply->applied_guide_id = 1;
        $given_reply->save();

    }

}
