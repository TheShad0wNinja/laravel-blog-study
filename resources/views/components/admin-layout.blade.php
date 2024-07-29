<section class="px-6 py-8 flex gap-10 max-w-6xl mx-auto mt-10 lg:mt-20">
    <aside class="flex flex-col gap-4">
        <h2 class="text-xl font-semibold">Links</h2>
        <ul class="space-y-1 w-min">
            <li>
                <a href="/admin/posts" @class([
                    'block rounded-lg px-4 py-2 text-sm font-medium text-gray-700 whitespace-nowrap border-grey-200 border-2',
                    'bg-blue-500 text-white' => request()->is('admin/posts'),
                ])>
                    All posts
                </a>
            </li>
            <li>
                <a href="/admin/posts/create" @class([
                    'block rounded-lg px-4 py-2 text-sm font-medium text-gray-700 whitespace-nowrap border-grey-200 border-2',
                    'bg-blue-500 text-white' => request()->is('admin/posts/create*'),
                ])>
                    Create new post
                </a>
            </li>
        </ul>
    </aside>
    {{ $slot }}
</section>
