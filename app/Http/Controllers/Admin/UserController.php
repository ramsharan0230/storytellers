<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\User\UserRepository;

class UserController extends Controller
{
    private $model = null;

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
        $this->model = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = $this->user->latest()->get();
        return view('admin.user.list', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'unique:users|email',
            'password' => 'required|confirmed|min:7',
            'image' => 'mimes: jpg,jpeg,png,gif|max:3048',
        ];

        $message = ['access.required' => "please select atleast one role",];
        $this->validate($request, $rules, $message);

        $formInput = $request->except('publish', 'password_confirmation', 'image');

        $formInput['publish'] = is_null($request->publish) ? 0 : 1;
        $formInput['password'] = bcrypt($request->password);

        if ($request->hasFile('image')) {
            // [$width, $height] = getimagesize($request->file('logo')->getRealPath());
            $formInput['image'] = $this->imageProcessing($request->image, 675, 450, 'yes');
        }

        $this->user->create($formInput);
        return redirect()->route('user.index')->with('message', 'User added successfully.');
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
        $detail = $this->user->find($id);
        return view('admin.user.edit', compact('detail'));
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
        $old = $this->user->find($id);

        $sameEmailVal = $old->email == $request->email ? true : false;

        $formInput = $request->except('publish', 'image', 'password', 'password_confirmation');

        $formInput['publish'] = is_null($request->publish) ? 0 : 1;

        if ($request->password) {
            $formInput['password'] = bcrypt($request->password);
        }

        if ($request->hasFile('image')) {
            if ($old->image) {
                $this->unlinkImage($old->image);
            }
            $formInput['image'] = $this->imageProcessing($request->image, 675, 450, 'yes');
        }

        $this->user->update($formInput, $id);
        return redirect()->route('user.index')->with('message', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->user->destroy($id);
        return redirect()->back()->with('message', 'User Deleted Successfully');
    }
    public function rules($oldId = null, $sameEmailVal = false)
    {
        $rules =  [
            'email' => 'unique:users|email',
            'image' => 'mimes:jpg,png,jpeg,gif|max:3048',
        ];
        if ($sameEmailVal) {
            $rules['email'] = 'unique:users,email,' . $oldId . '|max:255';
        }
        return $rules;
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
}
