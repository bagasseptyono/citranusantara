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
                            <a class="nav-link mb-2" aria-current="page" href="{{ route('user-index') }}">Daftar Postingan</a>
                            {{-- <a class="nav-link mb-2" href="">Laporan</a>
                            <a class="nav-link mb-2" href="">Konfirmasi</a> --}}
                        </div>
                        <div class="logout text-center pb-5">
                            <a class="nav-link" href="{{ route('logout') }}">Keluar</a>
                        </div>
                    </div>
                    <div class="col-md content-profile px-3 overflow-auto">
                        <div class="baris d-flex justify-content-between">
                            <h4>Daftar Postingan</h4>
                            <a href="{{ route('posts.create') }}" class="a-link">Tambah</a>
                        </div>
                        <div class="search my-4 w-100">
                            <form class="row w-100" role="search" method="get" action="{{ route('search') }}">
                                <input type="hidden" name="admin" value="admin">
                                <div class="search-form col-md-5 mb-2">
                                    <input class="form-control me-2 flex-grow-1" type="text" placeholder="Search"
                                        aria-label="Search" name="search">
                                </div>
                                <div class="select-form col-md d-flex mb-2">
                                    <select class="form-select" aria-label="Default select example" id="kategori" 
                                        name="kategori">
                                        <option>Kategori</option>
                                        <option value="Wisata">Wisata</option>
                                        <option value="Budaya">Budaya</option>
                                    </select>
                                    <select class="form-select" aria-label="Default select example" id="provinsi"
                                        name="province" >
                                        <option>Provinsi</option>
                                    </select>
                                    <select class="form-select" aria-label="Default select example" id="cities"
                                        name="city" >
                                        <option>Kabupaten/Kota</option>
                                    </select>
                                </div>
                                <div class="submit-form col-md-1 mb-2">
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                </div>
                            </form>
                        </div>

                        <div class="daftar-postingan d-flex flex-wrap my-3 justify-content-center">
                            @foreach ($posts as $post)
                                <div class="card my-3">
                                    <img src="{{ asset('storage/image_post/' . $post->image_name) }}" class="card-img-top"
                                        alt="...">
                                    <div class="card-body">
                                        <div class="card-info">
                                            <h6><a href="{{ route('posts.show', $post->id) }}" class="text-dark">{{ $post->judul }}</a></h6>
                                            <p>{{ $post->city_name }}, {{ $post->province_name }}</p>
                                        </div>
                                        <div class="link">
                                            <a href="{{ route('posts.edit', $post->id) }}"
                                                class="a-link-big text-center">Edit</a>
                                                <form action="{{ route('posts.destroy',$post->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="a-link-big-secondary text-center">Hapus</button>
                                                </form>
                                            
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </main>
    @endsection
