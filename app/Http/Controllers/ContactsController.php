<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Customer;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::query()->paginate(5);
        return view('Contacts.list',['contacts'=>$contacts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customer = null;
        if(request()->query('customer')){
            $customer = Customer::findOrFail(request()->query('customer'));
        }
        $cutomers =  Customer::query()->get(['name','id']);
        return view('Contacts.add',['customers'=>$cutomers,'customer'=>$customer]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactRequest $request)
    {
        Contact::create($request->all());
        return redirect('/contacts')->with('success','messages.add_contact_m');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contact = Contact::findOrFail($id);
        $customer = $contact->customer;
        if(request()->query('customer')){
            $customer =  Customer::findOrFail(request()->query('customer'));
        }
        $customers = Customer::query()->get(['name','id']);
        return view('contacts.edit',['customers'=>$customers,'customer'=>$customer,'contact'=>$contact]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactRequest $request, string $id)
    {
        $contact = Contact::findorFail($id);
        $contact->update($request->all());
        return redirect('/contacts')->with('success','messages.update_contact_m');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact= Contact::findOrFail($id);
        $contact->delete();
        return redirect('/contacts')->with('success','messages.delete_contact_m');
    }
    public function print(){
        $contacts = Contact::all();
        return view('Contacts.print',['contacts'=>$contacts]);
    }
}
