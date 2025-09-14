@extends('layouts.app')
@section('title','Edit an User')
@section('content')

<div class="card md-5 mt-5">
    <div class="card-header">Edit an User</div>
    <div class="card-body">
        <form action="{{ route('users.update',$user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="input-group md-3 ">
                <input type="text" name="name" value="{{ $user->name }} " class="form-control">
            </div>
            <div class="input-group md-3 mt-3">
                <input type="text" name="username" value="{{ $user->username }} " class="form-control">
            </div>
            <div class="input-group md-3 mt-3">
                <input type="text" name="phone" value="{{ $user->phone }} " class="form-control">
            </div>
            <div class="input-group md-3 mt-3">
                <input type="text" name="password" class="form-control" placeholder="Password (If password edit unnecessary leave it empty)" >
            </div>
            <div class="input-group md-3 mt-3">
                <select name="role" class="form-select">
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="kasir" {{ $user->role == 'kasir' ? 'selected' : '' }}>Kasir</option>
                    <option value="owner" {{ $user->role == 'owner' ? 'selected' : '' }}>Owner</option>
                </select>
            </div>

            <button class="btn btn-success md-3 mt-3" type="submit">Sumbit</button>
        </form>
    </div>
</div>
@endsection