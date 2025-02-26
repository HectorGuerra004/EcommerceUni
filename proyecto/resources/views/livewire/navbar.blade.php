<div class="navbar dark:bg-neutral-700 dark:text-white">
    <div class="flex-1">
        <a class="btn btn-ghost text-xl">daisyUI</a>
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
                    <li><a href="{{ url('/') }}">Inicio</a></li>
                    <li><a href="{{ url('catalogo') }}" >Catálogo</a></li>
                    <li><a>Registrarse</a></li>
                    <li><a>Iniciar Sesión</a></li>
                </ul>
            </div>
        </div>
        <div class="hidden lg:flex">
            <ul class="menu menu-horizontal px-1">
                <li><a href="{{ url('/') }}">Inicio</a></li>
                <li><a href="{{ url('catalogo') }}">Catálogo</a></li>
                <li><a>Registrarse</a></li>
                <li><a>Iniciar Sesión</a></li>
            </ul>
        </div>
    </div>
</div>
