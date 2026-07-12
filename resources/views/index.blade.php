@extends('master')

@section('title', 'Jason News')

@section('body')

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

<style>
    body {
        background: #f5f5f5;
    }
    
    .navbar-brand {
        letter-spacing: 1px;
    }
    
    .nav-link {
        font-weight: 500;
        margin: 0 10px;
        transition: .3s;
    }
    
    .nav-link:hover {
        color: #0d6efd !important;
    }
    
    .nav-link.active {
        color: #0d6efd !important;
        font-weight: 700;
    }

    /* --- HERO SECTION --- */
    .hero {
        position: relative;
        border-radius: 20px;
        overflow: hidden;
        margin-top: 10px;
        margin-bottom: 40px;
    }
    
    .hero img {
        width: 100%;
        height: 420px;
        object-fit: cover;
    }
    
    .hero-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to right, rgba(0,0,0,.85), rgba(0,0,0,.35));
    }
    
    .hero-content {
        position: absolute;
        top: 50%;
        left: 60px;
        transform: translateY(-50%);
        color: white;
        max-width: 620px;
    }
    
    .hero-category {
        background: #d4af37;
        display: inline-block;
        padding: 8px 18px;
        border-radius: 30px;
        font-weight: 600;
        margin-bottom: 20px;
        font-size: 14px;
    }
    
    .hero-title {
        font-size: 42px;
        font-weight: 700;
        line-height: 1.2;
    }
    
    .hero-desc {
        margin-top: 15px;
        font-size: 16px;
        color: #eee;
    }
    
    .hero-btn {
        margin-top: 25px;
    }

    /* --- SECTION TITLE (BIAR KANAN KIRI SEJAJAR) --- */
    .section-title {
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 20px;
        height: 40px; /* Mengunci tinggi font judul agar sejajar lurus */
        display: flex;
        align-items: center;
    }
    
    /* --- LATEST NEWS --- */
    .news-card {
        background: white;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,.04);
        transition: .3s;
        border: none;
    }
    
    .news-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,.08);
    }
    
    .news-card img {
        width: 100%;
        height: 100%;
        min-height: 220px;
        object-fit: cover;
    }
    
    .news-body {
        padding: 25px;
    }
    
    .news-title {
        font-size: 22px;
        font-weight: 700;
        margin-bottom: 10px;
        line-height: 1.3;
    }
    
    .news-text {
        color: #777;
        margin-bottom: 15px;
    }

    /* --- SIDEBAR TRENDING --- */
    .sidebar-card {
        background: white;
        border-radius: 18px;
        padding: 25px;
        box-shadow: 0 4px 15px rgba(0,0,0,.04);
    }
    
    .popular-item {
        display: flex;
        align-items: flex-start;
        gap: 15px;
        margin-bottom: 20px;
        padding-bottom: 20px;
        border-bottom: 1px solid #f0f0f0;
    }

    .popular-item:last-child {
        margin-bottom: 0;
        padding-bottom: 0;
        border-bottom: none;
    }
    
    .popular-number {
        font-size: 32px;
        color: #d4af37;
        font-weight: bold;
        line-height: 1;
    }

    .popular-title {
        font-weight: 700;
        font-size: 15px;
        margin-bottom: 5px;
        color: #333;
        line-height: 1.4;
    }

    .popular-text {
        font-size: 13px;
        color: #777;
    }
</style>

<div class="container mb-5">
    
    {{-- HERO --}}
    <div class="hero">
        <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=1600">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <div class="hero-category">BREAKING NEWS</div>
            <h1 class="hero-title">
                {{ $featured->title }}
            </h1>
            <p class="hero-desc">
                {{ \Illuminate\Support\Str::limit($featured->content, 150) }}
            </p>
            <button class="btn btn-light hero-btn">Read More &rarr;</button>
        </div>
    </div>

    {{-- MAIN CONTENT GRID --}}
    <div class="row g-4">
        
        {{-- Kolom Kiri: Latest News --}}
        <div class="col-lg-8">
            <h2 class="section-title">Latest News</h2>
            
            <!-- Menggunakan d-flex & gap-4 untuk memaksa card berita berjarak secara konsisten -->
            <div class="d-flex flex-column gap-4">
                @foreach($posts as $post)
                    <div class="news-card">
                        <div class="row g-0 align-items-center">
                            <div class="col-md-4">
                                <img src="https://images.unsplash.com/photo-1495020689067-958852a7765e?w=900">
                            </div>
                            <div class="col-md-8">
                                <div class="news-body">
                                    <span class="badge bg-dark mb-2">NEWS</span>
                                    <h3 class="news-title">
                                        {{ $post->title }}
                                    </h3>
                                    <p class="news-text">
                                        {{ \Illuminate\Support\Str::limit($post->content, 120) }}
                                    </p>
                                    <small class="text-muted">
                                        {{ optional($post->created_at)->format('d M Y') }}
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Kolom Kanan: Trending --}}
        <div class="col-lg-4">
            <!-- SEJAJAR! Judul Trending dikeluarkan dari card putih -->
            <h2 class="section-title">Trending</h2>
            
            <div class="sidebar-card">
                @foreach($posts->take(5) as $index => $popular)
                    <div class="popular-item">
                        <div class="popular-number">
                            {{ sprintf('%02d', $index + 1) }}
                        </div>
                        <div>
                            <div class="popular-title">
                                {{ $popular->title }}
                            </div>
                            <div class="popular-text">
                                {{ \Illuminate\Support\Str::limit($popular->content, 60) }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</div>

@endsection