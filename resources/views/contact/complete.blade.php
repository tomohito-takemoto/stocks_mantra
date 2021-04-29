@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1 class="text-center mt-2 mb-5">お問い合わせありがとうございました。</h1>
        <a href="{{ route('contact') }}" class="btn btn-primary">お問い合わせ入力画面に戻る</a>
    </div>
@endsection