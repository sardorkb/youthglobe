<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostTag;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::getAllPost();
        $categories = PostCategory::all();
        $tags = PostTag::all();
        return view('admin.post.index', compact('posts', 'categories', 'tags'));
    }

    public function create()
    {
        $categories = PostCategory::all();
        $tags = PostTag::all();
        return view('admin.post.create', compact('categories', 'tags'));
    }

    // Refactor the validation logic into a separate method
    protected function postValidation(Request $request)
    {
        return $request->validate([
            'title' => 'string|required',
            'quote' => 'string|nullable',
            'summary' => 'string|required',
            'description' => 'string|nullable',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'youtube_link' => 'nullable|url',
            'tags' => 'nullable|array',
            'post_cat_id' => 'required|exists:post_categories,id',
            'status' => 'required|in:active,inactive'
        ]);
    }

    public function store(Request $request)
    {
        // Validate request
        $this->postValidation($request);

        $data = $request->except('tags', 'photo');

        // Handle Photo Upload
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('uploads/posts', 'public');
            $data['photo'] = $photoPath;
        }

        // Unique Slug Generation
        $data['slug'] = $this->generateUniqueSlug($request->title);

        $post = Post::create($data);

        // Handle tags
        if ($request->has('tags')) {
            $post->tags()->sync($request->tags);
        }

        return redirect()->route('post.index')->with('success', 'Post successfully created');
    }

    // Slug Generation Logic
    protected function generateUniqueSlug($title)
    {
        $slug = Str::slug($title);
        if (Post::where('slug', $slug)->exists()) {
            $slug .= '-' . time(); // Generate a unique slug
        }
        return $slug;
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.post.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = PostCategory::all();
        $tags = PostTag::all();
        return view('admin.post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Request $request, $id)
    {
        // Validate request
        $this->postValidation($request);

        $post = Post::findOrFail($id);
        $data = $request->except('tags', 'photo');

        // Handle Photo Update
        if ($request->hasFile('photo')) {
            if ($post->photo && Storage::exists('public/' . $post->photo)) {
                Storage::delete('public/' . $post->photo);
            }
            $photoPath = $request->file('photo')->store('uploads/posts', 'public');
            $data['photo'] = $photoPath;
        }

        // Update the post
        $post->update($data);

        // Handle tags
        if ($request->has('tags')) {
            $post->tags()->sync($request->tags);
        }

        return redirect()->route('post.index')->with('success', 'Post successfully updated');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        // Delete photo if exists
        if ($post->photo && Storage::exists('public/' . $post->photo)) {
            Storage::delete('public/' . $post->photo);
        }

        $post->tags()->detach();
        $post->delete();

        return redirect()->route('post.index')->with('success', 'Post successfully deleted');
    }
}
