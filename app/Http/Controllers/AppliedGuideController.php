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
       //dd($only_guestion); exit;


        try {
            DB::beginTransaction();
            $enterprise = Enterprise::where('id',$request->enterprise_id)->first();
            $name_enterprise = $enterprise->name;



            $quizzed = new Quizzed();
            $quizzed->enterprise_id = $request->enterprise_id;
            $quizzed->name = $request->name;
            $quizzed->last_name = $request->last_name;
            $quizzed->job = $request->job;
            $quizzed->age = $request->age;
            $quizzed->studies= $request->studies;
            $quizzed->save();

            $applied_guide= new AppliedGuide();
            $applied_guide->guide_id = $request->guide_id;
            $applied_guide->enterprise_id = $request->enterprise_id;
            $applied_guide->quizzed_id = $quizzed->id;
            $applied_guide->save();

            $the_guide = Guide::where('id', $request->guide_id)->first();
            $first_items= unserialize($the_guide->first_items);
            $second_items = unserialize($the_guide->second_items);

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
