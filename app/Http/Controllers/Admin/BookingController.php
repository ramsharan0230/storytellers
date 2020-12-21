<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\UpcomingEvent\UpcomingEventRepository;
use App\Repositories\Booking\BookingRepository;
use App\Models\Booking;

class BookingController extends Controller
{
    public function __construct(UpcomingEventRepository $upcomingEvent, BookingRepository $model)
    {
        $this->model = $model;
        $this->upcomingEvent = $upcomingEvent;
    }

    public function index()
    {
        $details = $this->model->latest()->get();
        return view('admin.booking.list', compact('details'));
    }

    public function edit($id)
    {
        $detail = $this->model->findOrFail($id);
        return view('admin.booking.edit', compact('detail'));
    }
    public function update(Request $request, $id)
    {
        $book = is_null($request->isBooked)?0:1;
        Booking::where('id', $id)->update(array('isBooked' => $book));
        return redirect()->route('bookings.index')->with('message', 'Booking updated successfully');
    }

    public function conform(Request $request, $id){
        $booking = Booking::where('id', $request->id)->first();
        Booking::where('id', $booking->id)->update(array('isBooked' => 1));
        $message = "Event has been updated to Conformed";
        
        return redirect()->route('bookings.index')->with('message', 'Booking has been conformed successfully');
    }

    public function deny(Request $request, $id){
        $booking = Booking::where('id', $request->id)->first();
        Booking::where('id', $booking->id)->update(array('isBooked' => 0));
        $message = "Event has been updated to denied";
        
        return redirect()->route('bookings.index')->with('message', 'Booking has been denied successfully');
    }
}
