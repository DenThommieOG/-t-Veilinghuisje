<x-app-layout>
    <div class="title-block">
        <h1>Veilingen</h1>

        @if (auth()->user() && auth()->user()->hasRole('admin'))
        <div>
            <a href="{{ route('auction.create') }}" class="button create"> Nieuwe veiling</a>
            @if (!request()->is('auction/archive'))
            <a href="{{ route('auction.archive') }}" class="button"> Oude veilingen bekijken</a>
            @endif
            

        </div>
        @endif
    </div>
    
    @if (request()->is('auction/archive') && $winnerWillBeSelectedAuctions->count() > 0)
    <h3>Auctions waarbij de loting morgen gebeurd:</h3>
    @foreach ($winnerWillBeSelectedAuctions as $auction)
        <x-auction :auction=$auction></x-auction>
    @endforeach
    @endif
    @foreach ($auctions as $auction)
        <x-auction :auction=$auction></x-auction>
    @endforeach
</x-app-layout>
