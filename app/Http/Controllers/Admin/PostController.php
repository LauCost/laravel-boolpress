<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $posts = Post::paginate(5);

        return view('admin.posts.index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $validated = $request->validate([
            'title' => ['required', 'unique:posts', 'max:200'],
            'img' => ['nullable', 'image', 'max:750'],
            'sub_title' => 'nullable',
            'body' => 'nullable',
            'category_id' => ['nullable', 'exists:categories,id'],
        ]);
        if ($request->file('img')) {

            $img_path = Storage::put('post_images', $request->file('img'));

            $validated['img'] = $img_path;

        }
        $validated['slug'] = Str::slug($validated['title']);

        //ddd($validated);

        Post::create($validated);

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //

        return view('admin.posts.show', compact('post'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('admin.posts.edit', compact('post', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //

        //ddd($request->all());

        $validated = $request->validate([
            'title' => ['required', Rule::unique('posts')->ignore($post->id), 'max:200'],
            'img' => ['nullable', 'image', 'max:750'],
            'sub_title' => 'nullable',
            'body' => 'nullable',
            'category_id' => ['nullable', 'exists:categories,id'],
        ]);

        if ($request->file('img')) {

            Storage::delete($post->img);

            $img_path = Storage::put('post_images', $request->file('img'));

            $validated['img'] = $img_path;

        }

        $validated['slug'] = Str::slug($validated['title']);

        $post->update($validated);

        return redirect()->route('admin.posts.index')->with('message', 'Il post ?? stato modificato correttamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //

        $post->delete();

        return redirect()->route('admin.posts.index')->with('message', 'Il post ?? stato eliminato correttamente');

    }
}
