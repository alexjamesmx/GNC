<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\Inspecciones;
use App\Models\Enterprise;
use Illuminate\Support\Facades\DB;


class SectionController extends Controller
{
    public function admin()
    {
        $role = 'Admin';
        $role_type = Auth::user()->role_id;
        return view('admin.admin', ['section' => 'dashboard', 'section_cute' => 'Dashboard', 'role' => $role, 'role_type' => $role_type]);
    }

    public function tecnico()
    {
        $data = array('id' => "ejemplo", 'name' => "ejemplo2", 'email' => "ejemplo3");

        $role_type = Auth::user()->role_id;

        $tecnico = auth()->user()->id;

        $inspecciones_activas = Inspecciones::where('inspecciones.tecnico_responsable', $tecnico)->whereIn('inspecciones.status_id', array(4, 6))->get();

        $inspecciones_completas = Inspecciones::where('inspecciones.tecnico_responsable', $tecnico)->where('inspecciones.porcentaje', 100)->where('inspecciones.status_id', 5)->orWhere('inspecciones.status_id', 7)->get();

        // dd($inspecciones_completas);

        return view('tecnico.general.general',
         [
            'section' => 'dashboard',
            'section_cute' => 'Inicio',
            'role' => 'tecnico',
            'role_cute' => 'Técnico',
            'data' => $data,
            'inspecciones_activas' => $inspecciones_activas,
            'inspecciones_completas' => $inspecciones_completas,
            'role_type' => $role_type
        ]);
    }

    public function empresa()
    {
        $role = 'empresa';
        $role_type = Auth::user()->role_id;
        //dd('hola');

        $id_sec = auth()->id();


        $inspecciones = Inspecciones::select('inspecciones.id', 'tecnico_responsable',  'asignado_por', 'subestacion_id', 'fecha_fin')
            ->join('enterprises', 'enterprises.id', '=', 'inspecciones.enterprise_id')
            ->where('inspecciones.status_id', '=', '7')
            ->where('enterprises.user_id', '=', $id_sec)
            ->with('subestacion')
            ->with('tecnico')
            ->with('admin')
            ->get();            

        return view('empresa.general', ['section' => 'dashboard', 'section_cute' => 'Dashboard', 'role' => $role, 'role_cute' => 'Empresa', 'role_type' => $role_type, 'data' => $inspecciones]);
    }

    public function back()
    {
        return redirect()->back();
    }
}
