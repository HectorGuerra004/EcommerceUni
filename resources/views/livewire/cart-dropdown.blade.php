<div class="relative" x-data="{ open: false }" x-cloak>
    <!-- Botón del carrito -->
    <button @click="open = !open" class="cursor-pointer">
        <span class="text-white rounded-full px-2">
            <div class="absolute right-5 -top-2 z-10">
                <div class="flex h-5 w-5 items-center justify-center">
                    <span
                        class="absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                    <span
                        class="relative inline-flex h-4 w-4 items-center justify-center rounded-full bg-red-500 text-[10px] font-bold text-white">{{ $count }}</span>
                </div>
            </div>
            Carrito <svg xmlns="http://www.w3.org/2000/svg" class=" h-6 w-6 inline" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
        </span>
    </button>

    <!-- Contenido del carrito -->
    <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        class="fixed right-0 top-0 h-[50vh] md:h-full w-80 bg-white dark:bg-gray-800 shadow-xl z-50 border-l dark:border-gray-700 flex flex-col">
        <!-- Encabezado -->
        <div class="p-4 border-b dark:border-gray-700 flex justify-between items-center">
            <h2 class="text-lg font-bold dark:text-white">Tu Carrito</h2>
            <button @click="open = false" class="text-gray-500 hover:text-gray-700 dark:text-gray-400">
                ✕
            </button>
        </div>

        <!-- Items del carrito -->
        <div class="flex-1 overflow-y-auto p-4">
            @auth
                @if ($cart && $cart->items->count() > 0)
                    <div class="space-y-4">
                        @foreach ($cart->items as $item)
                            <div class="flex gap-4 items-start justify-between group">
                                <div class="flex-1">
                                    <h3 class="font-semibold text-gray-800 dark:text-white">
                                        {{ $item->producto->nombre }}
                                    </h3>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        {{ $item->cantidad }} × ${{ number_format($item->precio, 2) }}
                                    </p>
                                </div>
                                <button wire:click="removeItem({{ $item->id }})"
                                    class="text-red-500 hover:text-red-700">
                                    ✕
                                </button>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500 text-center py-4 dark:text-gray-400">
                        Tu carrito está vacío
                    </p>
                @endif
            @else
                <p class="text-gray-500 text-center py-4 dark:text-gray-400">
                    Inicia sesión para ver tu carrito
                </p>
            @endauth
        </div>

        <!-- Footer -->
        @if ($cart && $cart->items->count() > 0)
            <div class="border-t dark:border-gray-700 p-4">
                <div class="flex justify-between items-center font-bold text-lg dark:text-white mb-4">
                    <span>Total:</span>
                    <span>${{ number_format($total, 2) }}</span>
                </div>
                <a href="{{ route('checkout') }}"
                    class="block w-full bg-blue-600 hover:bg-blue-700 text-white text-center py-2 px-4 rounded-lg transition-colors">
                    Comprar ahora
                </a>
            </div>
        @endif
    </div>
</div>
