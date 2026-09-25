@props([
    'name',
    'label' => null,
    'type' => 'text',
    'value' => ''
])

<div>
    <label for="{{ $name }}">{{ $label ?? ucfirst($name) }}</label>
    <input 
        type="{{ $type }}" 
        id="{{ $name }}" 
        name="{{ $name }}" 
        value="{{ old($name, $value) }}"
        {{ $attributes }}
    >
    @error($name)
        <p class="error">{{ $message }}</p>
    @enderror
</div>