<x-dropdown.wrapper>
    <x-slot name="trigger">
        <button @click="open=true"
            class="flex-1 appearance-none bg-transparent flex py-2 pl-3 pr-9 text-sm text-left font-semibold">
            {{ isset($currentCategory) ? ucwords($currentCategory->title) : 'Categories' }}
            <x-icon name="arrow-down" />
        </button>
    </x-slot>
    <a href="/"
        class="block text-sm text-left leading-6 hover:bg-blue-500 hover:text-white focus:bg-blue-500 focus:text-white px-3">
        All
    </a>
    @foreach ($categories as $category)
        <x-dropdown.item
            href="/?category={{ $category->slug }}{{ !empty(request()->except('category')) ? '&' : '' }}{{ Arr::query(request()->except('category', 'page')) }}"
            :active="isset($currentCategory) && $currentCategory->is($category)">
            {{ ucwords($category->title) }}
        </x-dropdown.item>
    @endforeach
</x-dropdown.wrapper>
