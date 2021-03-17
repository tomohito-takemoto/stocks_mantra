<header class="mb-4">
     <nav class="navbar navbar-dark mb-2" style="background-color:#4a154b;">
        {{-- トップページへのリンク --}}
        <a class="navbar-brand" href="/" style="color:#fff;">Stocks Mantra</a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                {{-- ユーザ登録ページへのリンク --}}
                <li>{!! link_to_route('signup.get', 'Signup', [], ['class' => 'nav-link']) !!}</li>
                {{-- ログインページへのリンク --}}
                <li><a href="#">Login</a></li>
            </ul>
        </div>
    </nav>
</header>