@extends('layouts.app')
@section('title','Edit an Product')
@section('content')
<a href="{{route('products.index')}}" class="btn btn-danger mt-5"><i class="bi bi-arrow-left"> </i>Back</a>
@if ($errors)
@foreach ($errors->all() as $i)
<div class="alert alert-danger mt-3">
    {{$i}}
</div>
@endforeach
@endif
<div class="card mt-5 mb-5" >
    <div class="card-header">Edit an Product</div>
    <div class="card-body">
        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Product's Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{old('name') ?? $product->name}}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Product's Description</label>
                <textarea  name="description" class="form-control" rows="3" placeholder="Description">{{old('description') ?? $product->descrition}}</textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Product's Price</label>
                <div class="input-group">
                    <span class="input-group-text">Rp</span>
                    <input type="number" name="price" class="form-control" placeholder="Price" value="{{old('price') ?? $product->price}}">
                </div>
            </div>
            <button class="btn btn-success">Submit</button>


        </form>
    </div>
</div>

@endsection
