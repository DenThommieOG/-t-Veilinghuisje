<x-app-layout>
    <div class="title-block">
        <h1>Veilingen</h1>

        @if (auth()->user() && auth()->user()->hasRole('admin'))
        <div>
            <a href="{{ route('auction.create') }}" class="button create"> Nieuwe veiling</a>
            <a href="{{ route('auction.archive') }}" class="button"> Oude veilingen bekijken</a>
            
        </div>
        @endif
    </div>
    @foreach ($auctions as $auction)
        <x-auction :auction=$auction></x-auction>
    @endforeach
</x-app-layout>
