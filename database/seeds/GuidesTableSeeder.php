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
use App\AgeRange;
use App\StudiesLevel;


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

        $this->guideType('Uno');
        $this->guideType('Dos');
        $this->guideType('Tres');


        $this->createGuide( 'Guia Tipo uno', 'norma 35 engie', 1,'/guide/1' );

        $first_items_quide1 =[18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28,
            29, 30, 31, 32, 33];
        $second_items_guide1= [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14,
            15, 16, 17, 34, 35, 36, 37, 38, 39, 40, 41,
            42, 43, 44, 45, 46];




      $serial_first_items1= serialize($first_items_quide1);
        $serial_second_items1= serialize($second_items_guide1);


        $this->createGuide( 'Guia Tipo dos', 'norma 35 engie', 2,'/guide/2' ,
            $first_items_quide1,$second_items_guide1);


        $first_items_quide2 = [1, 4, 23, 24, 25, 26, 27, 28, 30, 31, 32,
            33, 34, 35, 36, 37, 38, 39, 40, 41, 42,
            43, 44, 45, 46, 47, 48, 49, 50, 51, 52,
            53, 55, 56, 57];

        $second_items_guide2 = [2, 3, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14,
            15, 16, 17, 18, 19, 20, 21, 22, 29, 54,
            58, 59, 60, 61, 62, 63, 64, 65, 66, 67,
            68, 69, 70, 71, 72];






        $this->createGuide('Guia Tipo tres','norma 35 guia tipo Tres',3,'/guide/3',
            $first_items_quide2, $second_items_guide2 );





       /* $this->createEnterprise('Engie','coyontural', 'abc123zaq123x', 2462021212, 'liverpool libramiento', 'agricola', [1,2], 25);



        $this->createEnterprise('Pemex', 'coyontural','abc123zaq576x', 2462021212, 'liverpool libramiento','petroleo',[1,2],100);*/





//------------------category guide type two-------------------------------------------------------------------


       $contentCategoryArray = ['amount_job', 'job_responsibility', 'job_time', 'job_decisions','job_information','job_relationships','client_attention','is_boss'];
        $this->populateCategories($contentCategoryArray, 2);


 //------------------------------ category guia type tres--------------------------
        $contentCategoryArray1 = ['environment_job', 'amount_rhythm', 'mental_effort', 'act_responsibilities',
            'work_journey','can_decision', 'work_changes','work_training', 'contact_boss','coworker_relationships',
            'given_information', 'violence_act','clients_attention', 'is_boss'];
        $this->populateCategories($contentCategoryArray1, 3);

//------------------category guide type one-------------------------------------------------------------------

        $contentCategoryArray0 = ['traumatic_event', 'persistence_memories', 'endeavor_to_avoid', 'affectation'];
        $this->populateCategories($contentCategoryArray0, 1);




//----------------------category 1 -------------------------------------------------------------------

        $questionsContentArray1= ['Mi trabajo me exige hacer mucho esfuerzo físico', 'Me preocupa sufrir un accidente en mi trabajo', 'Considero que las actividades que realizo son peligrosas', 'Por la cantidad de trabajo que tengo debo quedarme tiempo adicional a mi turno',
            'Considero que es necesario mantener un ritmo de trabajo acelerado', 'Mi trabajo exige que esté muy concentrado','Mi trabajo requiere que memorice mucha información','Mi trabajo exige que atienda varios asuntos al mismo tiempo','Mi trabajo exige que atienda varios asuntos al mismo tiempo'];
        $this->populateQuestions(1,2,$questionsContentArray1, 1 );


//-----------------------------------------category 2----------------------------------------------------------------------------
        $questionsContentArray2 = ['En mi trabajo soy responsable de cosas de mucho valor','Respondo ante mi jefe por los resultados de toda mi área de trabajo','En mi trabajo me dan órdenes contradictorias','Considero que en mi trabajo me piden hacer cosas innecesarias' ];
        $this->populateQuestions(2, 2,$questionsContentArray2, 10);



