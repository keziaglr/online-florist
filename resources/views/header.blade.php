<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Florist</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/lux/bootstrap.min.css">

</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
            <a class="navbar-brand" href="{{url('home')}}">Online Florist</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor03">
                <ul class="navbar-nav me-auto">
                    @if (auth()->user() == NULL)
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('user/login')}}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('user/register')}}">Register</a>
                    </li>
                    @endif
                    @if(auth()->user() != NULL)
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('cart')}}">Cart</a>
                        </li>
                        @if (auth()->user()->role  == 'admin')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="menu" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Admin Menu</a>
                            <div class="dropdown-menu ">
                              <a class="dropdown-item" href="{{url('flower')}}">Manage Flower</a>
                              <a class="dropdown-item" href="{{url('flower/type')}}">Manage Flower Type</a>
                              <a class="dropdown-item" href="{{url('courier')}}">Manage Courier</a>
                              <a class="dropdown-item" href="{{url('user')}}">Manage Users</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="{{url('transaction')}}">Transaction History</a>
                            </div>
                        </li>
                        @endif
                    @endif
                </ul>
                <p>{{now()}}</p>
                @if (auth()->user() != NULL)
                <ul style="list-style: none">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="menu" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{auth()->user()->name}}</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{url('user/profile')}}">Profile</a>
                            <a class="dropdown-item" href="{{url('logout')}}">Log Out</a>
                        </div>
                    </li>
                </ul>
                @endif
            </div>
            </div>
        </nav>

    </header>
    @yield('content')
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>

