@extends('layouts.app')

@section('content')
    
    <div class="text-center font-weight-bolder" style="margin-top: 33%; margin-bottom:5%;">
        <h1 class="signup" style="color:#4a154b; font-size:3rem;">Sign up</h1>
    </div>
    
    {!! Form::open(['route' => 'signup.post']) !!}
    <form class="form-inline mt-4">
    <div class="signup row">
        <div class="form-group col-sm-6">
            {!! Form::label('name', 'Name', ['class' => 'text-white ml-0 font-weight-bold']) !!}
            {!! Form::text('name', old('name'), ['class' => 'form-control form-control-lg w-75 mb-2 ml-0']) !!}
        </div>

        <div class="form-group col-sm-6">
            {!! Form::label('email', 'Email', ['class' => 'text-white ml-0 font-weight-bold']) !!}
            {!! Form::email('email', old('email'), ['class' => 'form-control form-control-lg w-75 mb-2 ml-0']) !!}
        </div>

        <div class="form-group col-sm-6">
            {!! Form::label('password', 'Password', ['class' => 'text-white ml-0']) !!}
            {!! Form::password('password', ['class' => 'form-control form-control-lg w-75 mb-2 ml-0']) !!}
        </div>

        <div class="form-group col-sm-6">
            {!! Form::label('password_confirmation', 'Confirm', ['class' => 'text-white ml-0']) !!}
            {!! Form::password('password_confirmation', ['class' => 'form-control form-control-lg w-75 mb-2 ml-0']) !!}
        </div>

        {!! Form::submit('Sign up！', ['class' => 'btn btn-primary btn-block mt-4 w-50']) !!}
    </div>
    </form>
    {!! Form::close() !!}
@endsection