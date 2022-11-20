<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function docVehicule(){
        return view('back.menu.gestion.doc-vehicule');
    }

    public function pays()
    {
        return view('back.menu.params.pays');
    }

    public function ville()
    {
        return view('back.menu.params.ville');
    }

    public function quartier()
    {
        return view('back.menu.params.quartier');
    }

    public function cat_permis()
    {
        return view('back.menu.params.catpermis');
    }

    public function gestion()
    {
        return view('back.menu.gestion.gestion');
    }

    public function vehicule()
    {
        return view('back.menu.gestion.vehicule');
    }

    public function tv()
    {
        return view('back.menu.gestion.tv');
    }

    public function te()
    {
        return view('back.menu.gestion.te');
    }

    public function bv()
    {
        return view('back.menu.gestion.bv');
    }

    public function cotable()
    {
        return view('back.menu.params.cotable');
    }
}
