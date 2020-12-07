<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;
    protected $table = 'series';
    protected $fillable = ['name', 'event_id'];

    public function event(){
        return $this->belongsTo('App\Models\Event');
    }
}
