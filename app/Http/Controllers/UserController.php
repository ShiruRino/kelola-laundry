<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'username' => 'required',
            'phone' => 'required',
            'role' => 'required|in:kasir,owner,admin',
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }
        User::create($request->all());
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
    */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
    */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
    */
    public function update(Request $request, string $id)
    {
        $rules = [
            'name' => 'required',
            'username' => 'required',
            'phone' => 'required',
            'role' => 'required|in:kasir,owner,admin',
        ];
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
