    <x-home>

        <!-- Reseロゴ表示 -->
        <x-slot name="logo">
            <div class="sm:flex items-center sm:justify-start">
                <a href="{{ route('login') }}">
                    <img src=" {{ asset('img/rese_login.jpg')}} " alt="Rese LOGO" class="sm:w-20vw">
                </a>

                 @include('layouts.navigation')

                <!-- 検索機能表示 -->
                <form action="/logined/result" method="get" class="p-8 sm:mr-24">
                    @csrf
                    <div class="sm:flex shadow-lg border rounded-md bg-white">
                        <!--  都道府県プルダウン -->
                        <select class="border-none rounded-md" name="pref">
                        @foreach(config('pref') as $index => $area_name)
                            <option value="" hidden>All area</option>
                            <option value="{{ $index }}">{{ $area_name }}</option>
                        @endforeach
                        </select>
                        <!--  ジャンルプルダウン -->
                        <select class="border-none" name="genre">
                        @foreach(config('genre') as $index => $genre_name)
                            <option value="" hidden>All genre</option>
                            <option value="{{ $index }}">{{ $genre_name }}</option>
                        @endforeach
                        </select>
                        {{-- キーワード検索 --}}
                        <div class="container justify-start w-20vw">
                            <div class="container flex items-center">
                                <i class="fas fa-search text-gray-200 text-3xl"></i>
                                <input type="text" name="restaurant_name" placeholder="Search..." value="" class="w-full lg:w-30vw mb-5 border-none rounded-md">
                            </div>
                        </div>
                        <div>
                            <button name="action" type="submit" value="submit" class="hidden container btn-center bg-black px-14 py-3  rounded "></button>
                        </div>
                    </div>
                </form>

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

            <div class="flex justify-between pl-6 pr-6 flex-wrap sm:pt-28 pt-42vh">
                @foreach ($restaurants as $restaurant)
                <div class="lg:w-22vw md:w-29vw sm:w-42vw bg-white rounded-md shadow-md pb-4 ml-2 mr-2 mt-2">
                    <div class="blog-img">
                        <img src="{{ $restaurant->image_url }}">
                    </div>
                    <div>
                        <h2 class="font-extrabold pt-4 pl-4 text-xl">{{ $restaurant->restaurant_name }}</h2>
                        <div class="flex">
                            <p class="pl-4 text-xs font-extrabold">#{{ $restaurant->area->area_name }}</p>
                            <p class="pl-2 text-xs font-extrabold">#{{ $restaurant->genre->genre_name }}</p>
                        </div>
                    </div>
                    <div class="pt-4 pl-4 flex items-center justify-between">
                        <a href="{{ route('logined_getdetail', ['id'=>$restaurant->id]) }}" class="text-white bg-rese pl-3 pr-3 pt-1 pb-1 rounded-md">詳しくみる</a>
                        <button>
                            <i class="fas fa-heart text-gray-200 pr-4 text-3xl"></i>
                        </button>
                    </div>
                </div>
                @endforeach
            </div>

        </x-slot>
    </x-home>