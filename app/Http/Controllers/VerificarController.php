<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Inspecciones;

class VerificarController extends Controller
{
    public function home()
    {


        if (session()->has('message')) {
            session()->keep('message');
        }

        $role_type = Auth::user()->role_id;
        if ($role_type === 1) {
            $role = 'Admin';
        } else if ($role_type === 2) {
            $role = 'Empresa';
        } else {
            $role = 'Técnico';
        }

        $inspecciones = Inspecciones::where('status_id', '=', '5')
            ->with('parque')
            ->with('subestacion')
            ->with('tecnico')
            ->get();

        return view(
            'admin.admin',
            [   
                'data' => $inspecciones,
                'section' => 'verificar',
                'section_cute' => 'verificar',
                'role' => $role,
                'role_type' => $role_type,
            ]
        );
    }
}
