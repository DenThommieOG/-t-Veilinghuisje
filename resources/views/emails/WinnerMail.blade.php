@component('mail::message')
# Beste {{ $user->name }},

Uw bieding van {{ $bid->value }} euro op {{ $item->name }} van de veiling {{ $auction->name }} heeft gewonnen!

Wij sturen u binnen de 2 werkdagen een mail om uw adresgegevens in te vullen en uw lot af te betalen

Proficiat,
{{ config('app.name') }}
@endcomponent