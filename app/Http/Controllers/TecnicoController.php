<?php

namespace App\Http\Controllers;

use App\Models\Inspecciones;
use App\Models\Anomalias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Rep_enterprise;
use App\Models\Rep_transformador;

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
        $rep_edificio->img1 = $request->img1;
        $rep_edificio->img2 = $request->img2;
        $rep_edificio->img3 = $request->img3;
        $rep_edificio->img4 = $request->img4;
        $rep_edificio->img5 = $request->img5;
        $rep_edificio->img6 = $request->img6;
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
        $rep_transformador->img1 = $request->img1;
        $rep_transformador->img2 = $request->img2;
        $rep_transformador->img3 = $request->img3;
        $rep_transformador->img4 = $request->img4;
        $rep_transformador->img5 = $request->img5;
        $rep_transformador->img6 = $request->img6;
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

        // dd($request->all());
        $validated = Validator::make(
            $request->except('id'),
            [
                'disasolve_req' => 'required|between:0,1',
                'disasolve_cantidad' => 'required|max:255',
                'ten_media_soporteria' => 'required|between:0,1',
                'ten_media_soporteria_edo' => 'between:0,1',
                'ten_media_soporteria_faltante' => 'required|max:255',

                'mt_observaciones' => 'required|max:255',
                'img1' => 'required|image|mimes:png,jpg,jpeg|max:2048',
                'img2' => 'required|image|mimes:png,jpg,jpeg|max:2048',
                'img3' => 'required|image|mimes:png,jpg,jpeg|max:2048',
                'img4' => 'image|mimes:png,jpg,jpeg|max:2048',
                'img5' => 'image|mimes:png,jpg,jpeg|max:2048',
                'img6' => 'image|mimes:png,jpg,jpeg|max:2048',
            ],
            [
                'disasolve_req.required' => 'Este campo es requerido',
                'disasolve_req.between' => 'Este campo debe ser 0 o 1',

                'disasolve_cantidad.required' => 'Este campo es requerido',
                'disasolve_cantidad.max' => 'Este campo no puede tener más de 255 caracteres',

                'ten_media_soporteria.required' => 'Este campo es requerido',

                'ten_media_soporteria_edo.between' => 'Este campo debe ser 0 o 1',

                'ten_media_soporteria_faltante.required' => 'Este campo es requerido',

                'mt_observaciones.required' => 'Este campo es requerido',
                'mt_observaciones.max' => 'Este campo no puede tener más de 255 caracteres',


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

        return response()->json(['response' => true]);
    }
    public function anomalia(Request $request)
    {
        $anomalia = new Anomalias();

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
