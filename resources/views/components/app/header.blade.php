<nav>
    <a href="{{ route('homepage') }}">
        <x-logo classes="logo-nav"></x-logo></a>

    <a href="{{ route('homepage') }}" class="button">
        Startpagina
    </a>
    @auth
        <a href="{{ route('logout') }}" class="button">
            Uitloggen
        </a>
    @else
        <a href="{{ route('login-form') }}" class="button">
            Inloggen
        </a>
    @endauth
</nav>
