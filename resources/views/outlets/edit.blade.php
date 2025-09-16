@extends('layouts.app')
@section('title', 'Edit an Outlet')
@section('content')
<a href="{{route('outlets.index')}}" class="btn btn-danger mt-5"><i class="bi bi-arrow-left"> </i>Back</a>
@if ($errors)
@foreach ($errors->all() as $i)
<div class="alert alert-danger mt-3">
    {{$i}}
</div>
@endforeach
@endif
<div class="card mt-5 mb-5">
    <div class="card-header">Edit an Outlet</div>
    <div class="card-body">
        <form action="{{route('outlets.update',$outlet->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Outlet's Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{old('name' ?? $outlet->name)}}">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Outlet's Number</label>
                <input type="text" name="phone" class="form-control" placeholder="Phone Number" value="{{old('phone') ?? $outlet->phone}}">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Outlet's Address</label>
                <input type="text" name="address" class="form-control" placeholder="Address" value="{{old('address') ?? $outlet->address}}">
            </div>
            <button class="btn btn-success" type="submit">Submit</button>
        </form>
    </div>
</div>
@endsection
