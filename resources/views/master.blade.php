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
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm rounded-4 px-4 py-3 mb-5 container mt-3">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold fs-2" href="/posts">
            Jason<span class="text-primary">News</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="/posts">Home</a>
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

            @auth
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-outline-dark">Logout</button>
            </form>
            @else
            <a href="{{ route('login') }}" class="btn btn-dark">Login</a>
            @endauth
        </div>
    </div>
</nav>
@yield('body')
</body>
</html>