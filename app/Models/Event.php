<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Event extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'events';
    protected $fillable = ['guest_id', 'series_id', 'title', 'date', 'time', 'first_patagraph', 'second_patagraph', 'video_link', 'highlight_text', 'publish', 'banner_image', 'descriptions', 'user_id'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function youtubeVideo($url){
    	$url_string = parse_url($url, PHP_URL_QUERY);
  		parse_str($url_string, $args);
  		return isset($args['v']) ? $args['v'] : false;
    }

    public function series(){
        return $this->belongsTo('App\Models\Series');
    }

    public function guest(){
        return $this->belongsTo('App\Models\Guest');
    }

    public function bookings(){
        return $this->hasMany('App\Models\Booking');
    }

    public function eventgalleries(){
        return $this->hasMany('App\Models\EventGallery');
    }
}
