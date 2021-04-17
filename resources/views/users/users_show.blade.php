@extends('layouts.app')

@section('content')
    @if (Auth::id() == $user->id)
        @include('stocks.index');
    @else
        <div class="row">
            <aside class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $user->name }}</h3>
                    </div>
                    <div class="card-body">
                        {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                    <img class="rounded img-fluid" src="{{ Gravatar::get($user->email, ['size' => 500]) }}" alt="">
                    </div>
                </div>
                {{-- フォロー／アンフォローボタン --}}
                @include('user_follow.follow_button')
            </aside>
            <div class="col-8">
                @if (count($stocks) > 0)
                    <ul class="nav nav-tabs nav-justified mb-3">
                        {{-- フォロー一覧タブ --}}
                        <li class="nav-item"><a href="#" class="nav-link">Followings</a></li>
                        {{-- フォロワー一覧タブ --}}
                        <li class="nav-item"><a href="#" class="nav-link">Followers</a></li>
                    </ul>
                
                    @foreach ($stocks->unique('symbol') as $stock)
                    <ul class="mystocks list-unstyled mt-4 row">
                        <li class="meigara text-center col-6">
                            <div>{{ $stock->symbol }}</div>
                        </li>
                        <li class="moreview text-right col-3">
                            {!! link_to_route('stocks.show', 'More View', ['stock' => $stock->id], ['class' => 'btn btn-primary']) !!}
                        </li>
                        <li class="moreview text-right col-3">
                            {!! link_to_route('stocks_create', '追加しよう', [$stock->id], ['class' => 'btn btn-success']) !!}
                        </li>
                    </ul>
                    @endforeach
                
                    {{-- ページネーションのリンク --}}
                    {{ $stocks->links() }}
                
                @else
                    <div class="container">
                        nothing
                    </div>
                @endif
            </div>
        </div>
    @endif
@endsection