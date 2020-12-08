<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>取引先掛取引与信管理システム</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            @media screen and (min-width: 670px) {

            .title {
                font-size: 5vw;
                width: 100vw;
                margin: 30px 0;
            }

            .links {
                margin: 30px 0;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 16px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .detail > span {
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            }
            
            @media screen and (max-width: 670px) { 

            .title {
                font-size: 23px;
                width: 100vw;
                margin-bottom: 40px;
            }

            .links {
                margin: 40px 0;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 16px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                display: flex;
                justify-content: center;
                margin-bottom: 20px;
            }

            .detail{ 
                text-align: center;
                margin-bottom: 20px;
                }
            
            .detail > span {
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .text {display: inline-block}
            
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title">
                  取引先掛取引与信管理システム
                </div>

                <div class="links">
                    <a href="/add_clients">新規取引先登録</a>
                    <a href="/index_clients">取引先一覧</a>
                    <a href="/index_trades">掛取引一覧</a>
                    <a href="/index_repayments">月次返済処理一覧</a>
                </div>
                <div class="annotation">
                  <div class="detail">
                    <span class="text">※取引先情報の編集・掛取引登録</span>
                    <span class="text">は取引先一覧から実行できます。</span>
                  </div>
                  <div class="detail">
                    <span class="text">※掛取引の編集・月次返済処理登録</span>
                    <span class="text">は掛取引一覧から実行できます。</span>
                  </div>
                </div>
            </div>
        </div>
    </body>
</html>
