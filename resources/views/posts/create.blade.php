@extends('layouts.master')

@section('title', 'Tulis Berita')

@section('body')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card border-0 shadow rounded-4">

                <div class="card-body p-5">

                    <h2 class="fw-bold mb-4">
                        &#128221; Tulis Berita Baru
                    </h2>

                    @if ($errors->any())

                        <div class="alert alert-danger">

                            <ul class="mb-0">

                                @foreach ($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif

                    <form action="{{ route('posts.store') }}"
                          method="POST">

                        @csrf

                        <div class="mb-3">

                            <label class="form-label">
                                Judul Berita
                            </label>

                            <input
                                type="text"
                                name="title"
                                class="form-control"
                                value="{{ old('title') }}"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                URL Gambar
                            </label>

                            <input
                                type="text"
                                name="photo"
                                class="form-control"
                                placeholder="https://..."
                                value="{{ old('photo') }}"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Publisher
                            </label>

                            <input
                                type="text"
                                name="publisher"
                                class="form-control"
                                value="{{ Auth::user()->name }}"
                                readonly>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Isi Berita
                            </label>

                            <textarea
                                name="content"
                                rows="8"
                                class="form-control"
                                required>{{ old('content') }}</textarea>

                        </div>

                        <input
                            type="hidden"
                            name="published"
                            value="{{ date('Y-m-d') }}">

                        <div class="d-flex justify-content-between">

                            <a href="{{ route('posts.index') }}"
                               class="btn btn-outline-secondary">

                                ← Kembali

                            </a>

                            <button
                                type="submit"
                                class="btn btn-primary">

                                Publish Berita

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection