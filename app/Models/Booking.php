<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';
    protected $fillable = ['name', 'event_id', 'email', 'phone', 'address', 'message', 'publish'];

    public function event(){
        return $this->belongsTo('App\Models\Event');
    }
}
