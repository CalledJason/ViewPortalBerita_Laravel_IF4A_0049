<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap
.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-white shadow-sm rounded-4 mt-4 mb-5">
    <div class="container">

        <a class="navbar-brand fw-bold fs-2" href="{{ url('/posts') }}">
            Jason<span class="text-primary">News</span>
        </a>

        {{-- Navbar Login --}}
        @if(request()->routeIs('login'))

            <a href="{{ route('register') }}" class="btn btn-primary">
                Register
            </a>

        {{-- Navbar Register --}}
        @elseif(request()->routeIs('register'))

            <a href="{{ route('login') }}" class="btn btn-dark">
                Login
            </a>

        {{-- Navbar selain Login/Register --}}
        @else

            <button class="navbar-toggler" data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav mx-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/posts') }}">
                            Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Nasional</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Global</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Teknologi</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Lifestyle</a>
                    </li>

                </ul>

                @guest

                    <a href="{{ route('login') }}" class="btn btn-dark">
                        Login
                    </a>

                @endguest

                @auth

                    <div class="dropdown">

                        <button class="btn btn-dark dropdown-toggle"
                                data-bs-toggle="dropdown">

                            Halo, {{ Auth::user()->name }}

                        </button>

                        <ul class="dropdown-menu dropdown-menu-end">

                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        Logout
                                    </button>
                                </form>
                            </li>

                        </ul>

                    </div>

                @endauth

            </div>

        @endif

    </div>
</nav>
@yield('body')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>