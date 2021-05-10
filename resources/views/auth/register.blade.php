@extends('layouts.app2')

@section('content2')
    
    <section class="page-section bg-light pt-8 pb-8" id="login_about">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 mt-4">
                    <img src="/storage/signup.png" class="img-fluid picture pl-4" alt="Responsive image">
                </div>
                <div class="col-lg-6">
                    <h1 class="signup text-center mt-4" style="color:#fff; font-size:2rem;">Sign up</h1>
                    {!! Form::open(['route' => 'signup.post']) !!}
                    <form class="form-inline">
                        <div class="signup mt-4">
                            <div class="form-group">
                                {!! Form::label('name', 'Name', ['class' => 'text-white font-weight-bold m-0']) !!}
                                {!! Form::text('name', old('name'), ['class' => 'form-control form-control-lg']) !!}
                            </div>

                            <div class="form-group row">
                                {!! Form::label('email', 'Email', ['class' => 'text-white font-weight-bold m-0']) !!}
                                {!! Form::email('email', old('email'), ['class' => 'form-control form-control-lg']) !!}
                            </div>

                            <div class="form-group row">
                                {!! Form::label('password', 'Password', ['class' => 'text-white font-weight-bold m-0']) !!}
                                {!! Form::password('password', ['class' => 'form-control form-control-lg']) !!}
                            </div>

                            <div class="form-group row">
                                {!! Form::label('password_confirmation', 'Confirm', ['class' => 'text-white font-weight-bold m-0']) !!}
                                {!! Form::password('password_confirmation', ['class' => 'form-control form-control-lg']) !!}
                            </div>
                            {!! Form::submit('Sign up！', ['class' => 'btn btn-primary btn-block m-4']) !!}
                        </div>
                    </form>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection