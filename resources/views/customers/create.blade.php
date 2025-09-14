@extends('layouts.app')
@section('title','Manage Customers')
@section('content')

<div class="card mt-5">
    <div class="card-header">Manage Customers</div>
    <div class="card-body">
        <form action="{{ route('customers.store') }}" method="POST">
            @csrf
            @method('POST')

            <div class="input-group mb-3">
                <input type="text" name="name" placeholder="Name" class="form-control">
            </div>
            <div class="input-group mb-3">
                <input type="text" name="phone" placeholder="Phone" class="form-control">
            </div>
            <div class="input-group mb-3">
                <input type="text" name="address" placeholder="Adress" class="form-control">
            </div>
            <button class="btn btn-success mt-3" type="submmit">Submit</button>
        </form>
    </div>
</div>

@endsection
