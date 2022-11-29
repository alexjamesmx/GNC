<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControlController extends Controller
{
    public function error401(){
        return view('errors.401');
    }
}
