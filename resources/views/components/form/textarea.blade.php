@props(['name'])

<x-form.field>
    <x-form.label name="{{ $name }}" />

    <textarea class="border border-gray-400 p-2 w-full" name="{{ $name }}" id="{{ $name }}"
        {{ $attributes(['required' => 'true']) }}>{{ old($name) ?? $slot }}</textarea>

    <x-form.error name="{{ $name }}" />
</x-form.field>
