@extends('layouts.main')
@section('body')
    <body>
        <header>
            @include('layouts.navbar')
        <div class="header">
            <div class="gallery">
                <a href="{{ asset('img/header1.png') }}" class=""><img src="{{ asset('img/header1.png') }}" alt="" title="" /></a>
                <a href="{{ asset('img/header2.png') }}" class=""><img src="{{ asset('img/header2.png') }}" alt="" title="" /></a>
                <a href="{{ asset('img/header3.png') }}" class=""><img src="{{ asset('img/header3.png') }}" alt="" title="" /></a>
                <a href="{{ asset('img/full/01.jpg') }}" class=""><img src="{{ asset('img/full/01.jpg') }}" alt="" title="" /></a>
                <a href="{{ asset('img/full/02.jpg') }}" class=""><img src="{{ asset('img/full/02.jpg') }}" alt="" title="" /></a>
                <a href="{{ asset('img/full/03.jpg') }}" class=""><img src="{{ asset('img/full/03.jpg') }}" alt="" title="" /></a>
                <a href="{{ asset('img/full/04.jpg') }}" class=""><img src="{{ asset('img/full/04.jpg') }}" alt="" title="" /></a>
                <a href="{{ asset('img/full/05.jpg') }}" class=""><img src="{{ asset('img/full/05.jpg') }}" alt="" title="" /></a>
                <a href="{{ asset('img/full/06.jpg') }}" class=""><img src="{{ asset('img/full/06.jpg') }}" alt="" title="" /></a>
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="detail-post">
                <div class="judul-post my-5 p-3">
                    <h1>Wisata Batu Ngambang Sidoarjo</h1>
                </div>
                <div class="row ">
                    <div class="col-md mb-3 lokasi ms-3"><i class="fa-solid fa-location-dot me-2"></i> Sidoarjo, Jawa
                        Timur</div>
                    <div class="col-md mb-3 kategori ms-3"><i class="fa-solid fa-tag me-2"></i>Wisata</div>
                </div>
                <div class="deskripsi-post mb-3">
                    <h2>Deskripsi</h2>
                    <p class="ms-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque consectetur
                        dolor sed urna dictum, vitae tincidunt neque tincidunt. Pellentesque et eleifend magna,
                        consequat dictum justo. Nulla a dui ultricies, posuere nibh quis, scelerisque magna. Ut at leo
                        vel leo egestas gravida. Pellentesque congue eget orci in consectetur. Fusce ut consectetur
                        eros, vel commodo ligula. Praesent pharetra ligula nec ligula dictum efficitur. Praesent maximus
                        pulvinar libero blandit porttitor. Proin tincidunt massa et placerat fringilla. Donec nec lacus
                        odio. Curabitur aliquam, lorem nec semper aliquam, felis leo volutpat justo, ut tincidunt sem
                        nisi vel ante. Nullam ut ante ut arcu ultricies placerat et ac libero. In ex urna, cursus ac
                        tellus eget, venenatis volutpat sapien. Nullam convallis, diam ut dignissim laoreet, libero ante
                        aliquet nulla, non finibus magna mi lacinia nibh. Aliquam rhoncus libero sed porta ultricies.
                        Integer ullamcorper massa sed interdum auctor. Nunc cursus iaculis sagittis. </p>
                </div>
                <div class="row ">
                    <div class="col-md mb-3">
                        <div class="tarif">
                            <h2>Tarif Wisata</h2>
                            <p class="ms-3">
                                Rp.5.000 - Rp.10.000
                            </p>
                        </div>
                    </div>
                    <div class="col-md mb-3">
                        <div class="lokasi">
                            <h2>Lokasi</h2>
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63299.42334572772!2d112.64855822306987!3d-7.441563392140044!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e6b459225bd5%3A0x74e019e4281bc0ff!2sMonumen%20Jayandaru!5e0!3m2!1sen!2sid!4v1691890814838!5m2!1sen!2sid"
                                width="100%" height="180" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade" class="ms-2"></iframe>
                        </div>
                    </div>
                </div>
            </div>

            <div class="diskusi-post">
                <h2>Diskusi</h2>
                <div class="container-fluid">
                    <div class="rating border-bottom">
                        <form action="" class="py-3 px-2">
                            <p class="text-center mt-3">Beri Rating</p>
                            <div class="stars text-center mt-2">
                                <input type="hidden" name="rating" required>
                                <i class="fa-solid fa-star star"></i>
                                <i class="fa-solid fa-star star"></i>
                                <i class="fa-solid fa-star star"></i>
                                <i class="fa-solid fa-star star"></i>
                                <i class="fa-solid fa-star star"></i>
                            </div>
                            <div class="input d-flex w-80 px-3 my-3">
                                <input type="text" name="komentar" id="komentar-input" placeholder="Tulis Pengalamanmu"
                                    class="flex-grow-1">
                                <img id="gambarPreview" src="#" alt="Preview Gambar" style="display: none;">
                                <p id="gambarNama"></p>
                                <label for="image" class="mx-3" id="addIcon"><i class="fa-solid fa-plus"></i></label>
                                <input type="file" name="image" id="image" onchange="previewGambar()" accept="image/*">
                                <button type="submit"><i class="fa-solid fa-paper-plane"></i></button>
                            </div>
                        </form>
                    </div>

                    <div class="komentar py-5 mx-3">
                        <div class="komen-parent">
                            <div class="profile-icon d-flex">
                                <img src="{{ asset('img/profileicon.jpg') }}" alt="">
                                <h4>Bachtiar Riza Pratama</h4>
                                <p class="rating-review"><i class="fa-solid fa-star"></i> 4,6</p>
                            </div>
                            <div class="container-isi p-3">
                                <div class="d-flex">
                                    <div class="isi-komentar flex-grow-1">
                                        <img src="" alt="" class="gambar-komen">
                                        <p>Tempatnya jelek batyunya gak ngambang hoax</p>
                                    </div>
                                    <div class="opsi-komen">
                                        <ul>
                                            <li class="opsi-balas">Reply</li>
                                            <li class="opsi-lapor">Laporkan</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="komen-child my-2">
                                <div class="profile-icon d-flex">
                                    <img src="{{ asset('img/profileicon.jpg') }}" alt="">
                                    <h4>Bachtiar Riza Pratama</h4>
                                    <p class="rating-review"><i class="fa-solid fa-star"></i> 4,6</p>
                                </div>
                                <div class="container-isi p-3">
                                    <div class="d-flex">
                                        <div class="isi-komentar flex-grow-1">
                                            <img src="" alt="" class="gambar-komen">
                                            <p>Tempatnya jelek batyunya gak ngambang hoax</p>
                                        </div>
                                        <div class="opsi-komen">
                                            <ul>
                                                <li class="opsi-balas">Reply</li>
                                                <li class="opsi-lapor">Laporkan</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="balas-komen" style="display: none;">
                                <form action="" class="px-3 my-2 balas-form">
                                    <input type="text" name="komentar" id="komentar-input" placeholder="Balas"
                                        class="flex-grow-1">
                                    <img id="gambarPreview" src="#" alt="Preview Gambar" style="display: none;">
                                    <p id="gambarNama"></p>
                                    <label for="image" class="mx-3" id="addIcon"><i
                                            class="fa-solid fa-plus"></i></label>
                                    <input type="file" name="image" id="image" onchange="previewGambar()"
                                        accept="image/*">
                                    <button type="submit"><i class="fa-solid fa-paper-plane"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="komen-parent">
                            <div class="profile-icon d-flex">
                                <img src="{{ asset('img/profileicon.jpg') }}" alt="">
                                <h4>Bachtiar Riza Pratama</h4>
                                <p class="rating-review"><i class="fa-solid fa-star"></i> 4,6</p>
                            </div>
                            <div class="container-isi p-3">
                                <div class="d-flex">
                                    <div class="isi-komentar flex-grow-1">
                                        <img src="" alt="" class="gambar-komen">
                                        <p>Tempatnya jelek batyunya gak ngambang hoax</p>
                                    </div>
                                    <div class="opsi-komen">
                                        <ul>
                                            <li class="opsi-balas">Reply</li>
                                            <li class="opsi-lapor">Laporkan</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="komen-child my-2">
                                <div class="profile-icon d-flex">
                                    <img src="{{ asset('img/profileicon.jpg') }}" alt="">
                                    <h4>Bachtiar Riza Pratama</h4>
                                    <p class="rating-review"><i class="fa-solid fa-star"></i> 4,6</p>
                                </div>
                                <div class="container-isi p-3">
                                    <div class="d-flex">
                                        <div class="isi-komentar flex-grow-1">
                                            <img src="" alt="" class="gambar-komen">
                                            <p>Tempatnya jelek batyunya gak ngambang hoax</p>
                                        </div>
                                        <div class="opsi-komen">
                                            <ul>
                                                <li class="opsi-balas">Reply</li>
                                                <li class="opsi-lapor">Laporkan</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="balas-komen" style="display: none;">
                                <form action="" class="px-3 my-2 balas-form">
                                    <input type="text" name="komentar" id="komentar-input" placeholder="Balas"
                                        class="flex-grow-1">
                                    <img id="gambarPreview" src="#" alt="Preview Gambar" style="display: none;">
                                    <p id="gambarNama"></p>
                                    <label for="image" class="mx-3" id="addIcon"><i
                                            class="fa-solid fa-plus"></i></label>
                                    <input type="file" name="image" id="image" onchange="previewGambar()"
                                        accept="image/*">
                                    <button type="submit"><i class="fa-solid fa-paper-plane"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </main>
@endsection