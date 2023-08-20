@extends('layouts.main')
@section('body')

    <body>
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
                    <div class="col-md content-profile px-3 overflow-auto">
                        <div class="baris d-flex justify-content-between">
                            <h4>Daftar Postingan</h4>
                            <a href="{{ route('posts.create') }}" class="a-link">Tambah</a>
                        </div>
                        <div class="search my-4 w-100">
                            <form class="row w-100" role="search">
                                <div class="search-form col-md-5 mb-2">
                                    <input class="form-control me-2 flex-grow-1" type="search" placeholder="Search"
                                        aria-label="Search">
                                </div>
                                <div class="select-form col-md d-flex mb-2">
                                    <select class="form-select" aria-label="Default select example" id="kategori" required
                                        name="kategori">
                                        <option>Kategori</option>
                                        <option value="Wisata">Wisata</option>
                                        <option value="Budaya">Budaya</option>
                                    </select>
                                    <select class="form-select" aria-label="Default select example" id="provinsi"
                                        name="province" required>
                                        <option>Provinsi</option>
                                    </select>
                                    <select class="form-select" aria-label="Default select example" id="cities"
                                        name="city" required>
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
                                    <img src="{{ asset('storage/images/' . $post->image_name) }}" class="card-img-top"
                                        alt="...">
                                    <div class="card-body">
                                        <div class="card-info">
                                            <h6>{{ $post->judul }}</h6>
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
