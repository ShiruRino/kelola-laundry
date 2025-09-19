@extends('layouts.app')
@section('title','Manage Customers')
@section('content')

<a href="{{ route('customers.create') }}" class="btn btn-success mt-5">Create</a>
<div class="card mb-5 mt-4">
    <div class="card-header">Manage Customers</div>
    <div class="card-body">

    <table class="table">
        @php
        $no = 1;
        @endphp
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Address</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $i )
            <tr>
                <th scope="row">{{ $no++ }}</th>
                <td>{{ $i->name }}</td>
                <td>{{ $i->phone }}</td>
                <td>{{ $i->address }}</td>
                <td class="d-flex" style="gap:0.5rem">
                    <a href="{{ route('customers.edit',$i->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('customers.destroy',$i->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger" type="Submit">Delete</button>
                    </form>
                </td>
            </tr>


            @endforeach
        </tbody>
    </table>
    </div>
</div>

@endsection
