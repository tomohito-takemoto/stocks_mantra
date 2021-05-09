@extends('layouts.app')

@section('content')
    @if (Auth::check())
        {{ Auth::user()->name }}
    @else
        <header class="masthead">
            <div class="container h-auto">
                <div class="container h-100">
                    <div class="row h-100 align-items-center justify-content-center text-center">
                        <div class="col-lg-10 align-self-end mb-2">
                            <img src="/storage/bull.png" class="img-fluid w-25" alt="Responsive image">
                        </div>
                        <div class="col-lg-10 align-self-end">
                            <h1 class="text-uppercase text-white font-weight-bold">Manage the financial results<br>of your Stocks</h1>
                        </div>
                        <div class="col-lg-8 align-self-baseline mt-4">
                            <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">サービス内容はこちら</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </header>
        
        <section class="page-section bg-primary pt-8 pb-8" id="about">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="text-center">
                        <h2 class="text-white">投資効率を大幅UP！<br>四半期決算を管理しよう！</h2>
                        <hr class="divider my-4" />
                        <ul class="top_button list-unstyled row">
                            {{-- ユーザ登録ページへのリンク --}}
                            {!! link_to_route('signup.get', 'はじめての方はこちら', [], ['class' => 'btn btn-light btn-xl js-scroll-trigger col-sm-6']) !!}
                            {{-- ユーザ登録ページへのリンク --}}
                            {!! link_to_route('login.post', '登録済みの方はこちら', [], ['class' => 'btn btn-light btn-xl js-scroll-trigger col-sm-6']) !!}
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="page-section bg-light pt-8 pb-8" id="second_about">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="mt-0">ご連絡はこちら</h2>
                        <hr class="divider my-4" />
                        <p class="text-muted mb-5">決算プロジェクトを始める準備はできましたか？<br>ご不明点は電話またはメールでご連絡いただければ<br>できるだけ早くご連絡いたします。</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 ml-auto text-center mb-5 mb-lg-0">
                        <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                        <div>+1 (555) 123-4567</div>
                    </div>
                    <div class="col-4 mr-auto text-center">
                        <a href="{{ route('contact') }}">
                            <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                        </a>
                        {{--<i class="fas fa-envelope fa-3x mb-3 text-muted">{!! link_to_route('contact', 'Contact') !!}</i>--}}
                        {{--<i class="fas fa-envelope fa-3x mb-3 text-muted"></i>--}}
                    </div>
                </div>
            </div>
            </div>
        </section>
        
    @endif
@endsection