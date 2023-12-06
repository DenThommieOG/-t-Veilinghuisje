<x-app-layout>
    <div class="flex">
    @foreach ($bids as $bid)
    <div class="bid">
        <x-item :item="$bid->item"></x-item>
        @if ($bid->is_winner == 1)
        <p class="winner">U bod van {{ $bid->value }} euro heeft gewonnen!!!</p>
        @else
        <p>U heeft hierop {{ $bid->value }} euro geboden</p>
            
        @endif</div>
    @endforeach</div>
</x-app-layout>