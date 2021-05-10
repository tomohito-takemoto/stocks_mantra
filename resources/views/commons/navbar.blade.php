    {{--<div @if(Request::is('/', 'login', 'signup')) class="jumbotron row mb-0 pb-0" style="background: url(storage/original-service.png) " @else class="background-else row" @endif>--}}
    {{--<div @if(Request::is('/', 'login', 'signup')) class="jumbotron row mb-0 pb-0" style="background: url(storage/original-service.png) " @else class="background-else row" @endif>--}}
    
@if(Request::is('/') || Request::is('login') || Request::is('signup'))
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="/">STOCKS MANTRA</a>
        
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#globalmenu" aria-controls="globalmenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse navbar-collapse" id="globalmenu">
                <ul class="navbar-nav ml-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger pl-3" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger pl-3" href="#services">Services</a></li>
                    @if (Auth::check())
                        <li class="nav-item js-scroll-trigger pl-3">{!! link_to_route('mypage', 'マイページ') !!}</li>
                        <li class="nav-item js-scroll-trigger pl-3">{!! link_to_route('users.index', 'ユーザー一覧') !!}</li>
                        <li class="nav-item js-scroll-trigger pl-3">
                            <a href="{{ route('stocks.favorites_list', ['id' => Auth::user()->id]) }}" class="nav-text {{ Request::routeIs('stocks.favorites_list') ? 'active' : '' }}">お気に入り</a>
                        </li>
                        <li class="nav-item active mr-3 mt-1 text-left">{!! link_to_route('logout.get', 'Logout') !!}</li>
                    @else
                        {{-- ユーザ登録ページへのリンク --}}
                        <li class="nav-item js-scroll-trigger pl-3">{!! link_to_route('signup.get', 'Signup', [], ['class' => 'nav-link']) !!}</li>
                        {{-- ログインページへのリンク --}}
                        <li class="nav-item js-scroll-trigger pl-3">{!! link_to_route('login', 'Login', [], ['class' => 'nav-link']) !!}</li>
                    @endif
                    <li class="nav-item pl-3">{!! link_to_route('contact', 'Contact', [], ['class' => 'nav-link']) !!}</li>
                </ul>
            </div>
        </div>
    </nav>
@else
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" style="background:#4a154b" id="mainNavi">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="/">STOCKS MANTRA</a>
        
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#globalmenu" aria-controls="globalmenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse navbar-collapse" id="globalmenu">
                <ul class="navbar-nav ml-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger pl-3 text-white" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger pl-3 text-white" href="#services">Services</a></li>
                    @if (Auth::check())
                        <li class="nav-link jrs-scoll-trigger pl-3">{!! link_to_route('mypage', 'マイページ') !!}</li>
                        <li class="nav-link js-scroll-trigger pl-3">{!! link_to_route('users.index', 'ユーザー一覧') !!}</li>
                        <li class="nav-link js-scroll-trigger pl-3">
                            <a href="{{ route('stocks.favorites_list', ['id' => Auth::user()->id]) }}" class="nav-text {{ Request::routeIs('stocks.favorites_list') ? 'active' : '' }}">お気に入り</a>
                        </li>
                        <li class="nav-item active pl-3 text-left">{!! link_to_route('logout.get', 'Logout', [], ['class' => 'nav-link text-white']) !!}</li>
                    @else
                        {{-- ユーザ登録ページへのリンク --}}
                        <li class="nav-item js-scroll-trigger pl-3">{!! link_to_route('signup.get', 'Signup', [], ['class' => 'nav-link text-white']) !!}</li>
                        {{-- ログインページへのリンク --}}
                        <li class="nav-item js-scroll-trigger pl-3">{!! link_to_route('login', 'Login', [], ['class' => 'nav-link text-white']) !!}</li>
                    @endif
                    <li class="nav-item pl-3">{!! link_to_route('contact', 'Contact', [], ['class' => 'nav-link text-white']) !!}</li>
                </ul>
            </div>
        </div>
    </nav>
@endif