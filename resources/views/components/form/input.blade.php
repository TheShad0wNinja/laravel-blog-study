@props(['name', 'type' => 'text', 'value' => null])

<x-form.field>
    <x-form.label name="{{ $name }}" />

    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ old($name) ?? $value }}"
        {{ $attributes->class(['border border-gray-400 p-2 w-full']) }}>

    <x-form.error name="{{ $name }}" />
</x-form.field>
