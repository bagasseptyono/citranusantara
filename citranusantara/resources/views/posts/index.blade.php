@extends('layouts.main')
@section('body')
<body>
    <header>
        @include('layouts.navbar')

        <div class="header-slider">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="img/header1.png" alt=""></div>
                    <div class="swiper-slide"><img src="img/header2.png" alt=""></div>
                    <div class="swiper-slide"><img src="img/header3.png" alt=""></div>
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
            <div class="search my-4 w-100">
                <form class="row w-100" role="search">
                    <div class="search-form col-md mb-2">
                        <input class="form-control me-2 flex-grow-1" type="search" placeholder="Search" aria-label="Search">
                    </div>
                    <div class="select-form col-md d-flex mb-2">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Kategori</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Provinsi</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Kabupaten</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="submit-form col-md-1 mb-2">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </div>
                </form>
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
