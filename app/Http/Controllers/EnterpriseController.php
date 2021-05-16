<?php

namespace App\Http\Controllers;

use App\AppliedGuide;
use App\Enterprise;
use App\GivenReply;
use App\Guide;
use App\GuideType;
use App\Repositories\AppliedGuideRepositoryInterface;
use App\Repositories\QuizzedRepository;
use App\Repositories\QuizzedRepositoryInterface;
use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;
use PDF;

class EnterpriseController extends Controller
{


    private $quizzedRepository;

    private $appliedGuideRepository;


    /**
     * Create a new controller instance.
     *
     * @param QuizzedRepositoryInterface $quizzedRepository
     * @param AppliedGuideRepositoryInterface $appliedGuideRepository
     */
    public function __construct(QuizzedRepositoryInterface $quizzedRepository,
                                    AppliedGuideRepositoryInterface $appliedGuideRepository)
    {
        $this->middleware('auth');
        $this->quizzedRepository = $quizzedRepository;
        $this->appliedGuideRepository = $appliedGuideRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!$request->wantsJson()){
            $enterprises = Enterprise::all();
            $counter = 0;
            return view('enterprise.index',['enterprises' => $enterprises, 'counter' => $counter]);
        }elseif ($request->wantsJson()) {
            $enterprises = Enterprise::all();

            return \response()->json(array('enterprises' => $enterprises));
        }
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
       // dd($request->all()); exit;
        $this->validate($request, [
            'name'           => 'required',
            'social_reason'          => 'required|string|max:250',
            'worker_amount'=> 'required|numeric',
            'rfc'       => 'required|string|unique:enterprises',
            'phone'        => 'required|numeric',
            'address'         => 'required|string',
            'activity'         => 'required|string',
            'guides'           => 'required',

        ]);
        try {

            //dd($request);
            DB::beginTransaction();
            $enterprise= new Enterprise();
            $enterprise->name = $request->name;
            $enterprise->social_reason = $request->social_reason;
            $enterprise->worker_amount =$request->worker_amount;
            $enterprise->rfc =$request->rfc;
            $enterprise->phone =$request->phone;
            $enterprise->address =$request->address;
            $enterprise->activity =$request->activity;


            $enterprise->surveyed_amount =$enterprise->getAmountSurveyed() ;
            $enterprise->save();
            $enterprise->guides()->attach($request->guides);
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Enterprise $enterprise)
    {
        $counter=1;
      //  dd($enterprise);
       $appliedGuides= AppliedGuide::where('enterprise_id',$enterprise->id)->get();
       $givenReplies = DB::table('given_replies')
                        ->join('applied_guides','given_replies.id','=', 'given_replies.applied_guide_id')
                         ->get();

        $replies= [];
            foreach ($appliedGuides as $guide){
                $replies[] = GivenReply::where('applied_guide_id',$guide->id)->get();
            }



        $quizzedsYes= $this->quizzedRepository->quizzedsYesByEnterprise($enterprise->id );


        $quizzedWithTotal = $this->quizzedRepository->quizzedsYesWithTotal($enterprise->id);

       // dd($appliedGuides->where('guide_id', 3)->count());

        //---------------------------------  guia 2-----------------------------------------------------




        //-----------------------------------------------guide 3 -------------------------------------



        $guideReportValues=[];
        $guideBelong= 1;

        $guide2Amount = $appliedGuides->where('guide_id',2)->count();

        if( $enterprise->guides()->get()->contains('id',2) && ($guide2Amount> 0)){
            $reportData= [ 'workEnvironmentAvgCat'=>[2,1,3],
                'workCondDomainAvg' =>[2,1,3],
                'dangerConditionsDimAvg' =>[2],
                'unhealthyConditionsDimAvg'=>[1],
                'workDangerousDimAvg'  => [3],
                'ownFactorsActivityCatAvg'=> [4, 9,5, 6,7, 8,41, 42, 43,10, 11,12, 13,20, 21, 22,18, 19,26, 27],
                'workChargeDomAvg'=>[4, 9,5, 6,7, 8,41, 42, 43,10, 11,12, 13],
                'quantitativeDemandsDimAvg'=>[4, 9],
                'accelerateWorkDimAvg'=>[5, 6],
                'mentalChargeDemandsDimAvg'=>[7, 8],
                'psychologicalDemandsDimAvg'=>[41, 42, 43],
                'responsibilityDemandsDimAvg'=> [10, 11],
                'contradictoryDemandsDimAvg'=> [12, 13],
                'lackOfControlDomAvg'=> [20, 21, 22,18, 19,26, 27],
                'lackOfControlAutonomyDimAvg'=> [20, 21, 22],
                'nullPossibilitiesDevelopmentDimAvg'=>[18, 19],
                'limitNonexistentDimAvg'=>[26, 27],
                'organizationWorkTimeCatAvg'=>[14, 15,16,17],
                'workDayDomAvg'=>[14, 15],
                'bigWorkDayDimAvg'=>[14, 15],
                'interferenceWorkFamilyDomAvg'=>[16,17],
                'influenceOutWorkDimAvg'=>[16],
                'influenceFamilyResponsibilityDimAvg'=>[17],
                'leadershipWorkRelationsCatAvg'=>[23, 24, 25,28, 29,30, 31, 32,44, 45, 46,33, 34, 35, 36, 37, 38, 39, 40] ,
                'leadershipDomAvg'=>[23, 24, 25,28, 29],
                'scarcityClearFunctionsDimAvg'=>[23, 24, 25],
                'leadershipFeaturesDimAvg'=>[28, 29],
                'workRelationDomAvg'=>[30, 31, 32,44, 45, 46],
                'socialRelationDimAvg'=>[30, 31, 32],
                'deficientRelationBossDimAvg'=>[44, 45, 46],
                'violenceDomAvg'=>[33, 34, 35, 36, 37, 38, 39, 40],
                'workViolenceDimAvg'=>[33, 34, 35, 36, 37, 38, 39, 40],

            ];
            $guideReportValues =   $this->guideValues($guide2Amount, $enterprise->id, 2,
                $reportData);

            $guideBelong = 2;
        }

        $guide3Amount = $appliedGuides->where('guide_id',3)->count();
        if( $enterprise->guides()->get()->contains('id',3) && ($guide3Amount> 0)){
            $reportData= [ 'workEnvironmentAvgCat'=>[1,3,2,4,5],
                'workCondDomainAvg' =>[1,3,2,4,5],
                'dangerConditionsDimAvg' =>[1, 3],
                'unhealthyConditionsDimAvg'=>[2,4],
                'workDangerousDimAvg'  => [5],
                'ownFactorsActivityCatAvg'=> [6,12,7,8,9,10,11,65,66,67,68,13,14,15,16,25,26,27,28,23,24,48,29,30,35,36],
                'workChargeDomAvg'=>[6,12,7,8,9,10,11,65,66,67,68,13,14,15,16],
                'quantitativeDemandsDimAvg'=>[6,12],
                'accelerateWorkDimAvg'=>[7, 8],
                'mentalChargeDemandsDimAvg'=>[9, 10,11],
                'psychologicalDemandsDimAvg'=>[65, 66, 67, 68],
                'responsibilityDemandsDimAvg'=> [13, 14],
                'contradictoryDemandsDimAvg'=> [15, 16],
                'lackOfControlDomAvg'=> [25,26,27,28,23,24,29,30,35,36],
                'lackOfControlAutonomyDimAvg'=> [25,26,27,28],
                'nullPossibilitiesDevelopmentDimAvg'=>[23, 24],
                'insufficientParticipationDimAvg'=> [29, 30],
                'limitNonexistentDimAvg'=>[35, 36],
                'organizationWorkTimeCatAvg'=>[17, 18,19, 20,21, 22],
                'workDayDomAvg'=>[17, 18],
                'bigWorkDayDimAvg'=>[17, 18],
                'interferenceWorkFamilyDomAvg'=>[19, 20,21, 22],
                'influenceOutWorkDimAvg'=>[19, 20],
                'influenceFamilyResponsibilityDimAvg'=>[21, 22],
                'leadershipWorkRelationsCatAvg'=>[31,32,33,34,37,38,39,40,41, 42, 43, 44,45, 46, 69, 70, 71, 72,57, 58, 59, 60, 61, 62, 63, 64] ,
                'leadershipDomAvg'=>[31,32,33,34,37,38,39,40,41],
                'scarcityClearFunctionsDimAvg'=>[31, 32, 33, 34],
                'leadershipFeaturesDimAvg'=>[37, 38, 39, 40, 41],
                'workRelationDomAvg'=>[42, 43, 44, 45, 46,69, 70, 71, 72],
                'socialRelationDimAvg'=>[42, 43, 44, 45, 46],
                'deficientRelationBossDimAvg'=>[69, 70, 71, 72],
                'violenceDomAvg'=>[57, 58, 59, 60, 61, 62, 63, 64],
                'workViolenceDimAvg'=>[57, 58, 59, 60, 61, 62, 63, 64],
                'organizationalEnvironmentCatAvg'=>[47,48,49,50,51,52,55,56,53,54],
                'recognitionPerformanceDomAvg'=>[47,48,49,50,51,52],
                'fewFeedbackPerformanceDimAvg'=>[47,48],
                'fewRecognitionDim'=>[49,50,51,52],
                'insufficientBelongingFeelingAvg'=>[55,56,53,54],
                'limitBelongingFeelingDimAvg'=>[55, 56],
                'unstableWorkSituationAvg'=>[53, 54],
                ];

            $guideReportValues=   $this->guideValues($guide3Amount, $enterprise->id, 3,
                $reportData);
            $guideBelong = 3;

        }

       // dd($guideReportValues['leadershipWorkRelationsCatAvg']);


      //dd($categoryWorkEnvironment->result);


        return view('enterprise.show', ['enterprise' => $enterprise,
                                                'counter'=>$counter,
                                                'givenReplies'=>$givenReplies,
                                                'quizzedsYes'=>$quizzedsYes,
                                                'quizzedWithTotal'=>$quizzedWithTotal,
                                                'guideReportValues' =>$guideReportValues,
                                                'guideBelong'=>$guideBelong
                                                    ]);
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

            ]);
            $enterprise->guides()->detach([1,2,3]);
            $enterprise->guides()->attach($request->guides);


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
     *
     */
    public function destroy(Enterprise $enterprise)
    {
        //
        $enterprise->delete();
        return redirect()
            ->route('enterprise.index')
            ->with('message', 'La Empresa ha sido Eliminada');
    }

    public function chart($id){


        $quizzedWithTotal= $this->quizzedRepository->quizzedsYesWithTotal($id);
        return response()->json($quizzedWithTotal);
    }



    private function guideValues($guideAmount, $enterpriseId, $guideId,$reportData
                               )

    {
        $totalValueGuide= $this->appliedGuideRepository->totalGuideByEnterprise($enterpriseId, $guideId);
        $totalValueGuideAvg = $totalValueGuide->result/$guideAmount;

        foreach ($reportData as $key=>$report){
            $valueSum = $this->appliedGuideRepository->appliedGuideSumByGuide($enterpriseId,$guideId,$report);
            $valueAvg = $valueSum->result/$guideAmount;
            $reportData[$key] = round($valueAvg);

        }
        $reportData['totalValueGuideAvg'] =round($totalValueGuideAvg);

       return $reportData;




    }

    public function pdf($id){

        $quizzedWithTotal = $this->quizzedRepository->quizzedsYesWithTotal($id);
        view()->share('quizzedWithTotal',$quizzedWithTotal );
        $pdf = PDF::loadView('enterprise.pdf',$quizzedWithTotal);
        return $pdf->download('pdf_file.pdf');
    }

}
