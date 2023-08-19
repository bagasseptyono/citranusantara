@extends('layouts.main')
@section('body')

    <body>
        <header>
            @include('layouts.navbar')
        </header>
        <main class="profile">
            <div class="container px-3 pt-5 frame-profile">
                <h5>Posting Wisata</h5>
                <form action="{{ route('posts.update',$post->id) }}" method="POST" enctype="multipart/form-data" id="myForm">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        {{-- <div class="col-md-3 form-left">
                            <div class="my-4 frame-input-post">
                                <span id="fileRequiredMessage" style="color: red; display: none;">Please select a
                                    file.</span>
                                <label for="imageUpload" class="upload-label">
                                    <i class="fas fa-camera"></i> Unggah Foto
                                </label>
                                <input type="file" id="imageUpload" name="imageUpload[]" onchange="previewInputImages()"
                                    accept="image/*" multiple>
                                <div id="imagePreview"><img src="" alt="" id="image-input"></div>
                            </div>
                        </div> --}}
                        <div class="col-md form-right">
                            <label for="judul">Judul</label>
                            <p class="text-grey">Masukkan Judul Wisata Yang ingin di Posting</p>
                            <input type="text" id="judul" name="judul" required value="{{ $post->judul }}">

                            <label for="deskripsi">Deskripsi</label>
                            <p class="text-grey">Masukkan deskripsi singkat tentang wisata atau budaya yang ada di tempat
                                tersebut</p>

                            <input id="x" type="hidden" name="deskripsi" value="{{ $post->deskripsi }}">
                            <trix-editor input="x"></trix-editor>

                            <label for="lokasi">Lokasi</label>
                            <p class="text-grey">Masukkan lokasi untuk mengunjungi tempat tersebut</p>
                            <input type="text" id="lokasi" name="lokasi" required value="{{ $post->lokasi }}">

                            <label for="tarif">Tarif</label>
                            <P class="text-grey">Masukkan tarif masuk untuk mengunjungi tempat tersebut</P>
                            <input type="text" id="tarif" name="tarif" required value="{{ $post->tarif }}">

                            <h6>Kategori</h6>
                            <p class="text-grey">Masukkan kategori dan lokasi tempat tersebut agar dapat mempermudah orang
                                lain untuk
                                menemukan tempatnya</p>
                            <div class="row">
                                <div class="col">
                                    <label for="kategori">Kategori</label>
                                    <select class="form-select" aria-label="Default select example" id="kategori" required
                                        name="kategori">
                                        <option>Kategori</option>
                                        <option value="Wisata" {{ $post->kategori == 'Wisata' ? 'selected' : '' }}>Wisata
                                        </option>
                                        <option value="Budaya" {{ $post->kategori == 'Budaya' ? 'selected' : '' }}>Budaya
                                        </option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="provinsi">Provinsi</label>
                                    <div id="myProvince" style="display: none;">{{ $post->province }}</div>
                                    <select class="form-select" aria-label="Default select example" id="provinsi"
                                        name="province" required>
                                        <option>Provinsi</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="cities">Kabupaten/Kota</label>
                                    <div id="myCity" style="display: none;">{{ $post->city }}</div>
                                    <select class="form-select" aria-label="Default select example" id="cities"
                                        name="city" required>
                                        <option>Kabupaten/Kota</option>
                                    </select>
                                </div>
                            </div>

                            <button type="submit" class="submit-style">Posting</button>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    @endsection
