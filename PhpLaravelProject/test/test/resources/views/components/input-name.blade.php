


@props(['name', 'value' => ''])

<div class="form-group">
    <label for="{{ $name }}">* Имя:</label>
    <input type="text" id="{{ $name }}" name="{{ $name }}" value="{{ old($name) ?? $value}}">
    @error($name)
    <span class="error">{{ $message }}</span>
    @enderror
</div>

