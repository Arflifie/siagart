<nav class="flex p-4 items-center justify-between bg-yellow-400 sticky top-0 z-50 flex-wrap w-full">
    <div class="font-bold text-xl text-white flex items-center">
        <img src="{{ asset('img/whitelogonotext.png') }}" alt="logo" width="40">
        <span class="ml-1">SiagaRT</span>
    </div>

    <button id="profil-button" class="cursor-pointer">
        <img src="https://placehold.co/48x48" alt="48" class="rounded-full">
    </button>

    <div id="dropdown-menu"
        class="absolute right-0 bg-white w-50 h-auto mr-4 rounded-lg shadow-lg mt-52 z-50 text-center hidden">
        <div class="flex flex-col">
            <a href="#" class="block text-xl hover:bg-gray-300 p-2 rounded-t-lg">Profil</a>
            <a href="#" class="block text-xl hover:bg-gray-300 p-2">Histori</a>
            <form action="{{ Route('logout') }}" class="text-xl hover:bg-gray-300 p-2 rounded-b-lg">
                <button>
                    Logout
                </button>
            </form>
        </div>

    </div>

    <button id="menu-button" class="text-white md:hidden focus:outline-none">
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
         profilBtn.addEventListener('click', () =>{
            dropDown.classList.toggle('hidden')
        });
        window.addEventListener('click', (e)=>{
             if (!profilBtn.contains(e.target) && !dropDown.contains(e.target)) {
            dropDown.classList.add('hidden');
             }
        });
    </script>
</nav>
