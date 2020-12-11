<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Guest\GuestRepository;
use Image;
use App\Models\Guest;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class GuestController extends Controller
{
    protected $model = null;

    public function __construct(GuestRepository $model)
    {
        $this->model = $model;
        $this->guest =  $model;
    }

    public function index()
    {
        $details = $this->model->latest()->get();
        return view('admin.guest.list', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return abort(404);
        return view('admin.guest.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'photo' => 'mimes:jpg,jpeg,png,gif|max:2048',
            'description' => 'max:2500',
            'organization' => 'max:199'
        ]);

        $formInput = $request->except(['photo']);
        $formInput['slug'] = SlugService::createSlug(Guest::class, 'slug', $formInput['name']);
        $formInput['publish'] = $request->publish=='on' ? 0 : 1;
        $formInput['user_id'] = auth()->user()->id;

        if ($request->hasFile('photo')) {
            $formInput['photo'] = $this->imageProcessing($request->photo, 750, 562, 'yes');
        }

        $this->model->create($formInput);
        return redirect()->route('guest.index')->with('message', 'Guest Create Successfuly.');
    }

    public function edit($id)
    {
        // return abort(404);
        $detail = $this->model->findOrFail($id);
        return view('admin.guest.edit', compact('detail'));
    }

    public function imageProcessing($image, $width, $height, $otherpath)
    {

        $input['imagename'] = Date("D-h-i-s") . '-' . rand() . '-' . '.' . $image->getClientOriginalExtension();
        $thumbPath = public_path('images/thumbnail');
        $mainPath = public_path('images/main');
        $listingPath = public_path('images/listing');

        $img = Image::make($image->getRealPath());
        $img->fit($width, $height)->save($mainPath . '/' . $input['imagename']);

        if ($otherpath == 'yes') {
            $img1 = Image::make($image->getRealPath());
            $img1->resize($width / 2, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($listingPath . '/' . $input['imagename']);

            $img1->fit(200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($thumbPath . '/' . $input['imagename']);
            $img1->destroy();
        }

        $img->destroy();
        return $input['imagename'];
    }

    public function unlinkImage($imagename)
    {
        $thumbPath = public_path('images/thumbnail/') . $imagename;
        $mainPath = public_path('images/main/') . $imagename;
        $listingPath = public_path('images/listing/') . $imagename;
        if (file_exists($thumbPath)) {
            unlink($thumbPath);
        }

        if (file_exists($mainPath)) {
            unlink($mainPath);
        }

        if (file_exists($listingPath)) {
            unlink($listingPath);
        }

        return;
    }

    public function update(Request $request, $id)
    {
        $old = $this->guest->find($id);
        $formInput = $request->all();

        $formInput['status'] = is_null($request->publish) ? 0 : 1;

        if ($request->hasFile('photo')) {
            if ($old->photo) {
                $this->unlinkImage($old->photo);
            }
            $formInput['photo'] = $this->imageProcessing($request->photo, 675, 450, 'yes');
        }
        $this->guest->update($formInput, $id);
        return redirect()->route('guest.index')->with('message', 'Guest updated successfully.');
    }

    public function delete($id)
    {
        $detail = $this->model->findOrFail($id);
        if ($detail->photo) {
            $this->unlinkImage($detail->photo);
        }
        $this->guest->destroy($id);
        return redirect()->back()->with('message', 'Guest Deleted Successfully');
    }
}
