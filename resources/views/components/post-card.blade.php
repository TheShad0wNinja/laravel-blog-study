@props(['post'])

<article
    {{ $attributes->class(['transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl cursor-pointer']) }}>
    <div class="py-6 px-5">
        <div>
            <img src="{{ asset($post->thumbnail) }}" alt="Blog Post illustration" class="rounded-xl">
        </div>

        <div class="mt-8 flex flex-col justify-between">
            <header>
                <div class="space-x-2">
                    <a href="/categories/{{ $post->category->slug }}"
                        class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                        style="font-size: 10px">
                        {{ $post->category->title }}
                    </a>
                </div>

                <div class="mt-4">
                    <h1 class="text-3xl">
                        {{ $post->title }}
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                        Published <time>{{ $post->created_at->diffForHumans() }}</time>
                    </span>
                </div>
            </header>

            <div class="text-sm mt-4 space-y-2">
                <p>
                    {!! $post->excerpt !!}
                </p>
            </div>

            <footer class="flex justify-between items-center mt-8">
                <a href="?author={{ $post->author->username }}">
                    <div class="flex items-center text-sm">
                        <img src="/images/lary-avatar.svg" alt="Lary avatar">
                        <div class="ml-2">
                            <h5 class="font-bold">{{ $post->author->name }}</h5>
                        </div>
                    </div>
                </a>

                <a href="/posts/{{ $post->slug }}"
                    class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-6 w-min whitespace-nowrap">
                    Read More
                </a>
            </footer>
        </div>
    </div>
</article>
