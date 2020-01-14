<?php

namespace App\Http\Controllers;


use App\Quizzed;
use Illuminate\Http\Request;

class QuizzedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizeds = Quizzed::all();
        $counter = 0;
        return view('surveyed.index',['quizeds' => $quizeds, 'counter' => $counter]);
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
        //
        //dd($request->all()); exit;
        $this->validate($request, [
            'name'           => 'required',
            'last_name'          => 'required|string|max:250',
            'worker_amount'=> 'required|numeric',
            'rfc'       => 'required|string|unique:enterprises',
            'phone'        => 'required|numeric',
            'address'         => 'required|string',
            'activity'         => 'required|string',
            'guide_id'           => 'required|numeric',

        ]);
        try {
            DB::beginTransaction();
            $quizzed= new Quizzed();
            $quizzed->name = $request->name;
            $quizzed->last_name = $request->last_name;
            $quizzed->job =$request->job;
            $quizzed->age =$request->age;
            $quizzed->studies =$request->studies;
            $quizzed->enterprise_id =$request->activity;
            $quizzed->applied_guide_id =$request->guide_id;
            $quizzed->save();
            DB::commit();
        }
        catch (ErrorException $e){
            DB::rollBack();
            redirect()->to(route('enterprise.index'))->with('message', 'No se pudo agregar la nueva guia');
        }
        return redirect()->route('enterprise.index')->with('message', 'nueva Empresa insertada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quizzed  $quizzed
     * @return \Illuminate\Http\Response
     */
    public function show(Quizzed $quizzed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quizzed  $quizzed
     * @return \Illuminate\Http\Response
     */
    public function edit(Quizzed $quizzed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quizzed  $quizzed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quizzed $quizzed)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quizzed  $quizzed
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quizzed $quizzed)
    {
        //
    }
}
