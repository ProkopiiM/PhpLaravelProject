<!-- resources/views/components/InputPhone.blade.php -->

@props(['name', 'value' => ''])

<div class="form-group">
    <label for="{{ $name }}">* Номер телефона:</label>
    <input type="tel" id="{{ $name }}" name="{{ $name }}" placeholder="+7 (###)###-##-##" value="{{ old($name) ?? $value }}">
    @error($name)
    <span class="error">{{ $message }}</span>
    @enderror
</div>
