@extends('layouts.app')

@section('content')
    <h2 class="create-item">レコードを登録しよう</h2>
    <div class="newticker mt-4 row">
            <h3 class="col-sm-6">銘柄を入力</h3>
            <div class="input-area col-sm-6">
            {!! Form::open(['route' => 'stocks.store']) !!}
            <div class="form-group">
                {!! Form::text('symbol', old('symbol'), ['class' => 'input-form form-control']) !!}
            </div>
        </div>
        
        <h3 class="col-sm-6">年度を入力</h3>
        <div class="input-area col-sm-6">
            {!! Form::open(['route' => 'stocks.store']) !!}
            <div class="form-group">
                {!! Form::text('year', old('year'), ['class' => 'input-form form-control']) !!}
            </div>
        </div>
        
        <h3 class="col-sm-6">期間を入力</h3>
        <div class="input-area col-sm-6">
            {!! Form::open(['route' => 'stocks.store']) !!}
            <div class="form-group">
                {!! Form::text('period', old('year'), ['class' => 'input-form form-control']) !!}
            </div>
        </div>
        
        <h3 class="col-sm-6">予想値を入力</h3>
        <div class="input-area col-sm-6">
            {!! Form::open(['route' => 'stocks.store']) !!}
            <div class="form-group">
                {!! Form::text('estimate', old('year'), ['class' => 'input-form form-control']) !!}
            </div>
        </div>
        
        <h3 class="col-sm-6">公表値を入力</h3>
        <div class="input-area col-sm-6">
            {!! Form::open(['route' => 'stocks.store']) !!}
            <div class="form-group">
                {!! Form::text('reported', old('year'), ['class' => 'input-form form-control']) !!}
            </div>
        </div>
        
        {!! Form::submit('登録', ['route' => 'stocks.store'], ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
        {!! link_to_route('stocks.index', '一覧ページへ戻る', [], ['class' => 'btn btn-primary col-sm-4']) !!}
    </div>
@endsection