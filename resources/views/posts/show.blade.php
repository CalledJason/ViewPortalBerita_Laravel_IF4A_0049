@extends('layouts.master')

@section('title', $post->title)

@section('body')

<style>
body{
    background:#f5f5f5;
}

.article-wrapper{
    background:white;
    border-radius:20px;
    overflow:hidden;
    box-shadow:0 5px 20px rgba(0,0,0,.05);
}

.article-image{
    width:100%;
    height:520px;
    object-fit:cover;
}

.article-content{
    padding:45px;
}

.article-category{
    display:inline-block;
    background:#d4af37;
    color:white;
    padding:6px 18px;
    border-radius:30px;
    font-size:14px;
    font-weight:600;
    margin-bottom:20px;
}

.article-title{
    font-size:42px;
    font-weight:700;
    line-height:1.3;
}

.article-meta{
    color:#6c757d;
    margin:20px 0 30px;
}

.article-text{
    font-size:18px;
    line-height:2;
    text-align:justify;
    color:#444;
}

.related-card{
    border:none;
    border-radius:18px;
    overflow:hidden;
    transition:.3s;
    box-shadow:0 5px 15px rgba(0,0,0,.05);
}

.related-card:hover{
    transform:translateY(-5px);
}

.related-card img{
    height:180px;
    object-fit:cover;
}
</style>

<div class="container py-5">

    <div class="article-wrapper">

        <img src="{{ $post->photo }}"
             class="article-image">

        <div class="article-content">

            <div class="article-category">
                BREAKING NEWS
            </div>

            <h1 class="article-title">

                {{ $post->title }}

            </h1>

            <div class="article-meta">

                &#128100;
                <strong>{{ $post->publisher }}</strong>

                &nbsp;&nbsp;

                &#128197;
                {{ \Carbon\Carbon::parse($post->published)->format('d F Y') }}

            </div>

            <hr>

            <div class="article-text">

                {!! nl2br(e($post->content)) !!}

            </div>

            <hr class="my-5">

            <div class="d-flex justify-content-between">

                <a href="{{ route('posts.index') }}"
                   class="btn btn-outline-secondary">

                    &larr; Kembali

                </a>

                @auth

                <div class="d-flex gap-2">

                    <a href="{{ route('posts.edit',$post->id) }}"
                       class="btn btn-warning">

                        &#9998; Edit

                    </a>

                    <form action="{{ route('posts.destroy',$post->id) }}"
                          method="POST">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger">

                            &#128465; Hapus

                        </button>

                    </form>

                </div>

                @endauth

            </div>

        </div>

    </div>

    <div class="mt-5">

        <h2 class="fw-bold mb-4">

            Related News

        </h2>

        <div class="row">

            @foreach($relatedPosts as $related)

            <div class="col-lg-3 col-md-6 mb-4">

                <a href="{{ route('posts.show',$related->id) }}"
                   class="text-decoration-none text-dark">

                    <div class="card related-card h-100">

                        <img src="{{ $related->photo }}"
                             class="card-img-top">

                        <div class="card-body">

                            <h6 class="fw-bold">

                                {{ $related->title }}

                            </h6>

                            <small class="text-muted">

                                {{ optional($related->created_at)->format('d M Y') }}

                            </small>

                        </div>

                    </div>

                </a>

            </div>

            @endforeach

        </div>

    </div>

</div>

@endsection