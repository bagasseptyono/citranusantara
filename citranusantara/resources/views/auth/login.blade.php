@extends('layouts.main')
@section('body')

    <body class="login">
        <div class="vh-100 row">
            <div class="login-image col-md d-none d-md-block">
                <img src="img/daftar.png" alt="">
            </div>
            <div class="login-form col-md ">
                <h1>Masuk <br>Citra Nusantara</h1>
                <div class="tab-container">
                    <div class="tab active-tab">Masuk</div>
                    <div class="tab"><a href="{{ route('register') }}">Daftar</a></div>
                </div>
                <br>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <input type="text" placeholder="Username/Email" name="username_or_email" required>
                    <input type="password" placeholder="Password"  name="password" required>
                    <button>Masuk</button>
                </form>
                <div class="separator">
                    <div class="separator-line"></div>
                    <span class="separator-text">Atau</span>
                    <div class="separator-line"></div>
                </div>
                <button class="login-google-button">
                    <img class="login-google-icon" src="img/icon_gg.png" alt="Google Icon">
                    Masuk Menggunakan Google
                </button>

                <p>Belum memiliki akun? <a class="register-link" href="{{ route('register') }}">Daftar</a></p>
            </div>
        </div>
    @endsection
