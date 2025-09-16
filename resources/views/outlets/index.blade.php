@extends('layouts.app')
@section('title', 'Manage Outlets')
@section('content')
<a href="{{route('outlets.create')}}" class="btn btn-success mt-5">Create</a>
    <div class="card mt-4 mb-5">
        <div class="card-header">
            @if (Auth::user()->role === 'admin')
                Manage Outlets
            @else
                Outlets
            @endif
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                @php
                    $no = 1
                @endphp
                <tbody>
                    @foreach ($outlets as $outlet)
                    <tr>
                        <th scope='row'>{{$no++}}</th>
                        <td>{{$outlet->name}}</td>
                        <td>{{$outlet->phone}}</td>
                        <td>{{$outlet->address}}</td>
                        <td class="d-flex" style="gap: 0.5rem;">
                            <a href="{{route('outlets.show',$outlet->id)}}" class="btn btn-primary">Show</a>
                            @if ('admin')
                            <a href="{{route('outlets.edit',$outlet->id)}}" class="btn btn-warning">Edit</a>
                            <form action="{{route('outlets.destroy',$outlet->id)}}" method="post">
                                @csrf
                                @method('POST')
                                <button class="btn btn-danger" type="submit" onclick="confirm('Are you sure?')">Delete</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
