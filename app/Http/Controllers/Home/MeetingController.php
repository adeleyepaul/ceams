<?php

namespace App\Http\Controllers\Home;

use App\Workshops;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meeting = Workshops::orderBy('id', 'DESC')->where('staff_id', Auth::id())->get();
        return view ('appraisee.achievements.workshops.index', compact('meeting'));
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
        $this->validate($request, [
            'title' => 'required',
            'venue' => 'required',
            'duration' => 'required',
            'date' => 'required',
        ]);

        $workshop = new Workshops();
        $workshop->staff_id = Auth::id();
        $workshop->title = $request->title;
        $workshop->venue = $request->venue;
        $workshop->duration = $request->duration;
        $workshop->date = $request->date;

        $save = $workshop->save();

        if ($save) {
            Session::flash('message', 'New workshop added successfully');
            return redirect()->route('meetings.index');
        }else{
            Session::flash('error', 'Workshop failed to be added');
            return redirect()->route('meetings.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'venue' => 'required',
            'duration' => 'required',
            'date' => 'required',
        ]);

        $workshop = Workshops::findOrFail($id);
        $workshop->staff_id = Auth::id();
        $workshop->title = $request->title;
        $workshop->venue = $request->venue;
        $workshop->duration = $request->duration;
        $workshop->date = $request->date;

        $save = $workshop->save();

        if ($save) {
            Session::flash('message', 'workshop updated successfully');
            return redirect()->route('meetings.index');
        }else{
            Session::flash('error', 'Study workshop failed to be updated');
            return redirect()->route('meetings.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $workshop = Workshops::findOrFail($id);
        if ($workshop->delete()) {
            Session::flash('message', 'Deleted successfully');
            return redirect()->route('meetings.index');
        }else{
            Session::flash('error', 'Failed to delete');
            return redirect()->route('meetings.index');
        }
    }
}
