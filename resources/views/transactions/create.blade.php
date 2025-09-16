@extends('layouts.app')
@section('title', 'Create a Transaction')
@section('content')
@if ($outlet)
<a href="{{route('outlets.show',$outlet->id)}}" class="btn btn-danger mt-5"><span><i class="bi bi-arrow-left"></i> Back</span></a>
@endif
@if ($errors)
@foreach ($errors->all() as $i)
<div class="alert alert-danger mt-5">{{$i}}</div>
@endforeach
@endif
<div class="card mt-5 mb-5">
<div class="card-header">Create a New Transaction</div>
<div class="card-body">
    <form action="{{route('transactions.store')}}" method="POST">
        @csrf
        @method('POST')
        <div class="mb-3">
            <label for="customer_phone" class="form-label">Customer's Phone Number</label>
            <input type="text" class="form-control" name="customer_phone" placeholder="Phone Number" value="{{old('customer_phone')}}">
        </div>
        <div class="mb-3">
            <label for="outlet_id" class="form-label">Current Outlet</label>
            <select name="outlet_id" class="form-select" disabled>
                <option value="{{$outlet->id}}" selected>{{$outlet->name}}</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="product_id" class="form-label">Product</label>
            <select name="product_id" class="form-select">
                <option value="">Select Product</option>
                @foreach ($products as $product)
                <option value="{{$product->id}}" {{$product->id == old('product_id') ? 'selected' : ''}}>{{$product->name}} || Rp{{$product->price}}</option>
                @endforeach
            </select>
        </div>
        <input type="hidden" value="{{$outlet->id}}" name="outlet_id">
        <button class="btn btn-success" type="submit">Submit</button>
    </form>
</div>
</div>
@endsection
