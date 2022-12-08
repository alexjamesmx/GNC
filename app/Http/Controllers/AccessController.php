<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccessController extends Controller
{
    public function index()
    {
        //3 - ADMIN
        if (Auth::user()->role_id === 1) {
            return redirect()->route('admin');
        }
        //2 - ENTERPRISE
        elseif (Auth::user()->role_id === 2) {
            return dd('Empresa');
        }
        //3 - TECNICO
        return dd('Tecnico');
    }


    public function message(Request $request)
    {
        session()->flash('message', $request->input('message'));
    }
}
