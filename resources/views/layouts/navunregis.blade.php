<nav class="flex p-4 items-center justify-between bg-yellow-500 sticky top-0 z-50 flex-wrap shadow-lg">
    <div class="font-bold text-xl text-white flex items-center">
        <img src="{{ asset('img/whitelogonotext.png') }}" alt="logo" width="40">
        <span class="ml-1">SiagaRT</span>
    </div>

    <div class="hidden md:flex space-x-6">
        <div class="flex gap-7 list-none">
            <a href="{{ route('login') }}" class="text-white font-bold no-underline text-lg hover:text-gray-500">Login</a>
            <a href="{{ route('register') }}" class="text-white font-bold no-underline text-lg hover:text-gray-500">Register</a>
        </div>
    </div>

    <button id="menu-button" class="text-white md:hidden focus:outline-none cursor-pointer">
        <i id="menu-icon" class="fa-solid fa-bars fa-2xl"></i>
    </button>

    <div id="mobile-menu" class="hidden md:hidden w-full transition duration-200 ease-in-out">
        <div class="text-2xl flex flex-col gap-2 mt-5 text-center w-full font-bold">
            <a href="{{ route('login') }}"
                class="block w-full py-3 px-4 border-2 border-white rounded-xl text-white no-underline 
              hover:bg-gray-300 hover:text-yellow-600 transition duration-200">
                Login
            </a>
            <a href="{{ route('register') }}"
                class="block w-full py-3 px-4 border-2 border-white rounded-xl text-white no-underline 
              bg-yellow-700 hover:bg-gray-300 hover:text-yellow-600 transition duration-200">
                Register
            </a>
        </div>
    </div>


    <script src="https://kit.fontawesome.com/32571c53f3.js" crossorigin="anonymous"></script>
    <script>
        const menuBtn = document.getElementById('menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const closeBtn = document.getElementById('menu-icon');
        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            if (closeBtn.classList.contains('fa-bars')) {
                closeBtn.classList.remove('fa-bars');
                closeBtn.classList.add('fa-xmark');
            } else {
                closeBtn.classList.remove('fa-xmark');
                closeBtn.classList.add('fa-bars');
            }
        });
        // closeBtn.addEventListener('click', () => {
        //     mobileMenu.classList.toggle('hidden');
        // });
    </script>
</nav>
