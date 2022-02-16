<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="bg-gray-100">
        <div class="fixed w-full">
            <div class="m-4">
                <div class="pt-6 sm:pt-0 bg-gray-100">
                    {{ $logo }}
                </div>
                 <div>
                    {{ $menu }}
                </div>
            </div>
        </div>

        <div class="pt-6 sm:pt-0 bg-gray-100">
            {{ $inner }}
        </div>

        <!-- menuスクロール読み込み -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

        <script>
            $(".openbtn").click(function () {//ボタンがクリックされたら
                $(this).toggleClass('active');//ボタン自身に activeクラスを付与し
                $("#g-nav").toggleClass('panelactive');//ナビゲーションにpanelactiveクラスを付与
            });

            $("#g-nav a").click(function () {//ナビゲーションのリンクがクリックされたら
                $(".openbtn").removeClass('active');//ボタンの activeクラスを除去し
                $("#g-nav").removeClass('panelactive');//ナビゲーションのpanelactiveクラスも除去
            });
        </script>
    </body>
</html>
