@if (Auth::id() != $user->id)
    {{-- お気に入りボタンのフォーム --}}
    @if (Auth::user()->is_favoriting($stock->id))
        {!! Form::open(['route' => ['stocks.unfavorite', $stock->id], 'method' => 'delete']) !!}
            {!! Form::submit('Unfavorite', ['class' => 'btn btn-danger btn-sm']) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['stocks.favorite', 'id' => $stock->id], 'method' => 'store']) !!}
            {!! Form::submit('お気に入り', ['class' => 'btn btn-success btn-sm']) !!}
        {!! Form::close() !!}
    @endif
@endif