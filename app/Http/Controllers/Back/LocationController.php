<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function tarification () 
    {
        return view('back.menu.location.tarification');
    }

    public function location()
    {
        return view('back.menu.location.location');
    }

    public function reservation()
    {
        return view('back.menu.location.reservation');
    }

    public function validation()
    {
        return view('back.menu.location.validation');
    }

}
