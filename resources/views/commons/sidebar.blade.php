<!-- サイドバー -->
<aside class="main-sidebar" style="background-color:#1264a3;" media="screen and (min-width:575px)">
    <section class="sidebar_conten">
        <ul class="ml-3 pt-3 list-unstyled" id="sidemenu">
            @if (Auth::check())
                <li class="card">
                    <div class="card-body">
                        {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                        <img class="rounded-circle img-fluid" src="{{ Gravatar::get($user->email, ['size' => 100]) }}" alt="">
                    </div>
                    <div class="card-footer">{{ $user->name }}</div>
                </li>
                <li class="nav-item active mr-3 mt-3">{!! link_to_route('stocks.index', 'マイページ', ['mypage']) !!}</li>
                <li class="nav-item active mr-3 mt-3">{!! link_to_route('users.index', 'ユーザー一覧', ['users_list']) !!}</li>
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