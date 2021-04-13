@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $user->name }}</h3>
                </div>
                <div class="card-body">
                    {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                    <img class="rounded img-fluid" src="{{ Gravatar::get($user->email, ['size' => 500]) }}" alt="">
                </div>
            </div>
            {{-- フォロー／アンフォローボタン --}}
            @include('user_follow.follow_button')
        </aside>
        <div class="col-sm-8">
            <ul class="nav nav-tabs nav-justified mb-3">
                {{-- ユーザ詳細タブ --}}
                <li class="nav-item">
                    <a href="{{ route('users.show', ['user' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.show') ? 'active' : '' }}">
                        TimeLine
                        <span class="badge badge-secondary">{{ $user->stocks_count }}</span>
                    </a>
                </li>
                {{-- フォロー一覧タブ --}}
                <li class="nav-item"><a href="#" class="nav-link">Followings</a></li>
                {{-- フォロワー一覧タブ --}}
                <li class="nav-item"><a href="#" class="nav-link">Followers</a></li>
            </ul>
            
            @if (count($stocks) > 0)
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
                <p class="nothing">Nothing</p>
            </div>
            @endif  
            
        </div>
    </div>
@endsection