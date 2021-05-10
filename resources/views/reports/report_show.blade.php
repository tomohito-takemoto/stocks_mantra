@extends('layouts.app')

@section('content')
<div class="main-area col-md-10">
    <h2 class="create-item">{{ $stock->symbol }}の四半期決算</h2>
    @if (Auth::user()->id != $user->id)
        <div class="row mt-4">
            <aside class="col-sm-2 p-01">
                <div class="card">
                    <div class="card-body">
                        {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                        <img class="rounded-circle img-fluid" src="{{ Gravatar::get($user->email, ['size' => 500]) }}" alt="">
                    </div>
                    <div class="card-footer p-0 pb-3 pt-1">{{ $user->name }}</div>
                </div>
                
                {{-- フォロー／アンフォローボタン --}}
                @include('user_follow.follow_button')
            </aside>
    
            <table class="table table-bordered col-sm-10">
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
                    </tr>
                </tbody>   
                @endforeach
            </table>
            <div class="row">
                {!! link_to_route('stocks.index', '一覧ページへ戻る', [], ['class' => 'btn btn-primary col-4']) !!}
            </div>
        </div>        
    @else
        <div class="row mt-4">
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
            <div class="click row">
                {!! link_to_route('stocks.index', '一覧ページへ戻る', [], ['class' => 'btn btn-primary col-4']) !!}
                {!! link_to_route('report_create', '追加', ['stock' => $stock, 'id' => $stock->id], ['class' => 'btn btn-success col-4']) !!}
            </div>
        </div>    
    @endif
</div>
@endsection