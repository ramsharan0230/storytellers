<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Repositories\Booking\BookingRepository;

class FrontController extends Controller
{
    protected $model = null;

    public function __construct(BookingRepository $model)
    {
        $this->model = $model;
    }

    public function bookings(Request $request){
        $request->validate([
            'event_id' => 'required|integer',
            'name' => 'required|max:199',
            'email' => 'email|required',
            'phone' => 'required|max:15',
            'company' => 'max:2500',
            'address' => 'required|max:250',
            'message' => 'required|max:2500',
        ]);

        $formInput = $request->all();
        $this->model->create($formInput);
        return redirect()->route('bookings')->with('message', 'Booking Created Successfuly.');
    }
}
