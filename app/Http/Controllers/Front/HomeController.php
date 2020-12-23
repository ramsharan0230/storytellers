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
use App\Models\Dashboard;

class HomeController extends Controller
{
    protected $allEvents = null;
    protected $allSeries = null;
    protected $pastEvents = null;
    protected $featuredEvents = null;
    protected $dashboards = null;
    protected $recentEvents = null;
    protected $upcomingEvents = null;

    public function __construct()
    {
        $this->allEvents = Event::where('publish', 1)->get();
        $this->recentEvents = Event::where('publish', 1)->where('video_type', '!=', 'featured')->orderBy('created_at', 'DESC')->limit(6)->get();
        $this->featuredEvents = Event::where('video_type', 'featured')->limit(6)->get();
        $this->upcomingEvents = UpcomingEvent::where('publish', 1)->orderBy('created_at', 'DESC')->get();
        $this->allSeries = Series::where('publish', 1)->get();
        $this->blogs = Blog::where('publish', 1)->limit(5)->orderBy('created_at', 'DESC')->get();
        $this->dashboards = Dashboard::first();
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
        $recentEvents = $this->recentEvents;
        $sliders = Event::where('slider', 1)->get();
        $dashboards = $this->dashboards;
        $about = About::first();
        $upcomingEvents = $this->upcomingEvents;
        return view('home', compact('allEvents', 'upcomingEvents', 'allSeries', 'blogs', 'pastEvents', 'featuredEvents', 'sliders', 'dashboards', 'about', 'recentEvents'));
    }
    public function about(){
        $allEvents = $this->allEvents;
        $allSeries = $this->allSeries;
        $blogs = $this->blogs;
        $pastEvents = $this->pastEvents;
        $about = About::first();
        $upcomingEvents = $this->upcomingEvents;
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
        $upcomingEvents = $this->upcomingEvents;
        $allSeries = $this->allSeries;
        $blogs = $this->blogs;
        $pastEvents = $this->pastEvents;
        $events = Event::all();
        return view('bookings', compact('allEvents', 'allSeries', 'blogs', 'upcomingEvents', 'pastEvents', 'events'));
    }

    public function videoList(){
        $recentEvents = $this->recentEvents;
        $allSeries = $this->allSeries;
        $blogs = $this->blogs;
        $pastEvents = $this->pastEvents;
        $upcomingEvents = $this->upcomingEvents;
        return view('video-list', compact('recentEvents', 'allSeries', 'blogs', 'pastEvents', 'upcomingEvents'));
    }

    public function FeaturedVideo(){
        $allFeaturedEvents = Event::where('video_type', 'featured')->where('publish', 1)->get();
        $allSeries = $this->allSeries;
        $blogs = $this->blogs;
        $pastEvents = $this->pastEvents;
        $upcomingEvents = $this->upcomingEvents;
        return view('featured-video-list', compact('allFeaturedEvents', 'allSeries', 'blogs', 'pastEvents', 'upcomingEvents'));
    }
    
}
