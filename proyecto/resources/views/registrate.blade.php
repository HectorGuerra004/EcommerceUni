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
        <main class="flex-grow bg-[url('http://127.0.0.1:8000/storage/img/computadoras.jpg')] bg-cover bg-center">
            <div class="flex flex-col items-center justify-center my-25 mx-5 dark">
                <div class="w-full max-w-md bg-gray-800 rounded-lg shadow-md p-6">
                    <h2 class="!text-2xl !font-bold text-center !text-gray-200 !mb-4">Registrate</h2>
                    @if ($errors->any())
                        <div class="mb-4 p-4 bg-red-800 text-red-100 rounded-lg">
                            <ul class="list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="flex flex-wrap" method="POST" action="{{ route('registrate.submit') }}">
                        @csrf
                        <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}"
                            class="bg-gray-700 !text-gray-200 border-0 rounded-md !p-2 !mb-4 focus:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150 w-full md:w-[48%] !mr-[2%]"
                            placeholder="Nombre" />
                        <input type="text" id="apellido" name="apellido" value="{{ old('apellido') }}"
                            class="bg-gray-700 !text-gray-200 border-0 rounded-md !p-2 !mb-4 focus:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150 w-full md:w-[48%] !mr-[2%]"
                            placeholder="Apellido" />
                        <input type="text" id="cedula" name="cedula" value="{{ old('cedula') }}"
                            class="bg-gray-700 !text-gray-200 border-0 rounded-md !p-2 !mb-4 focus:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150 w-full md:w-[48%] !mr-[2%]"
                            placeholder="Cedula" />
                        <input type="text" id="telefono" name="telefono" value="{{ old('telefono') }}"
                            class="bg-gray-700 !text-gray-200 border-0 rounded-md !p-2 !mb-4 focus:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150 w-full md:w-[48%] !mr-[2%]"
                            placeholder="Telefono" />
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                            class="bg-gray-700 !text-gray-200 border-0 rounded-md !p-2 !mb-4 focus:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150 !w-full md:w-[48%] !mr-[2%]"
                            placeholder="Correo Electronico" />
                        <input type="password" id="password" name="password"
                            class="bg-gray-700 !text-gray-200 border-0 rounded-md !p-2 !mb-4 focus:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150 w-full md:w-[48%] !mr-[2%]"
                            placeholder="Contraseña" />
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="bg-gray-700 text-gray-200 border-0 rounded-md !p-2 !mb-4 focus:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150 w-full md:w-[48%] !mr-[2%]"
                            placeholder="Confirmar Contraseña" />



                        <button type="submit"
                            class="!bg-gradient-to-r !from-indigo-500 !mx-auto !to-blue-500 !text-white !font-bold !py-2 !px-4 !rounded-md !mt-4 !hover:bg-indigo-600 !hover:to-blue-600 !transition !ease-in-out !duration-150">
                            Crear Usuario
                        </button>
                    </form>
                </div>
            </div>
        </main>


        <livewire:footer />
    </div>



</body>

</html>
