@extends('layouts.app')

@section('content')
    <h2 class="create-item">{{$stock->symbol}}の更新</h2>
    {!! Form::model($stock, ['route' => ['stocks_update', $stock->id]], ['method' => 'put']) !!}
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
                <td>{{ $stock->symbol }}</td>
                <td>{!! Form::text('stock_year', $stock->year, ['class' => 'form-control', 'id' => 'year']) !!}</td>
                <td>{!! Form::text('stock_period', $stock->period, ['class' => 'form-control', 'id' => 'period']) !!}</td>
                <td>{!! Form::text('stock_estimate', $stock->estimate, ['class' => 'form-control', 'id' => 'estimate']) !!}</td>
                <td>{!! Form::text('stock_reported', $stock->reported, ['class' => 'form-control', 'id' => 'reported']) !!}</td>
                <td>{!! Form::submit('更新', ['i class' => 'fas fa-edit fa-2x']) !!}</td>
            </tr>
        </tbody>
    </table>
    {!! Form::close() !!}
    <div class="return3">
        {!! link_to_route('stocks.show', '一覧ページへ戻る', ['stock'=>$stock->id], ['class' => 'btn btn-primary']) !!}
    </div>
@endsection