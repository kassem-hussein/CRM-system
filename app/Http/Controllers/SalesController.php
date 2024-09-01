<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sale::query()->paginate(5);
        return view('Sales.list',['sales'=>$sales]);
    }

    public function print(){
        $sales = Sale::all();
        return view('Sales.print',['sales'=>$sales]);
    }
}

