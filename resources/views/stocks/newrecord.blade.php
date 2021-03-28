@section('content')
    <h2 class="create-item">四半期決算を登録しよう</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">symbol</th>
                <th scope="col">year</th>
                <th scope="col">period</th>
                <th scope="col">estimate</th>
                <th scope="col">reported</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td></td>
                <td></td>
                <td></td>
        </tbody>
    </table>
    <div class="top_button">
        {{-- レコード登録へのリンク --}}
        {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}
    </div>
@endsection