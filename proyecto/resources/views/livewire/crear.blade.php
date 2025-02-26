<div class="!fixed !z-10 !inset-0 !overflow-auto !ease-out !duration-200">
    <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-x1 transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form enctype="multipart/form-data">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="mb-4">
                        <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                        <input type="text"
                            class="!shadow !appearance-none !border !rounded !w-full !py-2 !px-3 !text-gray-700 !leading-tight !focus:outline-none !focus:shadow-outline"
                            id="nombre" wire:model="nombre">
                    </div>
                    <div class="mb-4">
                        <label for="descripcion" class="block text-gray-700 text-sm font-bold mb-2">descripcion:</label>
                        <input type="text"
                            class="!shadow !appearance-none !border !rounded !w-full !py-2 !px-3 !text-gray-700 !leading-tight !focus:outline-none !focus:shadow-outline"
                            id="descripcion" wire:model="descripcion">
                    </div>
                    <div class="mb-4">
                        <label for="precio" class="block text-gray-700 text-sm font-bold mb-2">precio:</label>
                        <input type="number"
                            class="!shadow !appearance-none !border !rounded !w-full !py-2 !px-3 !text-gray-700 !leading-tight !focus:outline-none !focus:shadow-outline"
                            id="precio" wire:model="precio">
                    </div>
                    <div class="mb-4">
                        <label for="stock" class="block text-gray-700 text-sm font-bold mb-2">stock:</label>
                        <input type="number"
                            class="!shadow !appearance-none !border !rounded !w-full !py-2 !px-3 !text-gray-700 !leading-tight !focus:outline-none !focus:shadow-outline"
                            id="stock" wire:model="stock">
                    </div>
                    <div class="mb-4">
                        <label for="imagenes" class="block text-gray-700 text-sm font-bold mb-2">imagen:</label>
                        <input type="file"
                            class="!shadow !appearance-none !border !rounded !w-full !py-2 !px-3 !text-gray-700 !leading-tight !focus:outline-none !focus:shadow-outline"
                            id="imagenes" wire:model="imagenes" multiple accept="image/*">
                    </div>
                    <div class="mb-4">
                        <label for="categoria" class="block text-gray-700 text-sm font-bold mb-2">categoria:</label>
                        <input type="text"
                            class="!shadow !appearance-none !border !rounded !w-full !py-2 !px-3 !text-gray-700 !leading-tight !focus:outline-none !focus:shadow-outline"
                            id="categoria" wire:model="categoria">
                    </div>
                    <div class="mb-4">
                        <label for="estado" class="block text-gray-700 text-sm font-bold mb-2">estado:</label>
                        <input type="text"
                            class="!shadow !appearance-none !border !rounded !w-full !py-2 !px-3 !text-gray-700 !leading-tight !focus:outline-none !focus:shadow-outline"
                            id="estado" wire:model="estado">
                    </div>
                    
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            <button wire:click.prevent="guardar()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-purple-800 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">Guardar</button>
                        </span>

                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            <button wire:click="cerrarModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-purple-800 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">Cancelar</button>
                        </span>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
