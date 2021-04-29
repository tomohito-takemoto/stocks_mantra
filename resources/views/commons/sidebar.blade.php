<!-- サイドバー -->
<aside class="main-sidebar" style="background-color:#1264a3;" media="screen and (min-width:575px)">
    <section class="sidebar_conten">
        <ul class="p-3 pt-4 list-unstyled" id="sidemenu">
            @if (Auth::check())
                <li class="card">
                    <div class="card-body d-block mx-auto">
                        {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                        <img class="rounded-circle img-fluid" src="{{ Gravatar::get(\Auth::user()->email, ['size' => 80]) }}" alt="">
                    </div>
                    <div class="card-footer text-center text-light">{{ \Auth::user()->name }}</div>
                </li>
                <li class="nav-item active mr-3 mt-3">{!! link_to_route('stocks.index', 'マイページ') !!}</li>
                <li class="nav-item active mr-3 mt-3">{!! link_to_route('users.index', 'ユーザー一覧') !!}</li>
                <li class="nav-item active mr-3 mt-3">
                    <a href="{{ route('stocks.favorites_list', ['id' => Auth::user()->id]) }}" class="nav-text {{ Request::routeIs('stocks.favorites_list') ? 'active' : '' }}">
                        お気に入り
                    </a>
                </li>
                <li class="nav-item active mr-3 mt-3">{!! link_to_route('contact', 'お問い合わせ') !!}</li>
                <li class="nav-item active mr-3 mt-3">{!! link_to_route('logout.get', 'ログアウト', ['logout']) !!}</li>
            @else
                {{-- ユーザ登録ページへのリンク --}}
                <li class="nav-item active">{!! link_to_route('signup.get', 'Signup', [], ['class' => 'nav-link mt-3']) !!}</li>
                {{-- ログインページへのリンク --}}
                <li class="nav-item active">{!! link_to_route('login', 'Login', [], ['class' => 'nav-link mt-3']) !!}</li>
            @endif
        </ul>
    </section>
</aside><!-- end sidebar -->