<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Outlet;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $outlets = Outlet::all();
        return view('outlets.index',compact('outlets'));
    }

    /**
     * Show the form for creating a new resource.
    */
    public function create()
    {
        return view('outlets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }
        Outlet::create($request->all());
        History::create([
            'user_id' => auth()->user()->id,
            'action' => 'create',
            'table_name' => 'outlets',
            'record_id' => Outlet::latest()->first()->id,
            'description' => 'Created outlet '.$request->name,
        ]);
        return redirect()->route('outlets.index');
    }

    /**
     * Display the specified resource.
    */
    public function show(Outlet $outlet)
    {
        $transactions = $outlet->transactions()->latest()->get();
        return view('outlets.show', compact('outlet', 'transactions'));
    }


    /**
     * Show the form for editing the specified resource.
    */
    public function edit(Outlet $outlet)
    {
        return view('outlets.edit',compact('outlet'));
    }

    /**
     * Update the specified resource in storage.
    */
    public function update(Request $request, Outlet $outlet)
    {
        $rules = [
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }
        $outlet->name = $request->name;
        $outlet->phone = $request->phone;
        $outlet->phone = $request->address;
        $outlet->save();
        History::create([
            'user_id' => auth()->user()->id,
            'action' => 'update',
            'table_name' => 'outlets',
            'record_id' => $outlet->id,
            'description' => 'Updated outlet '.$request->name,
        ]);
        return redirect()->route('outlets.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Outlet $outlet)
    {
        $outlet->delete();
        History::create([
            'user_id' => auth()->user()->id,
            'action' => 'delete',
            'table_name' => 'outlets',
            'record_id' => $outlet->id,
            'description' => 'Deleted outlet '.$outlet->name,
        ]);
        return redirect()->route('outlets.index');
    }
}
