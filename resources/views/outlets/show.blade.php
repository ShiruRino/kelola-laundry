@extends('layouts.app')
@section('title', $outlet->name)
@section('content')
<a href="{{route('outlets.index')}}" class="btn btn-danger mt-5"><i class="bi bi-arrow-left"></i> Back</a>
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
<a href="{{route('transactions.create',['outlet_id' => $outlet->id])}}" class="btn btn-success mb-5">Create a Transaction</a>
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
                <th scope="col">VAT Fee</th>
                <th scope="col">Late Fee</th>
                <th scope="col">Total Price</th>
                <th scope="col">Action</th>
            </thead>
            <tbody>
                @foreach ($transactions as $i )
                <tr>
                    <th scope="row">{{$no++}}</th>
                    <td>{{ $i->user->username }}</td>
                    <td>{{ $i->customer->name }}</td>
                    <td>{{ $i->outlet->name }}</td>
                    <td>{{ $i->product->name }}</td>
                    <td>
                        @if ($i->status == 'pending')
                        <span class="text-warning">{{Str::upper($i->status)}}</span>
                        @elseif ($i->status == 'processing')
                        <span class="text-primary">{{Str::upper($i->status)}}</span>
                        @else
                        <span class="text-success">{{Str::upper($i->status)}}</span>
                        @endif
                    </td>
                    <td>{{ $i->done_at ?? '-' }}</td>
                    <td><span class="{{$i->picked_up ? 'text-primary' : 'text-danger'}}">{{$i->picked_up ? 'TRUE' : 'FALSE'}}</span></td>
                    <td>Rp{{ $i->vat_fee }}</td>
                    <td>Rp{{ $i->late_fee }}</td>
                    <td>Rp{{ $i->total_price }}</td>
                    <td class="d-flex" style="gap: 0.5rem;">
                        @if ($i->status === 'done')
                        <form action="{{route('transactions.pickup',$i->id)}}" method="POST" onsubmit=" return confirm('Are you sure?')">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-success" type="submit">Pickup</button>
                        </form>
                        @endif
                        @if (!$i->picked_up)
                        <a href="{{route('transactions.edit',$i->id)}}" class="btn btn-warning">Edit</a>
                        @endif
                        <form action="{{route('transactions.destroy',$i->id)}}" method="POST" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
