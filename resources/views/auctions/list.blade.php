<x-app-layout>
    <div class="title-block">
    <h1>Veilingen</h1>
    <a href="{{ route('auction.create') }}" class="button create"> Nieuwe veiling</a></div>
    @foreach ($auctions as $auction)
        <div>
            <div class="auction-block">
                <h3>{{ $auction->name }}</h3>
                <div class="flex">
                <a href="#" class="button show">Veiling bekijken</a>
                <a href="#" class="button add">Item toevoegen</a>
                <a href="#" class="button delete">Veiling verwijderen</a>
            </div>
            </div>
        </div>
    @endforeach
</x-app-layout>
