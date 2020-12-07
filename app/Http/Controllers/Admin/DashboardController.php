<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepository;
use App\Repositories\Event\EventRepository;
use App\Repositories\Guest\GuestRepository;
use App\Repositories\Series\SeriesRepository;
use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function __construct(UserRepository $user, EventRepository $event, GuestRepository $guest, SeriesRepository $series)
    {
        $this->user = $user;
        $this->event = $event;
        $this->guest = $guest;
        $this->series = $series;
    }

    public function index()
    {
        $total_users = $this->user->all()->count(); 
        $total_events = $this->event->all()->count(); 
        $total_guests = $this->guest->all()->count(); 
        $total_series = $this->series->all()->count();
        $dashboard_allevents = DB::table('events')->orderBy('created_at', 'DESC')->limit(5)->get();
        $dashboard_allguests = DB::table('guests')->orderBy('created_at', 'DESC')->limit(5)->get();
        $dashboard_allusers = DB::table('users')->orderBy('created_at', 'DESC')->limit(5)->get();

        return view('admin.dashboard', compact('total_users', 'total_events', 'total_guests', 'total_series', 'dashboard_allevents', 'dashboard_allguests', 'dashboard_allusers'));
    }

    public function update(Request $request, $id)
    {
        // $record = Dashboard::findOrFail($id);

        // $request->validate($this->rules(), $this->messages());
        // $formInput = $request->except(['logo']);

        // if ($request->hasFile('logo')) {
        //     if ($record->logo) {
        //         $this->unlinkImage($record->logo);
        //     }
        //     list($width, $height) = getimagesize($request->file('logo')->getRealPath());
        //     $formInput['logo'] = $this->imageProcessing($request->file('logo'), $width, $height, 'no');
        // }
        // $record->update($formInput);
        // return redirect()->route('dashboard')->with('message', 'Dashboard Update Successfully');
    }

    public function rules()
    {
        $rules = [
            'site_name' => 'required',
            'logo' => 'mimes:jpg,jpeg,png,gif|max:3048',
            // 'contactus_image' => 'dimensions:max_width=2000,max_height=2000|mimes:jpg,jpeg,png,gif|max:3048',
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            // 'contactus_image.dimensions' => 'Upto 2000 * 2000 size is allowed',

        ];
    }

    public function imageProcessing($image, $width, $height, $otherpath)
    {

        $input['imagename'] = Date("D-h-i-s") . '-' . rand() . '-' . '.' . $image->getClientOriginalExtension();
        $thumbPath = public_path('images/thumbnail');
        $mainPath = public_path('images/main');
        $listingPath = public_path('images/listing');

        $img = Image::make($image->getRealPath());
        $img->fit($width, $height)->save($mainPath . '/' . $input['imagename']);

        // with no fit
        // $img->save($mainPath . '/' . $input['imagename']);

        if ($otherpath == 'yes') {
            $img->fit($width / 2, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($listingPath . '/' . $input['imagename']);

            $img->fit(200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($thumbPath . '/' . $input['imagename']);
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

    public function weekly_report()
    {
        $weekly_clients_total = [];
        $clients = 0;
        $week_days = $this->dates_of_week();
        foreach ($week_days['date'] as $date) {
            //weekly sales
            $clients = $this->user->latest__publish()->where('role', 'customer')->whereDate('created_at', $date)->get()->count();
            array_push($weekly_clients_total, $clients);

            $weeklyClients = $this->user->latest__publish()->where('role', 'customer')->whereDate('created_at', $date)->get()->count();
            $clients += $weeklyClients;
        }
        return [
            'week_days' => $week_days,
            'clients' => $clients,
            'weekly_clients_total' => $weekly_clients_total,
        ];
    }

    public function dates_of_week()
    {
        $date = Carbon\Carbon::today();
        $num = date('N');
        // parse about any English textual datetime description into a Unix timestamp
        $ts = strtotime($date);
        // find the year (ISO-8601 year number) and the current week
        $year = date('o', $ts);
        $week = date('W', $ts);
        // print week for the current date
        $day_name = [];
        $day_date = [];
        for ($i = 0; $i <= $num; $i++) {
            // timestamp from ISO week date format
            $ts = strtotime($year . 'W' . $week . $i);
            $day = date("l", $ts);
            $daydate = date("Y-m-d ", $ts);
            array_push($day_name, $day);
            array_push($day_date, $daydate);
        }
        return $data = ['day' => $day_name, 'date' => $day_date];
    }
}
