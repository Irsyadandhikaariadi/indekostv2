<div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
    <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300"
        id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
        data-dropdown-placement="bottom">
        <span class="sr-only">Open user menu</span>
        <img class="w-8 h-8 rounded-full" src="{{ asset('foto/dummy.jpeg') }}" alt="user photo">
    </button>
    <!-- Dropdown menu -->
    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow"
        id="user-dropdown">
        <div class="px-4 py-3">
            <span class="block text-base font-semibold text-gray-900">Tamu</span>
            <span class="block text-sm text-gray-500 max-w-32">Masuk / Daftar terlebih dahulu</span>
        </div>
        <ul class="py-2" aria-labelledby="user-menu-button">
            @auth
                <li>
                    <a href="#"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                </li>
                <li>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign
                        out</a>
                </li>
            @else
            <li class="flex items-center space-x-2 ms-2">
                <i class="fa-solid fa-user text-black me-3.5"></i>
                <a href="/login" class="block px-2 py-2 text-sm text-gray-700 hover:bg-gray-100">Masuk</a>
            </li>
            <li class="flex items-center space-x-2 ms-2">
                <i class="fa-solid fa-user-plus text-black"></i>
                <a href="/pilih role" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Daftar</a>
            </li>
            @endauth
        </ul>
    </div>
    <button data-collapse-toggle="navbar-user" type="button"
        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
        aria-controls="navbar-user" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M1 1h15M1 7h15M1 13h15" />
        </svg>
    </button>
</div>