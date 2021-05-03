@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="stock_table">
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
                        <a href="{{ route('stocks.index',  ['stock' => $stock->id]) }}" class="editbtn">
                            <i class="fas fa-edit fa-2x"></i>
                        </a>
                    </li>
                    <li class="moreview text-right col-2">
                        <a href="{{ route('report', [$stock->id]) }}" class="editbtn">
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