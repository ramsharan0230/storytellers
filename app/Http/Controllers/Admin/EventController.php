<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Image;
use DB;
use App\Repositories\Event\EventRepository;
use App\Repositories\Guest\GuestRepository;
use App\Repositories\Series\SeriesRepository;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Carbon\Carbon;


class EventController extends Controller
{
    protected $model = null;

    public function __construct(EventRepository $model, GuestRepository $guest, SeriesRepository $series)
    {
        $this->model = $model;
        $this->event = $model;
        $this->guest = $guest;
        $this->series = $series;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = $this->model->latest()->get();
        return view('admin.event.list', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allGuests = $this->guest->where('publish', 1)->get();
        $allSeries = $this->series->where('publish', 1)->get();
        return view('admin.event.create', compact('allGuests', 'allSeries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'guest_id' => 'required|integer',
            'series_id' => 'required|integer',
            'title' => 'required|max:199',
            'datetime' => 'required',
            'video_link' => 'required|max:199',
            'highlight_text' => 'max:2500',
            'banner_image' => 'mimes:jpg,jpeg,png,gif|max:2048',
            'descriptions' => 'max:2500',
        ]);

        $formInput = $request->except(['banner_image']);
        $formInput['slug'] = SlugService::createSlug(Event::class, 'slug', $formInput['title']);
        $formInput['status'] = is_null($request->publish) ? 0 : 1;
        $formInput['user_id'] = auth()->user()->id;

        if ($request->hasFile('banner_image')) {
            $formInput['banner_image'] = $this->imageProcessing($request->banner_image, 750, 562, 'yes');
        }

        $this->model->create($formInput);
        return redirect()->route('event.index')->with('message', 'Event Created Successfuly.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort('404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return abort(404);
        $detail = $this->model->findOrFail($id);

        $allGuests = $this->guest->where('publish', 1)->get();
        $allSeries = $this->series->where('publish', 1)->get();
        return view('admin.event.edit', compact('detail', 'allGuests', 'allSeries'));
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
        $request->validate([
            'guest_id' => 'required|integer',
            'series_id' => 'required|integer',
            'title' => 'required|max:199',
            'datetime' => 'required',
            'video_link' => 'required|max:199',
            'highlight_text' => 'max:2500',
            'banner_image' => 'mimes:jpg,jpeg,png,gif|max:2048',
            'descriptions' => 'max:2500',
            'status' => 'required',
        ]);

        $oldRecord = $this->model->findOrFail($id);

        $formInput = $request->except(['slug', 'banner_image']);
        $formInput['slug'] = SlugService::createSlug(Event::class, 'slug', $formInput['title']);

        if ($request->hasFile('banner_image')) {
            if ($oldRecord->banner_image) {
                $this->unlinkImage($oldRecord->banner_image);
            }
            $formInput['banner_image'] = $this->imageProcessing($request->banner_image, 750, 562, 'yes');
        }
        $this->model->update($formInput, $id);
        return redirect()->route('event.index')->with('message', 'Event Edited Successfuly.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = $this->model->findOrFail($id);
        if ($record->banner_image) {
            $this->unlinkImage($record->banner_image);
        }
        $this->model->destroy($id);
        return redirect()->route('event.index')->with('message', 'Event Deleted Successfuly.');
    }

    public function imageProcessing($image, $width, $height, $otherpath)
    {

        $input['imagename'] = Date("D-h-i-s") . '-' . rand() . '-' . '.' . $image->getClientOriginalExtension();
        $thumbPath = public_path('images/banners');

        $img1 = Image::make($image->getRealPath());
        
        $img1->fit(200, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($thumbPath . '/' . $input['imagename']);
        $img1->destroy();

        return $input['imagename'];
    }

    public function unlinkImage($imagename)
    {
        $thumbPath = public_path('images/banners/') . $imagename;
        if (file_exists($thumbPath)) {
            unlink($thumbPath);
        }
        return;
    }

    public function makeSlider(Request $request){
        $request->validate([
            'event_id' => 'required|integer'
        ]);
        $event = DB::table('events')->where('id', $request->event_id)->first();
        if($event->slider == 0){
            DB::table('events')->where('id', $request->event_id)->update(array('slider' => 1));
            $message = "Event has been updated to Slider";
        }
        else{
            DB::table('events')->where('id', $request->event_id)->update(array('slider' => 0));
            $message = "Event has been removed from Slider";
        }

        return response(['message'=>$message, 'status'=>200]);
    }

    public function makeFeatured(Request $request){
        
        $request->validate([
            'event_id' => 'required|integer'
        ]);
        $event = DB::table('events')->where('id', $request->event_id)->first();
        if($event->video_type == 'past'){
            DB::table('events')->where('id', $request->event_id)->update(array('video_type' => 'featured'));
            $message = "Event has been updated to Featured";
        }
        else{
            DB::table('events')->where('id', $request->event_id)->update(array('video_type' => 'past'));
            $message = "Event has been removed from Past";
        }

        return response(['message'=>$message, 'status'=>200]);
    }
    
}
