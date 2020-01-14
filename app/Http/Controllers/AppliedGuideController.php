<?php

namespace App\Http\Controllers;

use App\AppliedGuide;
use Illuminate\Http\Request;

class AppliedGuideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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


        $guide_app = AppliedGuide::create( $request->all() );

        return response()->json([
            'success' => 'applied guide created'
        ]);
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
        //
    }
}
