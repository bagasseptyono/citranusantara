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
                    @csrf
                    <input type="text" name="search" id="search" placeholder="Cari">
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </header>
        <main>
            <div class="container">
                <div class="search my-4 w-100">
                    <form class="row w-100" role="search" method="GET" action="{{ route('search') }}">
                        @csrf
                        <div class="search-form col-md-3 mb-2 p-0">
                            <input class="form-control me-2 flex-grow-1" type="text" placeholder="Search"
                                        aria-label="Search" name="search">
                        </div>
                        <div class="select-form col-md  mb-2">
                            <div class="row">
                                <div class="col-sm p-0">
                                    <select class="form-select" aria-label="Default select example" id="kategori" 
                                        name="kategori">
                                        <option>Kategori</option>
                                        <option value="Wisata">Wisata</option>
                                        <option value="Budaya">Budaya</option>
                                    </select>
                                </div>
                                <div class="col-sm p-0">
                                    <div id="myProvince" style="display: none;"></div>
                                    <select class="form-select" aria-label="Default select example" id="provinsi"
                                        name="province" >
                                        <option>Provinsi</option>
                                    </select>
                                </div>
                                <div class="col-sm p-0">
                                    <div id="myCity" style="display: none;"></div>
                                    <select class="form-select" aria-label="Default select example" id="cities"
                                        name="city" >
                                        <option>Kabupaten/Kota</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="submit-form col-md-2 mb-2 p-0">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </div>
                    </form>
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
                                    <h5 class="card-title"><a href="{{ route('posts.show', $post->id) }}" class="text-dark">{{ $post->judul }}</a>
                                    </h5>
                                    @if($post->rating)
                                        <p class="rating-review"><i class="fa-solid fa-star text-warning"></i>
                                            {{ $post->rating }}
                                        </p>
                                        @endif
                                    </div>
                                    <p class="card-text fw-500">{{ $post->kategori }}</p>
                                    <p class="card-text mb-3">{{ $post->city_name }}, {{ $post->province_name }}</p>
                                    <a href="{{ route('posts.show',$post->id) }}" class="a-link my-2 mx-auto text-center">Explore</a>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>

                <div class="pagination">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </main>
    @endsection
