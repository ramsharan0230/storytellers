<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Event;
use App\Models\Series;

class BlogController extends Controller
{
    public function blogs(){
        $blogs = Blog::latest()->get();
        $allSeries = Series::where('publish', 1)->get();
        $allEvents = Event::where('status', 'upcoming')->get();
        return view('blogs', compact('blogs', 'allSeries', 'allEvents'));
    }

    public function blogDetail($slug){
        $blog = Blog::where('slug', $slug)->first();
        $events = Blog::where('slug', $slug)->get();
        $allSeries = Series::where('publish', 1)->get();
        $allEvents = Event::where('status', 'upcoming')->get();
        $blogs = Blog::orderByDesc('created_at', 'DESC')->limit(5)->get();
        return view('blog-detail', compact('events', 'allSeries', 'blog', 'allEvents', 'blogs'));
    }
}
