@extends('layouts.app2')

@section('content2')
    
    <section class="page-section bg-light pt-8 pb-8" id="login_about">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <img src="/storage/welcome.png" class="img-fluid picture pl-4" alt="Responsive image">
                </div>
                <div class="col-sm-6">
                    <h1 class="signup text-center m-4" style="color:#fff; font-size:2rem;">Welcome back!</h1>
                    {!! Form::open(['route' => 'login.post']) !!}
                        <form class="form-inline">
                            <div class="form-group">
                                {!! Form::label('email', 'Email', ['class' => 'text-white font-weight-bold m-0']) !!}
                                {!! Form::email('email', old('email'), ['class' => 'form-control-lg']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('password', 'Password', ['class' => 'text-white font-weight-bold m-0']) !!}
                                {!! Form::password('password', ['class' => 'form-control-lg']) !!}
                            </div>
                                {!! Form::submit('Log in', ['class' => 'btn btn-primary btn-block mt-5']) !!}
                        </form>
                    {!! Form::close() !!}
                    
                    {{-- ユーザ登録ページへのリンク --}}
                    <p class="Tosignup mt-2 text-center text-white">New user? {!! link_to_route('signup.get', 'Sign up now!') !!}</p>
                </div>
            </div>
        </div>
    </section>
    
@endsection