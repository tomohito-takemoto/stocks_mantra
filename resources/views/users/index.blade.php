@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <h1 class="heading">マイページ（登録銘柄一覧）</h1>
        <div class="mypage mt-4 row">
            <div class="user_gravatar col-sm-3">
                {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                <img class="mr-2 rounded" src="{{ Gravatar::get($user->email, ['size' => 70]) }}" alt="">
                <div>
                    {{ $user->name }}
                </div>
            </div>
            <div class="col-sm-9">
            @if (count($stocks) > 0)
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="テキスト入力欄">
	                <span class="input-group-btn">
		                <button type="button" class="btn btn-default">GO！</button>
	                </span>
                </div>
                
                @foreach ($stocks->unique('symbol') as $stock)
                <ul class="mystocks list-unstyled mt-4 row">
                    <li class="meigara col-sm-4">
                        <div>{{ $stock->symbol }}</div>
                    </li>
                    <li class="moreview col-sm-4">
                        {!! link_to_route('stocks.show', 'More View', ['stock' => $stock->id], ['class' => 'btn btn-primary']) !!}
                    </li>
                    <li class="moreview col-sm-4">
                        {!! link_to_route('stocks_create', '追加しよう', [$stock->id], ['class' => 'btn btn-success col-sm-4']) !!}
                    </li>
                </ul>
                @endforeach
            @else
            <div class="container">
                @include('stocks.show')
            </div>
            @endif    
        </div>
    @endif
@endsection