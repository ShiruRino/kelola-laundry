@extends('layouts.app')
@section('title','Register a Customer')
@section('content')
<a href="{{route('customers.index')}}" class="btn btn-danger mt-5"><i class="bi bi-arrow-left"> </i>Back</a>
@if ($errors)
@foreach ($errors->all() as $i)
<div class="alert alert-danger mt-3">
    {{$i}}
</div>
@endforeach
@endif
<div class="card mt-5">
    <div class="card-header">Register a Customer</div>
    <div class="card-body">
        <form action="{{ route('customers.store') }}" method="POST">
            @csrf
            @method('POST')

            <div class="mb-3">
                <label for="name" class="form-label">Customer's Name</label>
                <input type="text" name="name" placeholder="Name" class="form-control" value="{{old('name')}}">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Customer's Number</label>
                <input type="text" name="phone" placeholder="Phone Number" class="form-control" value="{{old('phone')}}">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Customer's Address</label>
                <input type="text" name="address" placeholder="Address" class="form-control" value="{{old('address')}}">
            </div>
            <button class="btn btn-success mt-3" type="submmit">Submit</button>
        </form>
    </div>
</div>

@endsection
