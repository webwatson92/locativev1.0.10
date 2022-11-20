<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EntretienController extends Controller
{
    public function transitpiece()
    {
        return view('back.menu.entretien.transit-piece');
    }

    public function typepiece()
    {
        return view('back.menu.entretien.type-piece');
    }

    public function piece()
    {
        return view('back.menu.entretien.piece');
    }

    public function typefourniture()
    {
        return view('back.menu.entretien.tf');
    }

    public function transitfourniture()
    {
        return view('back.menu.entretien.transit-fourniture');
    }

    public function fourniture()
    {
        return view('back.menu.entretien.fourniture');
    }

    public function transitservice()
    {
        return view('back.menu.entretien.transit-service');
    }

    public function typeservice()
    {
        return view('back.menu.entretien.ts');
    }

    public function service()
    {
        return view('back.menu.entretien.service');
    }

    public function transitentretien()
    {
        return view('back.menu.entretien.transit-entretien');
    }

    public function typeentretien()
    {
        return view('back.menu.entretien.ten');
    }

    public function entretien()
    {
        return view('back.menu.entretien.entretien');
    }
}
