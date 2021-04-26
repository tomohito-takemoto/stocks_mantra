@extends('layouts.app')

@section('content')
    <div class="card">
        <h1 class="card-header mt-3 pb-3 border-bottom">お問い合わせ</h1>

        <div class="card-body mt-4 row">
            <div class="col-sm-2"><i class="far fa-envelope fa-2x"></i></div>
            <div class="card-subtitle col-sm-10">
                <p>お問い合わせの内容は、受付日から3営業日以内をめどにご返信いたします。</p>
                <form class="mt-4" action="complete.php" method="POST">
                    <div class="form-group row">
                        <label class="col-form-label ml-0 col-sm-3">氏名：</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control ml-0" name="name" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label ml-0 col-sm-3">メールアドレス：</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control ml-0" name="mail" required>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-form-label ml-0 col-sm-3">内容：</label>
                        <div class="col-sm-9">
                            <textarea class="form-control ml-0" name="content" required></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="offset-sm-3 col-sm-9">
                            <button type="submit" class="btn btn-primary btn-block btn-success">お問い合わせ内容を送信する</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection