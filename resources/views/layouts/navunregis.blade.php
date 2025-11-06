<nav class="flex p-4 items-center justify-between bg-yellow-400 sticky top-0 z-50">
    <div class="font-bold text-xl text-white flex items-center">
        <img src="{{ asset('img/whitelogonotext.png') }}" alt="logo" width="40">
        <span class="ml-1">SiagaRT</span>
    </div>

    <div class="flex">
        <a href="{{ route('login') }}"
            class="text-white no-underline! text-md bg-green-700 p-2 w-20 text-center font-bold rounded-lg
                   transition duration-200 ease-in-out hover:scale-105 hover:bg-green-950 hover:text-yellow-300 mr-5">
            Login
        </a>
        <a href="{{ route('register') }}"
            class="text-green-800 border-2 border-green-800 hover:bg-green-800 p-2 w-20 text-center font-bold no-underline!
                   rounded-lg hover:text-white transition duration-150 ease-in-out hover:scale-105">
            Daftar
        </a>
    </div>
</nav>
