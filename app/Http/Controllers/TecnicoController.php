<?php

namespace App\Http\Controllers;

use App\Models\Inspecciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TecnicoController extends Controller
{
    public function test($id = '')
    {
        $tecnico = auth()->user()->id;
        return view('tecnico.test', ['section' => 'test', 'section_cute' => 'Test', 'role' => 'tecnico', 'role_cute' => 'Técnico',  'id' => $id]);
    }

    public function edificio($id = '')
    {
        $tecnico = auth()->user()->id;
        $inspeccion = Inspecciones::where('id', $id)->first();
        return view('tecnico.inspecciones.edificio', ['section' => 'test', 'section_cute' => 'Test', 'role' => 'tecnico', 'role_cute' => 'Técnico',  'inspeccion' => $inspeccion]);
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

        // dd($request->all());
    }
}
