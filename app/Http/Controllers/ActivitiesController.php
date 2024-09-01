<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivityRequest;
use App\Models\Activity;
use App\Models\Opportunity;
use Illuminate\Http\Request;

class ActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activites =  Activity::query()->paginate(5);
        return view('Activities.list',['activities'=>$activites]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $opportunities = Opportunity::all();
        return view('Activities.add',['opportunities'=>$opportunities]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ActivityRequest $request)
    {
        Activity::create($request->all());
        return redirect('/activities')->with('success','messages.add_activity_m');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $activity = Activity::findOrFail($id);
        $opportunities = Opportunity::all();
        return view('Activities.edit',['opportunities'=>$opportunities,"activity"=>$activity]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ActivityRequest $request, string $id)
    {
        $activity = Activity::findOrFail($id);
        $activity->update($request->all());
        return redirect('/activities')->with('success',"messages.update_activity_m");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $activity = Activity::findOrFail($id);
        $activity->delete();
        return redirect('/activities')->with('success','messages.delete_activity_m');
    }

    public function print(){
        $activites = Activity::all();
        return view('Activities.print',['activities'=>$activites]);
    }
}
