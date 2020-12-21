<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Contact;
use Image;

class PagesController extends Controller
{
    public function about(){
        $data = About::first();
        return view('admin.pages.about.about', compact('data'));
    }
    public function createAbout(){
        return view('admin.pages.about.create');
    }

    public function storeAbout(Request $request){
        $request->validate([
            'title' => 'required|max:200',
            'about_logo' => 'mimes:jpg,jpeg,png,gif|max:2048',
            'highlight_text' => 'required|max:300',
            'first_paragraph' => 'required|max:1000',
            'second_paragraph' => 'max:1000',
            'description' => 'max:5000',
            'image' => 'mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $formInput = $request->except(['published', 'image']);
        $formInput['publish'] = is_null($request->published) ? 0 : 1;

        if ($request->hasFile('image')) {
            $formInput['image'] = $this->aboutFeatureImageProcessing($request->image, 750, 562, 'yes');
        }
        if ($request->hasFile('about_logo')) {
            $formInput['about_logo'] = $this->aboutLogoImageProcessing($request->about_logo, 750, 562, 'yes');
        }
        
        About::create($formInput);
        return redirect()->route('pages.about')->with('message', 'About Created Successfuly.');
    }

    public function editAbout($id){
        $about = About::findOrFail($id)->first();
        return view('admin.pages.about.edit', compact('about'));
    }

    public function updateAbout(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:200',
            'about_logo' => 'mimes:jpg,jpeg,png,gif|max:2048',
            'highlight_text' => 'required|max:300',
            'first_paragraph' => 'required|max:1000',
            'second_paragraph' => 'max:1000',
            'description' => 'max:5000',
            'image' => 'mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $formInput = $request->except(['publish']);
        $formInput['publish'] = $request->publish=='on' ? 1 : 0;
        $oldRecord = About::find($id)->findOrFail($id)->first();
        
        if ($request->hasFile('image')) {
            if ($oldRecord->image) {
                $this->unlinkImage($oldRecord->image);
            }
            $formInput['image'] = $this->aboutFeatureImageProcessing($request->image, 750, 562, 'yes');
        }
        if ($request->hasFile('about_logo')) {
            if ($oldRecord->about_logo) {
                $this->unlinkImage($oldRecord->about_logo);
            }
            $formInput['about_logo'] = $this->aboutLogoImageProcessing($request->about_logo, 750, 562, 'yes');
        }

        About::find($id)->update($formInput);
        return redirect()->route('pages.about')->with('message', 'About page updated Successfuly.');
    }

    public function contact(){
        $data = Contact::first();
        return view('admin.pages.contact.contact', compact('data'));
    }

    public function createContact(){
        if(Contact::count()>0){
            return redirect()->route('pages.contact');
        }
        return view('admin.pages.contact.create');
    }

    public function storeContact(Request $request){
        $request->validate([
            'address' => 'required|max:500',
            'telephone' => 'required|max:20',
            'email' => 'required|email|max:50',
            'description' => 'max:5000'
        ]);

        $formInput = $request->except(['published']);
        $formInput['publish'] = $request->published=='on' ? 1 : 0;
        
        Contact::create($formInput);
        return redirect()->route('pages.contact')->with('message', 'Contact Created Successfuly.');
    }

    public function editContact($id){
        $contact = Contact::findOrFail($id)->first();
        return view('admin.pages.contact.edit', compact('contact'));
    }

    public function updateContact(Request $request, $id){
        $request->validate([
            'address' => 'required|max:500',
            'telephone' => 'required|max:20',
            'email' => 'required|email|max:50',
            'description' => 'max:5000'
        ]);

        $formInput = $request->except(['published']);
        $formInput['publish'] = $request->publish=='on' ? 1 : 0;
        
        Contact::find($id)->update($formInput);
        return redirect()->route('pages.contact')->with('message', 'Contact page updated Successfuly.');
    }

    public function team(){
        return view('admin.pages.team');
    }

    public function aboutFeatureImageProcessing($image, $width, $height, $otherpath)
    {
        $input['imagename'] = Date("D-h-i-s") . '-' . rand() . '-' . '.' . $image->getClientOriginalExtension();
        $thumbPath = public_path('images/about');

        $img1 = Image::make($image->getRealPath());
        
        $img1->fit(505, 278, function ($constraint) {
            $constraint->aspectRatio();
        })->save($thumbPath . '/' . $input['imagename']);
        $img1->destroy();

        return $input['imagename'];
    }

    public function aboutLogoImageProcessing($image, $width, $height, $otherpath)
    {
        $input['imagename'] = Date("D-h-i-s") . '-' . rand() . '-' . '.' . $image->getClientOriginalExtension();
        $thumbPath = public_path('images/about');

        $img1 = Image::make($image->getRealPath());
        
        $img1->fit(788, 154, function ($constraint) {
            $constraint->aspectRatio();
        })->save($thumbPath . '/' . $input['imagename']);
        $img1->destroy();

        return $input['imagename'];
    }

    public function unlinkImage($imagename)
    {
        $thumbPath = public_path('images/about/') . $imagename;
        if (file_exists($thumbPath)) {
            unlink($thumbPath);
        }
        return;
    }
}
