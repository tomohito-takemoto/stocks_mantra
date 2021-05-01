@extends('layouts.app')

@section('content')
    
    <div class="login" style="margin-top: 17rem;">
    {!! Form::open(['route' => 'login.post']) !!}
    <form class="form-inline" style="margin-top: 33%;">
        
        <div class="loginform row mt-6">
            <div class="form-group col-sm-6">
                {!! Form::label('email', 'Email') !!}
                {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-sm-6">
                {!! Form::label('password', 'Password') !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>
            {!! Form::submit('Log in', ['class' => 'btn btn-primary btn-block w-50']) !!}
        </div>
        
    </form>
    {!! Form::close() !!}
    </div>

    {{-- ユーザ登録ページへのリンク --}}
    <p class="Tosignup mt-2 text-center text-white">New user? {!! link_to_route('signup.get', 'Sign up now!') !!}</p>
    

@endsection