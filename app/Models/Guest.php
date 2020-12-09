<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Guest extends Model
{
    use Sluggable, HasFactory;
    protected $table = 'guests';
    protected $fillable = ['name', 'photo', 'designation', 'organization', 'description', 'slug', 'user_id', 'status'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function events()
    {
        return $this->hasMany('App\Models\Event');
    }
}
