@extends('layouts.app')
@section('title','Create a New User')
@section('content')
<a href="{{route('users.index')}}" class="btn btn-danger mt-5"><i class="bi bi-arrow-left"> </i>Back</a>
@if ($errors)
@foreach ($errors->all() as $i)
<div class="alert alert-danger mt-3">
    {{$i}}
</div>
@endforeach
@endif
<div class="card mt-5">
    <div class="card-header">Create a New User</div>
    <div class="card-body">
        <form action="{{ route('users.store') }}"  method="POST">
            @csrf
            @method('POST')

            <div class="mb-3">
                <label for="name" class="form-label">User's Name</label>
                <input type="text" name="name" placeholder="Name" class="form-control">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">User's Username</label>
                <input type="text" name="username" placeholder="Username" class="form-control">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">User's Password</label>
                <input type="password" name="password" placeholder="Password" class="form-control">
            </div>
            <div class="mb-3">
                <label for="confirmPassword" class="form-label">Confirm Password</label>
                <input type="password" name="confirmPassword" placeholder="Confirm Password" class="form-control">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">User's Number</label>
                <input type="text" name="phone" placeholder="Phone Number" class="form-control">
            </div>
            <div class="mb-3">
                <select class='form-select' name="role" >
                    <option value="">Select Role</option>
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
