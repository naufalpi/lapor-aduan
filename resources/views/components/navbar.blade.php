

<nav id="navbar" class="fixed top-0 w-full z-50 transition-all duration-300 
    @if (Request::is('/')) 
        bg-transparent 
    @else 
        dark:bg-gray-900/98 bg-white shadow 
    @endif
">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('images/banjarnegara.png') }}" class="h-8" alt="Flowbite Logo">
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Lapor Mbae Guse</span>
        </a>
       
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-transparent md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent dark:bg-transparent md:dark:bg-transparent dark:border-gray-700">
                <li>
                    <a href="{{ route('home') }}" 
                        class="block py-2 px-3 rounded-sm md:p-0
                        {{ Request::routeIs('home') ? 'text-white bg-blue-700 md:bg-transparent md:text-blue-700 md:dark:text-blue-500' : 'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700' }}"
                        aria-current="{{ Request::routeIs('home') ? 'page' : '' }}">
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('aduans.index') }}" 
                    class="block py-2 px-3 rounded-sm md:p-0
                    {{ Request::routeIs('aduans.index') ? 'text-white bg-blue-700 md:bg-transparent md:text-blue-700 md:dark:text-blue-500' : 'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700' }}">
                    Aduan
                    </a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Alur Pengaduan</a>
                </li>
            </ul>
        </div>
    </div>
</nav>





