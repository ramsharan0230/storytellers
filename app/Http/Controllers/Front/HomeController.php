<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }
    public function aboutus(){
        return view('about-us');
    }

    public function contact(){
        return view('contact');
    }
}
