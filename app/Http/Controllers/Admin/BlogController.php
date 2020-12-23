<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Repositories\Blog\BlogRepository;
use Illuminate\Support\Str;
use Image;

class BlogController extends Controller
{
    protected $model = null;

    public function __construct(BlogRepository $model)
    {
        $this->model = $model;
        $this->blog = $model;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = $this->model->latest()->get();
        return view('admin.blog.list', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
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
            'title' => 'required',
            'short_description' => 'max:15000',
            'description' => 'required|max:15000',
            'image' => 'mimes:jpg,jpeg,png,gif|max:3048',
        ]);

        $formInput = $request->except(['image', 'publish', 'slug']);
        $formInput['slug'] = $this->generateSlug($request->title, $request->slug, null);
        $formInput['publish'] = is_null($request->publish) ? 0 : 1;
        if ($request->hasFile('image')) {
            $formInput['image'] = $this->imageProcessing($request->image, 750, 562, 'yes');
        }
        Blog::create($formInput);
        return redirect()->route('blogs.index')->with('message', 'Blog Create Successfuly.');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detail = $this->model->findOrFail($id);
        return view('admin.blog.edit', compact('detail'));
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
            'title' => 'required',
            'short_description' => 'max:15000',
            'description' => 'required|max:15000',
            'image' => 'mimes:jpg,jpeg,png,gif|max:3048',
        ]);

        $oldRecord = Blog::findorfail($id);

        $formInput = $request->except(['slug', 'publish', 'image']);
        $formInput['slug'] = $this->generateSlug($request->title, $request->slug, $oldRecord);
        $formInput['publish'] = is_null($request->publish) ? 0 : 1;
        if ($request->hasFile('image')) {
            if ($oldRecord->image) {
                $this->unlinkImage($oldRecord->image);
            }
            $formInput['image'] = $this->imageProcessing($request->image, 750, 562, 'yes');
        }
        $oldRecord->update($formInput);
        return redirect()->route('blogs.index')->with('message', 'Blog Edited Successfuly.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Blog::findorfail($id);
        if ($record->image) {
            $this->unlinkImage($record->image);
        }
        $record->delete();
        return redirect()->route('blogs.index')->with('message', 'Blog Deleted Successfuly.');
    }

    public function imageProcessing($image, $width, $height, $otherpath)
    {

        $input['imagename'] = Date("D-h-i-s") . '-' . rand() . '-' . '.' . $image->getClientOriginalExtension();
        $thumbPath = public_path('images/banners');

        $img1 = Image::make($image->getRealPath());
        
        $img1->fit(1140, 474, function ($constraint) {
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

    public function generateSlug($title, $slug, $oldRecord)
    {
        if (is_null($slug)) {
            $slugReturn = Str::slug($title);
        } else {
            $slugReturn = Str::slug($slug);
        }

        $count = Blog::where('slug', $slugReturn)->count();

        if (!is_null($oldRecord)) {
            if ($oldRecord->slug == $slugReturn) {
                return $slugReturn;
            } else {
                if ($count > 0) {
                    return $slugReturn . '-' . $count;
                } else {
                    return $slugReturn;
                }
            }
        } else {
            if ($count > 0) {
                return $slugReturn . '-' . $count;
            } else {
                return $slugReturn;
            }
        }
    }
}
