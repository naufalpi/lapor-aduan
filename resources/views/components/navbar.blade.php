<nav id="navbar" class="fixed top-0 w-full z-50 transition-all duration-300 
    @if (Request::is('/')) 
        bg-transparent 
    @else 
        bg-gray-900 shadow 
    @endif
">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('images/banjarnegara.png') }}" class="h-8" alt="Logo">
            <span class="self-center text-xl font-semibold whitespace-nowrap text-white">Lapor Mba'e Gus'e</span>
        </a>

        <!-- Hamburger Button -->
        <button id="navbar-toggle" type="button" 
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-lg text-gray-200 rounded-lg md:hidden hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-600"
            aria-controls="navbar-sticky" aria-expanded="false">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <!-- Menu Items -->
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul class="flex flex-col md:flex-row md:space-x-8 p-4 md:p-0 mt-4 md:mt-0 font-medium border border-gray-700 md:border-0 rounded-lg bg-gray-800 md:bg-transparent text-lg">
                <li>
                    <a href="{{ route('home') }}" 
                        class="block py-2 px-3 rounded-sm md:p-0
                        {{ Request::routeIs('home') ? 'text-white bg-blue-700 md:bg-transparent md:text-blue-500' : 'text-white hover:bg-gray-700 md:hover:bg-transparent md:hover:text-blue-500' }}"
                        aria-current="{{ Request::routeIs('home') ? 'page' : '' }}">
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('aduans.index') }}" 
                        class="block py-2 px-3 rounded-sm md:p-0
                        {{ Request::routeIs('aduans.index') ? 'text-white bg-blue-700 md:bg-transparent md:text-blue-500' : 'text-white hover:bg-gray-700 md:hover:bg-transparent md:hover:text-blue-500' }}">
                        Aduan
                    </a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-3 rounded-sm md:p-0 text-white hover:bg-gray-700 md:hover:bg-transparent md:hover:text-blue-500">
                        Alur Pengaduan
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- JavaScript for mobile toggle -->
<script>
    const toggleBtn = document.getElementById('navbar-toggle');
    const navMenu = document.getElementById('navbar-sticky');

    toggleBtn.addEventListener('click', () => {
        navMenu.classList.toggle('hidden');
    });
</script>
