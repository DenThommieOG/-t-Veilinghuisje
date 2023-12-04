<x-app-layout>
    
    <div class="title-block">
        <h1>bewerk "{{ $item->name }}" lot voor de "{{ $item->auction->name }}" veiling</h1>
    </div>
    <form action="{{ route('item.update') }}" class="fill-form" enctype="multipart/form-data" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $item->id }}">
        <label for="name">Naam vann het voorwerp</label>
        @if ($errors && $errors->has('name'))
            <p class="error-message">{{ $errors->first('name') }}</p>
        @endif
        <input type="text" name="name" id="name" value="{{ old('name')?: $item->name }}">
        <label for="description">Beschrijving van het voorwerp</label>
        @if ($errors && $errors->has('description'))
            <p class="error-message">{{ $errors->first('description') }}</p>
        @endif
        <textarea name="description" id="description" rows="4">{{ old('description')?: $item->description }}</textarea>
        <label for="photo">Foto van het voorwerp</label>
        @if ($errors && $errors->has('photo'))
            <p class="error-message">{{ $errors->first('photo') }}</p>
        @endif
        <input type="file" name="photo" id="photo" value="{{ old('photo') }}">
        <div>
        <input type="checkbox" name="is_feature" id="is_feature" {{ $item->is_feature? 'checked': '' }}>
        <label for="is_feature" >Is een voorkeur</label>
    </div>
        <button type="submit">Aanmaken</button>
    </form>
</x-app-layout>