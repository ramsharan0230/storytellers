<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Series;
use App\Models\Blog;
use App\Models\About;
use App\Models\UpcomingEvent;
use App\Models\Contact;

class HomeController extends Controller
{
    protected $allEvents = null;
    protected $allSeries = null;
    protected $pastEvents = null;
    protected $featuredEvents = null;

    public function __construct()
    {
        $this->allEvents = Event::where('publish', 1)->get();
        $this->featuredEvents = Event::where('video_type', 'featured')->get();
        
        $this->allSeries = Series::where('publish', 1)->get();
        $this->blogs = Blog::where('publish', 1)->limit(5)->get();

        $dayAgo = 6;
        $dayToCheck = \Carbon\Carbon::now()->subDays($dayAgo)->format('Y-m-d');
        $this->pastEvents = Event::whereDate("created_at", '>=', $dayToCheck)->where('video_type', 'past')->get();
    }

    public function index(){
        $allEvents = $this->allEvents;
        $allSeries = $this->allSeries;
        $blogs = $this->blogs;
        $pastEvents = $this->pastEvents;
        $featuredEvents = $this->featuredEvents;
        $sliders = Event::where('slider', 1)->get();
        return view('home', compact('allEvents', 'allSeries', 'blogs', 'pastEvents', 'featuredEvents', 'sliders'));
    }
    public function about(){
        $allEvents = $this->allEvents;
        $allSeries = $this->allSeries;
        $blogs = $this->blogs;
        $pastEvents = $this->pastEvents;
        $about = About::first();
        $upcomingEvents = UpcomingEvent::where('publish', 1)->get();
        return view('about-us', compact(['allEvents', 'allSeries', 'blogs', 'pastEvents', 'about', 'upcomingEvents']));
    }

    public function contact(){
        $allEvents = $this->allEvents;
        $allSeries = $this->allSeries;
        $blogs = $this->blogs;
        $pastEvents = $this->pastEvents;
        $contact = Contact::where('publish', 1)->first();
        return view('contact', compact('allEvents', 'allSeries', 'blogs', 'pastEvents', 'contact'));
    }

    public function boookings(){
        $allEvents = $this->allEvents;
        $allSeries = $this->allSeries;
        $blogs = $this->blogs;
        $pastEvents = $this->pastEvents;
        $events = Event::all();
        return view('bookings', compact('allEvents', 'allSeries', 'blogs', 'pastEvents', 'events'));
    }

    public function videoList(){
        $allEvents = $this->allEvents;
        $allSeries = $this->allSeries;
        $blogs = $this->blogs;
        $pastEvents = $this->pastEvents;
        return view('video-list', compact('allEvents', 'allSeries', 'blogs', 'pastEvents'));
    }

    public function FeaturedVideo(){
        $allEvents = $this->featuredEvents;
        $allSeries = $this->allSeries;
        $blogs = $this->blogs;
        $pastEvents = $this->pastEvents;

        return view('featured-video-list', compact('allEvents', 'allSeries', 'blogs', 'pastEvents'));
    }
    
}
