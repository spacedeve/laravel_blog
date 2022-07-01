<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
  public function index()
  {
    $blogs = Blog::all();
    return view('blog.index', compact('blogs'));
  }

  public function create()
  {
    $blogs = Blog::all();
    return view('blog.create', compact('blogs'));
  }

  public function store(Request $request)
  {
    $request->validate([
      'title' => 'required|string',
      'content' => 'required|string',
      'image' => 'required|mimes:jpg,png,jpeg,gif'
    ]);

    $newImageName = uniqid() . '.' . $request->image->extension();
    $request->image->move(public_path('assets\images\blog-posts-images'), $newImageName);

    $data = Blog::create([
      'title' => $request->input('title'),
      'content' => $request->input('content'),
      'image' => $newImageName,
    ]);
    return redirect()->route('blog.index');
  }

  public function show(Blog $blog)
  {
//    $blog = Blog::findOrFail($id);
    return view('blog.show', compact('blog'));
  }

  public function edit(Blog $blog)
  {
    return view('blog.edit', compact('blog'));
  }

  public function update(Request $request, $id)
  {
    $data = Blog::findOrFail($id);
    $request->validate([
      'title' => 'required|string',
      'content' => 'required|string',
      'image' => 'required|mimes:jpg,png,jpeg,gif'
    ]);

    $newImageName = uniqid() . '.' . $request->image->extension();
    $request->image->move(public_path('assets\images\blog-posts-images'), $newImageName);

    $data = Blog::where('id', $id)->update([
      'title' => $request->input('title'),
      'content' => $request->input('content'),
      'image' => $newImageName,
    ]);
    return redirect()->route('blog.show', $id);
  }

  public function destroy(Blog $blog)
  {
    $blog->delete();
    return redirect()->route('blog.index');
  }
}
