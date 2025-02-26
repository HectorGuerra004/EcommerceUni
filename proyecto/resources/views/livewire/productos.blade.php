

<div class="py-12">
    <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-x1 sm:rounded-lg px-4 py-4">

        <button wire:click="crear()" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 my-3">Nuevo</button>
        @if($modal)
            @include('livewire.crear')
        @endif

        <table class="table-fixed w-full">
        <thead>
            <tr class="bg-indigo-600 text-white">
                <th class="border px-4 py-2">id</th>
                <th class="border px-4 py-2">Nombre</th>
                <th class="border px-4 py-2">descripcion</th>
                <th class="border px-4 py-2">precio</th>
                <th class="border px-4 py-2">stock</th>
                <th class="border px-4 py-2">imagen</th>
                <th class="border px-4 py-2">categoria</th>
                <th class="border px-4 py-2">estado</th>
                <th class="border px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
                <tr class="text-black">
                    <td class="border px-4 py-2 text-center">{{ $producto->id }}</td>
                    <td class="border px-4 py-2 ">{{ $producto->nombre }}</td>
                    <td class="border px-4 py-2 text-center">{{ $producto->descripcion }}</td>
                    <td class="border px-4 py-2 text-center">{{ $producto->precio }}</td>
                    <td class="border px-4 py-2 text-center">{{ $producto->stock }}</td>
                    <td class="border px-4 py-2 text-center">{{ $producto->imagen }}</td>
                    <td class="border px-4 py-2 text-center">{{ $producto->categoria }}</td>
                    <td class="border px-4 py-2 text-center">{{ $producto->estado }}</td>
                    <td class="border px-4 py-2 text-center">
                        <button wire:click="editar({{$producto->id}})" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4">Editar</button>
                        <button wire:click="borrar({{$producto->id}})" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4">Borrar</button>

                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
        </div>
    </div>

</div>

