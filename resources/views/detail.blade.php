    <x-reservation-card>

        <!-- Reseロゴ表示 -->
        <x-slot name="logo">
            <div class="sm:flex items-center sm:justify-srtart">
                <a href="{{ route('login') }}">
                    <img src=" {{ asset('img/rese_login.jpg')}} " alt="Rese LOGO" class="sm:w-20vw">
                </a>

                <!-- MENU表示 -->
                <x-slot name="menu">
                    <div class="openbtn"><span></span><span></span><span></span></div>
                    <nav id="g-nav">
                        <div id="g-nav-list"><!--ナビの数が増えた場合縦スクロールするためのdiv※不要なら削除-->
                            <ul>
                            <li><a href="/">Home</a></li> 
                            <li><a href="/register">Registration</a></li> 
                            <li><a href="/login">Login</a></li> 
                            </ul>
                        </div>
                    </nav>
                </x-slot>

            </div>
        </x-slot>

        <x-slot name="inner">

          <!-- 店舗詳細カード -->
          <div class="flex justify-between pl-12 pr-12 flex-wrap sm:pt-30 pt-42vh">
            <div class="sm:w-42vw rounded-md pb-4 ml-2 mr-2 mt-2">
              <div class="flex justify-start">
                <div class="pt-4 pb-4">
                  <a href="/" class="bg-white pt-1 pb-1 pr-2 pl-2 font-extrabold text-xl rounded-md shadow-md">＜</a>
                </div>
                <h2 class="font-extrabold p-4 text-xl">{{ $restaurant_detail->restaurant_name }}</h2>
              </div>
              <div>
                <img src="{{ $restaurant_detail->image_url }}" alt="{{ $restaurant_detail->restaurant_name }}">
              </div>
              <div class="flex pt-4 pb-4">
                <p class="font-extrabold">#{{ $restaurant_detail->area->area_name }}</p>
                <p class="pl-2 font-extrabold">#{{ $restaurant_detail->genre->genre_name }}</p>
              </div>
              <div>
                <p>#{{ $restaurant_detail->overview }}</p>
              </div>
            </div>

            <!-- 店舗予約カード -->
            <div class="sm:w-42vw rounded-md ml-2 mr-2 mt-2 bg-reservation-card h-full">
              <div class="">
                <h2 class="text-white font-extrabold text-xl pb-4 pl-8 pt-8">予約</h2>
              </div>
              <form method="POST" action="/offer">
                @csrf
                <ul>
                  @error('date')
                  <li class="pl-8 text-red-600">
                    {{$message}}
                  </li>
                  @enderror
                  <li class="pl-8">
                    <input type="date" id="date" name="date" class="rounded border-none w-15vw mb-4">
                  </li>
                  @error('time')
                  <li class="pl-8 text-red-600">
                    {{$message}}
                  </li>
                  @enderror
                  <li class="pr-8 pl-8">
                    <select class="border-none rounded mb-4 w-full" name="time" id="time">
                    @foreach(config('time') as $index => $time)
                        <option value="" hidden>Time</option>
                        <option value="{{ $index }}">{{ $time }}</option>
                    @endforeach
                    </select>
                  </li>
                  @error('member')
                  <li class="pl-8 text-red-600">
                    {{$message}}
                  </li>
                  @enderror
                  <li class="pr-8 pl-8">
                    <select class="border-none rounded mb-4 w-full" name="member" id="member">
                    @foreach(config('member') as $index => $member)
                        <option value="" hidden>Member</option>
                        <option value="{{ $index }}">{{ $member }}</option>
                    @endforeach
                    </select>
                  </li>
                </ul>
                <div class="bg-reservation-detail rounded-md ml-8 mr-8 mb-8vw">
                  <ul class="text-white p-8">
                    <li class="flex mb-4">
                      <label for="name" class="mr-20">Shop</label>
                      <p>{{ $restaurant_detail->restaurant_name }}</p>
                    </li>
                    <li class="flex mb-4">
                      <label for="date" class="mr-20">Date</label>
                      <p id="selectdate"></p>
                    </li>
                    <li class="flex mb-4">
                      <label for="time" class="mr-20">Time</label>
                      <p id="selecttime"></p>
                    </li>
                    <li class="flex">
                      <label for="member" class="mr-14">Member</label>
                      <p id="selectmember"></p>
                    </li>
                  </ul>
                </div>
                <div class="text-center">
                  <button class="w-full bg-reservation-btn text-white pt-4 pb-4 rounded-md rounded-t-none" type="submit">予約する</button>
                </div>
              </form>
            </div>
          </div>

        </x-slot>
    </x-reservation-card>