<div>
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
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
                <tr class="text-black">
                    <td class="border px-4 py-2">{{ $producto->id }}</td>
                    <td class="border px-4 py-2">{{ $producto->nombre }}</td>
                    <td class="border px-4 py-2">{{ $producto->descripcion }}</td>
                    <td class="border px-4 py-2">{{ $producto->precio }}</td>
                    <td class="border px-4 py-2">{{ $producto->stock }}</td>
                    <td class="border px-4 py-2">{{ $producto->imagen }}</td>
                    <td class="border px-4 py-2">{{ $producto->categoria }}</td>
                    <td class="border px-4 py-2">{{ $producto->estado }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
