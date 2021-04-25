@extends('layouts.app')

@section('content')
    @if (Auth::id() == $user->id)
        @include('stocks.index');
    @else
        <div class="row">
            <aside class="col-sm-2">
                <div class="card">
                    <div class="card-body">
                        {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                        <img class="rounded-circle img-fluid" src="{{ Gravatar::get($user->email, ['size' => 500]) }}" alt="">
                    </div>
                    <div class="card-footer">{{ $user->name }}</div>
                </div>
                
                {{-- フォロー／アンフォローボタン --}}
                @include('user_follow.follow_button')
            </aside>
            <div class="col-sm-9 offset-1">
                @if (count($stocks) > 0)
                    <ul class="nav nav-tabs nav-justified mb-3">
                        {{-- フォロー一覧タブ --}}
                        <li class="nav-item">
                            <a href="{{ route('users.followings', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.followings') ? 'active' : '' }}">
                                フォロー
                                <span class="badge badge-secondary">{{ $user->followings_count }}</span>
                            </a>
                        </li>
                    
                        {{-- フォロワー一覧タブ --}}
                        <li class="nav-item">
                            <a href="{{ route('users.followers', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.followers') ? 'active' : '' }}">
                                フォロワー
                                <span class="badge badge-secondary">{{ $user->followers_count }}</span>
                            </a>
                        </li>
                        
                    </ul>
                
                    @foreach ($stocks->unique('symbol') as $stock)
                    <ul class="mystocks list-unstyled mt-4 row">
                        @if (Auth::id() == $user->id)
                            <li class="meigara text-center col-6">
                                <div>{{ $stock->symbol }}</div>
                            </li>
                            <li class="moreview text-right col-3">
                                {!! link_to_route('stocks.show', 'More View', ['stock' => $stock->id], ['class' => 'btn btn-primary']) !!}
                            </li>
                            <li class="moreview text-right col-3">
                                {!! link_to_route('stocks_create', '追加しよう', [$stock->id], ['class' => 'btn btn-success']) !!}
                            </li>
                        @else
                            <li class="meigara text-center col-6">
                                <div>{{ $stock->symbol }}</div>
                            </li>
                            <li class="moreview text-right col-3">
                                {!! link_to_route('stocks.show', 'More View', ['stock' => $stock->id], ['class' => 'btn btn-primary']) !!}
                            </li>
                            <li class="text-right col-3">
                                @include('favorite.favorite_button')
                            </li>
                        @endif
                    </ul>
                    @endforeach
                
                    {{-- ページネーションのリンク --}}
                    {{ $stocks->links() }}
                
                @else
                    <div class="container">
                        nothing
                    </div>
                @endif
            </div>
        </div>
    @endif
@endsection