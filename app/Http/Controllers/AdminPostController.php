<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::latest()->get(),
        ]);
    }


    public function create()
    {
        return view('admin.posts.create', [
            'categories' => Category::all(),
        ]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'excerpt' => 'required',
            'thumbnail' => ['required', 'image'],
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        $thumbnail = request()->file('thumbnail')->store('thumbnails');

        $attributes['thumbnail'] = $thumbnail;

        auth()->user()->posts()->create($attributes);

        return redirect('/');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'categories' => Category::all(),
            'post' => $post
        ]);
    }

    public function update(Post $post)
    {
        $attributes = request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->slug, 'slug')],
            'excerpt' => 'required',
            'thumbnail' => ['image'],
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        if (isset($attributes['thumbnail'])) {

            $old_thumbnail = str_replace("storage/", "", $post->thumbnail);

            if (Storage::exists($old_thumbnail)){
                Storage::delete($old_thumbnail);
            }

            $thumbnail = request()->file('thumbnail')->store('thumbnails');
            $attributes['thumbnail'] = $thumbnail;
        }

        $post->update($attributes);

        return redirect('/admin/posts/' . $attributes->slug . 'edit')->with('success', 'Post edited');

    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/admin/posts')->with('success', 'Post deleted');
    }
}
