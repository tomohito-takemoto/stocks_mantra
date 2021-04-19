<header class="header-area">
<nav class="navbar navbar-expand-sm mb-3" style="background-color:#845460;">
    <a class="navbar-brand w-25" href="/" style="color:#fff;">
        <img class="logo" src='{{ asset('storage/Mantra-logo.png') }}'>
    </a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#globalmenu" aria-controls="#globalmenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="globalmenu">
        <ul class="navbar-nav ml-auto" id="globalmenu">
            @if (Auth::check())
                <li class="nav-item active mr-3">{!! link_to_route('stocks.index', 'マイページ', ['class' => 'nav-link']) !!}</li>
                <li class="nav-item active mr-3">{!! link_to_route('users.index', 'Users', ['class' => 'nav-link']) !!}</li>
                <li class="nav-item active mr-3">{!! link_to_route('logout.get', 'Logout', ['class' => 'nav-link']) !!}</li>
            @else
                {{-- ユーザ登録ページへのリンク --}}
                <li class="nav-item active">{!! link_to_route('signup.get', 'Signup', [], ['class' => 'nav-link']) !!}</li>
                {{-- ログインページへのリンク --}}
                <li class="nav-item active">{!! link_to_route('login', 'Login', [], ['class' => 'nav-link']) !!}</li>
            @endif
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
</header>