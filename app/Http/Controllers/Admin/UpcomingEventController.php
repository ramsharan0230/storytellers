<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Guest\GuestRepository;
use App\Repositories\Series\SeriesRepository;
use App\Repositories\UpcomingEvent\UpcomingEventRepository;
use App\Models\UpcomingEvent;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Image;

class UpcomingEventController extends Controller
{
    protected $model = null;

    public function __construct(UpcomingEventRepository $model, GuestRepository $guest, SeriesRepository $series)
    {
        $this->model = $model;
        $this->upcomingEvent = $model;
        $this->guest = $guest;
        $this->series = $series;
    }


    public function index(){
        $allGuests = $this->guest->where('publish', 1)->get();
        $allSeries = $this->series->where('publish', 1)->get();
        $details = $this->model->all();
        return view('admin.upcoming-event.list', compact('allGuests', 'allSeries', 'details'));
    }

    public function create(){
        $allGuests = $this->guest->where('publish', 1)->get();
        $allSeries = $this->series->where('publish', 1)->get();

        return view('admin.upcoming-event.create', compact('allGuests', 'allSeries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'guest_id' => 'required|integer',
            'title' => 'required|max:500',
            'date' => 'required',
            'time' => 'required',
            'banner_image' => 'mimes:jpg,jpeg,png,gif|max:2048',
            'descriptions' => 'max:10000',
        ]);

        $formInput = $request->except(['banner_image']);
        $formInput['slug'] = SlugService::createSlug(UpcomingEvent::class, 'slug', $formInput['title']);
        $formInput['publish'] = is_null($request->publish) ? 0 : 1;

        if ($request->hasFile('banner_image')) {
            $formInput['banner_image'] = $this->imageProcessing($request->banner_image, 750, 562, 'yes');
        }

        $this->model->create($formInput);
        return redirect()->route('upcomingevent.index')->with('message', 'Event Created Successfuly.');
    }

    public function edit($id)
    {
        // return abort(404);
        $detail = $this->model->findOrFail($id);

        $allGuests = $this->guest->where('publish', 1)->get();
        $allSeries = $this->series->where('publish', 1)->get();
        return view('admin.upcoming-event.edit', compact('detail', 'allGuests'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'guest_id' => 'required|integer',
            'title' => 'required|max:500',
            'date' => 'required',
            'time' => 'required',
            'banner_image' => 'mimes:jpg,jpeg,png,gif|max:2048',
            'descriptions' => 'max:10000',
        ]);

        $oldRecord = $this->model->findOrFail($id);

        $formInput = $request->except(['slug', 'publish', 'banner_image']);
        $formInput['slug'] = SlugService::createSlug(UpcomingEvent::class, 'slug', $formInput['title']);
        $formInput['publish'] = is_null($request->publish) ? 0 : 1;

        if ($request->hasFile('banner_image')) {
            if ($oldRecord->banner_image) {
                $this->unlinkImage($oldRecord->banner_image);
            }
            $formInput['banner_image'] = $this->imageProcessing($request->banner_image, 750, 562, 'yes');
        }
        $this->model->update($formInput, $id);
        return redirect()->route('upcomingevent.index')->with('message', 'Upcoming Event Edited Successfuly.');
    }

    public function destroy($id)
    {
        $record = $this->model->findOrFail($id);
        if ($record->banner_image) {
            $this->unlinkImage($record->banner_image);
        }
        $this->model->destroy($id);
        return redirect()->route('upcomingevent.index')->with('message', 'Upcoming Event Deleted Successfuly.');
    }

    public function imageProcessing($image, $width, $height, $otherpath)
    {

        $input['imagename'] = Date("D-h-i-s") . '-' . rand() . '-' . '.' . $image->getClientOriginalExtension();
        $thumbPath = public_path('images/upcoming');

        $img1 = Image::make($image->getRealPath());
        
        $img1->fit(200, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($thumbPath . '/' . $input['imagename']);
        $img1->destroy();

        return $input['imagename'];
    }

    public function unlinkImage($imagename)
    {
        $thumbPath = public_path('images/upcoming/') . $imagename;
        if (file_exists($thumbPath)) {
            unlink($thumbPath);
        }
        return;
    }
}
