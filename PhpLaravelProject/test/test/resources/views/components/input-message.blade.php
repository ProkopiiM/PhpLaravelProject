<!-- resources/views/components/TextareaMessage.blade.php -->

@props(['name', 'value' => ''])

<div class="form-group">
    <label for="{{ $name }}">Сообщение:</label>
    <textarea id="{{ $name }}" name="{{ $name }}" maxlength="255">{{ old($name) ?? $value }}</textarea>
    @error($name)
    <span class="error">{{ $message }}</span>
    @enderror
</div>
