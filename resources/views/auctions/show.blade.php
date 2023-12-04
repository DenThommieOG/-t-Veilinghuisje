<x-app-layout>

    @if ($auction)
        <x-auction :auction=$auction></x-auction>
    @else
        Er staat momenteel geen veiling gepland, kom later nog eens kijken!
    @endif
</x-app-layout>
