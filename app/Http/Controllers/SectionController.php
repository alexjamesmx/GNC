<?php

namespace App\Http\Controllers;

use App\Models\Inspecciones;

class SectionController extends Controller
{
    public function admin()
    {
        $role = 'Admin';
        return view('admin.admin', ['section' => 'dashboard', 'section_cute' => 'Dashboard', 'role' => $role]);
    }

    public function tecnico()
    {
        $data = array('id' => "ejemplo", 'name' => "ejemplo2", 'email' => "ejemplo3");

        $tecnico = auth()->user()->id;
        $inspecciones_activas = Inspecciones::
            // join('enterprises', 'enterprises.id', '=', 'inspecciones.enterprise_id')
            // ->join('subestaciones', 'subestaciones.id', '=', 'inspecciones.subestacion_id')
            // ->select('inspecciones.id as inspecciones_id', 'inspecciones.*', 'enterprises.id as enterprise_id', 'enterprises.*', 'subestaciones.id as subestacion_id', 'subestaciones.*')
            where('inspecciones.tecnico_responsable', $tecnico)->where('inspecciones.status_id', 4)->get();
        // dd($inspecciones_activas);
        // dd($inspecciones_activas[0]->subestacion);
        return view('tecnico.dashboard', ['section' => 'dashboard', 'section_cute' => 'Dashboard', 'role' => 'tecnico', 'role_cute' => 'Técnico', 'data' => $data, 'inspecciones_activas' => $inspecciones_activas]);
    }
}
