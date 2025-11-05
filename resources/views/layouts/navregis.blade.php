<nav class="flex p-4 items-center justify-between bg-yellow-500">
    <div class="font-bold text-xl text-white">
        <span>SiagaRT</span>
    </div>
    <li class="flex items-center">
        <img src="https://placehold.co/48x48"
            class=" right-6 top-6 rounded-full border-2 border-white items-center mr-9 hover:scale-110 transition duration-150 ease-in-out" />

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <div
                class="text-green-700 text-md border-2 border-green-700 p-2 w-20 text-center font-bold rounded-lg
  transition duration-200 ease-in-out hover:scale-105 hover:bg-red-500 hover:text-yellow-200">
                <button>
                    logout
                </button>
            </div>
        </form>
    </li>
</nav>
