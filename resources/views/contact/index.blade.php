@extends('layouts.app2')

@section('content2')

    <section class="page-section bg-light" id="contact_about">
        <div class="container">
            <div class="card contact" style="background-color: #ffffff;">
                <h1 class="card-header text-center" style="color:#815784;">お問い合わせ</h1>
                <div class="card-body mt-2 p-4">
            
                    <div class="card-subtitle">
                        <p class="text-center mb-4">お問い合わせの内容は、受付日から3営業日以内をめどにご返信いたします。</p>
                
                        {!! Form::open(['route' => 'confirm', 'method' => 'POST']) !!}
                            {{ csrf_field() }}
                            <form class="mt-4" action="complete.php" method="POST">
                                <div class="form-group row">
                                    <label class="col-form-label ml-0 col-sm-3">氏名：</label>
                                    <div class="col-sm-9">
                                        {{-- <input type="text" class="form-control ml-0" name="name" required> --}}
                                        {{ Form::text('name', null, ['class' => 'form-control']) }}
                                    </div>
                                </div>
                                
                                @if ($errors->has('name'))
                                    <p class="alert alert-danger">{{ $errors->first('name') }}</p>
                                @endif

                                <div class="form-group row">
                                    <label class="col-form-label ml-0 col-sm-3">メールアドレス：</label>
                                    <div class="col-sm-9">
                                        {{-- <input type="text" class="form-control ml-0" name="mail" required> --}}
                                        {{ Form::text('email', null, ['class' => 'form-control']) }}
                                    </div>
                                </div>
                                
                                @if ($errors->has('email'))
                                    <p class="alert alert-danger">{{ $errors->first('email') }}</p>
                                @endif
                        
                                <div class="gender-section form-group row">
                                    <p class="col-sm-3 col-form-label">性別 <span class="badge badge-danger">必須</span></p>
                                    <div class="col-sm-9">
                                        <label>{{ Form::radio('gender', "男性") }}男性</label>
                                        <label>{{ Form::radio('gender', "女性") }}女性</label>
                                    </div>
                                </div>
                                
                                @if ($errors->has('gender'))
                                    <p class="alert alert-danger">{{ $errors->first('gender') }}</p>
                                @endif
                    
                                <div class="form-group row">
                                    <label class="col-form-label ml-0 col-sm-3">内容：</label>
                                    <div class="col-sm-9">
                                        {{-- <textarea class="form-control ml-0" name="content" required></textarea> --}}
                                        {{ Form::textarea('body', null, ['class' => 'form-control']) }}
                                        
                                        @if ($errors->has('contents'))
                                            <p class="alert alert-danger">{{ $errors->first('contents') }}</p>
                                        @endif
                                
                                        {{ Form::submit('確認画面へ', ['class' => 'btn btn-primary btn-block mt-4']) }}
                                
                                    </div>
                                </div>
                                
                                
                                
                            </form>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection