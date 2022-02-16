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
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
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

        <script type="text/javascript">
            //明日以降を選択可能
                $(function () {
                    var tomorrow = new Date();
                    tomorrow.setDate(tomorrow.getDate()+1); //今日から数えて1日後の日付を取得
                    var yyyy = tomorrow.getFullYear();
                    var mm = ("0"+(tomorrow.getMonth()+1)).slice(-2);
                    var dd = ("0"+tomorrow.getDate()).slice(-2);
                    document.getElementById("date").min=yyyy+'-'+mm+'-'+dd;
                });
        </script>

        <script>
            var time = document.getElementById('time');
                time.addEventListener('change', (event) => {
                var selecttime = document.getElementById('selecttime');
                selecttime.textContent = time.options[time.selectedIndex].textContent;
            });
        </script>

        <script>
            var member = document.getElementById('member');
                member.addEventListener('change', (event) => {
            var selectmember = document.getElementById('selectmember');
                selectmember.textContent = member.options[member.selectedIndex].textContent;
                });
        </script>

        <script>
            $(function(){
                $("#date").change(function(){
                    var str = "";
                    str = $(this).val();
                    $("#selectdate").html(str);
                }).change();
            });
        </script>

    </body>
</html>
