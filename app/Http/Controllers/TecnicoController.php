<?php

namespace App\Http\Controllers;

use App\Models\Inspecciones;
use App\Models\Anomalias;
use App\Models\Rep_electrica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Rep_enterprise;
use App\Models\Rep_transformador;
use Illuminate\Support\Str;

class TecnicoController extends Controller
{
    private $role_type = 2;
    public function test($id = '')
    {
        $rep_enterprise = Rep_enterprise::where('inspeccion_id', $id)->first();
        $rep_transformador = Rep_transformador::where('inspeccion_id', $id)->first();

        $inspeccion_existe = Inspecciones::where('id', $id)
            ->firstOrFail();

        if ($inspeccion_existe->status_id === 4) {
            $inspeccion = Inspecciones::find($id);
            $inspeccion->status_id = 6;
            $inspeccion->fecha_comienzo = date('Y-m-d H:i:s');
            $inspeccion->save();
        }

        return view(
            'tecnico.inspecciones.test',
            [
                'section' => 'test',
                'subsection' => '',
                'section_cute' => 'Inpecciones',
                'role' => 'tecnico',
                'role_cute' => 'Técnico',
                'id' => $id,
                'rep_enterprise' => $rep_enterprise,
                'rep_transformador' => $rep_transformador,
                'role_type' => $this->role_type
            ]
        );
    }

    public function edificio($id = '')
    {
        $inspeccion = Inspecciones::where('id', $id)->first();

        return view(
            'tecnico.inspecciones.edificio',
            [
                'section' => 'test',
                'subsection' => 'edificio',
                'section_cute' => 'Inspección a edificio',
                'role' => 'tecnico',
                'role_cute' => 'Técnico',
                'inspeccion' => $inspeccion,
                'role_type' => $this->role_type
            ]
        );
    }

    public function electrica($id = '')
    {
        $inspeccion = Inspecciones::where('id', $id)->first();

        return view(
            'tecnico.inspecciones.electrica',
            [
                'section' => 'test',
                'subsection' => 'electrica',
                'section_cute' => 'Inspección eléctrica',
                'role' => 'tecnico', 'role_cute' => 'Técnico',
                'inspeccion' => $inspeccion,
                'role_type' => $this->role_type
            ]
        );
    }
    public function transformador($id = '')
    {
        $inspeccion = Inspecciones::where('id', $id)->first();
        return view(
            'tecnico.inspecciones.transformador',
            [
                'section' => 'test',
                'subsection' => 'transformador',
                'section_cute' => 'Inspección eléctrica',
                'role' => 'tecnico',
                'role_cute' => 'Técnico',
                'inspeccion' => $inspeccion,
                'role_type' => $this->role_type
            ]
        );
    }
    public function edificio_subir(Request $request)
    {
        $validated = Validator::make(
            $request->except('id'),
            [
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
                'img4' => 'image|mimes:png,jpg,jpeg|max:2048',
                'img5' => 'image|mimes:png,jpg,jpeg|max:2048',
                'img6' => 'image|mimes:png,jpg,jpeg|max:2048',
            ],
            [
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

                'img4.image' => 'El archivo debe ser una imagen',
                'img4.mimes' => 'El archivo debe ser una imagen con formato png, jpg o jpeg',
                'img4.max' => 'El archivo no puede pesar más de 2MB',

                'img5.image' => 'El archivo debe ser una imagen',
                'img5.mimes' => 'El archivo debe ser una imagen con formato png, jpg o jpeg',
                'img5.max' => 'El archivo no puede pesar más de 2MB',

                'img6.image' => 'El archivo debe ser una imagen',
                'img6.mimes' => 'El archivo debe ser una imagen con formato png, jpg o jpeg',
                'img6.max' => 'El archivo no puede pesar más de 2MB',
            ],
        );

        if ($validated->fails()) {
            return response()->json(['response' => false, 'errors' => $validated->errors()]);
        }

        $rep_edificio = new Rep_enterprise();
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

        if ($request->img1 != null && $request->img1 != 'undefined') {
            $imageName = time() . 'img1' . auth()->id() . '.' . $request->img1->extension();
            $request->img1->move(public_path('images/reportes/edificio'), $imageName);
            $rep_edificio->img1 = $imageName;
        }

        if ($request->img2 != null && $request->img2 != 'undefined') {
            $imageName = time() . 'img2' . auth()->id() . '.' . $request->img2->extension();
            $request->img2->move(public_path('images/reportes/edificio'), $imageName);
            $rep_edificio->img2 = $imageName;
        }

        if ($request->img3 != null && $request->img3 != 'undefined') {
            $imageName = time() . 'img3' . auth()->id() . '.' . $request->img3->extension();
            $request->img3->move(public_path('images/reportes/edificio'), $imageName);
            $rep_edificio->img3 = $imageName;
        }

        if ($request->img4 != null && $request->img4 != 'undefined') {
            $imageName = time() . 'img4' . auth()->id() . '.' . $request->img4->extension();
            $request->img4->move(public_path('images/reportes/edificio'), $imageName);
            $rep_edificio->img4 = $imageName;
        }

        if ($request->img5 != null && $request->img5 != 'undefined') {
            $imageName = time() . 'img5' . auth()->id() . '.' . $request->img5->extension();
            $request->img5->move(public_path('images/reportes/edificio'), $imageName);
            $rep_edificio->img5 = $imageName;
        }

        if ($request->img6 != null && $request->img6 != 'undefined') {
            $imageName = time() . 'img6' . auth()->id() . '.' . $request->img6->extension();
            $request->img6->move(public_path('images/reportes/edificio'), $imageName);
            $rep_edificio->img6 = $imageName;
        }

        $rep_edificio->status_id = 5;

        $r = $rep_edificio->save();
        if ($r) {
            $inspeccion = Inspecciones::find($request->inspeccion_id);
            $inspeccion->porcentaje = $inspeccion->porcentaje + 33;
            $inspeccion->porcentaje == 100 ? ($inspeccion->status_id = 5) : '';
            $inspeccion->save();
        }
        return response()->json(['response' => $r]);
    }

