<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Laundry')</title>
    <link rel="icon" type="image/x-icon" href="{{asset('storage/logo/logo.png')}}"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body, html{
            margin: 0px;
            padding: 0px;
        }
        body{
            display: grid;
            grid-template-columns: 20% 80%;
        }
        .sidebar-brand{
            text-align: center;
        }
        .sidebar-brand a{
            color: white;
            text-decoration: none;
            font-weight: bold;
            font-size: 2rem;
        }
        .sidebar-brand a:hover{
            text-decoration: underline;
        }
        .list-group{
            background-color: rgba(var(--bs-dark-rgb),var(--bs-bg-opacity))!important;
        }
    </style>
</head>
<body>
    <aside class="sidebar bg-dark vh-100">
        <div class="sidebar-brand mb-4"><a href="{{route('index')}}"><img src="{{asset('storage/logo/logo.png')}}" alt="logo" width="40rem"> Laundry</a></div>
        <div class="container text-white">
            <a href="{{route('index')}}" class="list-group-item mb-3">Dashboard</a>
            @if (Auth::user()->role === 'admin')
            <a href="{{route('outlets.index')}}" class="list-group-item mb-3">Manage Outlets</a>
            <a href="{{route('products.index')}}" class="list-group-item mb-3">Manage Products</a>
            <a href="{{route('users.index')}}" class="list-group-item mb-3">Manage Users</a>
            @endif
            @if (Auth::user()->role === 'admin' || Auth::user()->role === 'kasir')
            <a href="{{route('customers.index')}}" class="list-group-item mb-3">Manage Customers</a>
            @endif
            @if(Auth::user()->role !== 'admin')
            <a href="{{route('outlets.index')}}" class="list-group-item mb-3">Outlets</a>
            @endif
            <form action="{{route('auth.logout')}}" method="post">
                @csrf
                @method('POST')
                <button class="btn btn-danger" type="submit" onclick="confirm('Logout')">Logout</button>
            </form>
        </div>
    </aside>
    <div class="container">
        @yield('content')
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</html>
