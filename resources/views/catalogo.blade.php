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
        <main class="flex-grow bg-gray-200">
            <div class="p-4 md:p-6 rounded-lg">
                <p class="text-center text-xl md:text-2xl lg:text-3xl font-bold leading-tight uppercase">
                    Catalogo
                </p>
            </div>

                <livewire:catalogo-productos />



        </main>

        <livewire:footer />
    </div>


</body>

</html>
