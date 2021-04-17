@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <h1 class="heading">マイページ（登録銘柄一覧）</h1>
        <div class="row">
            <aside class="col-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $user->name }}</h3>
                    </div>
                    <div class="card-body">
                        {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                        <img class="rounded img-fluid" src="{{ Gravatar::get($user->email, ['size' => 500]) }}" alt="">
                    </div>
                </div>
            </aside>
            <div class="col-8">
            @if (count($stocks) > 0)
            
                <ul class="nav nav-tabs nav-justified mb-3">
                    {{-- ユーザ詳細タブ --}}
                    <li class="nav-item">
                        <a href="{{ route('users.followings', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.followings') ? 'active' : '' }}">
                            TimeLine
                            <span class="badge badge-secondary">{{ $user->stocks_count }}</span>
                        </a>
                    </li>
                    {{-- フォロー一覧タブ --}}
                    <li class="nav-item">
                        <a href="{{ route('users.followings', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.followings') ? 'active' : '' }}">
                            Followings
                            <span class="badge badge-secondary">{{ $user->followings_count }}</span>
                        </a>
                    </li>
                    {{-- フォロワー一覧タブ --}}
                    <li class="nav-item">
                        <a href="{{ route('users.followers', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.followers') ? 'active' : '' }}">
                            Followers
                            <span class="badge badge-secondary">{{ $user->followers_count }}</span>
                        </a>
                    </li>
                </ul>
                    
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="テキスト入力欄">
	                <span class="input-group-btn">
		                <button type="button" class="btn btn-default">GO！</button>
	                </span>
                </div>
                
                @foreach ($stocks->unique('symbol') as $stock)
                <ul class="mystocks list-unstyled mt-4 row">
                    <li class="meigara text-center col-6">
                        <div>{{ $stock->symbol }}</div>
                    </li>
                    <li class="moreview text-right col-3">
                        {!! link_to_route('stocks.show', 'More View', ['stock' => $stock->id], ['class' => 'btn btn-primary']) !!}
                    </li>
                    <li class="moreview text-right col-3">
                        {!! link_to_route('stocks_create', '追加しよう', [$stock->id], ['class' => 'btn btn-success']) !!}
                    </li>
                </ul>
                @endforeach
                
                {{-- ページネーションのリンク --}}
                {{ $stocks->links() }}
                
                <div class="newticker_regist text-right">
                    {!! link_to_route('stocks.create', '新規追加', [], ['class' => 'btn btn-success col-sm-4']) !!}
                </div>
            @else
            <div class="container">
                @include('stocks.show')
            </div>
            @endif
        </div>
    @endif
@endsection