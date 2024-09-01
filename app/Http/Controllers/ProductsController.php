<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::query()->paginate(5);
        return view('Products.list',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Products.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        Product::create($request->all());
        return redirect('/products')->with('success','messages.add_product_m');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('Products.edit',['product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect('/products')->with('success','messages.update_product_m');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $product  = Product::findOrFail($id);
       $product->delete();
       return redirect('/products')->with('success','messages.delete_product_m');
    }
    public function print(){
        $products = Product::all();
        return view('Products.print',['products'=>$products]);
    }
}
