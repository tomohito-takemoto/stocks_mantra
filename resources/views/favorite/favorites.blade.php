@extends('layouts.app')

@section('content')
<div class="main-area col-md-10">
    <div class="row">
        <aside class="col-sm-4">
            {{-- ユーザ情報 --}}
            @include('users.card')
        </aside>
        <div class="col-sm-8">
            {{-- お気に入り一覧 --}}
            @include('microposts.favoritesichiranhyouji')
        </div>
    </div>
</div>
@endsection