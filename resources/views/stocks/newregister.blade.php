@extends('layouts.app')

@section('content')

    <h2 class="create-item">銘柄名を登録しよう</h2>
    <div class="newregist mt-4 row">
        <h3 class="col-sm-6">銘柄を入力</h3>
        
        {!! Form::open(['route' => 'stocks.store']) !!}
        <div class="input-area col-sm-6">
            <div class="form-group">
                {!! Form::text('symbol', old('symbol'), ['class' => 'input-form form-control']) !!}
            </div>
        </div>
            {!! Form::model(['route' => 'stocks.store']) !!}
            {!! Form::submit('登録', ['class' => 'btn btn-primary col-sm-5 offset-sm-2']) !!}
        {!! Form::close() !!}

@endsection