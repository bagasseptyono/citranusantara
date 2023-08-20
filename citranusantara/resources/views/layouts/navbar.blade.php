<nav>
    <div class="nav-logo">
        <h4>Citra Nusantara</h4>
    </div>
    <div class="nav-list">
        <ul>
            <li><a href="{{ route('posts.index') }}">Rekomendasi</a></li>
            
            @guest
                <li>
                    <a href="{{ route('login') }}">Masuk</a>
                </li>
                <li><a href="{{ route('register') }}">Daftar</a></li>
            @endguest
            @auth
                <li><a href="{{ route('posts.create') }}">Posting</a></li>
                @if (Auth::user()->role == 'admin')
                    <li><a href="">Admin Panel</a></li>
                @else
                    <li><a href="{{ route('user-index') }}">Profile</a></li>
                @endif
            @endauth
        </ul>
    </div>
</nav>
