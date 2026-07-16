@if(session('success'))

<div class="alert alert-success alert-dismissible fade show">

    {{ session('success') }}

    <button
        class="btn-close"
        data-bs-dismiss="alert">
    </button>

</div>

@endif

@extends('master')

@section('title', 'Jason News')

@section('body')

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

    
    .section-title {
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 20px;
        height: 40px; 
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
        <img src="{{ $featured->photo }}">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <div class="hero-category">BREAKING NEWS</div>
            <h1 class="hero-title">
                {{ $featured->title }}
            </h1>
            <p class="hero-desc">
                {{ \Illuminate\Support\Str::limit($featured->content, 150) }}
            </p>
            <a href="{{ route('posts.show', $featured->id) }}"
                class="btn btn-light hero-btn">Read More &rarr;
            </a>
        </div>
    </div>

    {{-- MAIN CONTENT GRID --}}
    <div class="row g-4 align-items-start">
        
        {{-- Kolom Kiri: Latest News --}}
        <div class="col-lg-8">
                <div class="d-flex justify-content-between align-items-center mb-4">

                    <h2 class="fw-bold mb-0">
                        Latest News
                    </h2>

                    @auth
                        <a href="{{ route('posts.create') }}"
                            class="btn btn-primary rounded-pill px-4">
                            + Tulis Berita
                        </a>
                    @else
                        <button type="button" class="btn btn-primary rounded-pill px-4"
                                data-bs-toggle="modal" data-bs-target="#loginRequiredModal">

                            + Tulis Berita

                        </button>
                    @endauth

                </div>

                <div class="d-flex flex-column gap-4">

                    @foreach($posts as $post)

                    <a href="{{ route('posts.show', $post->id) }}"
                        class="text-decoration-none text-dark">

                        <div class="news-card">

                            <div class="row g-0 align-items-center">

                                <div class="col-md-4">
                                    <img src="{{ $post->photo }}">
                                </div>

                                <div class="col-md-8">

                                    <div class="news-body">

                                        <span class="badge bg-dark mb-2">
                                            NEWS
                                        </span>

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

                    </a>

                    @endforeach

                </div>

        </div>
        

        {{-- Kolom Kanan: Trending --}}
        <div class="col-lg-4">
            
            <h2 class="section-title">Trending</h2>
            
            <div class="sidebar-card">
                @foreach($posts->take(5) as $index => $popular)
                <a href="{{ route('posts.show',$popular->id) }}"
                    class="text-decoration-none text-dark">
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
                </a>
                @endforeach
            </div>
        </div>

    </div>
</div>


<!-- Login Required Modal -->
<div class="modal fade"
     id="loginRequiredModal"
     tabindex="-1"
     aria-labelledby="loginRequiredLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content border-0 rounded-4 shadow">

            <div class="modal-header border-0">

                <h5 class="modal-title fw-bold"
                    id="loginRequiredLabel">

                    &#128274; Login Diperlukan

                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                Anda harus login terlebih dahulu untuk menambahkan berita.

            </div>

            <div class="modal-footer border-0">

                <button type="button"
                        class="btn btn-outline-secondary"
                        data-bs-dismiss="modal">

                    Tutup

                </button>

                <a href="{{ route('login') }}"
                   class="btn btn-primary">

                    Login

                </a>

            </div>

        </div>

    </div>

</div>
@endsection