<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Stocks Mantra</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link href="{{asset('/assets/css/originalservice.css')}}" rel="stylesheet">
    </head>

    <body>
        {{-- ナビゲーションバー --}}
        @include('commons.navbar')
        
        <div @if(Request::is('/', 'login', 'signup')) class="background row" style="background: url(storage/original-service2.png) no-repeat; background-size: contain;" @else class="background-else row" @endif>
        
            @if (Auth::check())
            <div class="col-sm-2 sidebar-area style="background-color:#2b4f60;"">
                @include('commons.sidebar')
            </div>
            @endif
            <div class="container col-sm-10" style="height:800px;">
                {{-- エラーメッセージ --}}
                @include('commons.error_messages')
            
                @yield('content')
            </div>
        </div>
        
        <div class="footer" style="background:#000">
            @include('commons.footer')
        </div>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
    </body>
</html>