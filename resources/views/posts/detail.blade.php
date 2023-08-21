@extends('layouts.main')
@section('body')

    <body>
        <header>
            @include('layouts.navbar')
            <div class="header">
                @if (count($image) >= 6)
                    <div class="gallery">
                        @foreach ($image as $gambar)
                            <a href="{{ asset('storage/image_post/' . $gambar->name) }}" class=""><img
                                    src="{{ asset('storage/image_post/' . $gambar->name) }}" alt="" title="" /></a>
                        @endforeach
                    </div>
                @elseif(count($image) < 6)
                    <div class="header-slider">
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                @foreach ($image as $gambar)
                                    <div class="swiper-slide"><img src="{{ asset('storage/image_post/' . $gambar->name) }}"
                                            alt=""></div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                @endif
            </div>
        </header>
        <main>
            <div class="container">
                <div class="detail-post">
                    <div class="judul-post my-5 p-3">
                        <h1>{{ $post->judul }}</h1>
                    </div>
                    <div class="row ">
                        <div class="col-md mb-3 lokasi ms-3"><i class="fa-solid fa-location-dot me-2"></i>
                            {{ $city->name }}, {{ $province->name }}</div>
                        <div class="col-md mb-3 kategori ms-3"><i class="fa-solid fa-tag me-2"></i>{{ $post->kategori }}
                        </div>
                    </div>
                    <div class="deskripsi-post mb-3">
                        <h2>Deskripsi</h2>
                        <p class="ms-3">{!! $post->deskripsi !!}</p>
                    </div>
                    <div class="row ">
                        <div class="col-md mb-3">
                            <div class="tarif">
                                <h2>Tarif Wisata</h2>
                                <p class="ms-3">
                                    {{ $post->tarif }}
                                </p>
                            </div>
                        </div>
                        <div class="col-md mb-3">
                            <div class="lokasi">
                                <h2>Lokasi</h2>
                                <p>{!! $post->lokasi !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="diskusi-post">
                    <h2>Diskusi</h2>
                    <div class="container-fluid">
                        <div class="rating border-bottom">
                            <form action="{{ route('comments.store') }}" class="py-3 px-2" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <p class="text-center mt-3">Beri Rating</p>
                                <div class="stars text-center mt-2">
                                    <input type="hidden" name="rating" required>
                                    <i class="fa-solid fa-star star"></i>
                                    <i class="fa-solid fa-star star"></i>
                                    <i class="fa-solid fa-star star"></i>
                                    <i class="fa-solid fa-star star"></i>
                                    <i class="fa-solid fa-star star"></i>
                                </div>
                                <div class="input d-flex w-100 px-3 my-3">
                                    <input type="text" name="body" id="komentar-input"
                                        placeholder="Tulis Pengalamanmu" class="flex-grow-1">
                                    <img id="gambarPreview" src="#" alt="Preview Gambar" style="display: none;">
                                    <p id="gambarNama"></p>
                                    <label for="image" class="mx-3" id="addIcon"><i
                                            class="fa-solid fa-plus"></i></label>
                                    <input type="file" name="image_comment" id="image" onchange="previewGambar()"
                                        accept="image/*">
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                    <button type="submit"><i class="fa-solid fa-paper-plane"></i></button>
                                </div>
                            </form>
                        </div>

                        <div class="komentar py-5 mx-3">
                            @foreach ($comments as $comment)
                                <div class="komen-parent">
                                    <div class="profile-icon d-flex">
                                        <img src="{{ $comment->user->image_profile ? asset('storage/image_profile/' . $comment->user->image_profile) : asset('img/profile.webp') }}"
                                            alt="">
                                        <h4>{{ $comment->user->name }}</h4>
                                        <p class="rating-review"><i class="fa-solid fa-star"></i> {{ $comment->rating }}
                                        </p>
                                    </div>
                                    <div class="container-isi p-3">
                                        <div class="d-flex">
                                            <div class="isi-komentar flex-grow-1">
                                                @if ($comment->image_comment)
                                                    <img src="{{ asset('storage/image_comment/' . $comment->image_comment) }}"
                                                        alt="" class="gambar-komen">
                                                @endif
                                                <p>{{ $comment->body }}</p>
                                            </div>
                                            <div class="opsi-komen">
                                                <ul>
                                                    <li class="opsi-balas">Reply</li>
                                                    {{-- <li class="opsi-lapor">Laporkan</li> --}}
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @foreach ($comment->replies as $reply)
                                        <div class="komen-child my-2">
                                            <div class="profile-icon d-flex">
                                                <img src="{{ $reply->user->image_profile ? asset('storage/image_profile/' . $reply->user->image_profile) : asset('img/profile.webp') }}"
                                                    alt="">
                                                <h4>{{ $reply->user->name }}</h4>
                                                {{-- <p class="rating-review"><i class="fa-solid fa-star"></i> 4,6</p> --}}
                                            </div>
                                            <div class="container-isi p-3">
                                                <div class="d-flex">
                                                    <div class="isi-komentar flex-grow-1">
                                                        @if($reply->image_reply)
                                                            <img src="{{ asset('storage/image_reply/' . $reply->image_reply) }}"
                                                            alt="" class="gambar-komen">
                                                        @endif
                                                        <p>{{ $reply->body }}</p>
                                                    </div>
                                                    <div class="opsi-komen">
                                                        <ul>
                                                            <li class="opsi-balas">Reply</li>
                                                            {{-- <li class="opsi-lapor">Laporkan</li> --}}
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="balas-komen" style="display: none;">
                                        <form action="{{ route('reply.store') }}" class="px-3 my-2 balas-form"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                                            <input type="text" name="body" id="komentar-input" placeholder="Balas"
                                                class="flex-grow-1">
                                            <img id="gambarPreview-reply" src="#" alt="Preview Gambar"
                                                style="display: none;">
                                            <p id="gambarNama"></p>
                                            <label for="image-reply" class="mx-3" id="addIcon-reply addIcon"><i
                                                    class="fa-solid fa-plus"></i></label>
                                            <input type="file" name="image_reply" id="image-reply"
                                                onchange="previewGambarReply()" accept="image/*" style="display:none;">
                                            <button type="submit"><i class="fa-solid fa-paper-plane"></i></button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>


            </div>

        </main>
    @endsection
