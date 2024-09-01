<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeadRequest;
use App\Models\Customer;
use App\Models\Lead;
use Illuminate\Http\Request;

class LeadsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leads = Lead::query()->paginate(5);
        return view('Leads.list',['leads'=>$leads]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers  = Customer::query()->get(['name','id']);
        return view('Leads.add',['customers'=>$customers]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LeadRequest $request)
    {
        Lead::create($request->all());
        return redirect('/leads')->with('success','messages.add_lead_m');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lead =Lead::findOrFail($id);
        $customers = Customer::query()->get(['name','id']);
        return view('Leads.edit',['customers'=>$customers,'lead'=>$lead]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LeadRequest $request, string $id)
    {
        $lead = Lead::findOrFail($id);
        $lead->update($request->all());
        return redirect('/leads')->with('success','messages.update_lead_m');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lead = Lead::findOrFail($id);
        $lead->delete();
        return redirect('/leads')->with('success','messages.delete_lead_m');
    }
    public function print(){
        $leads = Lead::all();
        return view('Leads.print',['leads'=>$leads]);
    }
}
