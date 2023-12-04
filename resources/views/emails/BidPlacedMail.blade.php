@component('mail::message')
# Beste {{ $user->name }},

Uw bieding van {{ $bid->value }} euro op {{ $item->name }} van de veiling {{ $auction->name }} is met success geregistreerd.

Op {{ $auction->end_time }} ontvangt u een mail als u de gelukkige winnaar

Bedankt en veel success,
{{ config('app.name') }}
@endcomponent