<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Controller_home extends Controller
{
    public function index()
    {
        return view('/layout/body');
    }

}
