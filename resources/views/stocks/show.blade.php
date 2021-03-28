@extends('layouts.app')

@section('content')
    <h2 class="create-item">{{ $stock->symbol }}の四半期決算</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">symbol</th>
                <th scope="col">year</th>
                <th scope="col">period</th>
                <th scope="col">estimate</th>
                <th scope="col">reported</th>
                <th scope="col">前年同期比</th>
                <th scope="col"></th>
            </tr>
        </thead>
        @foreach ($stocks as $stock)
        <tbody>
            <tr>
                <th>{{ $stock->symbol }}</th>
                <td>{{ $stock->year }}</td>
                <td>{{ $stock->period }}</td>
                <td>{{ $stock->estimate }}</td>
                <td>{{ $stock->reported }}</td>
                <td>前年同期比</td>
                <td class="operation row">
                    {!! link_to_route('stocks_edit', '更新', [$stock->id], ['class' => 'btn btn-primary col-sm-4']) !!}
                    {!! Form::model($stock, ['route' => ['stocks.destroy', $stock->id], 'method' => 'delete']) !!}
                        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
    <div class="row">
        {!! link_to_route('stocks.index', '一覧ページへ戻る', [], ['class' => 'btn btn-primary col-sm-4']) !!}
        {!! link_to_route('users.create', '追加', ['symbol' => 'test'], ['class' => 'btn btn-primary col-sm-4 offset-sm-4']) !!}
    </div>
@endsection