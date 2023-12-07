<x-app-layout>
    <div class="flex">
        <img class="item-large" src="{{ asset('storage/' . $item->photo_path) }}" alt="">
        <div>
            <div class="px-1">
                <h2>{{ $item->name }}</h2>
                <p>{{ $item->description }}</p>
            </div>
            <div>
                @if ($item->auction->end_time >  now()->toDateTimeLocalString())
                    
                <h4>Bieden:</h4>
                @if ($lastBid)
                    <h5>Uw laatste bod op dit lot was: {{ $lastBid->value }} euro</h5>
                @endif
                @if(Auth()->user())
                    <form action="{{ route('bid.store') }}" method="post">
                        @csrf
                        <label for="value">Geef uw bod in</label>
                        <input type="hidden" name="itemId" value="{{ $item->id }}">
                        <input type="number" name="value" id="value">
                        <button type="submit" class="button" id="delete-button">Bod plaatsen</button>
                    </form>
                @else
                    <p>Om te bieden moet u aangemeld zijn, heeft u nog geen accont? regristreren is volledig gratis</p>
                    @endif
                @endif
            </div>
        </div>
    </div>
    @if (Auth()->user() &&
            auth()->user()->hasRole('admin'))
        <h5>Alle biedingen op dit lot:</h5>
        <table class="table-page">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Bod</th>
                    <th scope="col">Gebruiker</th>
                    <th scope="col">Aanmaakdatum</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($item->bids as $bid)
                    <tr>
                        <td><span class="winner">{{ $bid->is_winner == 1? 'Winnend bod' : '' }}</span></td>
                        <td>{{ $bid->value }}</td>
                        <td>{{ $bid->user->email }}</td>
                        <td>{{ $bid->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</x-app-layout>
