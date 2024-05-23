<!-- resources/views/components/InputEmail.blade.php -->

@props(['name', 'value' => ''])

<div class="form-group">
    <label for="{{ $name }}">E-mail:</label>
    <input type="email" id="{{ $name }}" name="{{ $name }}" placeholder="name@company.com" value="{{ old($name) ?? $value }}">
    @error($name)
    <span class="error">{{ $message }}</span>
    @enderror
</div>
