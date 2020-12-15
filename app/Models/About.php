<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $table = 'abouts';
    protected $fillable = ['title', 'about_logo', 'highlight_text', 'first_paragraph', 'second_paragraph', 'description', 'image', 'publish'];
}
