@extends('layouts.app')

@section('content')
    <h2 class="create-item">{{ $stock->symbol }}の四半期決算</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">year</th>
                <th scope="col">period</th>
                <th scope="col">estimate</th>
                <th scope="col">reported</th>
                <th scope="col">前年同期比</th>
            </tr>
        </thead>
        @foreach ($reports as $report)
        <tbody>
            <tr>
                <td>{{ $report->year }}</td>
                <td>{{ $report->period }}</td>
                <td>{{ $report->estimate }}</td>
                <td>{{ $report->reported }}</td>
                <td>前年同期比</td>
                <td class="operation row">
                    <div class="button-icon col-6">
                        <a href="{{ route('report_edit',  [$stock->id]) }}" class="editbtn">
                            <i class="fas fa-edit fa-2x"></i>
                        </a>
                    </div>
                    <div class="button-icon col-6">
                        {!! Form::model($stock, ['route' => ['stocks.destroy', $stock->id], 'method' => 'delete']) !!}
                            {!! Form::button('<i class="far fa-trash-alt fa-2x"></i>', ['class' => 'btn awesome', 'type' => 'submit']) !!}
                        {!! Form::close() !!}
                    </div>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
    @if (\Auth::id() === $stock->user_id)
        <div class="row">
            {!! link_to_route('stocks.index', '一覧ページへ戻る', [], ['class' => 'btn btn-primary col-4']) !!}
            {!! link_to_route('stocks_create', '追加', [$stock->id], ['class' => 'btn btn-primary offset-4 col-4']) !!}
        </div>
    @else
        <div class="row">
            {!! link_to_route('stocks.index', '一覧ページへ戻る', [], ['class' => 'btn btn-primary col-4']) !!}
        </div>
    @endif
    </div>
@endsection