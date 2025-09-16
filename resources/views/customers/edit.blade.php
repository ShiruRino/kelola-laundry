@extends('layouts.app')
@section('title','Edit a Customer')
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
    <div class="card-header">Edit a Customer</div>
    <div class="card-body">
        <form action="{{ route('customers.update',$customer->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="phone" class="form-label">Customer's Name</label>
                <input type="text" name="name" placeholder="Name" class="form-control" value="{{old('name') ?? $customer->name}}">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Customer's Number</label>
                <input type="text" name="phone" placeholder="Phone Number" class="form-control" value="{{old('phone') ?? $customer->phone}}">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Customer's Address</label>
                <input type="text" name="address" placeholder="Address" class="form-control" value="{{old('address') ?? $customer->address}}">
            </div>
            <button class="btn btn-success mt-3" type="submmit">Submit</button>
        </form>
    </div>
</div>

@endsection
