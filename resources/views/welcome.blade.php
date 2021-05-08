@extends('layouts.app')

@section('content')
    @if (Auth::check())
        {{ Auth::user()->name }}
    @else
    
        <div class="center_jumbotron" style="margin-top: 33%;">
            <div class="text-center mt-6">
                <ul class="top_button list-unstyled w-50" style="margin:auto;">
                    {{-- ユーザ登録ページへのリンク --}}
                    {!! link_to_route('signup.get', 'はじめての方はこちら', [], ['class' => 'signup_btn btn-primary btn-block']) !!}
                    {{-- ユーザ登録ページへのリンク --}}
                    {!! link_to_route('login.post', 'ログインはこちら', [], ['class' => 'login_btn btn-primary btn-block']) !!}
                </ul>
            </div>
        </div>
    @endif
@endsection