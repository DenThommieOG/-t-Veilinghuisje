<nav>
    <a href="{{ route('homepage') }}">
        <x-logo classes="logo-nav"></x-logo></a>

    <a href="{{ route('homepage') }}" class="button">
        Startpagina
    </a>

    <a href="{{ route('homepage') }}" class="button">
        De volgende Veiling
    </a>
    @auth
        <a href="{{ route('auction.list') }}" class="button">
            Veilinglijst
        </a>
        <a href="{{ route('logout') }}" class="button">
            Uitloggen
        </a>
    @else
        <a href="{{ route('login-form') }}" class="button">
            Inloggen
        </a>
    @endauth
</nav>
