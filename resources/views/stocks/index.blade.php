@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="row">
            <aside class="col-sm-2">
                <div class="card">
                    <div class="card-body">
                        {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                        <img class="rounded-circle img-fluid" src="{{ Gravatar::get($user->email, ['size' => 500]) }}" alt="">
                    </div>
                    <div class="card-footer">{{ $user->name }}</div>
                </div>
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
                    <li class="meigara text-center col-8">
                        <div>{{ $stock->symbol }}</div>
                    </li>
                    <li class="moreview text-right col-2">
                        <a href="{{ route('stocks.show',  ['stock' => $stock->id]) }}" class="editbtn">
                            <i class="fas fa-edit fa-2x"></i>
                        </a>
                    </li>
                    <li class="moreview text-right col-2">
                        <a href="{{ route('stocks_create', [$stock->id]) }}" class="editbtn">
                            <i class="fas fa-folder-plus fa-2x"></i>
                        </a>
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
    @endif
@endsection