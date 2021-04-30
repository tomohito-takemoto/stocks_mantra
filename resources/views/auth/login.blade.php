@extends('layouts.app')

@section('content')

    <div class="center_jumbotron" style="margin-top: 15rem;>
        {!! Form::open(['route' => 'login.post']) !!}
        <ul class="loginform list-unstyled row mt-6">
            <li class="form-group col-sm-6">
                {!! Form::label('email', 'Email') !!}
                {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
            </li>

            <li class="form-group col-sm-6">
                {!! Form::label('password', 'Password') !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </li>
        </ul>

        {!! Form::submit('Log in', ['class' => 'btn btn-primary btn-block w-50']) !!}
        {!! Form::close() !!}

        {{-- ユーザ登録ページへのリンク --}}
        <p class="Tosignup mt-2 text-center text-white">New user? {!! link_to_route('signup.get', 'Sign up now!') !!}</p>
    </div>
@endsection