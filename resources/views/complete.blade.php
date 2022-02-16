<x-reservation-card>
    <!-- Reseロゴ表示 -->
     <x-slot name="logo">
            <div class="sm:flex items-center sm:justify-srtart">
                <a href="{{ route('login') }}">
                    <img src=" {{ asset('img/rese_login.jpg')}} " alt="Rese LOGO" class="sm:w-20vw">
                </a>

                @include('layouts.navigation')

                <!-- MENU表示 -->
                <x-slot name="menu">
                    <div class="openbtn"><span></span><span></span><span></span></div>
                    <nav id="g-nav">
                        <div id="g-nav-list"><!--ナビの数が増えた場合縦スクロールするためのdiv※不要なら削除-->
                            <div class="form-wrapper">
                                <form method="POST" action="{{ route('reload') }}">
                                    @csrf
                                    <a href="route('reload')" onclick="event.preventDefault(); this.closest('form').submit();">Home
                                    </a>
                                </form>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">Logout
                                    </a>
                                </form>
                                <form method="POST" action="{{ route('mypage') }}">
                                    @csrf
                                    <a href="route('mypage')" onclick="event.preventDefault(); this.closest('form').submit();">Mypage
                                    </a>
                                </form>
                            </div>
                        </div>
                    </nav>
                </x-slot>

            </div>
        </x-slot>


    <x-slot name="inner">
          <div class="flex justify-center sm:pt-28 pt-42vh">
             <div class=" bg-white rounded-md shadow-md w-30vw h-30vh">
                <div>
                    <h2 class="font-littlebold text-xl text-center mt-20">ご予約ありがとうございます</h2>
                </div>
                <div class="pt-8 flex justify-center">
                    <a href="/logined" class="text-white bg-rese pl-3 pr-3 pt-1 pb-1 rounded-md">戻る</a>
                </div>
            </div>
          </div>
    </x-slot>

</x-reservation-card>
