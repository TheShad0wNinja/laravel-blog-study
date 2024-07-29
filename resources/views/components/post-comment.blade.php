@props(['comment'])

<article class="flex bg-gray-100 border border-gray-200 p-6 rounded-xl space-x-4">
    <div class="flex-shrink-0">
        <img src="https://i.pravatar.cc/60?u={{ $comment->author->id }}" alt="{{ $comment->author->username }}-pfp"
            width="60" height="60" class="rounded-xl">
    </div>

    <div class="w-full">
        <div class="flex justify-between ">
            <header class="mb-4">
                <h3 class="font-bold"> {{ $comment->author->name }} </h3>

                <p class="text-xs">
                    Posted
                    <time>{{ $comment->created_at->diffForHumans() }}</time>
                </p>
            </header>
            @if (auth()->id() == $comment->author->id)
                <x-button :link="true" type="submit"
                    href="/posts/{{ $comment->post->slug }}/comments/{{ $comment->id }}/delete">
                    Delete
                </x-button>
            @endif
        </div>

        <p>
            {{ $comment->body }}
        </p>
    </div>
</article>
