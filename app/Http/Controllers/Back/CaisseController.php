<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CaisseController extends Controller
{
    public function caisse()
    {
        return view('back.menu.caisse.caisse');
    }

    public function tm()
    {
        return view('back.menu.caisse.type-mouvement');
    }
}
