@extends('layouts.app')
@section('title','Edit a Customer')
@section('content')

<div class="card mt-5 mb-5">
    <div class="card-header">Edit a Customer</div>
    <div class="card-body">
        <form action="{{ route('customers.update',$customer->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="input-group mb-3 ">
                <input type="text" name="name" value="{{ $customer->name}}" class="form-control">
            </div>
            <div class="input-group mb-3">
                <input type="text" name="phone" value="{{ $customer->phone}}" class="form-control">
            </div>
            <div class="input-group mb-3">
                <input type="text" name="address" value="{{ $customer->address}}" class="form-control">
            </div>

            <button class="btn btn-success mt-3" type="submit">Submit</button>
        </form>
    </div>
</div>

@endsection