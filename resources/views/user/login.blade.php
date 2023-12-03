<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', '\'t Veilinghuisje') }}</title>


    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<div class="login-form">
    <div>
        <x-logo classes='logo-center'></x-logo>
        <form method="POST" action="{{ route('login') }}" class="login-card">
            @csrf
            <label for="email">Email</label>
            @if ($errors && $errors->has('email'))
                <p class="error-message">{{ $errors->first('email') }}</p>
            @endif
            <input type="text" name="email" id="email" value="{{ old('email') }}">
            <label for="password">Wachtwoord</label>
            <input type="password" name="password" id="password">
            <button type="submit">Inloggen</button>
        </form>
    </div>
</div>

</html>
