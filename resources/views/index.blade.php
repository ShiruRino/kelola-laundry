@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="card mt-5 mb-5">
    <div class="card-header">
        Dashboard
    </div>
    <div class="card-body">
        Hello, {{Auth::user()->username}}!
    </div>
</div>
@endsection
