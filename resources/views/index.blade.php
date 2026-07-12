@php
use Illuminate\Support\Str;
@endphp

@extends('master')

@section('title', 'OPM News')

@section('body')

{{-- ================= HERO ================= --}}

@php
    $featured = App\Models\Post::first();
    $posts = App\Models\Post::limit(100)->offset(1)->get();
@endphp

@if($featured)

<div class="position-relative rounded-4 overflow-hidden mb-5">

    <img
        src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=1600"
        class="w-100"
        style="height:600px; object-fit:cover;">

    <div
        class="position-absolute top-0 start-0 w-100 h-100"
        style="background:rgba(0,0,0,.55);">

        <div class="container h-100">

            <div class="row h-100 align-items-center">

                <div class="col-lg-7 text-white">

                    <span class="badge bg-warning text-dark px-3 py-2 mb-3">

                        BREAKING NEWS

                    </span>

                    <h1 class="display-3 fw-bold mb-4">

                        {{ $featured->title }}

                    </h1>

                    <p class="lead mb-4">

                        {{ Str::limit($featured->content,180) }}

                    </p>

                    <a href="#news"
                       class="btn btn-light px-4 py-2">

                        Baca Selengkapnya

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endif


{{-- ================= CONTENT ================= --}}

<div class="row">

    {{-- LEFT --}}

    <div class="col-lg-8">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h2 class="fw-bold">
                Berita Terbaru
            </h2>

            <a href="#"
               class="text-decoration-none">

                Jelajahi Semua →

            </a>

        </div>

        <div class="row">

            @foreach($posts as $post)

            <div class="col-md-6 mb-4">

                <div class="card border-0 shadow-sm rounded-4 h-100">

                    <img
                        src="https://images.unsplash.com/photo-1495020689067-958852a7765e?w=900"
                        class="card-img-top"
                        style="height:220px; object-fit:cover;">

                    <div class="card-body">

                        <span class="badge bg-primary mb-2">

                            NEWS

                        </span>

                        <h5 class="fw-bold">

                            {{ $post->title }}

                        </h5>

                        <p class="text-secondary">

                            {{ Str::limit($post->content,90) }}

                        </p>

                    </div>

                    <div class="card-footer bg-white border-0">

                        <small class="text-muted">

                            {{ $post->created_at->format('d M Y') }}

                        </small>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

    </div>


    {{-- RIGHT SIDEBAR --}}

    <div class="col-lg-4">

        <h2 class="fw-bold mb-4">

            Populer

        </h2>

        @foreach(App\Models\Post::take(5)->get() as $index=>$popular)

        <div class="d-flex mb-4">

            <div
                class="me-3 fw-bold text-warning">

                {{ sprintf('%02d',$index+1) }}

            </div>

            <div>

                <span
                    class="badge bg-light text-dark mb-2">

                    Trending

                </span>

                <h6 class="fw-bold">

                    {{ $popular->title }}

                </h6>

                <small class="text-secondary">

                    {{ Str::limit($popular->content,80) }}

                </small>

            </div>

        </div>

        @endforeach

    </div>

</div>
@stop