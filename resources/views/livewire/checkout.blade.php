<div class="max-w-4xl mx-auto p-6">
    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
        <h1 class="text-3xl font-bold mb-8">Proceso de Pago</h1>
        <h2 class="text-xl font-semibold mb-4">Tu Pedido</h2>

        @foreach ($cart->items as $item)
            <div class="flex items-center justify-between py-3 border-b">
                <div class="flex items-center gap-4">
                    @if ($item->producto->imagenes && $item->producto->imagenes->isNotEmpty())
                        <img src="{{ $item->producto->imagenes->first()->url_imagen }}"
                            class="w-20 h-20 object-cover rounded">
                    @else
                        <p>No hay imagen disponible</p>
                    @endif
                    <div>
                        <h3 class="font-semibold">{{ $item->producto->nombre }}</h3>
                        <p>{{ $item->cantidad }} x ${{ number_format($item->precio, 2) }}</p>
                    </div>
                </div>
                <span class="font-semibold">${{ number_format($item->cantidad * $item->precio, 2) }}</span>
            </div>
        @endforeach

        <div class="flex justify-between items-center mt-6 pt-4 border-t">
            <span class="text-xl font-bold">Total:</span>
            <span class="text-xl font-bold">${{ number_format($this->total, 2) }}</span>
        </div>
    </div>

    @if (!$this->orderConfirmed)
        <form wire:submit.prevent="submitOrder" class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold mb-6">Datos del pago movil: <br>Cedula: 00000000 <br>Banco: Venezuela <br>Telefono:04120000000<br> <br>Datos de Pago</h2>

            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label class="block mb-2">Referencia Bancaria</label>
                    <input type="text" wire:model="payment_reference" class="w-full p-3 border rounded-lg"
                        placeholder="Número de referencia del depósito">
                    @error('payment_reference')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label class="block mb-2">Nombre Completo</label>
                    <input type="text" wire:model="shipping.name" class="w-full p-3 border rounded-lg">
                    @error('shipping.name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <button type="submit"
                class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg hover:bg-blue-700 transition">
                Confirmar Pedido
            </button>
        </form>
    @else
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">¡Pedido Confirmado!</strong>
            <span class="block sm:inline">Uno de nuestros agentes está revisando tu pedido y te atenderá por WhatsApp en la brevedad.</span>
        </div>
        <script>
            setTimeout(function() {
                window.location.href = "{{ route('landing') }}"; // Reemplaza 'inicio' con el nombre de tu ruta de inicio
            }, 5000); // 5000 milisegundos = 5 segundos
        </script>
    @endif
</div>