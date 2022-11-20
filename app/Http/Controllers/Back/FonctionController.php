<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Pdf;
use App\Models\{User};

class FonctionController extends Controller
{
    public function societe()
    {
        return view('back.menu.fonction.societe');
    }

    public function gerant()
    {
        return view('back.menu.fonction.gerant');
    }

    public function client()
    {
        return view('back.menu.fonction.client');
    }

    public function clientAdmin()
    {
        return view('back.menu.fonction.clientadmin');
    }

    public function chauffeur()
    {
        return view('back.menu.fonction.chauffeur');
    }


    public function fournisseur()
    {
        return view('back.menu.fonction.fournisseur');
    }

    
}