//----------------------------------- category 3---------------------------------------------------------------------------
        $questionsContentArray3 = ['Trabajo horas extras más de tres veces a la semana','Mi trabajo me exige laborar en días de descanso, festivos o fines de semana','Respondo ante mi jefe por los resultados de toda mi área de trabajo','Pienso en las actividades familiares o personales cuando estoy en mi trabajo'];
        $this->populateQuestions(3,2,$questionsContentArray3, 14);



//-----------------------category 4---------------------------------------------------------------------------------------------

        $questionsContentArray4 = ['Mi trabajo permite que desarrolle nuevas habilidades', 'En mi trabajo puedo aspirar a un mejor puesto','Durante mi jornada de trabajo puedo tomar pausas cuando las necesito','Puedo decidir la velocidad a la que realizo mis actividades en mi trabajo',
            'Puedo cambiar el orden de las actividades que realizo en mi trabajo'];
        $this->populateQuestions(4,2, $questionsContentArray4, 18);


//----------------------------category 5 ---------------------------------------------------------------

        $questionsContentArray5 = ['Me informan con claridad cuáles son mis funciones','Me explican claramente los resultados que debo obtener en mi trabajo', 'Me informan con quién puedo resolver problemas o asuntos de trabajo', 'Me permiten asistir a capacitaciones relacionadas con mi trabajo',
        'Recibo capacitación útil para hacer mi trabajo' ];
        $this->populateQuestions(5, 2 , $questionsContentArray5, 23);


//---------------------------------------category 6------------------------------------------------------------------------------------------

        $questionsContentArray6 = ['Mi jefe tiene en cuenta mis puntos de vista y opiniones', 'Mi jefe ayuda a solucionar los problemas que se presentan en el trabajo','Puedo confiar en mis compañeros de trabajo','Cuando tenemos que realizar trabajo de equipo los compañeros colaboran',
            'Mis compañeros de trabajo me ayudan cuando tengo dificultades', 'En mi trabajo  puedo expresarme libremente sin interrupciones','Recibo críticas constantes a mi persona y/o trabajo',
            'Recibo burlas, calumnias, difamaciones, humillaciones o ridiculizaciones','Se ignora mi presencia o se me excluye de las reuniones de trabajo y en la toma de decisiones','Se manipulan las situaciones de trabajo para hacerme parecer un mal trabajador',
            'Se ignoran mis éxitos laborales y se atribuyen a otros trabajadores', 'Me bloquean o impiden las oportunidades que tengo para obtener ascenso o mejora en mi trabajo','He presenciado actos de violencia en mi centro de trabajo'];
        $this->populateQuestions(6,2,$questionsContentArray6 , 28);


//------------------------------------category 7-------------------------------------------------------------------------------
        $questionsContentArray7 = ['Atiendo clientes o usuarios muy enojados','Mi trabajo me exige atender personas muy necesitadas de ayuda o enfermas', 'Para hacer mi trabajo debo demostrar sentimientos distintos a los míos'];
        $this->populateQuestions(7 ,2 , $questionsContentArray7, 41);


//------------------------------------------category 8-----------------------------------------------------------------
        $questionsContentArray8 = ['Comunican tarde los asuntos de trabajo','Dificultan el logro de los resultados del trabajo', 'Ignoran las sugerencias para mejorar su trabajo'];
        $this->populateQuestions(8,2, $questionsContentArray8, 44);


//----------------------------------------------------category 9 start type guide tres----------------------------------------------


