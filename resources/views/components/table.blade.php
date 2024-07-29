@props(['posts'])

<div class="py-10 max-w-full">
    <div class="flex flex-col">
        <div class="overflow-x-auto">
            <div class="inline-block ">
                <div class="overflow-hidden overflow-y-auto border rounded-lg max-h-[480px]">
                    <table class="max-w-full divide-y divide-neutral-200 relative">
                        <thead class="bg-neutral-50 sticky top-0 left-0 z-10">
                            <tr class="text-neutral-500">
                                <th class="px-5 py-3 text-xs font-medium text-left uppercase">ID</th>
                                <th class="px-5 py-3 text-xs font-medium text-left uppercase">Title</th>
                                <th class="px-5 py-3 text-xs font-medium text-left uppercase">Category</th>
                                <th class="px-5 py-3 text-xs font-medium text-left uppercase">Author</th>
                                <th class="px-5 py-3 text-xs font-medium text-left uppercase">Created At</th>
                                <th class="px-5 py-3 text-xs font-medium text-right uppercase">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-neutral-200">
                            @foreach ($posts as $post)
                                <tr class="text-neutral-800">
                                    <td class="px-5 py-4 text-sm font-medium whitespace-nowrap">{{ $post->id }}</td>
                                    <td class="px-5 py-4 text-sm truncate max-w-sm whitespace-nowrap">
                                        {{ $post->title }}
                                    </td>
                                    <td class="px-5 py-4 text-sm whitespace-nowrap">{{ $post->category->title }}</td>
                                    <td class="px-5 py-4 text-sm whitespace-nowrap">{{ $post->author->name }}</td>
                                    <td class="px-5 py-4 text-sm whitespace-nowrap">{{ $post->created_at }}</td>
                                    <td class="px-5 py-4 text-sm font-medium text-right whitespace-nowrap">
                                        <a class="text-blue-600 hover:text-blue-700"
                                            href="/admin/posts/{{ $post->slug }}/edit">Edit</a>
                                        <form action="/admin/posts/{{ $post->slug }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-red-600 hover:text-red-700"
                                                href="">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
