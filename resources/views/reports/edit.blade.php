@extends('layouts.app')

@section('content')
    <h2 class="create-item">{{ $report->stock->symbol }}の更新</h2>
    {!! Form::model($report, ['route' => ['report_update', $report->id], 'method' => 'put']) !!}
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">symbol</th>
                <th scope="col">year</th>
                <th scope="col">period</th>
                <th scope="col">estimate</th>
                <th scope="col">reported</th>
                <th scope="col"></th>
            </tr>
        </thead>
        
        <tbody>
            <tr>
                <td>{{ $report->stock->symbol }}</td>
                <td>{!! Form::text('year', null, ['class' => 'form-control']) !!}</td>
                <td>{!! Form::text('period', null, ['class' => 'form-control']) !!}</td>
                <td>{!! Form::text('estimate', null, ['class' => 'form-control']) !!}</td>
                <td>{!! Form::text('reported', null, ['class' => 'form-control']) !!}</td>
                <td>{!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}</td>
                {{--<td>{!! link_to_route('report_update', '更新', [$report->id], ['class' => 'btn btn-primary offset-4 col-4']) !!}</td>--}}
            </tr>
        </tbody>
    </table>
    {!! Form::close() !!}
    <div class="return3">
        {{--{!! Form::model($report, ['route' => ['reports.show']]) !!}
            {!! Form::submit('一覧ページへ戻る', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}--}}
        {!! link_to_route('reports.show', '一覧ページへ戻る', [''], ['class' => 'btn btn-primary']) !!}
    </div>
@endsection