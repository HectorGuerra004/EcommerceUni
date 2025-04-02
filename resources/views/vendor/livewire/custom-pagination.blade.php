{{-- resources/views/vendor/livewire/custom-pagination.blade.php --}}
@if ($paginator->hasPages())
<div class="mt-8 p-4 bg-white dark:bg-gray-800 rounded-lg shadow-md mx-auto w-fit"> {{-- Contenedor con fondo --}}
    <nav role="navigation" aria-label="Pagination Navigation">
        {{-- Contenedor principal centrado --}}
        <div class="flex items-center justify-center gap-2">
            
            {{-- Botón Anterior --}}
            @if ($paginator->onFirstPage())
                <span class="px-4 py-2 text-gray-300 dark:text-gray-600 cursor-default rounded-md">
                    &laquo;
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" 
                   class="px-4 py-2 text-blue-600 dark:text-blue-400 hover:bg-blue-50 dark:hover:bg-gray-700 rounded-md transition-colors">
                    &laquo;
                </a>
            @endif

            {{-- Números de página --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="px-4 py-2 text-gray-500 dark:text-gray-400">{{ $element }}</span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="px-4 py-2 bg-blue-600 dark:bg-blue-700 text-white rounded-md shadow-sm">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}" 
                               class="px-4 py-2 text-gray-600 dark:text-gray-300 hover:bg-blue-50 dark:hover:bg-gray-700 rounded-md transition-colors">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Botón Siguiente --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" 
                   class="px-4 py-2 text-blue-600 dark:text-blue-400 hover:bg-blue-50 dark:hover:bg-gray-700 rounded-md transition-colors">
                    &raquo;
                </a>
            @else
                <span class="px-4 py-2 text-gray-300 dark:text-gray-600 cursor-default rounded-md">
                    &raquo;
                </span>
            @endif
        </div>

        {{-- Texto de resultados centrado --}}
        <div class="mt-3 text-center text-sm text-gray-600 dark:text-gray-400">
            Mostrando 
            <span class="font-medium dark:text-white">{{ $paginator->firstItem() }}</span>
            a 
            <span class="font-medium dark:text-white">{{ $paginator->lastItem() }}</span>
            de 
            <span class="font-medium dark:text-white">{{ $paginator->total() }}</span>
            resultados
        </div>
    </nav>
</div>
@endif