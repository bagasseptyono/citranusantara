@extends('layouts.main')
@section('body')
    <body>
        <header>
            @include('layouts.navbar')
        </header>
    <main class="profile">
        <div class="container px-3 pt-5 frame-profile">
            <h5>Posting Wisata</h5>
            <form action="" enctype="multipart/form-data" method="">
                <div class="row">
                    <div class="col-md-3 form-left">
                        <div class="my-4 frame-input-post">
                            <label for="imageUpload" class="upload-label">
                                <i class="fas fa-camera"></i> Unggah Foto
                            </label>
                            <input type="file" id="imageUpload" name="imageUpload" onchange="previewInputImage()">
                            <div id="imagePreview"><img src="" alt="" id="image-input"></div>
                        </div>
                    </div>
                    <div class="col-md form-right">
                        <label for="judul">Judul</label>
                        <p class="text-grey">Masukkan Judul Wisata Yang ingin di Posting</p>
                        <input type="text" id="judul" name="judul" required>

                        <label for="deskripsi">Deskripsi</label>
                        <p class="text-grey">Masukkan deskripsi singkat tentang wisata atau budaya yang ada di tempat tersebut</p>
                        
                        <input id="deskripsi" type="hidden" name="deskripsi">
                        <trix-editor input="deskripsi"></trix-editor>

                        <label for="lokasi">Lokasi</label>
                        <p class="text-grey">Masukkan lokasi untuk mengunjungi tempat tersebut</p>
                        <input type="text" id="lokasi" name="lokasi" required>

                        <label for="tarif">Tarif</label>
                        <P class="text-grey">Masukkan tarif masuk untuk mengunjungi tempat tersebut</P>
                        <input type="text" id="tarif" name="tarif" required>

                        <label for="kategori">Kategori</label>
                        <p class="text-grey">Masukkan kategori dan lokasi tempat tersebut agar dapat mempermudah orang lain untuk
                            menemukan tempatnya</p>
                        <input type="text" id="kategori" name="kategori" required>

                        <button type="submit" class="submit-style">Posting</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection