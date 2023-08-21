@extends('layouts.main')
@section('body')

    <body>
        <header>
            @include('layouts.navbar')

            <div class="header-slider">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="{{ asset('img/header1.png') }}" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('img/header2.png') }}" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('img/header3.png') }}" alt=""></div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            <div class="header-container">
                <div class="tagline">
                    Citra Nusantara
                </div>
                <div class="subtagline">
                    <h1 class="text-white">Temukan Wisata dan Budaya Nusantara</h1>
                </div>
                <form action="{{ route("search") }}" method="get">
                    <input type="text" name="search" id="search" placeholder="Cari">
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </header>
        <main>
            <div class="container">
                <div class="kategori my-4">
                    <h4>Kategori</h4>
                    <div class="row my-3">
                        <div class="col"><a href="{{ route('search', ['kategori' => 'Wisata']) }}">Wisata</a></div>
                        <div class="col"><a href="{{ route('search', ['kategori' => 'Budaya']) }}">Budaya</a></div>
                    </div>
                </div>
                <div class="rekomendasi my-4 ">
                    <h4>Rekomendasi</h4>
                    <div class="daftarRekomendasi d-flex flex-wrap my-3 justify-content-between">
                        @foreach ($posts as $post)
                            <div class="card my-3">
                                <img src="{{ asset('storage/image_post/' . $post->image_name) }}" class="card-img-top"
                                    alt="...">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <h5 class="card-title"><a href="{{ route('posts.show', $post->id) }}" class="text-dark">{{ $post->judul }}</a></h5>
                                        @if($post->rating)
                                        <p class="rating-review"><i class="fa-solid fa-star text-warning"></i>
                                            {{ $post->rating }}
                                        </p>
                                        @endif
                                    </div>
                                    <p class="card-text fw-500">{{ $post->kategori }}</p>
                                    <p class="card-text mb-3">{{ $post->city_name }}, {{ $post->province_name }}</p>
                                    <a href="{{ route('posts.show', $post->id) }}"
                                        class="a-link my-2 mx-auto text-center">Explore</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('posts.index') }}" class="a-link more">More</a>
                    </div>

                </div>
            </div>
        </main>
    @endsection
