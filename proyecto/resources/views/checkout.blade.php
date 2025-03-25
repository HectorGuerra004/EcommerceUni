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
        <main class="flex-grow bg-[url('http://127.0.0.1:8000/storage/img/computadoras.jpg')] bg-cover bg-center">
            @livewire('checkout')
        </main>


        <livewire:footer />
    </div>



</body>

</html>
