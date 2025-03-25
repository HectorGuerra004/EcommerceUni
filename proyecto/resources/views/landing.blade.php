<!doctype html>
<html data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body>

    <div class="min-h-screen flex flex-col">
        <livewire:navbar />
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
        <livewire:carousel />
        <main class="flex-grow bg-gray-200">
            <div class="mt-2 mb-2">

                <p class="flex justify-center md:text-5xl text-3xl text-center md:text-left font-bold">Productos
                    Recomendados</p>
                @auth
                    <div class="p-4 bg-gray-100">
                        <p>Usuario: {{ auth()->user()->email }}</p>
                        <p>Roles: {{ auth()->user()->roles->pluck('nombre')->join(', ') }}</p>
                    </div>
                @endauth
            </div>


            <div class="grid grid-cols-1 md:grid-cols-2 gap-2 ml-2 mr-2">
                <div class="h-48 md:h-[32rem] bg-gray-200 overflow-hidden relative group rounded-sm">
                    <div class="absolute inset-0 w-full h-full">
                        <img src="storage/img/play.jpeg" alt="Consolas"
                            class="object-cover w-full !h-full transition-all duration-500 ease-out group-hover:scale-105">
                    </div>
                    <p
                        class="absolute inset-0 flex items-center justify-center text-white text-xl font-bold bg-black/30 z-10">
                        Playstation 5
                    </p>
                </div>
                <div class="h-48 md:h-[32rem] bg-gray-200 overflow-hidden relative group rounded-sm">
                    <div class="absolute inset-0 w-full h-full">
                        <img src="storage/img/xbox.jpeg" alt="Consolas"
                            class="object-cover w-full !h-full transition-all duration-500 ease-out group-hover:scale-105">
                    </div>
                    <p
                        class="absolute inset-0 flex items-center justify-center text-white text-xl font-bold bg-black/30 z-10">
                        Xbox Series X
                    </p>
                </div>
                <div class="h-48 md:h-[32rem] bg-gray-200 overflow-hidden relative group rounded-sm">
                    <div class="absolute inset-0 w-full h-full">
                        <img src="storage/img/iphone.jpg" alt="Consolas"
                            class="object-cover w-full !h-full transition-all duration-500 ease-out group-hover:scale-105">
                    </div>
                    <p
                        class="absolute inset-0 flex items-center justify-center text-white text-xl font-bold bg-black/30 z-10">
                        Iphone 15
                    </p>
                </div>
                <div class="h-48 md:h-[32rem] bg-gray-200 overflow-hidden relative group rounded-sm">
                    <div class="absolute inset-0 w-full h-full">
                        <img src="storage/img/laptop.jpg" alt="Consolas"
                            class="object-cover w-full !h-full transition-all duration-500 ease-out group-hover:scale-105">
                    </div>
                    <p
                        class="absolute inset-0 flex items-center justify-center text-white text-xl font-bold bg-black/30 z-10">
                        Alienware M15
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-10 p-6 bg-blue-500">
                <!-- Columna de texto -->
                <div class="flex items-center p-4 md:p-6 bg-blue-600/20 rounded-lg">
                    <p class="text-center text-white text-xl md:text-2xl lg:text-3xl font-bold leading-tight uppercase">
                        EXPLORA LAS CATEGORÍAS PRINCIPALES QUE TENEMOS PARA TI
                    </p>
                </div>

                <!-- Columnas de imágenes -->
                <div class="group relative aspect-square overflow-hidden rounded-xl shadow-lg">
                    <img src="storage/img/consolas2.jpg" alt="Categoría 1"
                        class="w-full !h-full object-cover transition-all duration-500 ease-out group-hover:scale-105">
                    <div class="absolute inset-0 bg-black/30 flex items-center justify-center">
                        <span class="text-white text-lg font-bold tracking-wide">Consolas</span>
                    </div>
                </div>

                <div class="group relative aspect-square overflow-hidden rounded-xl shadow-lg">
                    <img src="storage/img/computadoras.jpeg" alt="Categoría 2"
                        class="w-full !h-full object-cover transition-all duration-500 ease-out group-hover:scale-105">
                    <div class="absolute inset-0 bg-black/30 flex items-center justify-center">
                        <span class="text-white text-lg font-bold tracking-wide">Computadoras</span>
                    </div>
                </div>

                <div class="group relative aspect-square overflow-hidden rounded-xl shadow-lg">
                    <img src="storage/img/telefonos.jpg" alt="Categoría 3"
                        class="w-full !h-full object-cover transition-all duration-500 ease-out group-hover:scale-105">
                    <div class="absolute inset-0 bg-black/30 flex items-center justify-center">
                        <span class="text-white text-lg font-bold tracking-wide">Telelfonos</span>
                    </div>
                </div>
            </div>

            <div class="p-4 md:p-6 rounded-lg">
                <p class="text-center text-xl md:text-2xl lg:text-3xl font-bold leading-tight uppercase">
                    OTROS PRODUCTOS PARA TI
                </p>
            </div>
            <div class="flex justify-center flex-wrap gap-8 mb-5">

                <div
                    class="relative flex w-full max-w-64 flex-col overflow-hidden rounded-lg border border-gray-100 bg-blue-500 shadow-md">
                    <a class="relative mx-3 mt-3 flex h-60 overflow-hidden rounded-xl" href="#">
                        <img class="w-full h-full object-cover" src="storage/img/consolas2.jpg" alt="product image" />
                    </a>
                    <div class="mt-4 px-5 pb-5">
                        <a href="#">
                            <h5 class="text-xl tracking-tight text-white">Nintendo Switch</h5>
                        </a>
                        <div class="mt-2 mb-5 flex items-center justify-between">
                            <p>
                                <span class="text-3xl font-bold text-white">$300</span>
                            </p>
                        </div>
                        <a href="#"
                            class="flex items-center justify-center rounded-md bg-slate-900 px-5 py-2.5 text-center text-sm font-medium !text-white hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-blue-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            Add to cart</a>
                    </div>
                </div>
                <div
                    class="relative  flex w-full max-w-64 flex-col overflow-hidden rounded-lg border border-gray-100 bg-blue-500 shadow-md">
                    <a class="relative mx-3 mt-3 flex h-60 overflow-hidden rounded-xl" href="#">
                        <img class="w-full h-full object-cover" src="storage/img/consolas2.jpg" alt="product image" />
                    </a>
                    <div class="mt-4 px-5 pb-5">
                        <a href="#">
                            <h5 class="text-xl tracking-tight text-white">Nintendo Switch</h5>
                        </a>
                        <div class="mt-2 mb-5 flex items-center justify-between">
                            <p>
                                <span class="text-3xl font-bold text-white">$300</span>
                            </p>
                        </div>
                        <a href="#"
                            class="flex items-center justify-center rounded-md bg-slate-900 px-5 py-2.5 text-center text-sm font-medium !text-white hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-blue-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            Add to cart</a>
                    </div>
                </div>
                <div
                    class="relative  flex w-full max-w-64 flex-col overflow-hidden rounded-lg border border-gray-100 bg-blue-500 shadow-md">
                    <a class="relative mx-3 mt-3 flex h-60 overflow-hidden rounded-xl" href="#">
                        <img class="w-full h-full object-cover" src="storage/img/consolas2.jpg"
                            alt="product image" />
                    </a>
                    <div class="mt-4 px-5 pb-5">
                        <a href="#">
                            <h5 class="text-xl tracking-tight text-white">Nintendo Switch</h5>
                        </a>
                        <div class="mt-2 mb-5 flex items-center justify-between">
                            <p>
                                <span class="text-3xl font-bold text-white">$300</span>
                            </p>
                        </div>
                        <a href="#"
                            class="flex items-center justify-center rounded-md bg-slate-900 px-5 py-2.5 text-center text-sm font-medium !text-white hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-blue-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            Add to cart</a>
                    </div>
                </div>
                <div
                    class="relative  flex w-full max-w-64 flex-col overflow-hidden rounded-lg border border-gray-100 bg-blue-500 shadow-md">
                    <a class="relative mx-3 mt-3 flex h-60 overflow-hidden rounded-xl" href="#">
                        <img class="w-full h-full object-cover" src="storage/img/consolas2.jpg"
                            alt="product image" />
                    </a>
                    <div class="mt-4 px-5 pb-5">
                        <a href="#">
                            <h5 class="text-xl tracking-tight text-white">Nintendo Switch</h5>
                        </a>
                        <div class="mt-2 mb-5 flex items-center justify-between">
                            <p>
                                <span class="text-3xl font-bold text-white">$300</span>
                            </p>
                        </div>
                        <a href="#"
                            class="flex items-center justify-center rounded-md bg-slate-900 px-5 py-2.5 text-center text-sm font-medium !text-white hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-blue-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            Add to cart</a>
                    </div>
                </div>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-10 p-6 bg-blue-500 justify-center">
                <div class="justify-center p-8">
                    <p
                        class="text-center text-white text-xl md:text-2xl lg:text-3xl font-bold leading-tight uppercase">
                        Compra
                        sin moverte</p>
                    <p class="text-white">
                        <br>Encuentra lo que necesitas, y coordina el pago y la entrega con el vendedor. Es fácil y
                        rápido.
                        ¡Todos podemos hacerlo!
                    </p>
                </div>
                <div class="justify-center p-8">
                    <p
                        class="text-center text-white text-xl md:text-2xl lg:text-3xl font-bold leading-tight uppercase">
                        Recibe
                        tu producto </p><br>
                    <p class="text-white">
                        Acuerda la entrega de tu compra con el vendedor. Puedes recibirlo en tu casa, en la oficina o
                        retirarlo.
                        ¡Tú decides qué prefieres!</p>
                </div>

                <div class="justify-center p-8">
                    <p
                        class="text-center text-white text-xl md:text-2xl lg:text-3xl font-bold leading-tight uppercase">
                        TECNOIMPULSO</p><br>
                    <p class="text-white">
                        Descubre herramientas para gaming, trabajo y entretenimiento. Conecta con lo último en PCs,
                        consolas y
                        móviles, y lleva tu experiencia al máximo nivel. ¡Tu pasión, nuestro soporte!</p>
                </div>


            </div>
        </main>


        <livewire:footer />
    </div>

    {{-- cartas de productos --}}

</body>

</html>
