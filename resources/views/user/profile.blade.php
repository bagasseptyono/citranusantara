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
                            <a href="{{ route('user-edit') }}" class="a-link">Ubah</a>
                        </div>
                        <div class="container d-flex info-umum my-3">
                            <img src="{{ $info->image_profile ? asset('storage/image_profile/' . $info->image_profile) : asset('img/profile.webp') }}"
                                alt="" class="image-profile">
                            <div class="info d-flex flex-column">
                                <h6>{{ $info->name }}</h6>
                                <p><span>@</span>{{ $info->username }}</p>
                                <p>{{ $info->email }}</p>
                            </div>
                        </div>
                        <div class="container mb-3">
                            <p class="fw-500">Informasi Saya</p>
                            <div class="info-detail p-4">
                                <div>
                                    <p class="text-grey">Nama</p>
                                    <p class="fw-500">{{ $info->name }}</p>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div>
                                            <p class="text-grey">Username</p>
                                            <p class="fw-500"><span>@</span>{{ $info->username }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                            <p class="text-grey">No. Telp</p>
                                            <p class="fw-500">{{ $info->no_hp ?? '-' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div>
                                            <p class="text-grey">Email</p>
                                            <p class="fw-500">{{ $info->email }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                            <p class="text-grey">Tanggal Lahir</p>
                                            <p class="fw-500">{{ $info->tanggal_lahir ?? '-' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <p class="text-grey">Alamat</p>
                                    <p class="fw-500">{{ $info->alamat ?? '-' }}</p>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div>
                                            <p class="text-grey">kabupaten/Kota</p>
                                            <p class="fw-500">{{ $city->name ?? '-' }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                            <p class="text-grey">Provinsi</p>
                                            <p class="fw-500">{{ $province->name ?? '-' }}</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </main>
    @endsection
