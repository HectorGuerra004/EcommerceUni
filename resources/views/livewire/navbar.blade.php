<div class="navbar dark:bg-neutral-700 dark:text-white">
    <div class="flex-none">
        <a class="btn btn-ghost text-xl">Tienda</a>
    </div>
    <div class="flex-1">
        <form action="{{ route('catalogo') }}" method="GET">
        <div class="flex justify-center md:ml-60 ml-5">
            <input type="text" name="search" class="w-full max-w-[300px] bg-white text-black pl-2 text-base font-semibold outline-0 rounded-tl-lg rounded-bl-lg border-r"
                placeholder="Buscar Productos" id="">
            <button type="submit"
                class="bg-blue-500 p-2 rounded-tr-lg rounded-br-lg text-white font-semibold hover:bg-blue-800 transition-colors">Buscar</button>
            </div>
        </form>
    </div>
    <div class="flex-none">
        <div class="lg:hidden">
            <div class="dropdown dropdown-end">
                <label tabindex="0" class="btn btn-square btn-ghost">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="inline-block w-5 h-5 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </label>
                <ul tabindex="0"
                    class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-neutral-800 rounded-box w-52 z-50">
                    <li class='py-1'><a href="{{ url('/') }}" wire:navigate>Inicio</a></li>
                    <li class='py-1'><a href="{{ url('catalogo') }}" wire:navigate>Catálogo</a></li>

                    @auth
                        <!-- Opciones para usuarios autenticados -->
                        <li class='py-1'><livewire:cart-dropdown /></li>
                        {{-- <li class='py-1'><a href="{{ route('perfil') }}" wire:navigate>Perfil</a></li> --}}

                        <li class='py-1'>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit">Cerrar Sesión</button>
                            </form>
                        </li>
                    @else
                        <!-- Opciones para invitados -->
                        <li class='py-1'><a href="{{ route('registrate') }}" wire:navigate>Registrarse</a></li>
                        <li class='py-1'><a href="{{ route('iniciarSesion') }}" wire:navigate>Iniciar Sesión</a></li>
                    @endauth
                </ul>
            </div>
        </div>
        <div class="hidden lg:flex">
            <ul class="menu menu-horizontal px-1">
                <li class='py-1'><a href="{{ url('/') }}" wire:navigate>Inicio</a></li>
                <li class='py-1'><a href="{{ url('catalogo') }}" wire:navigate>Catálogo</a></li>

                @auth
                    <!-- Opciones para usuarios autenticados -->
                    {{-- <li class='py-1'><a href="{{ route('perfil') }}" wire:navigate>Perfil</a></li> --}}

                    <li class='py-1'><livewire:cart-dropdown /></li>
                    <li class='py-1'>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="cursor-pointer">Cerrar Sesión</button>
                        </form>
                    </li>
                @else
                    <!-- Opciones para invitados -->
                    <li class='py-1'><a href="{{ route('registrate') }}" wire:navigate>Registrarse</a></li>
                    <li class='py-1'><a href="{{ route('iniciarSesion') }}" wire:navigate>Iniciar Sesión</a></li>
                @endauth
            </ul>
        </div>
    </div>
</div>
