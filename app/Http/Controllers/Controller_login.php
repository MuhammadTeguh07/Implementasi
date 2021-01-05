<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Controller_login extends Controller
{
    public function index()
    {
        return view('/login/login');
    }
    
}
