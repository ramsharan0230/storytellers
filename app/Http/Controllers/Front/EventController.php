<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Series;
use App\Models\Blog;
use DB;
use App\Models\UpcomingEvent;

class EventController extends Controller
{
    protected $pastEvents = null;
    protected $dayAgo = 6;

    public function __construct()
    {
        $dayToCheck = \Carbon\Carbon::now()->subDays($this->dayAgo)->format('Y-m-d');
        $this->pastEvents = Event::whereDate("created_at", '>=', $dayToCheck)->get();
        $this->upcomingEvents = UpcomingEvent::where('publish', 1)->orderBy('created_at', 'DESC')->get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function eventDetail($slug){
        $allEvents = Event::where('publish', 1)->get();
        $event = Event::where('slug', $slug)->with('guest')->first();
        $similerVideos = Event::where('slug', "!=", $slug)->limit(3)->get();
        $guestVideos = Event::where('guest_id', $event->guest->id)
        ->orWhere('title', 'like', '%' . $event->title . '%')
        ->get();

        $featuredVideo = Event::where('video_type', 'featured')->where('publish', 1)->first();
        $blogs = Blog::orderByDesc('created_at', 'DESC')->limit(5)->get();
        $pastEvents = $this->pastEvents;
        $allSeries = Series::where('publish', 1)->get();
        $upcomingEvents = $this->upcomingEvents;

        return view('event-detail', compact('event', 'similerVideos', 'allEvents', 'guestVideos', 'allSeries', 'featuredVideo', 'blogs', 'pastEvents', 'upcomingEvents'));
    }

    public function seriesDetail($id){
        $events = Event::where('series_id', $id)->with('guest')->get();
        $allSeries = Series::where('publish', 1)->get();
        $blogs = Blog::orderByDesc('created_at', 'DESC')->limit(5)->get();
        $allEvents = Event::where('publish', 1)->get();
        $upcomingEvents = $this->upcomingEvents;

        return view('series-detail', compact('events', 'allSeries', 'blogs', 'allEvents', 'upcomingEvents'));
    }
}
