@extends('layouts.app')
@section('title', 'Create a New Outlet')
@section('content')
<a href="{{route('outlets.index')}}" class="btn btn-danger mt-5"><i class="bi bi-arrow-left"></i>Back</a>
<div class="card mt-5 mb-5">
    <div class="card-header">Create a New Outlet</div>
    <div class="card-body">
        <form action="{{route('outlets.store')}}" method="post">
            @csrf
            @method('POST')
            <div class="mb-3">
                <label for="name" class="form-label">Outlet's Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Outlet's Number</label>
                <input type="text" name="phone" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Outlet's Address</label>
                <input type="text" name="address" class="form-control" required>
            </div>
            <button class="btn btn-success" type="submit">Submit</button>
        </form>
    </div>
</div>
@endsection
