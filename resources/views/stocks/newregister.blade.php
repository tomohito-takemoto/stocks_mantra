@extends('layouts.app')

@section('content')
    <div class="main-area col-md-10 p-4 rounded">
        <h1 class="ticker text-center m-4 pb-4" style="color: #a27fa3; font-size:2rem; text-shadow: 1px 1px 1px #4e4e4e;">Act Now!</h1>
        <div class="row">
            <div class="col-sm-6">
                <img src="/storage/input.png" class="img-fluid picture" alt="Responsive image">
            </div>
        <div class="card bg-light p-5 col-sm-6" style="width: 30rem;">
            <div class="card-body">
                <h3 class="card-title text-center mb-4">登録しよう!</h5>
                <h5 class="card-subtitle mb-4 text-muted ">Ticker symbolまたは４桁の銘柄コードを入力してください。</h6>
                {!! Form::open(['route' => 'stocks.store']) !!}
                <div class="teickerarea row justify-content-center">
                    <div class="area1 w-100 col-md-6">
                        {!! Form::text('symbol', old('symbol'), ['class' => 'input-form form-control']) !!}
                    </div>
                    <div class="area2 w-100 col-md-6">
                        {!! Form::model(['route' => 'stocks.store']) !!}
                        {!! Form::submit('登録', ['class' => 'btn btn-primary new col-6']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        </div>
    </div>

@endsection