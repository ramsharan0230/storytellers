<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    protected $table = 'dashboards';
    protected $fillable = ['site_name', 'logo', 'page_title', 'meta_title', 'meta_description', 'keyword', 'address',
        'mobile', 'email', 'telephone', 'redirect_to', 'facebook', 'twitter', 'instagram', 'whatsapp', 'youtube', 'linkedin', 'pinterest',
        'footer_logo', 'storyteller_logo'
    ];
}
