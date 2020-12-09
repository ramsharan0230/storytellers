<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Series;

class HomeController extends Controller
{
    protected $allEvents = null;
    protected $allSeries = null;

    public function __construct()
    {
        $this->allEvents = Event::where('status', 'upcoming')->get();
        $this->allSeries = Series::where('publish', 1)->get();
    }

    public function index(){
        $allEvents = $this->allEvents;
        $allSeries = $this->allSeries;
        return view('home', compact('allEvents', 'allSeries'));
    }
    public function about(){
        $allEvents = $this->allEvents;
        $allSeries = $this->allSeries;

        return view('about-us', compact(['allEvents', 'allSeries']));
    }

    public function contact(){
        return view('contact');
    }

    public function boookings(){
        return view('bookings');
    }

    public function videoList(){
        return view('video-list');
    }
}
