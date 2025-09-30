<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Product;
use Illuminate\Http\Request;
use Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }
        Product::create($request->all());
        History::create([
            'user_id' => auth()->user()->id,
            'action' => 'create',
            'table_name' => 'products',
            'record_id' => Product::latest()->first()->id,
            'description' => 'Created product '.$request->name,
        ]);
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
    */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
    */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
    */
    public function update(Request $request, Product $product)
    {
        $rules = [
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();
        History::create([
            'user_id' => auth()->user()->id,
            'action' => 'update',
            'table_name' => 'products',
            'record_id' => $product->id,
            'description' => 'Updated product '.$request->name,
        ]);
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        History::create([
            'user_id' => auth()->user()->id,
            'action' => 'delete',
            'table_name' => 'products',
            'record_id' => $product->id,
            'description' => 'Deleted product '.$product->name,
        ]);
        return redirect()->route('products.index');
    }
}
