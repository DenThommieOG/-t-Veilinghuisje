<nav>
    <a href="{{ route('homepage') }}">
        <x-logo classes="logo-nav"></x-logo></a>

    <a href="{{ route('homepage') }}" class="button">
        Startpagina
    </a>

    <a href="{{ route('auction.show') }}" class="button">
        De volgende Veiling
    </a>
    @auth
    
    <a href="{{ route('bid.show') }}" class="button">
        Mijn biedingen
    </a>
    @if (auth()->user()->hasRole('admin'))
        <a href="{{ route('auction.list') }}" class="button">
            Veilinglijst
        </a>        
    @endif
        <a href="{{ route('logout') }}" class="button account-managment">
            Uitloggen
        </a>
    @else
        <a href="{{ route('login-form') }}" class="button account-managment">
            Inloggen
        </a>
        
        <a href="{{ route('register-form') }}" class="button account-managment">
            Registreren
        </a>
    @endauth
</nav>
