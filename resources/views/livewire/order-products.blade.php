<div class="py-12">
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
        <div class="!bg-white !overflow-hidden !shadow-xl sm:rounded-lg px-4 py-4">

            <!-- Sección de estado y botones -->
            <div class="mb-6 flex justify-between items-center">
                <div>
                    <h2 class="text-xl font-semibold text-black">Estado actual: 
                        <span class="{{ $order->status === 'aceptada' ? 'text-green-600' : ($order->status === 'denegada' ? 'text-red-600' : 'text-yellow-600') }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </h2>
                </div>
                
                @if($order->status === 'pendiente')
                <div class="space-x-4">
                    <form method="POST" action="{{ route('orders.update', $order->id) }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="aceptada">
                        <button type="submit" 
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Aceptar Pago
                        </button>
                    </form>
                    
                    <form method="POST" action="{{ route('orders.update', $order->id) }}" class="mt-2">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="denegada">
                        <button type="submit" 
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            Denegar Pago
                        </button>
                    </form>
                </div>
                @endif
            </div>

            <!-- Tabla de productos -->
            <h1 class="text-black">Productos del Pedido #{{ $order->id }}</h1>
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-indigo-600 text-white">
                        <th class="!border px-4 py-2">Producto</th>
                        <th class="!border px-4 py-2">Cantidad</th>
                        <th class="!border px-4 py-2">Precio</th>
                     
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                    <tr class="text-black">
                            <td class="!border px-4 py-2">{{ $item->producto->nombre }}</td>
                            <td class="!border px-4 py-2">{{ $item->quantity }}</td>
                            <td class="!border px-4 py-2">{{ $item->price }} c/u</td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
