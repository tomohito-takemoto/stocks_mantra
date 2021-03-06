@extends('layouts.app')

@section('content')
<div class="main-area col-md-10">
    @if (Auth::check())
        <div class="row pl-4 pr-4">
            <aside class="col-sm-2 p-01">
                <div class="card">
                    <div class="card-body">
                        {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                        <img class="rounded-circle img-fluid p-3" src="{{ Gravatar::get($user->email, ['size' => 500]) }}" alt="">
                    </div>
                    <div class="card-footer p-0 pb-3 pt-1">{{ $user->name }}</div>
                </div>
                
                {{-- フォロー／アンフォローボタン --}}
                @include('user_follow.follow_button')
            </aside>
            <div class="stock_table col-sm-10">
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
                    
                        {{-- お気に入り一覧 --}}
                        <li class="nav-item">
                            <a href="{{ route('stocks.favorites_list', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('stocks.favorites_list') ? 'active' : '' }}">
                                お気に入り
                                <span class="badge badge-secondary">{{ $user->favorites_count }}</span>
                            </a>
                        </li>
                    </ul>
                
                    @foreach ($stocks->unique('symbol') as $stock)
                    <ul class="mystocks list-unstyled mt-4 row">
                        <li class="meigara text-center col-8">
                            <div>{{ $stock->symbol }}</div>
                        </li>
                        <li class="moreview text-right col-2">
                            <a href="{{ route('reports.show',  [$stock->id]) }}" class="editbtn">
                                <i class="fas fa-eye fa-2x"></i>
                            </a>
                        </li>
                        <li class="moreview text-right col-2">
                            {!! link_to_route('report_create', '追加', ['stock' => $stock, 'id' => $stock->id], ['class' => 'btn btn-success']) !!}
                        </li>
                    </ul>
                    @endforeach
                
                    {{-- ページネーションのリンク --}}
                    <div class="footspace row">
                        <div class="footspace col-sm-8">
                            {{ $stocks->links() }}
                        </div>
                        <div class="newticker_regist text-right col-sm-4">
                            {!! link_to_route('stocks.create', '新規追加', [], ['class' => 'btn btn-success']) !!}
                        </div>
                    </div>
                @else
                <div class="container">
                    @include('stocks.show')
                </div>
                @endif
            </div>
        </div>
    @endif
</div>
@endsection