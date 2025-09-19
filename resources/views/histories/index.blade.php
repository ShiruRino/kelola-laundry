@extends('layouts.app')
@section('title', 'History Log')
@section('content')
<div class="card">
    <div class="card-header">History Log</div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Action</th>
                    <th scope="col">Table Name</th>
                    <th scope="col">Record ID</th>
                    <th scope="col">Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($histories as $i)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$i->user->username}}</td>
                    <td>{{$i->action}}</td>
                    <td>{{$i->table_name}}</td>
                    <td>{{$i->record_id}}</td>
                    <td>{{$i->description}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
