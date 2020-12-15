<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventGallery extends Model
{
    protected $table = 'event_galleries';
    protected $fillable = ['event_id', 'file_name', 'publish'];

    public function event(){
        return $this->belongsTo('App\Models\Event');
    }
}
