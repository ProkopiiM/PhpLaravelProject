
@props(['label', 'name', 'type' => 'text', 'value' => '', 'error' => null])

<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" class="form-control" value="{{ old($name, $value) }}">
    @error($name)
    <span class="error">{{ $error }}</span>
    @enderror
</div>
