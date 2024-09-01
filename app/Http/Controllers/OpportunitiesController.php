<?php

namespace App\Http\Controllers;

use App\Http\Requests\OpportunityRequest;
use App\Models\Lead;
use App\Models\Opportunity;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;

class OpportunitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $opportunities = null;
        $stage = request('stage','all');
        if($stage == "all"){
            $opportunities = Opportunity::query()->paginate(5);
        }else{
            $opportunities = Opportunity::where('stage',$stage)->paginate(5);
        }
        $opportunities->withQueryString();
        return view('Opportunities.list',['opportunities'=>$opportunities]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $leads = Lead::all();
        $products =  Product::all();

        return view('Opportunities.add',['leads'=>$leads,'products'=>$products]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OpportunityRequest $request)
    {
        $opportunity = Opportunity::create($request->all());
        if($request->stage == "won"){
            Sale::create([
                "opportunity_id"=>$opportunity->id,
                "product_id"=>$opportunity->product_id,
                "quantity"=>$opportunity->quantity,
                "amount"=>$opportunity->excpected_revenue
            ]);
        }
        return redirect('/opportunities')->with('success','messages.add_opportunity_m');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $opportunity = Opportunity::findOrFail($id);
        $leads = Lead::all();
        $products = Product::all();
        return view('Opportunities.edit',['opportunity'=>$opportunity,'leads'=>$leads,'products'=>$products]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OpportunityRequest $request, string $id)
    {
        $opportunity = Opportunity::findOrFail($id);
        if($opportunity->stage == "won"){
            return redirect('/opportunities')->with("error","can't_updated_opportunity_after_set_stage_won");
        }
        if($request->stage == "won" && $opportunity->stage != "won"){
            Sale::create([
                "opportunity_id"=>$opportunity->id,
                "product_id"=>$opportunity->product_id,
                "quantity"=>$opportunity->quantity,
                "amount"=>$opportunity->excpected_revenue
            ]);
        }
        $opportunity->update($request->all());
        return redirect('/opportunities')->with('success','messages.update_opportunity_m');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $opportunity = Opportunity::findOrFail($id);
        $opportunity->delete();
        return redirect('/opportunities')->with('success','messages.delete_opportunity_m');
    }
    public function print(){
        $opportunities = Opportunity::all();
        return view('Opportunities.print',['opportunities'=>$opportunities]);
    }
}
