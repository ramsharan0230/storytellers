<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function blogs(){
        $blogs = Blog::latest()->get();
        return view('blogs', compact('blogs'));
    }
}
