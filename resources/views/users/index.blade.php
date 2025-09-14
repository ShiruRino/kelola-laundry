@extends('layouts.app')
@section('title','Manage Users')
@section('content')

<a href="{{ route('users.create') }}" class="btn btn-success mt-5">Create</a>
<div class="card mt-5 md-5">
    <div class="card-header">Manage Users</div>
    <div class="card-body">
        <table class="table">
            @php
            $no=1;
            @endphp
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>

            </thead>
            <tbody>
                @foreach ($users as $i)
                <tr>
                    <th scope="row">{{$no++}}</th>
                    <td>{{ $i->name }}</td>
                    <td>{{ $i->username }}</td>
                    <td>{{ $i->phone }}</td>
                    <td>{{ $i->role }}</td>
                    <td class="d-flex" style= gap:0.5rem;>
                        <a href="{{ route('users.edit',$i->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('users.destroy',$i->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger" type="submit" onclick="confirm('Are you sure?')" >Delete</button>


                        </form>
                    </td>
                </tr>
                
                @endforeach

            </tbody>
        </table>
    </div>
</div>

@endsection