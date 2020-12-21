<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';
    protected $fillable = ['name', 'upcoming_event_id', 'email', 'phone', 'address', 'message', 'publish'];

    public function upcomingEvent(){
        return $this->belongsTo('App\Models\UpcomingEvent');
    }
}
