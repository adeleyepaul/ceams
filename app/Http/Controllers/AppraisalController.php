<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Courses;
use App\Http\Controllers\Controller;
use App\Study;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\User;
use App\Assessment;

class AppraisalController extends Controller
{
    //

    public function create_form(Request $request)
    {
        //validate alll;
        $this->validate($request,
        [
            'accountability' => 'required',
            'integrity' => 'required',
            'judgement' => 'required',
            'communication' => 'required',
            'quality' => 'required',
            'quantity' => 'required',
            'leadership' => 'required',
            'safety' => 'required',
            'commitment' => 'required',
            'planning' => 'required',
        ]);
        
        $assessment = new Assessment;
        $assessment->appraiser_id = $request->staff_id;
        $assessment->accountability = $request->accountability;
        $assessment->integrity = $request->integrity;
        $assessment->judgement = $request->judgement;
        $assessment->communication = $request->communication;
        $assessment->quality = $request->quality;
        $assessment->quantity = $request->quantity;
        $assessment->leadership = $request->leadership;
        $assessment->safety = $request->safety;
        $assessment->commitment = $request->commitment;
        $assessment->planning = $request->planning;
        $save = $assessment->save();

        if ($save) {
            Alert::success('Assessment successfully saved!');

            return redirect()->back();
            }else{
                Session::flash('error', 'Assessment not saved. An error occured');
                return redirect()->back();
        }
    }

    public function sumup(Request $request)
    {
        $score = Assessment::all();
        $show = Assessment::where('appraiser_id', '' )->get();
        return $show;
    }
}
