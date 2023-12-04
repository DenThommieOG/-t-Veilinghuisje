<div>
    <div class="auction-block">
        <h3>{{ $auction->name }}</h3>
        <div class="flex">
            @if (!request()->routeIs('auction.show'))
            <a href="{{ route('auction.show', ['id' => $auction->id]) }}" class="button show">Veiling bekijken</a>
            @endif
            @if (Auth()->id() != null &&
                    auth()->user()->hasRole('admin'))
                <a href="{{ route('item.create', ['id' => $auction->id]) }}" class="button add">Item toevoegen</a>
                <a href="#" class="button delete">Veiling verwijderen</a>
            @endif
        </div>
    </div>
    <p>{{ $auction->description }}</p>
    <div class="flex">
        @if (request()->routeIs('auction.show'))
            @foreach ($auction->items as $item)
            <x-item :item=$item></x-item>
            @endforeach
        @else
                @foreach ($auction->getFeaturedItems() as $item)
                <x-item :item=$item></x-item>
            @endforeach
        @endif
    </div>
</div>
