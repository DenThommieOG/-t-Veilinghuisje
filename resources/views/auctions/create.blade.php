<x-app-layout>
    <div class="title-block">
        <h1>Maak een veiling</h1>
    </div>
    <form action="{{ route('auction.store') }}" class="fill-form" method="post">
        @csrf

        <label for="name">Naam/ nummer veiling</label>
        @if ($errors && $errors->has('name'))
            <p class="error-message">{{ $errors->first('name') }}</p>
        @endif
        <input type="text" name="name" id="name" value="{{ old('name') }}">
        <label for="description">Beschrijving van de veiling</label>
        @if ($errors && $errors->has('description'))
            <p class="error-message">{{ $errors->first('description') }}</p>
        @endif
        <textarea name="description" id="description" rows="4">{{ old('description') }}</textarea>
        <label for="startDate">Start datum en tijd dat de veiling wordt geopend voor gebruikers</label>
        @if ($errors && $errors->has('startDate'))
            <p class="error-message">{{ $errors->first('startDate') }}</p>
        @endif
        <input type="datetime-local" name="startDate" id="startDate" value="{{ old('startDate') }}">
        <label for="endDate">Eind datum en tijd van de veiling</label>
        @if ($errors && $errors->has('endDate'))
            <p class="error-message">{{ $errors->first('endDate') }}</p>
        @endif
        <input type="datetime-local" name="endDate" id="endDate" value="{{ old('endDate') }}">
        <button type="submit">Aanmaken</button>
    </form>
</x-app-layout>
