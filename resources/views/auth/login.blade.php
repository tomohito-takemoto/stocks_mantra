@extends('layouts.app')

@section('content')
    
    <section class="page-section bg-light pt-8 pb-8" id="second_about">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <img src="/storage/welcome.png" class="img-fluid picture pl-4" alt="Responsive image">
                </div>
                <div class="col-sm-6">
                    {!! Form::open(['route' => 'login.post']) !!}
                        <form class="form-inline" style="margin-top: 33%;">
                            <div class="form-group">
                                {!! Form::label('email', 'Email') !!}
                                {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('password', 'Password') !!}
                                {!! Form::password('password', ['class' => 'form-control']) !!}
                            </div>
                                {!! Form::submit('Log in', ['class' => 'btn btn-primary btn-block w-50']) !!}
                        </form>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        {{-- ユーザ登録ページへのリンク --}}
        <p class="Tosignup mt-2 text-center text-white">New user? {!! link_to_route('signup.get', 'Sign up now!') !!}</p>
    </section>
    
@endsection