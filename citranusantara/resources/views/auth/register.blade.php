@extends('layouts.main')
@section('body')

    <body class="login">
        <header style="background-navbar">
            @include('layouts.navbar')
        </header>
        <div class="login-container row">
            <div class="login-image col-md d-none d-md-block">
                <img src="img/daftar.png" alt="">
            </div>
            <div class="login-form col-md">
                <h1>Daftar <br>Citra Nusantara</h1>
                <div class="tab-container">
                    <div class="tab"><a href="{{ route('login') }}">Masuk</a></div>
                    <div class="tab active-tab">Daftar</div>
                </div>
                <br>
                <form action="{{ route('register') }}" method="post">
                  @csrf
                    <input type="hidden" name="role" value="user" required>
                    <input type="text" placeholder="Username" name="username" required>
                    <input type="email" placeholder="Email" name="email" required>
                    <input type="text" placeholder="Nama" name="name" required>
                    <input type="password" placeholder="Password" name="password" required>
                    <input type="password" placeholder="Konfirmasi Password" required>
                    <button>Daftar</button>
                </form>
                {{-- <div class="separator">
                    <div class="separator-line"></div>
                    <span class="separator-text">Atau</span>
                    <div class="separator-line"></div>
                </div>
                <button class="login-google-button">
                    <img class="login-google-icon" src="img/icon_gg.png" alt="Google Icon">
                    Daftar Menggunakan Google
                </button> --}}

                <p>Sudah memiliki akun? <a class="register-link" href="{{ route('login') }}">Masuk</a></p>
            </div>
        </div>
    @endsection
