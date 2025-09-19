@extends('layouts.app')
@section('title', 'Edit a Transaction Status')
@section('content')
<a href="{{route('outlets.show',$transaction->outlet->id)}}" class="btn btn-danger mt-5"><i class="bi bi-arrow-left"></i> Back</a>
<div class="card mt-5 mb-5">
    <div class="card-header">Transaction Info</div>
    <div class="card-body">
        <table class="table" style="width: 20rem;">
            <tbody>
                <tr>
                    <th scope="row">ID</th>
                    <td>{{$transaction->id}}</td>
                </tr>
                <tr>
                    <th scope="row">User</th>
                    <td>{{$transaction->user->username}}</td>
                </tr>
                <tr>
                    <th scope="row">Outlet</th>
                    <td>{{$transaction->outlet->name}}</td>
                </tr>
                <tr>
                    <th scope="row">Product</th>
                    <td>{{$transaction->product->name}}</td>
                </tr>
                <tr>
                    <th scope="row">Status</th>
                    <td>{{$transaction->status}}</td>
                </tr>
                <tr>
                    <th scope="row">Status</th>
                    <td>{{$transaction->status}}</td>
                </tr>
                <tr>
                    <th scope="row">Total Price</th>
                    <td>{{$transaction->total_price}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="card">
    <div class="card-header">Edit Status</div>
    <div class="card-body">
        <form action="{{route('transactions.update',$transaction->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <select name="status" class="form-select">
                    <option value="pending" {{$transaction->status == 'pending' ? 'selected' : ''}}>PENDING</option>
                    <option value="processing" {{$transaction->status == 'processing' ? 'selected' : ''}}>PROCESSING</option>
                    <option value="done" {{$transaction->status == 'done' ? 'selected' : ''}}>DONE</option>
                </select>
            </div>
            <button class="btn btn-success" type="submit">Submit</button>
        </form>
    </div>
</div>
@endsection
