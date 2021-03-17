@extends('layouts.app')

@section('content')
    @if (Auth::check())
        {{ Auth::user()->name }}
    @else
        <div class="center_jumbotron mt-4 row">
            <div class="text-center col-sm-7">
                <h1 class="heading">保有銘柄の四半期決算情報を記録しよう！</h1>
                <ul class="top_button list-unstyled">
                    {{-- ユーザ登録ページへのリンク --}}
                    {!! link_to_route('signup.get', 'はじめての方はこちら', [], ['class' => 'signup_btn btn-primary btn-block']) !!}
                    {{-- ユーザ登録ページへのリンク --}}
                    {!! link_to_route('login.post', 'ログインはこちら', [], ['class' => 'login_btn btn-primary btn-block']) !!}
                </ul>
            </div>
            <div class="col-sm-5">
                <picture class="top-picture">
                    <img class="img-fluid" src='{{ asset('storage/picture-top.png') }}'>
                </picture>
            </div>
        </div>
    @endif
    <div class="attendance col-sm-9"></div>
@endsection