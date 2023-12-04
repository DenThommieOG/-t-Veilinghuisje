<x-app-layout>
    @foreach ($bids as $bid)
        <x-item :item="$bid->item"></x-item>
        <p>U heeft hierop {{ $bid->value }} euro geboden</p>
    @endforeach
</x-app-layout>