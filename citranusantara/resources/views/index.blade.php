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
                <form action="" method="get">
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
                        <div class="col"><a href="">Wisata</a></div>
                        <div class="col"><a href="">Budaya</a></div>
                        <div class="col"><a href="">Provinsi</a></div>
                    </div>
                </div>
                <div class="rekomendasi my-4 ">
                    <h4>Rekomendasi</h4>
                    <div class="daftarRekomendasi d-flex flex-wrap my-3 justify-content-between">
                        <div class="card my-3">
                            <img src="img/waerebo.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text mb-3">Manggarai, NTT</p>
                                <a href="#" class="a-link my-2 mx-auto text-center">Explore</a>
                            </div>
                        </div>
                        <div class="card my-3">
                            <img src="img/waerebo.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text mb-3">Manggarai, NTT</p>
                                <a href="#" class="a-link my-2 mx-auto text-center">Explore</a>
                            </div>
                        </div>
                        <div class="card my-3">
                            <img src="img/waerebo.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text mb-3">Manggarai, NTT</p>
                                <a href="#" class="a-link my-2 mx-auto text-center">Explore</a>
                            </div>
                        </div>
                        <div class="card my-3">
                            <img src="img/waerebo.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text mb-3">Manggarai, NTT</p>
                                <a href="#" class="a-link my-2 mx-auto text-center">Explore</a>
                            </div>
                        </div>
                        <div class="card my-3">
                            <img src="img/waerebo.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text mb-3">Manggarai, NTT</p>
                                <a href="#" class="a-link my-2 mx-auto text-center">Explore</a>
                            </div>
                        </div>
                        <div class="card my-3">
                            <img src="img/waerebo.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text mb-3">Manggarai, NTT</p>
                                <a href="#" class="a-link my-2 mx-auto text-center">Explore</a>
                            </div>
                        </div>
                        <div class="card my-3">
                            <img src="img/waerebo.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text mb-3">Manggarai, NTT</p>
                                <a href="#" class="a-link my-2 mx-auto text-center">Explore</a>
                            </div>
                        </div>
                        <div class="card my-3">
                            <img src="img/waerebo.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text mb-3">Manggarai, NTT</p>
                                <a href="#" class="a-link my-2 mx-auto text-center">Explore</a>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="" class="a-link more">More</a>
                    </div>

                </div>
            </div>
        </main>
@endsection

