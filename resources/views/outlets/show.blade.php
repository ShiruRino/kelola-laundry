@extends('layouts.app')
@section('title', $outlet->name)
@section('content')
<a href="{{route('outlets.index')}}" class="btn btn-danger mt-5"><i class="bi bi-arrow-left"></i>Back</a>
<div class="card mt-5 mb-5">
    <div class="card-header fs-2">{{$outlet->name}}</div>
    <div class="card-body">
        <div class="list-group list-group-flush">
            <div class="list-group-item">
                Number: {{$outlet->phone}}
            </div>
            <div class="list-group-item">
                Address: {{$outlet->address}}
            </div>
        </div>
    </div>
</div>
<div class="card mb-5">
    <div class="card-header">Manage Transactions</div>
    <div class="card-body">
        @php
        $no = 1;
        @endphp
        <table class="table">
            <thead>
                <th scope="col">#</th>
                <th scope="col">User</th>
                <th scope="col">Customer</th>
                <th scope="col">Outlet</th>
                <th scope="col">Product</th>
                <th scope="col">Status</th>
                <th scope="col">Done At</th>
                <th scope="col">Picked Up</th>
            </thead>
            <tbody>
                @foreach ($transactions as $i )
                <tr>
                    <th scope="row">$no++</th>
                    <td>{{ $i->user->username }}</td>
                    <td>{{ $i->customer->name }}</td>
                    <td>{{ $i->outlet->name }}</td>
                    <td>{{ $i->product->name }}</td>
                    <td>{{ $i->status }}</td>
                    <td>{{ $i->done_at }}</td>
                    <td>{{ $i->picked_up }}</td>
                </tr>
                
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
