@extends('layouts.app')
@section('title','Edit a Product')
@section('content')

<div class="card mt-5 mb-5">
    <div class="card-header">Edit a Product</div>
    <div class="card-body">
        <form action="{{ route('products.update',$product->id)  }} " method="POST">
            @csrf
            @method('PUT')

            <div class="input-group mb-3">
                <input type="text" class="form-control" name="name" value="{{ $product->name }}" placeholder="Name" >
            </div>
            <div class="input-group mb-3">
                <textarea  class="form-control" name="description" placeholder="Description" >{{ $product->description }}</textarea>
            </div>
            <div class="input-group mb-3">
                <input type="number" class="form-control" name="price" value="{{ $product->price }}" placeholder="Price" >
            </div>
            <button class="btn btn-success" type="submit" >Submit</button>
        </form>
    </div>
</div>

@endsection