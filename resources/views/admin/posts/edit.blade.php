<x-layout>
    <x-admin-layout>
        <main class="w-full">
            <h1 class="text-2xl font-bold mb-4 mx-auto">
                Edit Post
            </h1>
            <form method="POST" action="/admin/posts/{{ $post->slug }}"
                class="border border-gray-200 p-6 rounded-xl max-w-4xl mx-auto" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <x-form.input name="title" value="{{ $post->title }}" required />
                <x-form.input name="slug" value="{{ $post->slug }}" required />
                <div class="flex items-end gap-1">
                    <x-form.input name="thumbnail" type="file" />
                    <img src="{{ asset($post->thumbnail) }}" alt="old-thumb" width="100">
                </div>
                <x-form.textarea name="excerpt" required>{{ $post->excerpt }}</x-form.textarea>
                <x-form.textarea name="body" required>{{ $post->body }}</x-form.textarea>

                <x-form.field>
                    <x-form.label name="category" for="category_id" />

                    <select name="category_id" id="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ ucwords($category->title) }}</option>
                        @endforeach
                    </select>

                    <x-form.error name="category_id" />
                </x-form.field>

                <x-form.field>
                    <x-button type="submit">edit</x-button>
                </x-form.field>
            </form>
        </main>
    </x-admin-layout>
</x-layout>
