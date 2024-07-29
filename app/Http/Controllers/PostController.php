<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()->filter(
                request(['search', 'category', 'author'])
            )->paginate(6)->withQueryString(),
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show',[
            'post' => $post
        ]);
    }

    public function create()
    {
        return view('posts.create', [
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
}
