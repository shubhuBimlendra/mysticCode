<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('id','desc')->paginate(5);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id'
        ]);

        $posts = new Post();
        $posts-> title = $request->title;
        $posts-> content = $request->content;
        $posts->category_id = $request->category_id;
        $posts->save();
        return redirect()->route('posts.index')->with('success', 'Posts created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $posts = Post::findOrFail($id);
        $categories = Category::all();
        return view('admin.posts.edit', compact('posts','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id'
        ]);

        $posts = Post::FindOrFail($id);
        $posts->title = $request->title;
        $posts->content = $request->content;
        $posts->category_id = $request->category_id;
        $posts->save();
        return redirect()->route('posts.index')->with('success', 'Posts updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $posts = Post::FindOrFail($id);
        $posts->delete();
        return redirect()->route('posts.index')->with('success', 'Posts deleted successfully');
    }
}
