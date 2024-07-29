<x-layout>
    <x-admin-layout>
        <main>
            <h1 class="text-2xl font-bold">Posts</h1>
            <x-table :posts="$posts" />
        </main>
    </x-admin-layout>
</x-layout>
