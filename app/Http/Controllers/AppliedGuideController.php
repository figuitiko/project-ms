<?php

namespace App\Http\Controllers;

use App\AppliedGuide;
use App\Enterprise;
use App\GivenReply;
use App\Guide;
use App\Quizzed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppliedGuideController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applied_guides = AppliedGuide::all();
        $counter = 0;
        return view('appliedguide.index',['applied_guides' => $applied_guides, 'counter' => $counter]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $only_guestion = array();
        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'question') === 0) {
                $only_guestion[$key] = $value;
            }
        }



        try {
            DB::beginTransaction();
            $enterprise = Enterprise::where('id',$request->enterprise_id)->first();



            if($request->guide_id == "1"){
                $quizzed = new Quizzed();
                $quizzed->enterprise_id = $request->enterprise_id;
                $quizzed->name = $request->name;
                $quizzed->last_name = $request->last_name;
                $quizzed->job = $request->job;
                $quizzed->age_range_id = $request->ageRange;
                $quizzed->studies_level_id= $request->studiesLevel;
                $quizzed->department= $request->department;
                $quizzed->position_kind= $request->kind_job;
                $quizzed->civil_state= $request->civil_state;
                $quizzed->kind_contract= $request->kind_contract;
                $quizzed->rotation_turn= $request->rotation_turn;
                $quizzed->current_position_time= $request->current_position_time;
                $quizzed->enterprise_time= $request->enterprise_time;
                $quizzed->type_day= $request->type_day;
                $quizzed->save();
            }


            $applied_guide= new AppliedGuide();
            $applied_guide->guide_id = $request->guide_id;
            $applied_guide->enterprise_id = $request->enterprise_id;
            if(isset($quizzed)){
                $applied_guide->quizzed_id = $quizzed->id;
            }

            $applied_guide->save();

            $the_guide = Guide::where('id', $request->guide_id)->first();
            $first_items= unserialize($the_guide->first_items);
            $second_items = unserialize($the_guide->second_items);

               if($request->guide_id ===1){
                   foreach ($only_guestion as  $key=>$value){
                       $question_reply = explode(",", $value);
                       $given_reply = new GivenReply();
                       $given_reply->reply_id = $question_reply[0];
                       $given_reply->question_id = $question_reply[1];
                       $given_reply->applied_guide_id = $applied_guide->id;

                   }
               }else{
                   foreach ($only_guestion as $value)
                   {
                       $question_reply = explode(",", $value);



                       // dd($question_reply);
                       $given_reply = new GivenReply();
                       $given_reply->reply_id = $question_reply[0];
                       $given_reply->question_id = $question_reply[1];
                       $given_reply->applied_guide_id = $applied_guide->id;
                       $given_reply->value = $given_reply->scopeValueByGivenRepliesGuide($first_items,$second_items,$question_reply[0],$question_reply[1]);


                       $given_reply->save();
                   }
               }





            DB::commit();

        }
        catch (ErrorException $e){
            DB::rollBack();
            redirect()->to(route('frontGuide'))->with('menssage', 'No se pudo agregar la nueva guia');
        }

        return redirect()->route('frontGuide');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AppliedGuide  $appliedGuide
     * @return \Illuminate\Http\Response
     */
    public function show(AppliedGuide $appliedGuide)
    {
        //
        $counter=1;
        return view('appliedguide.show', ['appliedGuide' => $appliedGuide, 'counter'=>$counter]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AppliedGuide  $appliedGuide
     * @return \Illuminate\Http\Response
     */
    public function edit(AppliedGuide $appliedGuide)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AppliedGuide  $appliedGuide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AppliedGuide $appliedGuide)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AppliedGuide  $appliedGuide
     * @return \Illuminate\Http\Response
     */
    public function destroy(AppliedGuide $appliedGuide)
    {
        $appliedGuide->delete();

        return redirect()
            ->route('applied.index')
            ->with('message', 'La guia  ha sido Eliminada');
    }


}
