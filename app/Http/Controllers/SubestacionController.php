<?php

namespace App\Http\Controllers;

use App\Models\Enterprise;
use App\Models\Subestacion;
use App\Models\Parque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SubestacionController extends Controller
{
    public function home()
    {
        $subestaciones = Subestacion::where('status_id', '!=', '1')->orderBy('id', 'asc')->orderBy('parque_id', 'asc')->orderBy('enterprise_id', 'asc')->orderBy('subestacion','asc')->orderBy('type_id', 'asc')->paginate(10);
        $parques = Parque::where('status_id', '!=', '1')->get();
        $enterprises = Enterprise::where('status_id', '!=', '1')->get();
        if (session()->has('message')) {
            session()->keep('message');
        }

        $role_type = Auth::user()->role_id; 
        if($role_type=== 1){
            $role = 'Admin';
        }
        else if($role_type === 2){
            $role = 'Empresa';
        }
        else{
            $role = 'Técnico';
        }
        return view('admin.admin', ['subestaciones' => $subestaciones, 'section' => 'subestaciones', 'section_cute' => 'Subestaciones', 'role' => $role, 'parques' => $parques, 'enterprises' => $enterprises]);
    }
    public function store(Request $request){
        if (!$request->isMethod('post')) {
            return dd('error');
        }
        // dd($request->subestacion);

        $already_exists = Subestacion::where('subestacion','=', $request->subestacion)->where('enterprise_id','=', $request->enterprise_id)->where('parque_id','=', $request->parque_id)->where('type_id','=', $request->type_id)->first();

        $exists = 'required|max:255';
        $already_exists = $already_exists === null ? '' : '|unique:subestaciones,subestacion';
        $name_str = $exists.$already_exists;

        $validated = Validator::make($request->except('id'), [
            'subestacion' => $name_str,
            'enterprise_id' => 'required',
            'parque_id' => 'required',
            'type_id' => 'required|between:1,2',
        ],[
            'subestacion.required' => 'Este campo es requerido',
            'subestacion.max' => 'Este campo no deber tener más de 255 caracteres',
            'enterprise_id.required' => 'Este campo es requerido',
            'parque_id.required' => 'Este campo es requerido',
            'type_id.required' => 'Este campo es requerido',
            'type_id.between' => 'El campo tipo debe ser pedestal o compacto',
        ]);

        if ($validated->fails()) {
            return response()->json(['response' => false, 'errors' => $validated->errors()]);
        }

        $subestacion = new Subestacion;
        $subestacion->subestacion = $request->subestacion;
        $subestacion->enterprise_id = $request->enterprise_id;
        $subestacion->parque_id = $request->parque_id;
        $subestacion->type_id = $request->type_id;
        $subestacion->status_id = 2;
        

        return response()->json(['response' => $subestacion->save()]);

    }  

    public function update(Request $request,$id){
        if (!$request->isMethod('post')) {
            return dd('error');
        }
        // dd($request->subestacion);

        $already_exists = Subestacion::where('subestacion','=', $request->subestacion)->where('enterprise_id','=', $request->enterprise_id)->where('parque_id','=', $request->parque_id)->where('type_id','=', $request->type_id)->where('id','!=', $request->id)->first();
!
        $exists = 'required|max:255';
        $already_exists = $already_exists === null ? '' : '|unique:subestaciones,subestacion';
        $name_str = $exists.$already_exists;

        $validated = Validator::make($request->except('id'), [
            'subestacion' => $name_str,
            'enterprise_id' => 'required',
            'parque_id' => 'required',
            'type_id' => 'required|between:1,2',
        ],[
            'subestacion.required' => 'Este campo es requerido',
            'subestacion.max' => 'Este campo no deber tener más de 255 caracteres',
            'enterprise_id.required' => 'Este campo es requerido',
            'parque_id.required' => 'Este campo es requerido',
            'type_id.required' => 'Este campo es requerido',
            'type_id.between' => 'El campo tipo debe ser pedestal o compacto',
        ]);

        if ($validated->fails()) {
            return response()->json(['response' => false, 'errors' => $validated->errors()]);
        }

        
        Subestacion::where('id', $id)->update($request->except('id'));
        return response()->json(['response' => true], 200); //BOLLEAN
    }

    public function delete($id)
    {
        $response = Subestacion::where('id', $id)->update(['status_id' => 1]);
        return response()->json(['response' =>  $response], 200);
    }
}