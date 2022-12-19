<?php

namespace App\Http\Controllers;

use App\Models\Inspecciones;
use App\Models\Anomalias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Rep_enterprise;

class TecnicoController extends Controller
{
    public function test($id = '')
    {
        $tecnico = auth()->user()->id;

        $rep_enterprise = Rep_enterprise::where('inspeccion_id', $id)->first();


        return view('tecnico.test', ['section' => 'test', 'subsection' => '', 'section_cute' => 'Test', 'role' => 'tecnico', 'role_cute' => 'Técnico',  'id' => $id, 'rep_enterprise' => $rep_enterprise]);
    }

    public function edificio($id = '')
    {
        $tecnico = auth()->user()->id;
        $inspeccion = Inspecciones::where('id', $id)->first();
        return view('tecnico.inspecciones.edificio', ['section' => 'test', 'subsection' => 'edificio', 'section_cute' => 'Test', 'role' => 'tecnico', 'role_cute' => 'Técnico',  'inspeccion' => $inspeccion]);
    }
    public function edificio_subir(Request $request)
    {
        $validated = Validator::make($request->except('id'), [
            'extintores_no' => 'required|max:255',
            'extintores_tipo_agente' => 'required|max:255',
            'extintores_fecha_vencimiento' => 'required|max:255',
            'extintores_presion' => 'required|max:255',
            'extintores_aro_seguridad' => 'required|max:255',
            'extintores_ubicacion' => 'required|max:255',
            'lamparas_no' => 'required|max:255',
            'lamparas_estado' => 'required|max:255',
            'lamparas_faltante' => 'required|max:255',
            'lamparas_emergencia_no' => 'required|max:255',
            'lamparas_emergencia_estado' => 'required|max:255',
            'lamparas_emergencia_faltante' => 'required|max:255',
            'senalizacion_seguridad' => 'required|max:255',
            'senalizacion_seguridad_estado' => 'required|max:255',
            'senalizacion_seguridad_faltante' => 'required|max:255',
            'senalizacion_observaciones' => 'required|max:255',
            'pintura_estado' => 'required|max:255',
            'pintura_requiere' => 'required|max:255',
            'herreria_estado' => 'required|max:255',
            'herreria_requiere' => 'required|max:255',
            'herreria_observaciones' => 'required|max:255',
            'img1' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'img2' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'img3' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ], [
            'extintores_no.required' => 'Este campo es requerido',
            'extintores_no.max' => 'Este campo no puede tener más de 255 caracteres',

            'extintores_tipo_agente.required' => 'Este campo es requerido',
            'extintores_tipo_agente.max' => 'Este campo no puede tener más de 255 caracteres',

            'extintores_fecha_vencimiento.required' => 'Este campo es requerido',
            'extintores_fecha_vencimiento.max' => 'Este campo no puede tener más de 255 caracteres',

            'extintores_presion.required' => 'Este campo es requerido',
            'extintores_presion.max' => 'Este campo no puede tener más de 255 caracteres',

            'extintores_aro_seguridad.required' => 'Este campo es requerido',
            'extintores_aro_seguridad.max' => 'Este campo no puede tener más de 255 caracteres',

            'extintores_ubicacion.required' => 'Este campo es requerido',
            'extintores_ubicacion.max' => 'Este campo no puede tener más de 255 caracteres',

            'lamparas_no.required' => 'Este campo es requerido',
            'lamparas_no.max' => 'Este campo no puede tener más de 255 caracteres',

            'lamparas_estado.required' => 'Este campo es requerido',
            'lamparas_estado.max' => 'Este campo no puede tener más de 255 caracteres',

            'lamparas_faltante.required' => 'Este campo es requerido',
            'lamparas_faltante.max' => 'Este campo no puede tener más de 255 caracteres',

            'lamparas_emergencia_no.required' => 'Este campo es requerido',
            'lamparas_emergencia_no.max' => 'Este campo no puede tener más de 255 caracteres',

            'lamparas_emergencia_estado.required' => 'Este campo es requerido',
            'lamparas_emergencia_estado.max' => 'Este campo no puede tener más de 255 caracteres',

            'lamparas_emergencia_faltante.required' => 'Este campo es requerido',
            'lamparas_emergencia_faltante.max' => 'Este campo no puede tener más de 255 caracteres',

            'senalizacion_seguridad.required' => 'Este campo es requerido',
            'senalizacion_seguridad.max' => 'Este campo no puede tener más de 255 caracteres',

            'senalizacion_seguridad_estado.required' => 'Este campo es requerido',
            'senalizacion_seguridad_estado.max' => 'Este campo no puede tener más de 255 caracteres',

            'senalizacion_seguridad_faltante.required' => 'Este campo es requerido',
            'senalizacion_seguridad_faltante.max' => 'Este campo no puede tener más de 255 caracteres',

            'senalizacion_observaciones.required' => 'Este campo es requerido',
            'senalizacion_observaciones.max' => 'Este campo no puede tener más de 255 caracteres',

            'pintura_estado.required' => 'Este campo es requerido',
            'pintura_estado.max' => 'Este campo no puede tener más de 255 caracteres',

            'pintura_requiere.required' => 'Este campo es requerido',
            'pintura_requiere.max' => 'Este campo no puede tener más de 255 caracteres',

            'herreria_estado.required' => 'Este campo es requerido',
            'herreria_estado.max' => 'Este campo no puede tener más de 255 caracteres',

            'herreria_requiere.required' => 'Este campo es requerido',
            'herreria_requiere.max' => 'Este campo no puede tener más de 255 caracteres',

            'herreria_observaciones.required' => 'Este campo es requerido',
            'herreria_observaciones.max' => 'Este campo no puede tener más de 255 caracteres',

            'img1.required' => 'Este campo es requerido',
            'img1.image' => 'El archivo debe ser una imagen',
            'img1.mimes' => 'El archivo debe ser una imagen con formato png, jpg o jpeg',
            'img1.max' => 'El archivo no puede pesar más de 2MB',

            'img2.required' => 'Este campo es requerido',
            'img2.image' => 'El archivo debe ser una imagen',
            'img2.mimes' => 'El archivo debe ser una imagen con formato png, jpg o jpeg',
            'img2.max' => 'El archivo no puede pesar más de 2MB',

            'img3.required' => 'Este campo es requerido',
            'img3.image' => 'El archivo debe ser una imagen',
            'img3.mimes' => 'El archivo debe ser una imagen con formato png, jpg o jpeg',
            'img3.max' => 'El archivo no puede pesar más de 2MB',
        ]);

        if ($validated->fails()) {
            return response()->json(['response' => false, 'errors' => $validated->errors()]);
        }

        $rep_edificio = new Rep_enterprise;
        $rep_edificio->inspeccion_id = $request->inspeccion_id;
        $rep_edificio->extintores_no = $request->extintores_no;
        $rep_edificio->extintores_tipo_agente = $request->extintores_tipo_agente;
        $rep_edificio->extintores_fecha_vencimiento = $request->extintores_fecha_vencimiento;
        $rep_edificio->extintores_presion = $request->extintores_presion;
        $rep_edificio->extintores_aro_seguridad = $request->extintores_aro_seguridad;
        $rep_edificio->extintores_ubicacion = $request->extintores_ubicacion;
        $rep_edificio->lamparas_no = $request->lamparas_no;
        $rep_edificio->lamparas_estado = $request->lamparas_estado;
        $rep_edificio->lamparas_faltante = $request->lamparas_faltante;
        $rep_edificio->lamparas_emergencia_no = $request->lamparas_emergencia_no;
        $rep_edificio->lamparas_emergencia_estado = $request->lamparas_emergencia_estado;
        $rep_edificio->lamparas_emergencia_faltante = $request->lamparas_emergencia_faltante;
        $rep_edificio->senalizacion_seguridad = $request->senalizacion_seguridad;
        $rep_edificio->senalizacion_seguridad_estado = $request->senalizacion_seguridad_estado;
        $rep_edificio->senalizacion_seguridad_faltante = $request->senalizacion_seguridad_faltante;
        $rep_edificio->senalizacion_observaciones = $request->senalizacion_observaciones;
        $rep_edificio->pintura_estado = $request->pintura_estado;
        $rep_edificio->pintura_requiere = $request->pintura_requiere;
        $rep_edificio->herreria_estado = $request->herreria_estado;
        $rep_edificio->herreria_requiere = $request->herreria_requiere;
        $rep_edificio->herreria_observaciones = $request->herreria_observaciones;
        $rep_edificio->img1 = $request->img1;
        $rep_edificio->img2 = $request->img2;
        $rep_edificio->img3 = $request->img3;
        $rep_edificio->img4 = $request->img4;
        $rep_edificio->img5 = $request->img5;
        $rep_edificio->img6 = $request->img6;
        $rep_edificio->status_id = 5;

        return response()->json(['response' => $rep_edificio->save()]);
    }

    public function anomalia(Request $request)
    {
        $anomalia = new Anomalias;

        $anomalia->urgencia = $request->urgencia;
        $anomalia->modelo = $request->modelo;
        $anomalia->marca = $request->marca;
        $anomalia->medidas = $request->medidas;
        $anomalia->descripcion = $request->descripcion;
        $anomalia->imagen = $request->imagen;
        $anomalia->inspeccion_id = $request->inspeccion_id;
        $anomalia->tipo_inspeccion_id = $request->tipo_inspeccion_id;

        return response()->json(['response' => $anomalia->save()]);
    }

    public function anomalia_validar(Request $request)
    {
        $validated = Validator::make($request->except('id'), [
            'imagen' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ], [

            'imagen.required' => 'Este campo es requerido',
            'imagen.image' => 'El archivo debe ser una imagen',
            'imagen.mimes' => 'El archivo debe ser una imagen con formato png, jpg o jpeg',
            'imagen.max' => 'El archivo no puede pesar más de 2MB',


        ]);

        if ($validated->fails()) {
            return response()->json(['response' => false, 'errors' => $validated->errors()]);
        }
    }
}
