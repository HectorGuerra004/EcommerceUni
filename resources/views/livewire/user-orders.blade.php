{{-- <x-slot name="header">
    <h1 class="text-gray"></h1>
</x-slot> --}}

<div class="py-12">
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
        <div class="!bg-white !overflow-hidden !shadow-xl sm:rounded-lg px-4 py-4">


            <h5 class="text-black">Lista de Pedidos</h5>

            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-indigo-600 text-white">
                        <th class="!border px-4 py-2">id</th>
                        <th class="!border px-4 py-2">Usuario</th>
                        <th class="!border px-4 py-2">Referencia</th>
                        <th class="!border px-4 py-2">Total</th>
                        <th class="!border px-4 py-2">Estado</th>
                        <th class="!border px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr class="text-black">
                            <td class="!border px-4 py-2">{{ $order->id }}</td>
                            <td class="!border px-4 py-2">{{ $order->user->nombre }}</td>
                            <td class="!border px-4 py-2">{{ $order->payment_reference }}</td>
                            <td class="!border px-4 py-2">{{ $order->total }}</td>
                            <td class="!border px-4 py-2">{{ $order->status }}</td>

                            <td class="!border px-4 py-2 text-center">
                                <a href="{{ route('order.products', $order->id) }}" class="btn btn-primary">Ver
                                    Productos</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
