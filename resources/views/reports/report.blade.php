@extends('layouts.app')

@section('content')
    {!! Form::open(['route' => ['report', $stock->id]]) !!}
    <h2 class="create-item">{{ $stock->symbol }}の決算を追加しよう</h2>
    <div class="newregist mt-4 row">
        <h3 class="col-sm-6"></h3>
        <div class="input-area col-sm-6">
            <div class="form-group" style='display:none'>
                {!! Form::text('symbol', $stock->symbol, ['class' => 'input-form form-control']) !!}
            </div>
        </div>

        <h3 class="col-sm-6">年度を入力</h3>
        <div class="input-area col-sm-6">
            <div class="form-group">
                {!! Form::text('year', old('year'), ['class' => 'input-form form-control']) !!}
            </div>
        </div>
        
        <h3 class="col-sm-6">期間を入力</h3>
        <div class="input-area col-sm-6">
            <div class="form-group">
                {!! Form::text('period', old('year'), ['class' => 'input-form form-control']) !!}
            </div>
        </div>
        
        <h3 class="col-sm-6">予想値を入力</h3>
        <div class="input-area col-sm-6">
            <div class="form-group">
                {!! Form::text('estimate', old('year'), ['class' => 'input-form form-control']) !!}
            </div>
        </div>
        
        <h3 class="col-sm-6">公表値を入力</h3>
        <div class="input-area col-sm-6">
            <div class="form-group text-right">
                {!! Form::text('reported', old('year'), ['class' => 'input-form form-control']) !!}
                <div class="formbutton-area text-right row">
                    
                    {!! Form::model(['route' => 'report'], [], ['method' => 'post']) !!}
                    {!! Form::submit('追加', ['class' => 'btn btn-primary col-sm-5 offset-sm-2'], [
                    'stock' => $stock,
                    ]) !!}
                    
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection