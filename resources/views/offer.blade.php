<x-thanks-card>
    <!-- Reseロゴ表示 -->
    <x-slot name="logo">
        <a href="/">
            <img src=" {{ asset('img/rese_login.jpg')}} " alt="Rese LOGO" class="sm:w-20vw sm:pl-14 sm:pt-5">
        </a>
    </x-slot>

    <x-slot name="inner">
          <div class="flex justify-center sm:pt-28 pt-42vh">
             <div class=" bg-white rounded-md shadow-md w-30vw h-30vh">
                <div>
                    <h2 class="font-littlebold text-xl text-center mt-20">ログインしてください</h2>
                </div>
                <div class="pt-8 flex justify-center">
                    <a href="/login" class="text-white bg-rese pl-3 pr-3 pt-1 pb-1 rounded-md">戻る</a>
                </div>
            </div>
          </div>
    </x-slot>

</x-thanks-card>
