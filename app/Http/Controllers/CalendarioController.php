<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Parque;
use App\Models\Enterprise;
use App\Models\Inspecciones;

class CalendarioController extends Controller
{

    private $meses = [
        1 => ['Enero', 'info'],
        2 => ['Febrero', 'success'],
        3 => ['Marzo', 'info'],
        4 => ['Abril', 'success'],
        5 => ['Mayo', 'info'],
        6 => ['Junio', 'success'],
        7 => ['Julio', 'info'],
        8 => ['Agosto', 'success'],
        9 => ['Septiembre', 'info'],
        10 => ['Octubre', 'success'],
        11 => ['Noviembre', 'info'],
        12 => ['Diciembre', 'success']
    ];


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

        return view(
            'admin.admin',
            [
                'meses' => $this->meses,
                'section' => 'calendario',
                'section_cute' => 'Calendario',
                'role' => $role,
                'role_type' => $role_type,
            ]
        );
    }

    public function c_parques()
    {
        $parques = Parque::where('status_id', '!=', '1')->get();
        return response()->json($parques);
    }

    public function c_empresas(Request $request)
    {
        $empresas = Enterprise::where('status_id', '!=', '1')->where('parque_id', '=', $request->id)->get();
        return response()->json($empresas);
    }

    public function c_inpecciones(Request $request)
    {
        $inspecciones = Inspecciones::where('status_id', '=', '5')
            ->where('enterprise_id', '=', $request->id)
            ->whereMonth('fecha_fin', '=', $request->mes)
            ->whereYear('fecha_fin', '=', $request->year)
            ->with('parque')
            ->with('subestacion')
            ->with('tecnico')
            ->with('admin')
            ->get();

        // dd($inspecciones[0]->parque);

        // dd($inspecciones[0]->subestacion);

        return response()->json($inspecciones);
    }
}
