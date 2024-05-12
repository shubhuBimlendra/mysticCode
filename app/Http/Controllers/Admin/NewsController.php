<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\News;
use App\Models\Category;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::orderBy('id','desc')->paginate(5);
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.news.create',compact('categories'));
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

        $news = new News();
        $news-> title = $request->title;
        $news-> content = $request->content;
        $news->category_id = $request->category_id;
        $news->save();
        return redirect()->route('news.index')->with('success', 'News created successfully');

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
        $news = News::FindOrFail($id);
        $categories = Category::all();

        return view('admin.news.edit',compact('news','categories'));
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

        $news = News::FindOrFail($id);
        $news-> title = $request->title;
        $news-> content = $request->content;
        $news->category_id = $request->category_id;
        $news->save();
        return redirect()->route('news.index')->with('success', 'News Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = News::FindOrFail($id);
        $news->delete();
        return redirect()->route('news.index')->with('success', 'News has been deleted successfully');
    }
}
