<?php

namespace App\Http\Controllers;

use App\Models\Inspecciones;
use App\Models\Parque;
use App\Models\Enterprise;
use App\Models\Subestacion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class InspeccionesController extends Controller
{
    public function home()
    {
        $inspecciones = Inspecciones::paginate(10);
        $parques = Parque::where('status_id', '!=', '1')->get();
        $enterprises = Enterprise::where('status_id', '!=', '1')->groupBy('enterprise')->get();
        $subestaciones = Subestacion::where('status_id', '!=', '1')->get();
        $tecnicos = User::where('status_id', '!=', '1')->where('role_id', '3')->get();

        if (session()->has('message')) {
            session()->keep('message');
        }

        $role_type = Auth::user()->role_id;
        $id_user = Auth::user()->id;
        if ($role_type === 1) {
            $role = 'Admin';
        } else if ($role_type === 2) {
            $role = 'Empresa';
        } else {
            $role = 'Técnico';
        }
        return view('admin.admin', [
            'inspecciones' => $inspecciones, 
            'parques' => $parques, 
            'enterprises' => $enterprises, 
            'subestaciones' => $subestaciones, 
            'tecnicos' => $tecnicos, 
            'section' => 'inspecciones', 
            'section_cute' => 'Inspecciones', 
            'role' => $role, 
            'id_user' => $id_user
        ],);
    }
    
    // obtiene parques por empresa
    public function getParques(Request $request)
    {
        if (!$request->isMethod('post')) {
            return dd('error');
        }

        $enterprise = Enterprise::join('parques', 'parques.id', '=', 'enterprises.parque_id')
            ->select('enterprises.id as enterprise_id', 'parques.id as parque_id', 'enterprises.*', 'parques.*')
            ->where('enterprise', $request->enterprise)->get();


        return response()->json(['response' => $enterprise], 200);
    }

    // obtiene subestaciones por parque y empresa
    public function getSubestaciones(Request $request)
    {
        if (!$request->isMethod('post')) {
            return dd('error');
        }
        
        $subestaciones = Subestacion::where('parque_id', $request->parque_id)->where('enterprise_id', $request->enterprise_id)->get();

        return response()->json(['response' => $subestaciones], 200);
    }

    // crea inspeccion
    public function store(Request $request)
    {
        if (!$request->isMethod('post')) {
            return dd('error');
        }
        // dd($request->subestacion);

        $validated = Validator::make($request->except('id'), [
            'enterprise_id' => 'required',
            'parque_id' => 'required',
            'subestacion_id' => 'required',
            'tecnico_responsable' => 'required',
            'fecha_inicio' => 'required',
            'asignado_por' => 'required',
        ], [
            'subestacion_id.required' => 'Este campo es requerido',
            'enterprise_id.required' => 'Este campo es requerido',
            'parque_id.required' => 'Este campo es requerido',
            'tecnico_responsable.required' => 'Este campo es requerido',
            'fecha_inicio.required' => 'Este campo es requerido',
            'asignado_por.required' => 'Este campo es requerido',
        ]);

        if ($validated->fails()) {
            return response()->json(['response' => false, 'errors' => $validated->errors()]);
        }

        $inspeccion = new Inspecciones;
        $inspeccion->subestacion_id = $request->subestacion_id;
        $inspeccion->enterprise_id = $request->enterprise_id;
        $inspeccion->parque_id = $request->parque_id;
        $inspeccion->tecnico_responsable = $request->tecnico_responsable;
        $inspeccion->fecha_inicio = $request->fecha_inicio;
        $inspeccion->asignado_por = $request->asignado_por;
        $inspeccion->status_id = 4;

        return response()->json(['response' => $inspeccion->save()]);
    }

    // elimina inspeccion
    public function delete($id)
    {
        $response = Inspecciones::where('id', $id)->update(['status_id' => 1]);
        return response()->json(['response' =>  $response], 200);
    }
}
