<?php

namespace App\Http\Controllers;

use App\Enterprise;
use App\Guide;
use App\Question;
use App\GuideType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuideController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $guides = Guide::all();
        $questions = Question::all();
        $types = GuideType::all();
        $enterprises = Enterprise::all();
        $counter = 0;
        return view('guide.index',['guides' => $guides, 'counter' => $counter, 'questions'=>$questions, 'types'=>$types, 'enterprises'=>$enterprises]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $types= GuideType::all();
        return view('guide.create',['types'=>$types]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        $this->validate($request, ['description' => 'required|min:3']);



        try {
            DB::beginTransaction();
            $guide= new Guide();
            $guide->title = $request->title;
            $guide->description = $request->description;
            $guide->guide_type_id =$request->guide_type_id;
            $guide->save();
            $id = DB::getPdo()->lastInsertId();

            Guide::find($id)->update([
                $guide->description => $request->description,
                $guide->link => 'guide/'.$id,
                $guide->guide_type_id => $request->guide_type_id
            ]);

           if(isset($request->question)){
               foreach ($request->questions as $key=>$question){
                   $qq= new Question();
                   $qq->content= $question;
                   $qq->guide_id = $guide->id;
                   $qq->save();

               }
           }


            DB::commit();

        }
        catch (ErrorException $e){
            DB::rollBack();
            redirect()->to(route('guide.index'))->with('menssage', 'No se pudo agregar la nueva guia');
        }

        return redirect()->route('guide.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function show(Guide $guide)
    {
        //
//        $guide = Guide::find($guide);
        $counter=1;
        return view('guide.show', ['guide' => $guide, 'counter'=>$counter]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function edit(Guide $guide)
    {
        //
        $counter = 0;
        $types= GuideType::all();
//        dd($types);exit;

        $questions = Question::where('guide_id',$guide->id)->get();
//        dd($questions);exit;

        return view('guide.edit', ['guide' => $guide, 'types'=>$types, 'questions'=>$questions,'counter'=>$counter]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guide $guide)
    {
        //
//        dd($request->questions);exit;
////     dd($request->guide_type_id);exit;
//        $this->validate($request, [
//            'questions'=>'required',
//            'new_questions'=>'sometimes'
//        ]);
//        dd($request->title); exit;
            if(!$request->wantsJson()){
                try{
                    DB::beginTransaction();

                    $guide->update([
                        $guide->title = $request->title,
                        $guide->description = $request->description,
                        $guide->guide_type_id = $request->guide_type_id,
                        $guide->link = '/guide/'.$guide->id
                    ]);




                    $questions = Question::where('guide_id',$guide->id)->get();
            //            dd($questions);exit;
                    $i=0;
                    if(!empty($questions)){
                        foreach ($questions as $question){
                            if(empty($request->question[$i])){
                                $question->update([
                                    'content'=>$request->questions[$i]
                                ]);
                            }

                            $i++;

                        }
                    }

                    if($request->new_questions != ''){
                        foreach ($request->new_questions as $new_question){
                            $qq= new Question();
                            $qq->content= $new_question;
                            $qq->guide_id = $guide->id;
                            $qq->save();

                        }
                    }

                    DB::commit();
                }catch (ErrorException $e) {
                    DB::rollBack();
                    redirect()->to(route('guide.edit', [$guide]))->with('message', 'Error, no se ha podido editar la venta');
                }
                return redirect()->to(route('guide.index'))->with('message', 'Se ha editado la Guia');
            }
            elseif ($request->wantsJson()){
//                dd($request->all());
               $guide->update([
                   $guide->is_activated = $request->has('is_activated'),
                   $guide->active_enterprise_id = $request->active_enterprise
               ]);
               return response()->json(['success'=>'Data is successfully updated']);
            }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guide $guide)
    {
        //
        try{

            DB::beginTransaction();

            $guide->delete();

            $questions = Question::where('guide_id',$guide->id)->get();

            foreach ($questions as $question){

                $question->delete();
            }
            DB::commit();
        }catch (ErrorException $e) {
            DB::rollBack();
            redirect()->to(route('guide.index'))->with('menssage', 'Error, no se ha podido editar la Guia');
        }
        return redirect()->to(route('guide.index'))->with('menssage', 'Se ha eliminado la guia');
    }
}
