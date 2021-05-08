@extends('layouts.app')

@section('content')
<h2 class="favorite_title">
    <p>お気に入り一覧</p>
</h2>
@if (count($stocks) > 0)
    <ul class="list-unstyled">
        @foreach ($stocks as $stock)
            <li class="media mb-3">
                {{-- お気に入りの所有者のメールアドレスをもとにGravatarを取得して表示 --}}
                <img class="mr-2 rounded-circle" src="{{ Gravatar::get($stock->user->email, ['size' => 50]) }}" alt="">
                <div class="media-body ml-2">
                    <div>
                        {{-- 所有者のユーザ詳細ページへのリンク --}}
                        {!! link_to_route('users.show', $stock->user->name, ['user' => $stock->user->id]) !!}
                        <span class="text-muted">posted at {{ $stock->created_at }}</span>
                    </div>
                    <div>
                        {{-- お気に入りのstock名 --}}
                        {!! link_to_route('reports.show', ( $stock->symbol ), [$stock->id], ['class' => 'text_link']) !!}
                    </div>
                    <div>
                        @include('favorite.button_for_list')
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $stocks->links() }}
    <div class="media-body">
        {!! link_to_route('stocks.index', 'マイページ', [], ['class' => 'btn btn-primary col-4']) !!}
    </div>
@endif
@endsection