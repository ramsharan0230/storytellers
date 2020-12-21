<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class UpcomingEvent extends Model
{
    use Sluggable, HasFactory;

    protected $table = 'upcoming_events';
    protected $fillable = ['title', 'guest_id', 'date', 'time', 'banner_image', 'slug', 'publish', 'descriptions'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function guest(){
        return $this->belongsTo('App\Models\Guest');
    }

    public function bookings(){
        return $this->hasMany('App\Models\Booking', 'upcoming_event_id', 'id');
    }
}
