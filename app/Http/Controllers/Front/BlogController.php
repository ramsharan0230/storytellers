<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Event;
use App\Models\Series;
use App\Models\UpcomingEvent;

class BlogController extends Controller
{
    public function blogs(){
        $blogs = Blog::where('publish', 1)->latest()->simplePaginate(5);
        $allSeries = Series::where('publish', 1)->get();
        $allEvents = Event::where('publish', 1)->get();
        return view('blogs', compact('blogs', 'allSeries', 'allEvents'));
    }

    public function blogDetail($slug){
        $blog = Blog::where('slug', $slug)->first();
        $events = Blog::where('slug', $slug)->get();
        $allSeries = Series::where('publish', 1)->get();
        $allEvents = Event::where('publish', 1)->get();
        $blogs = Blog::orderByDesc('created_at', 'DESC')->limit(5)->get();
        $recentEvents = Event::orderByDesc('created_at', 'DESC')->limit(5)->get();
        $featuredEvents = Event::where('video_type', 'featured')->orderByDesc('created_at', 'DESC')->limit(5)->get();
        $upcomingEvents = UpcomingEvent::where('publish', 1)->limit(5)->get();
        return view('blog-detail', compact('events', 'allSeries', 'blog', 'allEvents', 'blogs', 'recentEvents', 'featuredEvents', 'upcomingEvents'));
    }
}
