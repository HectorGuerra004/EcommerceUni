<div class="buttons-container flex flex-col md:flex-row">
    <div class="flex items-center bg-gray-100 rounded-lg p-2 md:mr-4 mb-4 md:mb-0 w-full md:w-auto">
        <button 
            wire:click="decrement"
            class="text-orange font-bold px-3 py-1 hover:opacity-50 transition-opacity"
        >
            -
        </button>
        <input 
            type="number" 
            wire:model.live="cantidad"
            min="1"
            class="w-12 text-center bg-transparent border-none focus:ring-0"
        >
        <button 
            wire:click="increment"
            class="text-orange font-bold px-3 py-1 hover:opacity-50 transition-opacity"
        >
            +
        </button>
    </div>

    <button
        wire:click="addToCart"
        type="button"
        class="add-btn border-none rounded-lg bg-amber-600 text-white font-[700] px-8 py-3 md:py-2 w-full md:w-auto transition-all shadow-lg shadow-amber-600/50 hover:opacity-50 cursor-pointer"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-6 w-6 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg>
        {{ $inCart ? 'Actualizar carrito' : 'Añadir al carrito' }}
    </button>
</div>