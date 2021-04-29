@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center mt-2 mb-5">お問い合わせ確認</h1>
        <div class="container">
            {!! Form::open(['route' => 'process', 'method' => 'POST']) !!}
                {{ csrf_field() }}
                <div class="form-group row">
                    <p class="col-sm-3 col-form-label">お名前:</p>
                    <div class="col-sm-9">
                        {{ $inputs['name'] }}
                    </div>
                </div>
                <input type="hidden" name="name" value="{{ $inputs['name'] }}">

                <div class="form-group row">
                    <p class="col-sm-3 col-form-label">メール:</p>
                    <div class="col-sm-9">
                        {{ $inputs['email'] }}
                    </div>
                </div>
                <input type="hidden" name="email" value="{{ $inputs['email'] }}">

                <div class="form-group row">
                    <p class="col-sm-3 col-form-label">性 別:</p>
                    <div class="col-sm-9">
                        {{ $inputs['gender'] }}
                    </div>
                </div>
                <input type="hidden" name="gender" value="{{ $inputs['gender'] }}">

                <div class="form-group row">
                    <p class="col-sm-3 col-form-label">内 容:</p>
                    <div class="col-sm-9">
                        {{ $inputs['body'] }}
                    </div>
                </div>
                <input type="hidden" name="body" value="{{ $inputs['body'] }}">
 
                <div class="text-center">
                    <button name="action" type="submit" value="return" class="btn btn-dark">入力画面に戻る</button>
                    <button name="action" type="submit" value="submit" class="btn btn-primary">送信</button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    
@endsection