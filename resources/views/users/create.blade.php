@extends('layouts.app')
@section('title','Create a New User')
@section('content')

<div class="card mt-5 md-5">
    <div class="card-header">Create a New User</div>
    <div class="card-body">
        <form action="{{ route('users.store') }}"  method="POST">
            @csrf
            @method('POST')

            <div class="input-group mt-3">
                <input type="text" name="name" placeholder="Name" class="form-control">
            </div>
            <div class="input-group mt-3">
                <input type="text" name="username" placeholder="Username" class="form-control">
            </div>
            <div class="input-group mt-3">
                <input type="text" name="password" placeholder="Password" class="form-control">
            </div>
            <div class="input-group mt-3">
                <input type="text" name="phone" placeholder="Phone Number" class="form-control">
            </div>
            <div class="input-group mt-3">
                <select class='form-select' name="role" >
                    <option value="">Select role</option>
                    <option value="admin">Admin</option>
                    <option value="kasir">Kasir</option>
                    <option value="owner">Owner</option>
                </select>
            </div>
            <button class="btn btn-success mt-3" type="submit">Submit</button>
          

        </form>
    </div>
</div>

@endsection