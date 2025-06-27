<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use COM;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

use function PHPUnit\Framework\fileExists;

class BlogController extends Controller
{
    // BLOG CATEGORY CONTROLLERS
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

public function categoryEdit($id){

    $category = blogCategory::findOrFail($id);
    return view('admin.blog.blog_category_edit', compact('category'));
}

public function categoryUpdate(Request $request, $id){

    $request->validate([
        'name' => 'required|string|max:50',
        'slug' => 'required|string',
    ]);

    $categories = blogCategory::findOrFail($id);
    $categories->name = $request->name;
    $categories->slug = Str::slug($request->slug);
    $categories->save();

    flash()->success('Blog category updated successfully!');
    return redirect()->route('admin.blog.category');
}

public function categoryDelete($id){
    $categories = blogCategory::findOrFail($id);
    $categories->delete();
    flash()->success('Blog category has been deleted!');
    return redirect()->back();
}



// BLOG CONTROLLERS

    public function blogs(){
       $blogs = Blog::with('blogCategory')->paginate(10);
        return view('admin.blog.blogs', compact('blogs'));
    }
    public function blogsCreate(){
        $categories = BlogCategory::all();
        return view('admin.blog.blogs_create', compact('categories'));
    }

    public function blogStore(Request $request){

        $request->validate([
            'title' => 'required|string|max:200',
            'slug' => 'required|string|unique:blogs,slug',
            'description' => 'required|string',
            'image' => 'image|mimes:png,jpg,jpeg,webp',
            'blog_category_id' => 'required',
        ]);

        $blogs = new Blog();

        $blogs->title = $request->title;
        $blogs->slug = Str::slug($request->slug);
        $blogs->description = $request->description;
        $blogs->blog_category_id = $request->blog_category_id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/blogs/'), $imageName);
            $blogs->image = $imageName;
        }

        $blogs->save();
        
        flash()->success('Blog created successfully!');
        return redirect()->route('admin.blogs');
    }

    public function blogEdit($id){
        $blogs = Blog::with('blogCategory')->findOrFail($id);
        $categories = BlogCategory::all();
        return view('admin.blog.blog_edit', compact('blogs', 'categories'));
    }

    public function blogUpdate(Request $request, $id){

           $request->validate([
            'title' => 'required|string|max:200',
            'slug' => [
                'required',
                'string',
                Rule::unique('blogs', 'slug')->ignore($id, 'id'),
            ],
            'description' => 'required|string',
            'image' => 'image|mimes:png,jpg,jpeg,webp',
            'blog_category_id' => 'required',
        ]);
        
        $blogs = Blog::findOrFail($id);

        $blogs->title = $request->title;
        $blogs->slug = Str::slug($request->slug);
        $blogs->description = $request->description;
        $blogs->blog_category_id = $request->blog_category_id;

        if($request->hasFile('image')){
            $oldImage = public_path('uploads/blogs/' .$blogs->image);
            if(file_exists($oldImage)){
                unlink($oldImage);
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/blogs/'), $imageName);
            $blogs->image = $imageName;
        }
        $blogs->save();

       flash()->success('Blog updated successfully!');
       return redirect()->route('admin.blogs');
        
    }

    public function blogDelete($id)
    {
        $blog = Blog::findOrFail($id);

        $imagePath = public_path('uploads/blogs/' . $blog->image);


        if (!empty($blog->image) && file_exists($imagePath) && is_file($imagePath)) {
            unlink($imagePath);
        }

        $blog->delete();

        flash()->success('Blog has been deleted!');
        return redirect()->back();
    }

    public function blogShow($slug)
    {
        $blog = Blog::with('blogCategory')->where('slug', $slug)->firstOrFail();
        $categories = BlogCategory::all();
        $recentBlogs = Blog::latest()->take(5)->get();

        return view('pages.blog_details', compact('blog', 'categories', 'recentBlogs'));
    }



}
