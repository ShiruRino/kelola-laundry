<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
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
            'password' => 'required',
            'confirmPassword' => 'required|same:password',
            'role' => 'required|in:kasir,owner,admin',
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }
        User::create([
            'name'=> $request->name,
            'username'=>$request->username,
            'phone'=>$request->phone,
            'password'=> Hash::make($request->password),
            'role'=>$request->role,
        ]);
        History::create([
            'user_id' => auth()->user()->id,
            'action' => 'create',
            'table_name' => 'users',
            'record_id' => User::latest()->first()->id,
            'description' => 'Created user '.$request->name,
        ]);
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
        $user = User::find($id);
        $rules = [
            'name' => 'required',
            'username' => 'required',
            'phone' => 'required',
            'password' => 'nullable',
            'confirmPassword' => 'nullable|same:password',
            'role' => 'required|in:kasir,owner,admin',
        ];

        $validator= Validator::make($request->all(),$rules);
        if($validator->fails()){
            return back()->withInput()->withErrors($validator);

        }
        $user->name = $request->name;
        $user->username=$request->username;
        $user->phone=$request->phone;
        $user->password=$request->password ?? $user->password;
        $user->role=$request->role;

        $user->save();
        History::create([
            'user_id' => auth()->user()->id,
            'action' => 'update',
            'table_name' => 'users',
            'record_id' => $user->id,
            'description' => 'Updated user '.$request->name,
        ]);
        return redirect()->route('users.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        History::create([
            'user_id' => auth()->user()->id,
            'action' => 'delete',
            'table_name' => 'users',
            'record_id' => $user->id,
            'description' => 'Deleted user '.$user->name,
        ]);
        return redirect()->route('users.index');
    }
}
