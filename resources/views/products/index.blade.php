@extends ('layouts.app')
@section('title','Manage Products')
@section('content')

<a href="{{ route('products.create') }}" class="btn btn-success mb-4 mt-5">Create</a>
<div class="card">
    <div class="card-header">Manage Products</div>
    <div class="card-body">
        <table class="table">
            @php
            $no = 1;
            @endphp
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $i)

                <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $i->name }}</td>
                    <td>{{ $i->description ?? '-' }}</td>
                    <td>Rp{{ $i->price }}</td>
                    <td class="d-flex" style="gap: 0.5rem;">
                        <a href="{{ route('products.edit',$i->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('products.destroy',$i->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
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
