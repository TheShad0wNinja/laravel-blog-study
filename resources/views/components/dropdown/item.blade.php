@props(['active' => false])

@php
    $default = 'block text-sm text-left leading-6 hover:bg-blue-500 hover:text-white focus:bg-blue-500 focus:text-white px-3';
@endphp

<a {{ $attributes->class([$default, 'bg-blue-500 text-white' => $active]) }}>
    {{ $slot }}
</a>
