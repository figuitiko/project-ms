<?php

namespace App\Http\Controllers;

use App\AgeRange;
use App\Guide;
use App\Question;
use App\Reply;
use App\StudiesLevel;
use Illuminate\Http\Request;

class FrontGuideController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $guides = Guide::all();
        $counter = 0;
        return view('front.index',['guides' => $guides, 'counter' => $counter]);
    }
    public function guide($id){
        $counter=0;
        $guide = Guide::find($id);
        $replies= Reply::all();
        $ageRanges = AgeRange::all();
        $studiesLevels = StudiesLevel::all();

        return view('front.guide', ['guide' => $guide, 'replies'=>$replies, 'counter'=>$counter,
            'ageRanges'=>$ageRanges,'studiesLevels'=>$studiesLevels ]);
    }
}
