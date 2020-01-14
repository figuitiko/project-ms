<?php

namespace App\Http\Controllers;

use App\Enterprise;
use App\Guide;
use App\GuideType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class EnterpriseController extends Controller
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
        $enterprises = Enterprise::all();
        $counter = 0;
        return view('enterprise.index',['enterprises' => $enterprises, 'counter' => $counter]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guides = Guide::all();
        return view('enterprise.create',['guides'=>$guides]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all()); exit;
        $this->validate($request, [
            'name'           => 'required',
            'social_reason'          => 'required|string|max:250',
            'worker_amount'=> 'required|numeric',
            'rfc'       => 'required|string|unique:enterprises',
            'phone'        => 'required|numeric',
            'address'         => 'required|string',
            'activity'         => 'required|string',
            'guide_id'           => 'required|numeric',

        ]);
        try {
            DB::beginTransaction();
            $enterprise= new Enterprise();
            $enterprise->name = $request->name;
            $enterprise->social_reason = $request->social_reason;
            $enterprise->worker_amount =$request->worker_amount;
            $enterprise->rfc =$request->rfc;
            $enterprise->phone =$request->phone;
            $enterprise->address =$request->address;
            $enterprise->activity =$request->activity;
            $enterprise->guide_id =$request->guide_id;
            $enterprise->save();
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
     * @param  \App\Enterprise  $enterprise
     * @return \Illuminate\Http\Response
     */
    public function show(Enterprise $enterprise)
    {
        $counter=1;
        return view('enterprise.show', ['enterprise' => $enterprise, 'counter'=>$counter]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Enterprise  $enterprise
     * @return \Illuminate\Http\Response
     */
    public function edit(Enterprise $enterprise)
    {
        //

        $guides = Guide::all();
      return view('enterprise.edit',['enterprise'=>$enterprise, 'guides'=> $guides]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Enterprise  $enterprise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enterprise $enterprise)
    {
        $this->validate($request, [
            'name'           => 'required',
            'social_reason'          => 'required|string|max:250',
            'worker_amount'=> 'required|numeric',
            'rfc' => 'required|unique:enterprises,rfc,' . $enterprise->id,
            'phone'        => 'required|numeric',
            'address'         => 'required|string',
            'activity'         => 'required|string',
            'guide_id'           => 'required|numeric',
        ]);

        try {
            DB::beginTransaction();
            $enterprise->update([
            $enterprise->name = $request->name,
            $enterprise->social_reason = $request->social_reason,
            $enterprise->worker_amount =$request->worker_amount,
            $enterprise->rfc =$request->rfc,
            $enterprise->phone =$request->phone,
            $enterprise->address =$request->address,
            $enterprise->activity =$request->activity,
            $enterprise->guide_id =$request->guide_id
            ]);


            DB::commit();
        }
        catch (ErrorException $e){
            DB::rollBack();
            redirect()->to(route('enterprise.edit',$enterprise))->with('message', 'No se pudo agregar la nueva guia');
        }
        return redirect()->route('enterprise.edit', $enterprise)->with('message', 'Datos de la empresa Editados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Enterprise  $enterprise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enterprise $enterprise)
    {
        //
        $enterprise->delete();
        return redirect()
            ->route('enterprise.index')
            ->with('message', 'La Empresa ha sido Eliminada');  redirect();
    }
}
