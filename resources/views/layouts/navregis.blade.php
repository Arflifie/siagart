<nav class="flex p-4 items-center justify-between bg-yellow-500 sticky top-0 z-50 flex-wrap w-full">
    <div class="font-bold text-xl text-white flex items-center">
        <img src="{{ asset('img/whitelogonotext.png') }}" alt="logo" width="40">
        <span class="ml-1">SiagaRT</span>
    </div>

    <button id="profil-button" class="cursor-pointer hidden md:block">
        <img src="https://placehold.co/48x48" alt="48" class="rounded-full">
    </button>

    <div id="dropdown-menu"
        class="absolute right-4 mt-55 w-56 bg-white rounded-xl shadow-lg overflow-hidden z-50 hidden">
        <div class="flex flex-col text-gray-800 text-lg font-medium">

            <a href="#"
                class="flex items-center gap-3 px-4 py-3 hover:bg-gray-100 transition-colors duration-150">
                <span class="material-symbols-outlined text-2xl text-yellow-600">
                    account_circle
                </span>
                <span>Profil</span>
            </a>
            <a href="#"
                class="flex items-center gap-3 px-4 py-3 hover:bg-gray-100 transition-colors duration-150">
                <span class="material-symbols-outlined text-2xl text-yellow-600">
                    history
                </span>
                <span>Histori</span>
            </a>
            {{-- <a href="#"
                class="flex items-center gap-3 px-4 py-3 hover:bg-gray-100 transition-colors duration-150">
                <span class="material-symbols-outlined text-2xl text-yellow-600">
                    bar_chart_4_bars
                </span>
                <span>Statistik</span>
            </a> --}}

            <form action="{{ route('logout') }}" method="POST" class="w-full">
                @csrf
                <button type="submit"
                    class="flex items-center gap-3 w-full text-left px-4 py-3 hover:bg-red-100 hover:text-red-600 transition-colors duration-150">
                    <span class="material-symbols-outlined text-2xl">
                        logout
                    </span>
                    <span>Logout</span>
                </button>
            </form>

        </div>
    </div>

    <button id="menu-button" class="text-white md:hidden focus:outline-none cursor-pointer">
        <i id="menu-icon" class="fa-solid fa-bars fa-2xl"></i>
    </button>

    <div id="mobile-menu" class="hidden md:hidden w-full text-center mt-10">
        <div class="flex flex-col gap-3">
            <a href="#"
                class="text-white border-white text-xl font-bold py-3 border-2 rounded-xl hover:bg-gray-300 hover:text-yellow-700">Profile</a>

            <form action="{{ Route('logout') }}" method="POST"
                class="text-white border-white bg-yellow-600 text-xl font-bold py-3 border-2 rounded-xl hover:bg-gray-300 hover:text-yellow-700">
                @csrf<button>Logout
                </button></form>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/32571c53f3.js" crossorigin="anonymous"></script>
    <script>
        const menuIcon = document.getElementById('menu-icon');
        const menuBtn = document.getElementById('menu-button');
        const mobileBtn = document.getElementById('mobile-menu');

        const profilBtn = document.getElementById('profil-button');
        const dropDown = document.getElementById('dropdown-menu');

        menuBtn.addEventListener('click', () => {
            mobileBtn.classList.toggle('hidden');
            if (menuIcon.classList.contains('fa-bars')) {
                menuIcon.classList.remove('fa-bars');
                menuIcon.classList.add('fa-xmark');
            } else {
                menuIcon.classList.remove('fa-xmark');
                menuIcon.classList.add('fa-bars');
            }
        });
        profilBtn.addEventListener('click', () => {
            dropDown.classList.toggle('hidden')
        });
        window.addEventListener('click', (e) => {
            if (!profilBtn.contains(e.target) && !dropDown.contains(e.target)) {
                dropDown.classList.add('hidden');
            }
        });
    </script>
</nav>
