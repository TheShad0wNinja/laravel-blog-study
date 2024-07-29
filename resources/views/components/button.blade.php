@props(['link' => false])

@if ($link)
    <a
        {{ $attributes->class(['h-min bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600']) }}>
        {{ $slot }}
    </a>
@else
    <button
        {{ $attributes->class(['h-min bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600']) }}>
        {{ $slot }}
    </button>
@endif
