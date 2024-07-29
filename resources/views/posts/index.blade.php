<x-layout>
    @include('posts._header')
    @csrf

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($posts->count())
            <x-post-featured-card x-data="{ ligma: a }" :post="$posts[0]" />

            @if ($posts->count() > 1)

                <div class="lg:grid lg:grid-cols-12">
                    @foreach ($posts->skip(1) as $post)
                        <x-post-card :post="$post"
                            class="{{ $loop->iteration > 2 ? 'col-span-4' : 'col-span-6' }}" />
                    @endforeach
                </div>

            @endif

            {{ $posts->onEachSide(5)->links() }}
        @else
            <h2 class="text-center text-lg">No posts found</h2>
        @endif

    </main>
</x-layout>