//-----------------------------------category 9-----------------------------------------------------------------

        $questionsContent1 = ['El espacio donde trabajo me permite realizar mis
actividades de manera segura e higiénica','Mi trabajo me exige hacer mucho esfuerzo físico','Me preocupa sufrir un accidente en mi trabajo','Considero que en mi trabajo se aplican las normas de
seguridad y salud en el trabajo','Considero que las actividades que realizo son peligrosas'];

        $this->populateQuestions(9,3,$questionsContent1, 1 );

//------------------------------------------------------------category 10 ---------------------------------------------------------------------------------------------

        $questionsContent2 = ['Por la cantidad de trabajo que tengo debo quedarmetiempo adicional a mi turno','Por la cantidad de trabajo que tengo debo trabajar sin parar', 'Considero que es necesario mantener un ritmo de trabajo
acelerado'];
        $this->populateQuestions(10,3,$questionsContent2, 6);

//---------------------------------------------------category 11----------------------------------------------------------------------------------------------------------

        $questionsContent3 = ['Mi trabajo exige que esté muy concentrado', 'Mi trabajo requiere que memorice mucha información','En mi trabajo tengo que tomar decisiones difíciles muy
rápido', 'Mi trabajo exige que atienda varios asuntos al mismo tiempo'];
        $this->populateQuestions(11, 3,$questionsContent3, 9 );

//------------------------------------------category 12----------------------------------------------------------------------------------------------------------------------------------------------
        $questionsContent4 = ['En mi trabajo soy responsable de cosas de mucho valor','Respondo ante mi jefe por los resultados de toda mi área de trabajo','En el trabajo me dan órdenes contradictorias', 'Considero que en mi trabajo me piden hacer cosas innecesarias'];
        $this->populateQuestions(12, 3, $questionsContent4, 13);

//--------------------------------------category 13--------------------------------------------------------------
        $questionsContent5 = ['Trabajo horas extras más de tres veces a la semana','Mi trabajo me exige laborar en días de descanso,festivos o fines de semana',
            'Considero que el tiempo en el trabajo es mucho y perjudica mis actividades familiares o personales', 'Debo atender asuntos de trabajo cuando estoy en casa', 'Pienso en las actividades familiares o personales cuando
            estoy en mi trabajo', 'Pienso que mis responsabilidades familiares afectan mi trabajo'];
        $this->populateQuestions(13, 3 , $questionsContent5, 17);

// ------------------------------------------category 14 ---------------------------------------------------

        $questionsContent6 = ['Mi trabajo permite que desarrolle nuevas habilidades', 'En mi trabajo puedo aspirar a un mejor puesto', 'Durante mi jornada de trabajo puedo tomar pausascuando las necesito',
            'Puedo decidir cuánto trabajo realizo durante la jornada laboral' ,'Puedo decidir la velocidad a la que realizo mis actividades en mi trabajo', 'Puedo cambiar el orden de las actividades que realizo en mi trabajo'];
        $this->populateQuestions(14 , 3,$questionsContent6, 23 );

// ------------------------------------------category 15 ---------------------------------------------------------
        $questionsContent7 = ['Los cambios que se presentan en mi trabajo dificultan mi labor', 'Cuando se presentan cambios en mi trabajo se tienen en cuenta mis ideas o aportaciones'];
        $this->populateQuestions(15, 3, $questionsContent7, 29);

// ------------------------------------------category 16 ---------------------------------------------------------

        $questionsContent8 = ['Me informan con claridad cuáles son mis funciones', 'Me explican claramente los resultados que debo obtener en mi trabajo',
            'Me explican claramente los objetivos de mi trabajo','Me informan con quién puedo resolver problemas o asuntos de trabajo',
            'Me permiten asistir a capacitaciones relacionadas con mi trabajo', 'Recibo capacitación útil para hacer mi trabajo'];
        $this->populateQuestions(16, 3, $questionsContent8, 31);

// ------------------------------------------category 17 ---------------------------------------------------------

        $questionsContent9 =['Mi jefe ayuda a organizar mejor el trabajo', 'Mi jefe tiene en cuenta mis puntos de vista y opiniones', 'Mi jefe me comunica a  tiempo  la información relacionada con el trabajo',
                'La orientación que me da mi jefe me ayuda a realizar mejor mi trabajo', 'Mi jefe ayuda a solucionar los problemas que se presentan en el trabajo'];
        $this->populateQuestions(17,3, $questionsContent9, 37 );

// ------------------------------------------category 18 ---------------------------------------------------------
        $questionsContent10 = ['Puedo confiar en mis compañeros de trabajo', 'Entre compañeros solucionamos los problemas de trabajo de forma respetuosa',
            'En mi trabajo me hacen sentir parte del grupo', 'Cuando tenemos que realizar trabajo de equipo los compañeros colaboran',
            'Mis compañeros de trabajo me ayudan cuando tengo dificultades'];
        $this->populateQuestions(18, 3, $questionsContent10, 42 );

// ------------------------------------------category 19 ---------------------------------------------------------
        $questionsContent11 = ['Me informan sobre lo que hago bien en mi trabajo', 'La forma como evalúan mi trabajo en mi centro de trabajo me ayuda a mejorar mi desempeño',
            'En mi centro de trabajo me pagan a tiempo mi salario', 'El pago que recibo es el que merezco por el trabajo que realizo',
            'Si obtengo los resultados esperados en mi trabajo me recompensan o reconocen', 'Las personas que hacen bien el trabajo pueden crecer laboralmente',
            'Considero que mi trabajo es estable', 'En mi trabajo existe continua rotación de personal', 'Siento orgullo de laborar en este centro de trabajo',
            'Me siento comprometido con mi trabajo'];
        $this->populateQuestions(19, 3, $questionsContent11, 47);

// ------------------------------------------category 20 ---------------------------------------------------------

        $questionsContent12 = ['En mi trabajo puedo expresarme sin interrupciones ', 'Recibo críticas constantes a mi persona y/o trabajo' ,'Recibo burlas, calumnias, difamaciones, humillaciones o ridiculizaciones',
            'Se ignora mi presencia o se me excluye de las reuniones de trabajo y en la toma de decisiones' , 'Se manipulan las situaciones de trabajo para hacerme parecer un mal trabajador',
            'Se ignoran mis éxitos laborales y se atribuyen a otros trabajadores', 'Me bloquean o impiden las oportunidades que tengo para obtener ascenso o mejora en mi trabajo', 'He presenciado actos de violencia en mi centro de trabajo' ];
        $this->populateQuestions(20, 3, $questionsContent12, 57);

// ------------------------------------------category 21 ---------------------------------------------------------

        $questionsContent13 = ['Atiendo clientes o usuarios muy enojados', 'Mi trabajo me exige atender personas muy necesitadas de ayuda o enfermas', 'Para hacer mi trabajo debo demostrar sentimientos distintos a los míos',
            'Mi trabajo me exige atender situaciones de violencia'];
        $this->populateQuestions(21, 3, $questionsContent13, 65);


// ------------------------------------------category 22 ---------------------------------------------------------

        $questionsContent14 = ['Comunican tarde los asuntos de trabajo', 'Dificultan el logro de los resultados del trabajo', 'Cooperan poco cuando se necesita',
            'Ignoran las sugerencias para mejorar su trabajo'];
        $this->populateQuestions(22, 3, $questionsContent14, 69);

// ------------------------------------------guide I category 23 ---------------------------------------------------------
        $questionsContentGuideOne1 = ['Accidente que tenga como consecuencia la muerte, la pérdida de un miembro o una lesión grave?', 'Asaltos', 'Actos violentos que derivaron en lesiones graves',
            'Secuestro', 'Amenazas','Cualquier otro que ponga en riesgo su vida o salud, y/o la de otras personas?'];
        $this->populateQuestions(23, 1, $questionsContentGuideOne1, 1);
//-------------------------category 24-------------------------------------------------------------------------------------
        $questionsContentGuideOne2 = ['¿Ha tenido recuerdos recurrentes sobre el acontecimiento que le provocan malestares?',
            'Asa¿Ha tenido sueños de carácter recurrente sobre el acontecimiento, que le producen malestar?'];
        $this->populateQuestions(24, 1, $questionsContentGuideOne2, 7);
//-------------------------category 25-------------------------------------------------------------------------------------

        $questionsContentGuideOne3 = ['¿Se ha esforzado por evitar todo tipo de sentimientos, conversaciones o situaciones que le puedan recordar el acontecimiento?','¿Se ha esforzado por evitar todo tipo de actividades, lugares o personas que motivan recuerdos del acontecimiento?',
            '¿Ha tenido sueños de carácter recurrente sobre el acontecimiento, que le producen malestar?','¿Ha tenido dificultad para recordar alguna parte importante del evento?', '¿Ha disminuido su interés en sus actividades cotidianas?','
¿Se ha sentido usted alejado o distante de los demás?','¿Ha notado que tiene dificultad para expresar sus sentimientos?', '¿Ha tenido la impresión de que su vida se va a acortar, que va a morir antes que otras personas o que tiene un futuro limitado?'];
        $this->populateQuestions(25, 1, $questionsContentGuideOne3, 9);
//-------------------------category 26-------------------------------------------------------------------------------------

        $questionsContentGuideOne3 = ['¿Ha tenido usted dificultades para dormir?','¿Ha estado particularmente irritable o le han dado arranques de coraje?',
            '¿Ha tenido dificultad para concentrarse?','¿Ha estado nervioso o constantemente en alerta?', '¿Se ha sobresaltado fácilmente por cualquier cosa?'];
        $this->populateQuestions(26, 1, $questionsContentGuideOne3, 14);


//-------------------------Replies-------------------------------------------------------------------------------------




        $this->createReply('Siempre');
        $this->createReply('Casi siempre');
        $this->createReply('Algunas veces');
        $this->createReply('Casi nunca');
        $this->createReply('Nunca');
        $this->createReply('Si');
        $this->createReply('No');






        $this->createAgeRange('15-19');
        $this->createAgeRange('20-24');
        $this->createAgeRange('25-30');
        $this->createAgeRange('31-34');
        $this->createAgeRange('35-39');
        $this->createAgeRange('40-44');
        $this->createAgeRange('45-49');
        $this->createAgeRange('49-55');
        $this->createAgeRange('55-60');
        $this->createAgeRange('60-65');
        $this->createAgeRange('65-69');
        $this->createAgeRange('70 o más');

        $this->createStudiesLevel('Sin formación');
        $this->createStudiesLevel('Primaria terminada');
        $this->createStudiesLevel('Primaria incompleta');
        $this->createStudiesLevel('Secundaria terminada');
        $this->createStudiesLevel('Secundaria incompleta');
        $this->createStudiesLevel('Preparatoria o bachillerato terminada');
        $this->createStudiesLevel('Preparatoria o bachillerato incompleta');
        $this->createStudiesLevel('Técnico superior terminada');
        $this->createStudiesLevel('Técnico superior incompleta');
        $this->createStudiesLevel('Licenciatura terminada');
        $this->createStudiesLevel('Licenciatura incompleta');
        $this->createStudiesLevel('Maestría terminada');
        $this->createStudiesLevel('Maestría incompleta');
        $this->createStudiesLevel('Doctorado terminado');
        $this->createStudiesLevel('Doctorado incompleto');




      /*  $this->createQuizzed(1,7, 3,'Sergio', 'Garcia', 'Gerente',
            'Administrativo', 'Gerente','Soltero','Confianza',
            'Diurno 6:00 a 20:00','Entre 1 y 4 años','Mixto','Entre 1 y 4 años');*/







        /*$this->createGivenReply(1,1, $first_items_quide1, $second_items_guide1,1);


        $this->createGivenReply(1,3,$first_items_quide1,$second_items_guide1,1 );



        $this->createGivenReply(2,4,$first_items_quide1, $second_items_guide1,1);*/

    }
    private function populateCategories($contentArray, $guide_id){
        foreach ($contentArray as $content){
            $category = new Category();
            $category->content = $content;
            $category->guide_type_id = $guide_id;
            $category->save();
        }
    }
    private  function guideType($name){
        $guide_type = new GuideType();
        $guide_type->name =$name;
        $guide_type->save();
    }

    private function createGuide( $title, $description, $guide_type_id, $link, $first_items_quide=[],$second_items_guide=[]){
        $serial_first_items= serialize($first_items_quide);
        $serial_second_items= serialize($second_items_guide);

        $guide= new Guide();
        $guide->title=$title;
        $guide->description=$description;
        $guide->guide_type_id =$guide_type_id;
        $guide->is_activated = false;
        $guide->first_items =$serial_first_items;
        $guide->second_items =$serial_second_items;
        $guide->link= $link;
        $guide->save();
    }

    private function createEnterprise($name, $social_reason, $rfc, $phone, $address,$activity, $guides, $worker_amount){
        $enterprise = new Enterprise();
        $enterprise->name = $name;
        $enterprise->social_reason = $social_reason;
        $enterprise->rfc = $rfc;
        $enterprise->phone = $phone;
        $enterprise->address = $address;
        $enterprise->activity = $activity;

        $enterprise->worker_amount = $worker_amount;
        $enterprise->surveyed_amount =$enterprise->getAmountSurveyed($guides) ;
        $enterprise->save();
        $enterprise->guides()->attach($guides);
    }
  private  function populateQuestions($category,$guide_id, $questionsArray, $iterator){
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
    private function createReply($content){
        $reply = new Reply();
        $reply->content = $content;
        $reply->save();
    }
    private function createAgeRange($content){
        $ageRange = new AgeRange();
        $ageRange->content = $content;
        $ageRange->save();
    }
    private function createStudiesLevel($content){
        $studiesLevel = new StudiesLevel();
        $studiesLevel->content =$content;
        $studiesLevel->save();

    }
    private function createQuizzed($enterprise_id,$studies_level_id, $age_range_id,$name, $last_name,
                                   $job,$department, $position_kind, $civil_state,$kind_contract,
                                   $type_day, $current_position_time,$rotation_turn, $enterprise_time)
    {
        $quizzed =new Quizzed();
        $quizzed->enterprise_id = $enterprise_id;
        $quizzed->age_range_id=$age_range_id;
        $quizzed->studies_level_id =$studies_level_id;
        $quizzed->name =$name;
        $quizzed->last_name= $last_name;
        $quizzed->job = $job;
        $quizzed->department = $department;
        $quizzed->position_kind = $position_kind;
        $quizzed->civil_state = $civil_state;
        $quizzed->kind_contract = $kind_contract;
        $quizzed->type_day = $type_day;
        $quizzed->current_position_time = $current_position_time;
        $quizzed->rotation_turn = $rotation_turn;
        $quizzed->enterprise_time = $enterprise_time;
        $quizzed->save();
    }
    private function createAppliedGuide($guide_id, $enterprise_id, $quizzed_id){
        $applied_guide= new AppliedGuide();
        $applied_guide->guide_id = $guide_id;
        $applied_guide->enterprise_id = $enterprise_id;
        $applied_guide->quizzed_id = $quizzed_id;
        $applied_guide->save();

    }
    private function createGivenReply($question_id, $reply_id,$the_first_items,$the_second_items,$applied_guide_id){

        $given_reply= new GivenReply();
        $given_reply->question_id = $question_id;
        $given_reply->reply_id = $reply_id;
        $given_reply->value = $given_reply->scopeValueByGivenRepliesGuide($the_first_items,$the_second_items,1,1);
        $given_reply->applied_guide_id = $applied_guide_id;
        $given_reply->save();

    }

}