    public function transformador_subir(Request $request)
    {
        $validated = Validator::make(
            $request->except('id'),
            [
                'marca' => 'required|max:255',
                'capacidad' => 'required|max:255',
                'neutro' => 'required|max:255',
                'tension' => 'required|max:255',
                'impedancia' => 'required|max:255',
                'a' => 'required|max:255',
                'c' => 'required|max:255',
                'lts_aceite' => 'required|max:255',
                'conex_primario' => 'required|max:255',
                'conex_secundario' => 'required|max:255',
                'fecha_fabricacion' => 'required|max:255',
                'aceite' => 'required|max:255',
                'peso_total' => 'required|max:255',
                'limpieza' => 'required|max:255',
                'indicador_nivel' => 'required|max:255',
                'indicador_temperatura' => 'required|max:255',
                'indicador_temperatura_max' => 'required|max:255',
                'valvula_alivio' => 'required|max:255',
                'valvula_llenado' => 'required|max:255',
                'valvula_drenado' => 'required|max:255',
                'valvula_muestreo' => 'required|max:255',
                'cambiador_derivaciones' => 'required|max:255',
                'pintura_estado' => 'required|max:255',
                'tierra_neutro' => 'required|max:255',
                'tierra_tanque' => 'required|max:255',
                'tierra_codos' => 'required|max:255',
                'tierra_insertos' => 'required|max:255',
                'boquillas_h1' => 'required|max:255',
                'boquillas_h2' => 'required|max:255',
                'boquillas_h3' => 'required|max:255',
                'boquillas_x0' => 'required|max:255',
                'boquillas_x1' => 'required|max:255',
                'boquillas_x2' => 'required|max:255',
                'boquillas_x3' => 'required|max:255',
                'observaciones' => 'required|max:255',
                'img1' => 'required|image|mimes:png,jpg,jpeg|max:2048',
                'img2' => 'required|image|mimes:png,jpg,jpeg|max:2048',
                'img3' => 'required|image|mimes:png,jpg,jpeg|max:2048',
                'img4' => 'image|mimes:png,jpg,jpeg|max:2048',
                'img5' => 'image|mimes:png,jpg,jpeg|max:2048',
                'img6' => 'image|mimes:png,jpg,jpeg|max:2048',
            ],
            [
                'marca.required' => 'Este campo es requerido',
                'marca.max' => 'Este campo no puede tener más de 255 caracteres',

                'capacidad.required' => 'Este campo es requerido',
                'capacidad.max' => 'Este campo no puede tener más de 255 caracteres',

                'neutro.required' => 'Este campo es requerido',
                'neutro.max' => 'Este campo no puede tener más de 255 caracteres',

                'tension.required' => 'Este campo es requerido',
                'tension.max' => 'Este campo no puede tener más de 255 caracteres',

                'impedancia.required' => 'Este campo es requerido',
                'impedancia.max' => 'Este campo no puede tener más de 255 caracteres',

                'a.required' => 'Este campo es requerido',
                'a.max' => 'Este campo no puede tener más de 255 caracteres',

                'c.required' => 'Este campo es requerido',
                'c.max' => 'Este campo no puede tener más de 255 caracteres',

                'lts_aceite.required' => 'Este campo es requerido',
                'lts_aceite.max' => 'Este campo no puede tener más de 255 caracteres',

                'conex_primario.required' => 'Este campo es requerido',
                'conex_primario.max' => 'Este campo no puede tener más de 255 caracteres',

                'conex_secundario.required' => 'Este campo es requerido',
                'conex_secundario.max' => 'Este campo no puede tener más de 255 caracteres',

                'fecha_fabricacion.required' => 'Este campo es requerido',
                'fecha_fabricacion.max' => 'Este campo no puede tener más de 255 caracteres',

                'aceite.required' => 'Este campo es requerido',
                'aceite.max' => 'Este campo no puede tener más de 255 caracteres',

                'peso_total.required' => 'Este campo es requerido',
                'peso_total.max' => 'Este campo no puede tener más de 255 caracteres',

                'limpieza.required' => 'Este campo es requerido',
                'limpieza.max' => 'Este campo no puede tener más de 255 caracteres',

                'indicador_nivel.required' => 'Este campo es requerido',
                'indicador_nivel.max' => 'Este campo no puede tener más de 255 caracteres',

                'indicador_temperatura.required' => 'Este campo es requerido',
                'indicador_temperatura.max' => 'Este campo no puede tener más de 255 caracteres',

                'indicador_temperatura_max.required' => 'Este campo es requerido',
                'indicador_temperatura_max.max' => 'Este campo no puede tener más de 255 caracteres',

                'valvula_alivio.required' => 'Este campo es requerido',
                'valvula_alivio.max' => 'Este campo no puede tener más de 255 caracteres',

                'valvula_llenado.required' => 'Este campo es requerido',
                'valvula_llenado.max' => 'Este campo no puede tener más de 255 caracteres',

                'valvula_drenado.required' => 'Este campo es requerido',
                'valvula_drenado.max' => 'Este campo no puede tener más de 255 caracteres',

                'valvula_muestreo.required' => 'Este campo es requerido',
                'valvula_muestreo.max' => 'Este campo no puede tener más de 255 caracteres',

                'cambiador_derivaciones.required' => 'Este campo es requerido',
                'cambiador_derivaciones.max' => 'Este campo no puede tener más de 255 caracteres',

                'pintura_estado.required' => 'Este campo es requerido',
                'pintura_estado.max' => 'Este campo no puede tener más de 255 caracteres',

                'tierra_neutro.required' => 'Este campo es requerido',
                'tierra_neutro.max' => 'Este campo no puede tener más de 255 caracteres',

                'tierra_tanque.required' => 'Este campo es requerido',
                'tierra_tanque.max' => 'Este campo no puede tener más de 255 caracteres',

                'tierra_codos.required' => 'Este campo es requerido',
                'tierra_codos.max' => 'Este campo no puede tener más de 255 caracteres',

                'tierra_insertos.required' => 'Este campo es requerido',
                'tierra_insertos.max' => 'Este campo no puede tener más de 255 caracteres',

                'boquillas_h1.required' => 'Este campo es requerido',
                'boquillas_h1.max' => 'Este campo no puede tener más de 255 caracteres',

                'boquillas_h2.required' => 'Este campo es requerido',
                'boquillas_h2.max' => 'Este campo no puede tener más de 255 caracteres',

                'boquillas_h3.required' => 'Este campo es requerido',
                'boquillas_h3.max' => 'Este campo no puede tener más de 255 caracteres',

                'boquillas_x0.required' => 'Este campo es requerido',
                'boquillas_x0.max' => 'Este campo no puede tener más de 255 caracteres',

                'boquillas_x1.required' => 'Este campo es requerido',
                'boquillas_x1.max' => 'Este campo no puede tener más de 255 caracteres',

                'boquillas_x2.required' => 'Este campo es requerido',
                'boquillas_x2.max' => 'Este campo no puede tener más de 255 caracteres',

                'boquillas_x3.required' => 'Este campo es requerido',
                'boquillas_x3.max' => 'Este campo no puede tener más de 255 caracteres',

                'observaciones.required' => 'Este campo es requerido',
                'observaciones.max' => 'Este campo no puede tener más de 255 caracteres',

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

                'img4.image' => 'El archivo debe ser una imagen',
                'img4.mimes' => 'El archivo debe ser una imagen con formato png, jpg o jpeg',
                'img4.max' => 'El archivo no puede pesar más de 2MB',

                'img5.image' => 'El archivo debe ser una imagen',
                'img5.mimes' => 'El archivo debe ser una imagen con formato png, jpg o jpeg',
                'img5.max' => 'El archivo no puede pesar más de 2MB',

                'img6.image' => 'El archivo debe ser una imagen',
                'img6.mimes' => 'El archivo debe ser una imagen con formato png, jpg o jpeg',
                'img6.max' => 'El archivo no puede pesar más de 2MB',
            ],
        );

        if ($validated->fails()) {
            return response()->json(['response' => false, 'errors' => $validated->errors()]);
        }

        $rep_transformador = new Rep_transformador();
        $rep_transformador->inspeccion_id = $request->inspeccion_id;
        $rep_transformador->marca = $request->marca;
        $rep_transformador->capacidad = $request->capacidad;
        $rep_transformador->neutro = $request->neutro;
        $rep_transformador->tension = $request->tension;
        $rep_transformador->impedancia = $request->impedancia;
        $rep_transformador->a = $request->a;
        $rep_transformador->c = $request->c;
        $rep_transformador->lts_aceite = $request->lts_aceite;
        $rep_transformador->conex_primario = $request->conex_primario;
        $rep_transformador->conex_secundario = $request->conex_secundario;
        $rep_transformador->fecha_fabricacion = $request->fecha_fabricacion;
        $rep_transformador->aceite = $request->aceite;
        $rep_transformador->peso_total = $request->peso_total;
        $rep_transformador->limpieza = $request->limpieza;
        $rep_transformador->indicador_nivel = $request->indicador_nivel;
        $rep_transformador->indicador_temperatura = $request->indicador_temperatura;
        $rep_transformador->indicador_temperatura_max = $request->indicador_temperatura_max;
        $rep_transformador->valvula_alivio = $request->valvula_alivio;
        $rep_transformador->valvula_llenado = $request->valvula_llenado;
        $rep_transformador->valvula_drenado = $request->valvula_drenado;
        $rep_transformador->valvula_muestreo = $request->valvula_muestreo;
        $rep_transformador->cambiador_derivaciones = $request->cambiador_derivaciones;
        $rep_transformador->pintura_estado = $request->pintura_estado;
        $rep_transformador->tierra_neutro = $request->tierra_neutro;
        $rep_transformador->tierra_tanque = $request->tierra_tanque;
        $rep_transformador->tierra_codos = $request->tierra_codos;
        $rep_transformador->tierra_insertos = $request->tierra_insertos;
        $rep_transformador->boquillas_h1 = $request->boquillas_h1;
        $rep_transformador->boquillas_h2 = $request->boquillas_h2;
        $rep_transformador->boquillas_h3 = $request->boquillas_h3;
        $rep_transformador->boquillas_x0 = $request->boquillas_x0;
        $rep_transformador->boquillas_x1 = $request->boquillas_x1;
        $rep_transformador->boquillas_x2 = $request->boquillas_x2;
        $rep_transformador->boquillas_x3 = $request->boquillas_x3;
        $rep_transformador->observaciones = $request->observaciones;
        if ($request->img1 != null && $request->img1 != 'undefined') {
            $imageName = time() . 'img1' . auth()->id() . '.' . $request->img1->extension();
            $request->img1->move(public_path('images/reportes/transformador'), $imageName);
            $rep_transformador->img1 = $imageName;
        }

        if ($request->img2 != null && $request->img2 != 'undefined') {
            $imageName = time() . 'img2' . auth()->id() . '.' . $request->img2->extension();
            $request->img2->move(public_path('images/reportes/transformador'), $imageName);
            $rep_transformador->img2 = $imageName;
        }

        if ($request->img3 != null && $request->img3 != 'undefined') {
            $imageName = time() . 'img3' . auth()->id() . '.' . $request->img3->extension();
            $request->img3->move(public_path('images/reportes/transformador'), $imageName);
            $rep_transformador->img3 = $imageName;
        }

        if ($request->img4 != null && $request->img4 != 'undefined') {
            $imageName = time() . 'img4' . auth()->id() . '.' . $request->img4->extension();
            $request->img4->move(public_path('images/reportes/transformador'), $imageName);
            $rep_transformador->img4 = $imageName;
        }

        if ($request->img5 != null && $request->img5 != 'undefined') {
            $imageName = time() . 'img5' . auth()->id() . '.' . $request->img5->extension();
            $request->img5->move(public_path('images/reportes/transformador'), $imageName);
            $rep_transformador->img5 = $imageName;
        }

        if ($request->img6 != null && $request->img6 != 'undefined') {
            $imageName = time() . 'img6' . auth()->id() . '.' . $request->img6->extension();
            $request->img6->move(public_path('images/reportes/transformador'), $imageName);
            $rep_transformador->img6 = $imageName;
        }

        $rep_transformador->status_id = 5;

        $response = $rep_transformador->save();
        if ($response) {
            $inspeccion = Inspecciones::find($request->inspeccion_id);
            $inspeccion->porcentaje = $inspeccion->porcentaje + 33;
            $inspeccion->porcentaje == 100 ? ($inspeccion->status_id = 5) : '';
            $inspeccion->save();
        }
        return response()->json(['response' => $response]);
    }
    public function electrica_subir(Request $request)
    {
        $validar = 'required|between:0,1';

        // dd(intval($request->ten_media_soporteria) === 1 ? $validar : 'between:0,1');


        $validated = Validator::make(
            $request->except('id'),
            [
                //MT
                // DESASOLVE
                'disasolve_req' => 'required|between:0,1',
                'disasolve_cantidad' => 'required|max:255',
                'mt_limpieza_req' => 'required|between:0,1',
                'mt_limpieza_cantidad' => 'required|max:255',
                // MT - SOPORTERIA
                'ten_media_soporteria' => 'required|between:0,1',
                'ten_media_soporteria_edo' => intval($request->ten_media_soporteria) === 1 ? $validar : 'between:0,1',
                'ten_media_soporteria_faltante' => 'required|max:255',
                // SISTEMAS DE TIERRA
                'sis_tierra' => 'required|between:0,1',
                'sis_tierra_edo' =>  intval($request->sis_tierra) === 1 ? $validar : 'between:0,1',
                'sis_tierra_faltante' => 'required|max:255',
                // CONEX. SISTEMAS TIERRA
                'conex_tierra' => 'required|between:0,1',
                'conex_tierra_edo' => intval($request->conex_tierra) === 1 ? $validar : 'between:0,1',
                'conex_tierra_faltante' => 'required|max:255',
                // SELLADO DE DUCTERIA
                'sellado_ducteria' => 'required|between:0,1',
                'sellado_ducteria_edo' => intval($request->sellado_ducteria) === 1 ? $validar : 'between:0,1',
                'sellado_ducteria_faltante' => 'required|max:255',
                // MT - OBSERVACIONES
                'mt_observaciones' => 'required|max:255',
                //BT
                // TIPO CANALIZACIONES
                'tipo_canalizacion' => 'required',
                // BT - TORNILLERIA
                'torni' => 'required|between:0,1',
                'torni_cantidad' => 'required|max:255',
                'torni_limpieza' => 'required|between:0,1',
                // 'torni_limpieza_cantidad' => 'required|max:255',
                // BT - SOPORTERIA
                'bt_soporteria' => 'required|between:0,1',
                'bt_soporteria_edo' => intval($request->bt_soporteria) === 1 ? $validar : 'between:0,1',
                'bt_soporteria_faltante' => 'required|max:255',
                // MB - OBSERVACIONES
                'mb_observaciones' => 'required|max:255',
                // INTERRUPTORES EN B.T
                'int_no' => 'required|max:255',
                'int_limpieza' => 'required|between:0,1',
                'int_limpieza_cantidad' => 'required|max:255',
                'int_edo' => 'required|between:0,1',
                'int_torni' => 'required|between:0,1',
                //SENALIZACION DE INTERRUPTORES
                'int_senalizacion' => 'required|between:0,1',
                'int_senalizacion_edo' => intval($request->int_senalizacion) === 1 ? $validar : 'between:0,1',
                'int_senalizacion_faltante' => 'required|max:255',
                //SENALIZACION CIRCUITOS
                'circuitos' => 'required|between:0,1',
                'circuitos_edo' => intval($request->circuitos) === 1 ? $validar : 'between:0,1',
                'circuitos_faltante' => 'required|max:255',


                'img1' => 'required|image|mimes:png,jpg,jpeg|max:2048',
                'img2' => 'required|image|mimes:png,jpg,jpeg|max:2048',
                'img3' => 'required|image|mimes:png,jpg,jpeg|max:2048',
                'img4' => 'image|mimes:png,jpg,jpeg|max:2048',
                'img5' => 'image|mimes:png,jpg,jpeg|max:2048',
                'img6' => 'image|mimes:png,jpg,jpeg|max:2048',
            ],
            [
                //DESASOLVE
                'disasolve_req.required' => '¿Requiere disasolve?',
                'disasolve_req.between' => 'El valor para requiere disasolve debe ser "si" o" no"',
                'disasolve_cantidad.required' => 'Este campo es requerido',
                'disasolve_cantidad.max' => 'Este campo no puede tener más de 255 caracteres',
                //LIMPIEZA DESASOLVE
                'mt_limpieza_req.required' => '¿Requiere limpieza?',
                'mt_limpieza_req.between' => 'El valor para requiere limpieza debe ser "si" o" no"',
                // LIMPIEZA DESASOLVE CANTIDAD
                'mt_limpieza_cantidad.required' => 'Este campo es requerido',
                'mt_limpieza_cantidad.max' => 'Este campo no puede tener más de 255 caracteres',
                // MT - SOPORTERIA
                'ten_media_soporteria.required' => 'Canalizaciones en M.T. ¿Se requiere soportería?',
                'ten_media_soporteria_edo.between' => 'El valor para el estado de soportería en tensión media debe ser "si" o "no"',
                'ten_media_soporteria_edo.required' => 'Especifique el estado de la soporteía en tensión media',
                'ten_media_soporteria_faltante.required' => 'Este campo es requerido',
                // SISTEMAS DE TIERRA
                'sis_tierra.required' => '¿Cuenta con sistema de tierra?',
                'sis_tierra.between' => 'El valor para el sistema de tierra debe ser "si" o "no"',
                'sis_tierra_edo.between' => 'El valor para el estado sistema de tierra debe ser "si" o "no"',
                'sis_tierra_edo.required' => 'Especifique el estado del sistema de tierra',
                'sis_tierra_faltante.required' => 'Este campo es requerido',
                'sis_tierra_faltante.max' => 'Este campo no puede tener más de 255 caracteres',
                // CONEX. SISTEMAS TIERRA
                'conex_tierra.required' => '¿Cuenta con conexión a tierra?',
                'conex_tierra.between' => 'El valor para la conexión a tierra debe ser "si" o "no"',
                'conex_tierra_edo.between' => 'El valor para el estado conexión a tierra debe ser "si" o "no"',
                'conex_tierra_edo.required' => 'Especifique el estado de la conexión a tierra',
                'conex_tierra_faltante.required' => 'Este campo es requerido',
                'conex_tierra_faltante.max' => 'Este campo no puede tener más de 255 caracteres',
                // SELLADO DE DUCTERIA
                'sellado_ducteria.required' => '¿Cuenta con sellado de ductería?',
                'sellado_ducteria.between' => 'El valor para el sellado de ductería debe ser "si" o "no"',
                'sellado_ducteria_edo.between' => 'El valor para el estado sellado de ductería debe ser "si" o "no"',
                'sellado_ducteria_edo.required' => 'Especifique el estado del sellado de ductería',
                'sellado_ducteria_faltante.required' => 'Este campo es requerido',
                'sellado_ducteria_faltante.max' => 'Este campo no puede tener más de 255 caracteres',
                // MT - OBSERVACIONES
                'mt_observaciones.required' => 'Este campo es requerido',
                'mt_observaciones.max' => 'Este campo no puede tener más de 255 caracteres',
                // CANALIZACIONES 
                // TIPO CANALIZACIONES
                'tipo_canalizacion.required' => '¿Qué tipo de canalización es?',
                // BT - TORNILLERIA
                'torni.required' => '¿Cuenta con tornillería?',
                'torni.between' => 'El valor para la tornillería debe ser "si" o "no"',
                'torni_cantidad.required' => 'Este campo es requerido',
                'torni_cantidad.max' => 'Este campo no puede tener más de 255 caracteres',
                'torni_limpieza.required' => '¿Requiere limpieza la tornillería?',
                'torni_limpieza.between' => 'El valor para la limpieza de la tornillería debe ser "si" o "no"',

                // BT - SOPORTERIA
                'bt_soporteria.required' => 'Canalizaciones en BT. ¿Se requiere soportería?',
                'bt_soporteria.between' => 'El valor para la soportería debe ser "si" o "no"',
                'bt_soporteria_edo.between' => 'El valor para el estado de la soportería debe ser "si" o "no"',
                'bt_soporteria_edo.required' => 'Especifique el estado de la soportería',
                'bt_soporteria_faltante.required' => 'Este campo es requerido',
                'bt_soporteria_faltante.max' => 'Este campo no puede tener más de 255 caracteres',
                'mb_observaciones.required' => 'Este campo es requerido',
                'mb_observaciones.max' => 'Este campo no puede tener más de 255 caracteres',
                // INTERRUPTORES EN B.T. 
                'int_no.required' => '¿Cuenta con interruptores en B.T.?',
                'int_no.max' => 'Este campo no puede tener más de 255 caracteres',
                'int_limpieza.required' => '¿Requiere limpieza los interruptores en B.T.?',
                'int_limpieza.between' => 'El valor para la limpieza de los interruptores en B.T. debe ser "si" o "no"',
                'int_limpieza_cantidad' => 'Este campo es requerido',
                'int_limpieza_cantidad.max' => 'Este campo no puede tener más de 255 caracteres',
                'int_edo' => '¿Cual es estado de los interruptores y/o gabinetes',
                'int_edo.between' => 'El valor para el estado de los interruptores en B.T. debe ser "si" o "no"',
                'int_torni' => '¿Los interruptores requieren tornillería?',
                'int_torni.between' => 'El valor para la tornillería debe ser "si" o "no"',

                'int_senalizacion.required' => '¿Cuenta con  señalización?',
                'int_senalizacion.between' => 'El valor para la señalización debe ser "si" o "no"',
                'int_senalizacion_edo.between' => 'El valor para el estado de la señalización debe ser "si" o "no"',
                'int_senalizacion_edo.required' => 'Especifique el estado de la señalización',
                'int_senalizacion_faltante.required' => 'Este campo es requerido',
                'int_senalizacion_faltante.max' => 'Este campo no puede tener más de 255 caracteres',
                //SENALIZACION CIRCUITOS
                'circuitos.required' => '¿Cuenta con señalización de circuitos?',
                'circuitos.between' => 'El valor para la señalización de circuitos debe ser "si" o "no"',
                'circuitos_edo.between' => 'El valor para el estado de la señalización de circuitos debe ser "si" o "no"',
                'circuitos_edo.required' => 'Especifique el estado de la señalización de circuitos',
                'circuitos_faltante.required' => 'Este campo es requerido',
                'circuitos_faltante.max' => 'Este campo no puede tener más de 255 caracteres',







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

                'img4.image' => 'El archivo debe ser una imagen',
                'img4.mimes' => 'El archivo debe ser una imagen con formato png, jpg o jpeg',
                'img4.max' => 'El archivo no puede pesar más de 2MB',

                'img5.image' => 'El archivo debe ser una imagen',
                'img5.mimes' => 'El archivo debe ser una imagen con formato png, jpg o jpeg',
                'img5.max' => 'El archivo no puede pesar más de 2MB',

                'img6.image' => 'El archivo debe ser una imagen',
                'img6.mimes' => 'El archivo debe ser una imagen con formato png, jpg o jpeg',
                'img6.max' => 'El archivo no puede pesar más de 2MB',
            ],
        );

        if ($validated->fails()) {
            return response()->json(['response' => false, 'errors' => $validated->errors()]);
        }

        $existe_reporte = Rep_electrica::where('inspeccion_id', $request->inspeccion_id)->first();

        if ($existe_reporte) {
            return response()->json(['response' => false, 'message' => 'Este reporte ya existe']);
        }

        $rep_electrico = new Rep_electrica();
        $rep_electrico->inspeccion_id = $request->inspeccion_id;
        $rep_electrico->disasolve_req = $request->disasolve_req;
        $rep_electrico->disasolve_cantidad = $request->disasolve_cantidad;
        $rep_electrico->mt_limpieza_req = $request->mt_limpieza_req;
        $rep_electrico->mt_limpieza_cantidad = $request->mt_limpieza_cantidad;
        $rep_electrico->ten_media_soporteria = $request->ten_media_soporteria;
        $rep_electrico->ten_media_soporteria_edo = $request->ten_media_soporteria_edo;
        $rep_electrico->ten_media_soporteria_faltante = $request->ten_media_soporteria_faltante;
        $rep_electrico->sis_tierra = $request->sis_tierra;
        $rep_electrico->sis_tierra_edo = $request->sis_tierra_edo;
        $rep_electrico->sis_tierra_faltante = $request->sis_tierra_faltante;
        $rep_electrico->mt_observaciones = $request->mt_observaciones;
        $rep_electrico->conex_tierra = $request->conex_tierra;
        $rep_electrico->conex_tierra_edo = $request->conex_tierra_edo;
        $rep_electrico->conex_tierra_faltante = $request->conex_tierra_faltante;
        $rep_electrico->sellado_ducteria = $request->sellado_ducteria;
        $rep_electrico->sellado_ducteria_edo = $request->sellado_ducteria_edo;
        $rep_electrico->sellado_ducteria_faltante = $request->sellado_ducteria_faltante;
        $rep_electrico->tipo_canalizacion = $request->tipo_canalizacion;
        $rep_electrico->torni = $request->torni;
        $rep_electrico->torni_cantidad = $request->torni_cantidad;
        $rep_electrico->torni_limpieza = $request->torni_limpieza;
        $rep_electrico->bt_soporteria = $request->bt_soporteria;
        $rep_electrico->bt_soporteria_edo = $request->bt_soporteria_edo;
        $rep_electrico->bt_soporteria_faltante = $request->bt_soporteria_faltante;
        $rep_electrico->mb_observaciones = $request->mb_observaciones;

        $rep_electrico->int_no = $request->int_no;
        $rep_electrico->int_limpieza_cantidad = $request->int_limpieza_cantidad;
        $rep_electrico->int_limpieza = $request->int_limpieza;
        $rep_electrico->int_edo = $request->int_edo;
        $rep_electrico->int_torni = $request->int_torni;
        $rep_electrico->int_senalizacion = $request->int_senalizacion;
        $rep_electrico->int_senalizacion_edo = $request->int_senalizacion_edo;
        $rep_electrico->int_senalizacion_faltante = $request->int_senalizacion_faltante;
        $rep_electrico->circuitos = $request->circuitos;
        $rep_electrico->circuitos_edo = $request->circuitos_edo;
        $rep_electrico->circuitos_faltante = $request->circuitos_faltante;

        // $rep_electrico->img1 = $request->img1;
        // $rep_electrico->img2 = $request->img2;
        // $rep_electrico->img3 = $request->img3;
        // $rep_electrico->img4 = $request->img4;
        // $rep_electrico->img5 = $request->img5;
        // $rep_electrico->img6 = $request->img6;
        $rep_electrico->status_id = 5;

        $r = $rep_electrico->save();
        if ($r) {
            $inspeccion = Inspecciones::find($request->inspeccion_id);
            $inspeccion->porcentaje = $inspeccion->porcentaje + 34;
            $inspeccion->porcentaje >= 100 ? ($inspeccion->status_id = 5) : '';
            $inspeccion->save();
        }
        return response()->json(['response' => $r]);
    }
    public function anomalia(Request $request)
    {
        $anomalia = new Anomalias();

        $anomalia->urgencia = $request->urgencia;
        $anomalia->modelo = $request->modelo;
        $anomalia->marca = $request->marca;
        $anomalia->medidas = $request->medidas;
        $anomalia->descripcion = $request->descripcion;
        if ($request->imagen != null && $request->imagen != 'undefined') {
            $cadena = Str::random(4);
            $imageName = 'anomalia' . $cadena . '.' . $request->imagen->extension();
            $request->imagen->move(public_path('images/anomalias'), $imageName);
            $anomalia->imagen = $imageName;
        }
        $anomalia->inspeccion_id = $request->inspeccion_id;
        $anomalia->tipo_inspeccion_id = $request->tipo_inspeccion_id;

        $anomalia->cosa = $request->cosa ?? null;

        return response()->json(['response' => $anomalia->save()]);
    }

    public function anomalia_validar(Request $request)
    {
        $validated = Validator::make(
            $request->except('id'),
            [
                'imagen' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            ],
            [
                'imagen.required' => 'Este campo es requerido',
                'imagen.image' => 'El archivo debe ser una imagen',
                'imagen.mimes' => 'El archivo debe ser una imagen con formato png, jpg o jpeg',
                'imagen.max' => 'El archivo no puede pesar más de 2MB',
            ],
        );

        if ($validated->fails()) {
            return response()->json(['response' => false, 'errors' => $validated->errors()]);
        }
    }
}
