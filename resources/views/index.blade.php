@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="card mt-5 mb-4">
    <div class="card-header">
        Dashboard
    </div>
    <div class="card-body">
        Hello, {{Auth::user()->username}}!
    </div>
</div>
<div class="card">
    <div class="card-header">Laundry Data</div>
    <div class="card-body text-center">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">Registered Outlets</div>
                    <div class="card-body fs-1">{{$outlets}}</div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">Registered Products</div>
                    <div class="card-body fs-1">{{$products}}</div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">Registered Users</div>
                    <div class="card-body fs-1">{{$users}}</div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">Registered Customers</div>
                    <div class="card-body fs-1">{{$customers}}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
