<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function homePage(){
        
        $blogs = Blog::with('blogCategory')->latest()->paginate(3);

        return view('pages.index', compact('blogs'));
    }

    public function blogPage(){
        $blogs = Blog::with('blogCategory')->paginate(9);
        return view('pages.blog', compact('blogs'));
    }
}
