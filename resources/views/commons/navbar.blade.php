<header class="header-area">
<nav class="navbar navbar-expand-sm" style="background-color: #4a154b;">
    <a class="navbar-brand w-25" href="/mypage">
        <img class="logo" src='{{ asset('storage/Mantra-logo.png') }}'>
    </a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#globalmenu" aria-controls="#globalmenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="globalmenu">
        <ul class="navbar-nav ml-auto" id="globalmenu">
            @if (Auth::check())
                <li class="nav-item active mr-3 text-left">{!! link_to_route('mypage', 'マイページ') !!}</li>
                <li class="nav-item active mr-3 mt-1 text-left">{!! link_to_route('users.index', 'ユーザー一覧') !!}</li>
                <li class="nav-item active mr-3 mt-1 text-left">
                    <a href="{{ route('stocks.favorites_list', ['id' => Auth::user()->id]) }}" class="nav-text {{ Request::routeIs('stocks.favorites_list') ? 'active' : '' }}">
                        お気に入り
                    </a>
                </li>
                <li class="nav-item active mr-3 mt-1 text-left">{!! link_to_route('logout.get', 'Logout') !!}</li>
            @else
                {{-- ユーザ登録ページへのリンク --}}
                <li class="nav-item active">{!! link_to_route('signup.get', 'Signup', [], ['class' => 'nav-link']) !!}</li>
                {{-- ログインページへのリンク --}}
                <li class="nav-item active">{!! link_to_route('login', 'Login', [], ['class' => 'nav-link']) !!}</li>
            @endif
        </ul>
    </div>
    <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
    </form>
</nav>
</header>