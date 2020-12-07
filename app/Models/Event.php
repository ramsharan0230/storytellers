<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Event extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'events';
    protected $fillable = ['guest_id', 'title', 'datetime', 'video_link', 'highlight_text', 'status', 'banner_image', 'descriptions', 'user_id'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function series(){
        return $this->hasMany('App\Models\Series');
    }
}
