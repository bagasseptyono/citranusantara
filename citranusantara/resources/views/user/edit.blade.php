@extends('layouts.main')
@section('body')

    <body>
        <header>
            @include('layouts.navbar')
        </header>
        <main class="profile">
            <div class="container px-3 pt-5 frame-profile">
                <div class="row">
                    <div class="col-md-3 d-flex border-end flex-column justify-content-between sidebar">
                        <div class="ms-3">
                            <a class="nav-link mb-2" aria-current="page" href="{{ route('user-index') }}">Profile</a>
                            <a class="nav-link mb-2" href="{{ route('user-mypost') }}">Postingan</a>
                        </div>
                        <div class="logout text-center pb-5">
                            <a class="nav-link" href="{{ route('logout') }}">Keluar</a>
                        </div>
                    </div>
                    <div class="col-md-9 px-3 ">
                        <div class="baris d-flex justify-content-between">
                            <h4>Profile Saya</h4>
                        </div>
                        <div class="container mb-3">
                            <div class="info-detail p-4">
                                <form action="{{ route('user-edit') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="container d-flex info-umum my-3">
                                        <img src="{{ $info->image_profile ? asset('storage/image_profile/' . $info->image_profile) : asset('img/profile.webp') }}" alt="" class="image-profile">
                                        <div class="info d-flex flex-column">
                                            <input type="file" name="image_profile" id="" accept="image/*">
                                        </div>
                                    </div>
                                    <div>
                                        <p class="text-grey">Nama</p>
                                        <input type="text" name="name" id="" placeholder="  Nama"
                                            class="input-profile" value="{{ $info->name ?? '' }}" required>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div>
                                                <p class="text-grey">Username</p>
                                                <p class="fw-500">@satriabajahitam</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div>
                                                <p class="text-grey">No. Telp</p>
                                                <input type="text" name="no_hp" id="" placeholder="  No.Telp"
                                                    class="input-profile" value="{{ $info->no_hp ?? '' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div>
                                                <p class="text-grey">Email</p>
                                                <p class="fw-500">satriabajahitam@gmail.com</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div>
                                                <p class="text-grey">Tanggal Lahir</p>
                                                <input type="date" name="tanggal_lahir" id=""
                                                    placeholder="  Tanggal Lahir" class="input-profile"
                                                    value="{{ $info->tanggal_lahir ?? '' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="text-grey">Alamat</p>
                                        <input type="text" name="alamat" id="" placeholder="  Alamat"
                                            class="input-profile" value="{{ $info->alamat ?? '' }}">
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div>
                                                <p class="text-grey">Provinsi</p>
                                                <div id="myProvince" style="display: none;">{{ $info->province }}
                                                </div>
                                                <select class="form-select" aria-label="Default select example"
                                                    id="provinsi" name="province" required>
                                                    <option>Provinsi</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div>
                                                <p class="text-grey">Kabupaten/Kota</p>
                                                <div id="myCity" style="display: none;">{{ $info->city }}</div>
                                                <select class="form-select" aria-label="Default select example"
                                                    id="cities" name="city" required>
                                                    <option>Kabupaten/Kota</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end"><button type="submit"
                                            class="a-link submit-style float-end">Submit</button></div>

                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </main>

        <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
        <script src="dist/simple-lightbox.js"></script>
        <script src="script.js"></script>
        <script>
            (function() {
                var $gallery = new SimpleLightbox('.gallery a', {});
            })();
        </script>
    </body>

    </html>
