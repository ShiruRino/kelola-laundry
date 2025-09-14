@extends('layouts.app')
@section('title','Create a New Project')
@section('content')

<div class="card mt-5 mb-5" >
    <div class="card-header">Create a New Product</div>
    <div class="card-body">
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            @method('POST')

            <div class="input-group mb-3">
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
            <div class="input-group mb-3">
                <textarea  name="description" class="form-control" rows="3" placeholder="Description"></textarea>
            </div>
            <div class="input-group mb-3">
                <input type="number" name="price" class="form-control" placeholder="Price">
            </div>
            <button class="btn btn-success">Submit</button>
            

        </form>
    </div>
</div>

@endsection