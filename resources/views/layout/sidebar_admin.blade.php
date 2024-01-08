<button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
    type="button"
    class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd"
            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
        </path>
    </svg>
</button>

<aside id="default-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-200">
        <ul class="space-y-2 font-medium">
            <li>
                <div class="flex justify-center">
                    <img src="{{ asset('foto/inilogo.png') }}" alt="" width="150">
                </div>
            </li>
            <li>
                <a href="/dashboard"
                    class="flex items-center p-2 text-gray-900 rounded-lg {{ request()->is('/dashboard') ? 'bg-lime-700 text-white' : 'bg-gray-200' }}">
                    <svg class="w-5 h-5" fill="black" viewBox="0 0 22 21" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                        <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#"
                    class="flex items-center p-2 text-gray-900 rounded-lg {{ request()->is('') ? 'bg-lime-700 text-white' : 'bg-gray-200' }}">
                    <svg class="flex-shrink-0 w-5 h-5" fill="black" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="ms-3">Approval Kos</span>
                </a>
            </li>
            <li>
                <a href="/kelolaowner"
                    class="flex items-center p-2 text-gray-900 rounded-lg {{ request()->is('/kelolaowner') ? 'bg-lime-700 text-white' : 'bg-gray-200' }}">
                    <svg class="flex-shrink-0 w-5 h-5" fill="black" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                    </svg>
                    <span class="ms-3">Kelola Owner</span>
                </a>
            </li>
            <li>
                <a href="/transaksi"
                    class="flex items-center p-2 text-gray-900 rounded-lg {{ request()->is('/toparea') ? 'bg-lime-700 text-white' : 'bg-gray-200' }}">
                 <svg class="flex-shrink-0 w-5 h-5" fill="black" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
    <path fill="currentColor" fill-rule="evenodd" d="M1.5 1A1.5 1.5 0 0 0 0 2.5v7A1.5 1.5 0 0 0 1.5 11h3.985l-.537 1.5H4A.75.75 0 0 0 4 14h6a.75.75 0 0 0 0-1.5h-.948L8.515 11H9a1 1 0 1 0 0-2H2V3h5a1 1 0 0 0 0-2zm10.083-1a.75.75 0 0 1 .75.75v.528a1.999 1.999 0 0 1 1.553 1.305a.75.75 0 0 1-1.414.5A.498.498 0 0 0 12 2.75h-.967a.366.366 0 0 0-.079.723l1.473.322a2 2 0 0 1-.094 3.927v.528a.75.75 0 0 1-1.5 0v-.528a2.003 2.003 0 0 1-1.552-1.305a.75.75 0 0 1 1.414-.5a.5.5 0 0 0 .472.333H12a.5.5 0 0 0 .107-.99l-1.473-.322a1.866 1.866 0 0 1 .2-3.677V.75a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd"/>
</svg>
                    <span class="ms-3">Transaksi</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
