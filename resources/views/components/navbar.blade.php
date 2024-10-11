<nav class="bg-neutral-900 border-b border-gray-200 shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex  h-16">
            <div class="flex items-center">

                <div class="flex items-center">
                    <a href="{{ url('/') }}">
                        <h1 class="font-bold text-gray-200 text-2xl">Theo Henrique DEV</h1>
                    </a>
                </div>


            </div>

            <div class="items-center space-x-8 flex bg-red-500">
                <a href="{{ url('/') }}"
                    class="text-gray-500 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium">
                    Home
                </a>
                <a href="" class="text-gray-500 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium">
                    Sobre
                </a>
                <a href="" class="text-gray-500 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium">
                    Serviços
                </a>
                <a href="" class="text-gray-500 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium">
                    Contato
                </a>
            </div>

            <div class="flex sm:items-center bg-green-500">
                @guest
                    <a href="{{ route('login') }}"
                        class="text-gray-500 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium">
                        Entrar
                    </a>
                    <a href="{{ route('register') }}"
                        class="ml-4 text-gray-500 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium">
                        Registrar
                    </a>
                @else
                    <a href="#" class="text-gray-500 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium">
                        {{ Auth::user()->name }}
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="ml-4">
                        @csrf
                        <button type="submit"
                            class="text-gray-500 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium">
                            Sair
                        </button>
                    </form>
                @endguest
            </div>

            <div class="-mr-2 flex items-center sm:hidden">
                <button type="button"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500"
                    aria-expanded="false">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <a href="" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-700 hover:bg-gray-50">
                Home
            </a>
            <a href="" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-700 hover:bg-gray-50">
                Sobre
            </a>
            <a href="" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-700 hover:bg-gray-50">
                Serviços
            </a>
            <a href="" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-700 hover:bg-gray-50">
                Contato
            </a>
        </div>
    </div>
</nav>
