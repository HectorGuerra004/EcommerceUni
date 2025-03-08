<!doctype html>
<html data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body>

    <div class="min-h-screen flex flex-col" x-data="{
        imagenActual: '{{ $producto->imagenes->isNotEmpty() ? $producto->imagenes->first()->url_imagen : asset('storage/img/default.jpg') }}',
        hayImagenes: {{ $producto->imagenes->isNotEmpty() ? 'true' : 'false' }}
    }">
        <livewire:navbar />
        <main class="flex-grow">

            <div class="flex justify-center flex-col md:flex-row md:px-[200px] md:py-[100px] relative bg-gray-200">
                <div class=" md:flex md:flex-col md:justify-between">
                    <div class="hidden md:block imagen-grande">
                        <template x-if="imagenActual">
                            <img class="object-cover rounded-xl !w-[400px] !h-[400px]" :src="imagenActual"
                                alt="{{ $producto->nombre }}">
                        </template>
                        <template x-if="!imagenActual && hayImagenes">
                            <img class="object-cover rounded-xl !w-[400px] !h-[400px]"
                                src="{{ $producto->imagenes->first()->url_imagen }}" alt="{{ $producto->nombre }}">
                        </template>
                        <template x-if="!imagenActual && !hayImagenes">
                            <img class="object-cover rounded-xl !w-[400px] !h-[400px]"
                                src="{{ asset('storage/img/default.jpg') }}" alt="Imagen por defecto">
                        </template>
                    </div>

                    <div class="md:hidden imagen-grande">
                        <template x-if="imagenActual">
                            <img class="!w-full !h-[300px] object-cover" :src="imagenActual"
                                alt="{{ $producto->nombre }}">
                        </template>
                        <template x-if="!imagenActual && hayImagenes">
                            <img class="!w-full !h-[300px] object-cover"
                                src="{{ $producto->imagenes->first()->url_imagen }}" alt="{{ $producto->nombre }}">
                        </template>
                        <template x-if="!imagenActual && !hayImagenes">
                            <img class="!w-full !h-[300px] object-cover" src="{{ asset('storage/img/default.jpg') }}"
                                alt="Imagen por defecto">
                        </template>
                    </div>

                    <div class="flex justify-center mt-7 w-[35vh] md:w-[400px] gap-2 md:gap-4">
                        @foreach ($producto->imagenes as $imagen)
                            <div class="imagen-individual">
                                <img @click="imagenActual = '{{ $imagen->url_imagen }}'"
                                    class="!w-[80px] !h-[80px] border border-black cursor-pointer rounded-xl transition-all hover:opacity-25 hover:border-[3px] border-orange"
                                    src="{{ $imagen->url_imagen }}" alt="Miniatura de {{ $producto->nombre }}">
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="description max-w-[80vh] p-6 md:py-[40px] mx-4">
                    <p class="!text-3xl !md:text-4xl capitalize font-[700]">
                        {{ $producto->nombre }}
                    </p>

                    <p class=" my-10 leading-7 overflow-hidden break-words">
                        {{ $producto->descripcion }}
                    </p>


                    <div class="price flex items-center">

                        <span class="!text-3xl !font-[700] !mr-4">{{ $producto->precio }}</span>
                        <span class="bg-paleOrange text-orange font-[700] py-1 px-2 rounded-lg"></span>


                    </div>


                    <div class="buttons-container flex flex-col md:flex-row mt-8">
                        <div
                            class="w-[100%] flex justify-around md:justify-center items-center bg-gray-100 space-x-10 rounded-lg p-3 md:p-2 md:mr-4 md:w-[150px]">
                            <button
                                class="minus text-[24px] md:text-[20px] font-[700] text-orange transition-all hover:opacity-50 cursor-pointer">
                                -
                            </button>
                            <p class="md:text-[14px] font-bold">1</p> <button
                                class="plus text-[24px] md:text-[20px] font-[700] text-orange transition-all hover:opacity-50 cursor-pointer">
                                +
                            </button>
                        </div>
                        <button
                            class="add-btn border-none rounded-lg bg-amber-600 text-white font-[700] px-[70px] py-[18px] mt-4 md:mt-0 md:py-0 md:text-[14px] transition-all shadow-lg shadow-amber-600/50 hover:opacity-50 cursor-pointer">
                            <span
                                class="fa-light fa-cart-shopping inline-block -translate-x-2 -translate-y-[2px] h-[15px]"><svg
                                    xmlns="http://www.w3.org/2000/svg" class="mr-2 h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg></span> &nbsp;Add to
                            cart
                        </button>
                    </div>
                </div>
            </div>
        </main>

        <livewire:footer />
    </div>


</body>

</html>
