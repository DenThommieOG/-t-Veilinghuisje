<div class="item-block">
    <img class="item" src="{{ asset('storage/' . $item->photo_path) }}" alt="">
    <div class="item-text">
        <div class="px-1">
            <p>{{ $item->name }}</p>
            <p>{{ $item->description }}</p>
        </div>
        <div class="buttons-item">
            @if ($item->deleted_at != null)
               <p>Dit lot is helaas verwijderd, vragen? contacteer ons</p>
            @else
            <a href="{{ route('item.show', ['id' => $item->id]) }}" class="button">Tonen/ Bieden</a>
            @endif
            @if (auth()->id() != null &&
                    auth()->user()->hasRole('admin'))
                <a href="{{ route('item.edit', ['id' => $item->id]) }}" class="button">Bewerken</a>
                <form action="{{ route('item.destroy', ['item' => $item]) }}" class="flex" method="POST">
                    @csrf
                    @method('DELETE')
                <button class="button" id="delete-button">Verwijderen</button></form>
            @endif
        </div>
    </div>
</div>
