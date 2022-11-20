<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function listuser(){
        $users = User::paginate(8);
        return view('back.menu.users.index', compact("users"));
    }
}
