@extends('layouts.app')

@section('content')
<div class="main-area col-md-10">
    <div class="row">
        <aside class="col-sm-2">
            {{-- ユーザ情報 --}}
            @include('users.card')
        </aside>
        <div class="col-sm-9 offset-1">
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
            {{-- ユーザ一覧 --}}
            @include('users.users2')
        </div>
    </div>
</div>
@endsection