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
                        {{--<a href="{{ route('report_edit', ['stock' => $stock]) }}" class="editbtn">
                            <i class="fas fa-edit fa-2x"></i>
                        </a>--}}
                        {!! link_to_route('report_edit', '更新', [$report->id], ['class' => 'btn btn-primary offset-4 col-4']) !!}
                    </div>
                    <div class="button-icon col-6">
                        {!! Form::model($report, ['route' => ['reports.destroy', $report->id], 'method' => 'delete']) !!}
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
            {!! link_to_route('report_create', '追加', ['stock' => $stock, 'id' => $stock->id], ['class' => 'btn btn-success']) !!}
        </div>
    @else
        <div class="row">
            {!! link_to_route('stocks.index', '一覧ページへ戻る', [], ['class' => 'btn btn-primary col-4']) !!}
        </div>
    @endif
    </div>
@endsection