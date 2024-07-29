<x-layout>
    <x-admin-layout>
        <main class="w-full">
            <h1 class="text-2xl font-bold mb-4 mx-auto">
                Publish New Post
            </h1>
            <form method="POST" action="/admin/posts" class="border border-gray-200 p-6 rounded-xl max-w-4xl mx-auto"
                enctype="multipart/form-data">
                @csrf

                <x-form.input name="title" />
                <x-form.input name="slug" />
                <x-form.input name="thumbnail" type="file" />
                <x-form.textarea name="excerpt" />
                <x-form.textarea name="body" />

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
                    <x-button type="submit">Publish</x-button>
                </x-form.field>
            </form>
        </main>
    </x-admin-layout>
</x-layout>
