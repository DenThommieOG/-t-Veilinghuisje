<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', '\'t Veilinghuisje') }}</title>


    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
        <x-app.header></x-app.header>
        <main>
            {{ $slot }}
        </main>
        <x-app.footer></x-app.footer>

</body>
</html>
