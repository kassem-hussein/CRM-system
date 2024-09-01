<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::query()->paginate(5);
        return view('Customers.list',['customers'=>$customers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Customers.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerRequest $request)
    {
        Customer::create($request->all());
        return redirect('/customers')->with('success',"messages.add_customer_m");
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customer::findOrFail($id);
        return view('Customers.edit',['customer'=>$customer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerRequest $request, string $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->update($request->all());
        return redirect('/customers')->with('success',"messages.update_customer_m");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect('/customers')->with('success',"messages.delete_customer_m");
    }
    public function print(){
        $customers = Customer::all();
        return view('Customers.print',['customers'=>$customers]);
    }
}
