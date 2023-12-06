<x-app-layout>
    <div class="flex">
    @foreach ($bids as $bid)
    <div class="bid">
        <x-item :item="$bid->item"></x-item>
        <p>U heeft hierop {{ $bid->value }} euro geboden</p></div>
    @endforeach</div>
</x-app-layout>