@props(['trigger'])

<div x-data="{ open: false }" class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">

    {{-- Trigger --}}
    <div @click="open = !show">
        {{ $trigger }}
    </div>

    {{-- Links --}}
    <div x-show="open" @click.away="open=false"
        class="absolute top-10 rounded-xl min-w-full left-0 bg-gray-100 py-2 z-10 max-h-52 overflow-auto"
        style="display: none;">
        {{ $slot }}
    </div>
</div>
