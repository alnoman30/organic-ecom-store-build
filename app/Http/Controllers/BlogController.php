<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class BlogController extends Controller
{
    public function blogCategory(){
        $categories = BlogCategory::paginate(10);
        return view('admin.blog.blog_category', compact('categories'));
    }
   public function CategoryStore(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:50',
        'slug' => 'required|string|unique:blog_categories,slug',
    ]);

    try {
        $blog_categories = new BlogCategory();
        $blog_categories->name = $request->name;
        $blog_categories->slug = Str::slug($request->slug);
        $blog_categories->save();

        flash()->success('Blog category created successfully!');
        return redirect()->route('admin.blog.category');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'Something went wrong: ' . $e->getMessage()])
                     ->withInput();
    }
}
}
