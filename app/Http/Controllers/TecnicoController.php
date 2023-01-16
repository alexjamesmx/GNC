<?php

namespace App\Http\Controllers;

use App\Models\Inspecciones;
use App\Models\Anomalias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Rep_enterprise;
use App\Models\Rep_transformador;
use App\Models\Rep_electrica;
use App\Models\Subestacion;
use Illuminate\Support\Str;



class TecnicoController extends Controller
{
    private $role_type = 2;
    public function test($id = '')
    {
        $rep_enterprise = Rep_enterprise::select('status_id')->where('inspeccion_id', $id)->first();
        $rep_transformador = Rep_transformador::select('status_id')->where('inspeccion_id', $id)->first();
        $rep_electrico = Rep_electrica::select('status_id')->where('inspeccion_id', $id)->first();

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
                'rep_electrico' => $rep_electrico,
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
        $subestacion_type = Subestacion::select('type_id')->where('id', $inspeccion->subestacion_id)->first();


        return view(
            'tecnico.inspecciones.electrica',
            [
                'section' => 'test',
                'subsection' => 'electrica',
                'section_cute' => 'Inspección eléctrica',
                'role' => 'tecnico', 'role_cute' => 'Técnico',
                'inspeccion' => $inspeccion,
                'role_type' => $this->role_type,
                'subestacion_type' => $subestacion_type->type_id
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

        $existe_reporte = Rep_enterprise::where('inspeccion_id', $request->inspeccion_id)->first();

        if ($existe_reporte) {
            return response()->json(['response' => false, 'message' => 'Este reporte ya existe']);
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
            $imageName = $request->inspeccion_id .  '_img1_' . auth()->id() . '.' . $request->img1->extension();
            $request->img1->move(storage_path('images/reportes/edificio/'.$request->inspeccion_id), $imageName);
            $rep_edificio->img1 = $imageName;
        }

        if ($request->img2 != null && $request->img2 != 'undefined') {
            $imageName = $request->inspeccion_id .  '_img2_' . auth()->id() . '.' . $request->img2->extension();

            $request->img2->move(storage_path('images/reportes/edificio/'.$request->inspeccion_id), $imageName);
            $rep_edificio->img2 = $imageName;
        }

        if ($request->img3 != null && $request->img3 != 'undefined') {
            $imageName = $request->inspeccion_id .  '_img3_' . auth()->id() . '.' . $request->img3->extension();$request->img3->extension();

            $request->img3->move(storage_path('images/reportes/edificio/'.$request->inspeccion_id), $imageName);
            $rep_edificio->img3 = $imageName;
        }

        if ($request->img4 != null && $request->img4 != 'undefined') {
                $imageName = $request->inspeccion_id .  '_img4_' . auth()->id() . '.' . $request->img4->extension();

            $request->img4->move(storage_path('images/reportes/edificio/'.$request->inspeccion_id), $imageName);
            $rep_edificio->img4 = $imageName;
        }

        if ($request->img5 != null && $request->img5 != 'undefined') {
                $imageName = $request->inspeccion_id .  '_img5_' . auth()->id() . '.' . $request->img5->extension();

            $request->img5->move(storage_path('images/reportes/edificio/'.$request->inspeccion_id), $imageName);
            $rep_edificio->img5 = $imageName;
        }

        if ($request->img6 != null && $request->img6 != 'undefined') {
            $imageName = $request->inspeccion_id .  '_img6_' . auth()->id() . '.' . $request->img6->extension();

            $request->img6->move(storage_path('images/reportes/edificio/'.$request->inspeccion_id), $imageName);
            $rep_edificio->img6 = $imageName;
        }


        $rep_edificio->status_id = 5;

        $r = $rep_edificio->save();
        if ($r) {
            $inspeccion = Inspecciones::find($request->inspeccion_id);
            $inspeccion->porcentaje = $inspeccion->porcentaje + 33;
            if(  $inspeccion->porcentaje >= 100 ){
                $inspeccion->status_id = 5;
           
                $date = date('Y-m-d H:i:s');
                $inspeccion->fecha_fin = $date;  
            }
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
                'no_serie' => 'required|max:255',
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

                'no_serie.required' => 'Este campo es requerido',
                'no_serie.max' => 'Este campo no puede tener más de 255 caracteres',

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
        $existe_reporte = Rep_transformador::where('inspeccion_id', $request->inspeccion_id)->first();

        if ($existe_reporte) {
            return response()->json(['response' => false, 'message' => 'Este reporte ya existe']);
        }
        $rep_transformador = new Rep_transformador();
        $rep_transformador->inspeccion_id = $request->inspeccion_id;
        $rep_transformador->marca = $request->marca;
        $rep_transformador->no_serie = $request->no_serie;
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
            $imageName = $request->inspeccion_id .  '_img1_' . auth()->id() . '.' . $request->img1->extension();
            $request->img1->move(storage_path('images/reportes/transformador/'.$request->inspeccion_id), $imageName);
            $rep_transformador->img1 = $imageName;
        }

        if ($request->img2 != null && $request->img2 != 'undefined') {
            $imageName = $request->inspeccion_id .  '_img2_' . auth()->id() . '.' . $request->img2->extension();

            $request->img2->move(storage_path('images/reportes/transformador/'.$request->inspeccion_id), $imageName);
            $rep_transformador->img2 = $imageName;
        }

        if ($request->img3 != null && $request->img3 != 'undefined') {
            $imageName = $request->inspeccion_id .  '_img3_' . auth()->id() . '.' . $request->img3->extension();$request->img3->extension();

            $request->img3->move(storage_path('images/reportes/transformador/'.$request->inspeccion_id), $imageName);
            $rep_transformador->img3 = $imageName;
        }

        if ($request->img4 != null && $request->img4 != 'undefined') {
                $imageName = $request->inspeccion_id .  '_img4_' . auth()->id() . '.' . $request->img4->extension();

            $request->img4->move(storage_path('images/reportes/transformador/'.$request->inspeccion_id), $imageName);
            $rep_transformador->img4 = $imageName;
        }

        if ($request->img5 != null && $request->img5 != 'undefined') {
                $imageName = $request->inspeccion_id .  '_img5_' . auth()->id() . '.' . $request->img5->extension();

            $request->img5->move(storage_path('images/reportes/transformador/'.$request->inspeccion_id), $imageName);
            $rep_transformador->img5 = $imageName;
        }

        if ($request->img6 != null && $request->img6 != 'undefined') {
            $imageName = $request->inspeccion_id .  '_img6_' . auth()->id() . '.' . $request->img6->extension();

            $request->img6->move(storage_path('images/reportes/transformador/'.$request->inspeccion_id), $imageName);
            $rep_transformador->img6 = $imageName;
        }

        $rep_transformador->status_id = 5;

        $response = $rep_transformador->save();
        if ($response) {
            $inspeccion = Inspecciones::find($request->inspeccion_id);
            $inspeccion->porcentaje = $inspeccion->porcentaje + 33;
            if(  $inspeccion->porcentaje >= 100 ){
                $inspeccion->status_id = 5;

                $date = date('Y-m-d H:i:s');
                $inspeccion->fecha_fin = $date;  
            }
            $inspeccion->save();
        }
        return response()->json(['response' => $response]);
    }
    public function electrica_subir(Request $request)
    {
        $validar = 'required|between:0,1';


        if ($request->subestacion_type === '2') {
            $pedestal = true;
            $compacta = false;
        }
        if ($request->subestacion_type === '1') {
            $compacta = true;
            $pedestal = false;
        }
        $validated = Validator::make(
            $request->except('id'),
            [
                //MT
                // DESASOLVE
                'disasolve_req' => 'required|between:0,1',
                'disasolve_cantidad' => intval($request->disasolve_req) === 1 ? 'required|max:255' : 'max:255',
                //LIMPIEZA
                'mt_limpieza_req' => 'required|between:0,1',
                'mt_limpieza_cantidad' =>  intval($request->mt_limpieza_req) === 1 ? 'required|max:255' : 'max:255',
                // MT - SOPORTERIA
                'ten_media_soporteria' => 'required|between:0,1',
                'ten_media_soporteria_edo' => intval($request->ten_media_soporteria) === 1 ? $validar : 'between:0,1',
                'ten_media_soporteria_faltante' => 'max:255',
                // SISTEMAS DE TIERRA
                'sis_tierra' => 'required|between:0,1',
                'sis_tierra_edo' =>  intval($request->sis_tierra) === 1 ? $validar : 'between:0,1',
                'sis_tierra_faltante' => 'max:255',
                // CONEX. SISTEMAS TIERRA
                'conex_tierra' => 'required|between:0,1',
                'conex_tierra_edo' => intval($request->conex_tierra) === 1 ? $validar : 'between:0,1',
                'conex_tierra_faltante' => 'max:255',
                // SELLADO DE DUCTERIA
                'sellado_ducteria' => 'required|between:0,1',
                'sellado_ducteria_edo' => intval($request->sellado_ducteria) === 1 ? $validar : 'between:0,1',
                'sellado_ducteria_faltante' => 'max:255',
                // MT - OBSERVACIONES
                'mt_observaciones' => 'max:255',
                //BT
                // TIPO CANALIZACIONES
                'tipo_canalizacion' => 'required',
                // BT - TORNILLERIA
                'torni' => 'required|between:0,1',
                'torni_cantidad' =>  intval($request->torni) === 1 ? 'required|max:255' : 'max:255',
                'torni_limpieza' => 'required|between:0,1',
                // 'torni_limpieza_cantidad' => 'required|max:255',
                // BT - SOPORTERIA
                'bt_soporteria' => 'required|between:0,1',
                'bt_soporteria_edo' => intval($request->bt_soporteria) === 1 ? $validar : 'between:0,1',
                'bt_soporteria_faltante' => 'max:255',
                // MB - OBSERVACIONES
                'mb_observaciones' => 'max:255',
                // INTERRUPTORES EN B.T
                'int_no' => 'required|max:255',
                'int_limpieza' => 'required|between:0,1',
                'int_limpieza_cantidad' => intval($request->int_limpieza) === 1 ? 'required|max:255' : 'max:255',



                'int_edo' => 'required|between:0,1',
                'int_torni' => 'required|between:0,1',
                //SENALIZACION DE INTERRUPTORES
                'int_senalizacion' => 'required|between:0,1',
                'int_senalizacion_edo' => intval($request->int_senalizacion) === 1 ? $validar : 'between:0,1',
                'int_senalizacion_faltante' => 'max:255',
                //SENALIZACION CIRCUITOS
                'circuitos' => 'required|between:0,1',
                'circuitos_edo' => intval($request->circuitos) === 1 ? $validar : 'between:0,1',
                'circuitos_faltante' => 'max:255',
                'disponible' => 'required|between:0,1',
                'disponible_cantidad' =>  intval($request->disponible) === 1 ? 'required|integer' : 'integer',
                'disponible_faltante' =>  intval($request->disponible) === 0 ? 'required|integer' : 'integer',
                'bt_observaciones' => 'max:255',
                // CABLEADO EN M.T.
                "acc_subterraneo_edo" => "required|between:0,1",

                //SUBESTACION PEDESTAL
                "no_codos_occ" => $pedestal === true ? 'required|integer' : '',
                "codos_occ_edo" =>
                intval($request->no_codos_occ) > 0 ? 'required|integer' : 'integer',

                "no_insertos_occ" =>  $pedestal === true ? 'required|integer' : '',
                "insertos_occ_edo" =>    intval($request->no_insertos_occ) > 0 ? 'required|integer' : 'integer',

                "no_adpt_tierra" => $pedestal === true ? 'required|integer' : '',
                "adpt_tierra_edo" => intval($request->no_adpt_tierra) > 0 ? 'required|integer' : 'integer',
                'adpt_tierra_faltante' => 'max:255',

                "no_barras_tierra" => $pedestal === true ? 'required|integer' : '',
                "barras_tierra_edo" =>  intval($request->no_barras_tierra) > 0 ? 'required|integer' : 'integer',
                "barras_tierra_faltante" => 'max:255',
                //SUBESTACION COMPACTA

                "codos_edo" => intval($request->codos) === 1 ? 'required|between:0,1' : '',
                "codos" =>  $compacta === true ? 'required|integer' : '',

                "terminales" =>  $compacta === true ? 'required|integer' : '',
                "terminales_edo" => intval($request->terminales) === 1 ?  'required|between:0,1' : '',

                "fusibles" =>  $compacta === true ? 'required|integer' : '',
                "fusibles_edo" => intval($request->fusibles) === 1 ?  'required|between:0,1' : '',
                "fusibles_capacidad" => intval($request->fusibles) === 1 ? 'required|max:255' : '',
                "fusibles_faltante" => 'max:255',

                "mecanismo" =>  $compacta === true ? 'required|integer' : '',
                'mecanismo_edo' => intval($request->mecanismo) === 1 ?  'required|between:0,1' : '',
                'mecanismo_danado' => 'max:255',

                //SUBESTACION EN GENERAL 
                "se_cable_acomodo_edo" => 'required|between:0,1',

                //MABETE
                'marbete' => 'required|between:0,1',
                'marbete_edo' => intval($request->marbete) === 1 ? $validar : 'between:0,1',
                'marbete_faltante' => 'required|max:255',

                "mt_cableado_observaciones" => 'max:255',

                // CABLEADO EN B.T.
                "bt_cableado_cable_acomodo" => 'required|between:0,1',
                "bt_cableado_conexiones" => 'required|between:0,1',
                "bt_cableado_conexiones_faltante" => "max:255",
                "bt_cableado_conexiones_observaciones" => "max:255",

                //MEDICION DE VOLTAJES
                't_vab' => 'required|integer',
                't_vbc' => 'required|integer',
                't_vbc2' => 'required|integer',
                't_van' =>  'required|integer',
                't_vbn' => 'required|integer',
                't_vcn' => 'required|integer',

                'i_vab' => 'required|integer',
                'i_vbc' => 'required|integer',
                'i_vbc2' => 'required|integer',
                'i_van' =>  'required|integer',
                'i_vbn' => 'required|integer',
                'i_vcn' => 'required|integer',

                'i_ia' => 'required|integer',
                'i_ib' => 'required|integer',
                'i_ic' => 'required|integer',
                'i_in' => 'required|integer',

                'img1' => 'required|image|mimes:png,jpg,jpeg|max:2048',
                'img2' => 'required|image|mimes:png,jpg,jpeg|max:2048',
                'img3' => 'required|image|mimes:png,jpg,jpeg|max:2048',
                'img4' => 'image|mimes:png,jpg,jpeg|max:2048',
                'img5' => 'image|mimes:png,jpg,jpeg|max:2048',
                'img6' => 'image|mimes:png,jpg,jpeg|max:2048',
            ],
            [
                //CANALIZACIONES EN M.T.
                //DESASOLVE
                'disasolve_req.required'
                => 'Canalizaciones en M.T ¿Requiere desasolve?',
                'disasolve_req.between'
                => 'El valor para requiere desasolve debe ser "si" o" no"',
                //DISASOLVE CANTIDAD
                'disasolve_cantidad.required'
                => 'Este campo es requerido',
                'disasolve_cantidad.max'
                => 'Este campo no puede tener más de 255 caracteres',
                //LIMPIEZA DESASOLVE
                'mt_limpieza_req.required'
                => 'Canalizaciones en M.T ¿Requiere limpieza?',
                'mt_limpieza_req.between'
                => 'El valor para requiere limpieza debe ser "si" o" no"',
                // LIMPIEZA DESASOLVE CANTIDAD
                'mt_limpieza_cantidad.required'
                => 'Este campo es requerido',
                'mt_limpieza_cantidad.max'
                => 'Este campo no puede tener más de 255 caracteres',
                // MT - SOPORTERIA
                'ten_media_soporteria.required'
                => 'Canalizaciones en M.T. ¿Se requiere soportería?',
                'ten_media_soporteria_edo.between'
                => 'El valor para el estado de soportería en tensión media debe ser "si" o "no"',
                'ten_media_soporteria_edo.required'
                => 'Canalizaciones en M.T ¿Cuál es el estado de soporteía?',
                'ten_media_soporteria_faltante.required'
                => 'Este campo es requerido',
                // SISTEMAS DE TIERRA
                'sis_tierra.required'
                => 'Canalizaciones en M.T ¿Cuenta con sistema de tierra?',
                'sis_tierra.between'
                => 'El valor para el sistema de tierra debe ser "si" o "no"',
                'sis_tierra_edo.between'
                => 'El valor para el estado sistema de tierra debe ser "si" o "no"',
                'sis_tierra_edo.required'
                =>
                'Canalizaciones en M.T ¿Cuál el estado del sistema de tierra',
                'sis_tierra_faltante.required'
                => 'Este campo es requerido',
                'sis_tierra_faltante.max'
                => 'Este campo no puede tener más de 255 caracteres',
                // CONEX. SISTEMAS TIERRA
                'conex_tierra.required'
                => 'Canalizaciones en M.T ¿Cuenta con conexión a tierra?',
                'conex_tierra.between'
                => 'El valor para la conexión a tierra debe ser "si" o "no"',
                'conex_tierra_edo.between'
                => 'El valor para el estado conexión a tierra debe ser "si" o "no"',
                'conex_tierra_edo.required'
                => 'Canalizaciones en M.T ¿Cuál el estado de la conexión a tierra',
                'conex_tierra_faltante.required'
                => 'Este campo es requerido',
                'conex_tierra_faltante.max'
                => 'Este campo no puede tener más de 255 caracteres',
                // SELLADO DE DUCTERIA
                'sellado_ducteria.required'
                => 'Canalizaciones en M.T ¿Cuenta con sellado de ductería?',
                'sellado_ducteria.between'
                => 'El valor para el sellado de ductería debe ser "si" o "no"',
                'sellado_ducteria_edo.between'
                => 'El valor para el estado sellado de ductería debe ser "si" o "no"',
                'sellado_ducteria_edo.required'
                => 'Canalizaciones en M.T ¿Cuál es el estado del sellado de ductería',
                'sellado_ducteria_faltante.required'
                => 'Este campo es requerido',
                'sellado_ducteria_faltante.max'
                => 'Este campo no puede tener más de 255 caracteres',
                // MT - OBSERVACIONES
                'mt_observaciones.required'
                => 'Este campo es requerido',
                'mt_observaciones.max'
                => 'Este campo no puede tener más de 255 caracteres',
                // CANALIZACIONES EN B.T.
                // TIPO CANALIZACIONES
                'tipo_canalizacion.required'
                => '¿Qué tipo de canalización es?',
                // BT - TORNILLERIA
                'torni.required'
                => '
                CANALIZACIONES EN B.T ¿Cuenta con tornillería?',
                'torni.between'
                => 'El valor para la tornillería debe ser "si" o "no"',
                'torni_cantidad.required'
                => 'Este campo es requerido',
                'torni_cantidad.max'
                => 'Este campo no puede tener más de 255 caracteres',
                'torni_limpieza.required'
                => '
                CANALIZACIONES EN B.T ¿Requiere limpieza la tornillería?',
                'torni_limpieza.between'
                => 'El valor para la limpieza de la tornillería debe ser "si" o "no"',
                // BT - SOPORTERIA
                'bt_soporteria.required'
                => 'Canalizaciones en B.T ¿Se requiere soportería?',
                'bt_soporteria.between'
                => 'El valor para la soportería debe ser "si" o "no"',
                'bt_soporteria_edo.between'
                => 'El valor para el estado de la soportería debe ser "si" o "no"',
                'bt_soporteria_edo.required'
                => '
                CANALIZACIONES EN B.T ¿Cuál es el estado de la soportería?',
                'bt_soporteria_faltante.required'
                => 'Este campo es requerido',
                'bt_soporteria_faltante.max'
                => 'Este campo no puede tener más de 255 caracteres',
                'mb_observaciones.required'
                => 'Este campo es requerido',
                'mb_observaciones.max'
                => 'Este campo no puede tener más de 255 caracteres',
                // INTERRUPTORES EN B.T. 
                'int_no.required'
                => 'Este campo es requerido',
                'int_no.max'
                => 'Este campo no puede tener más de 255 caracteres',
                'int_limpieza.required'
                => 'INTERRUPTORES EN B.T ¿Requieren limpieza los interruptores',
                'int_limpieza.between'
                => 'INTERRUPTORES EN B.T. El valor para la limpieza de los interruptores en debe ser "si" o "no"',
                'int_limpieza_cantidad'
                => 'Este campo es requerido',
                'int_limpieza_cantidad.max'
                => 'Este campo no puede tener más de 255 caracteres',
                'int_edo'
                => 'INTERRUPTORES EN B.T ¿Cual es estado de los interruptores y/o gabinetes',
                'int_edo.between'
                => 'El valor para el estado de los interruptores en B.T. debe ser "si" o "no"',
                'int_torni'
                => 'INTERRUPTORES EN B.T ¿Los interruptores requieren tornillería?',
                'int_torni.between'
                => 'El valor para la tornillería debe ser "si" o "no"',
                'int_senalizacion.required'
                => 'INTERRUPTORES EN B.T ¿Cuenta con  señalización?',
                'int_senalizacion.between'
                => 'El valor para la señalización debe ser "si" o "no"',
                'int_senalizacion_edo.between'
                => 'El valor para el estado de la señalización debe ser "si" o "no"',
                'int_senalizacion_edo.required'
                => 'INTERRUPTORES EN B.T ¿Cuál es el estado de la señalización',
                'int_senalizacion_faltante.required'
                => 'Este campo es requerido',
                'int_senalizacion_faltante.max'
                => 'Este campo no puede tener más de 255 caracteres',
                //SENALIZACION CIRCUITOS
                'circuitos.required'
                => 'INTERRUPTORES EN B.T ¿Cuenta con señalización de circuitos?',
                'circuitos.between'
                => 'El valor para la señalización de circuitos debe ser "si" o "no"',
                'circuitos_edo.between'
                => 'El valor para el estado de la señalización de circuitos debe ser "si" o "no"',
                'circuitos_edo.required'
                => 'INTERRUPTORES EN B.T ¿Cuál es el estado de la señalización de circuitos',
                'circuitos_faltante.required'
                => 'Este campo es requerido',
                'circuitos_faltante.max'
                => 'Este campo no puede tener más de 255 caracteres',
                'disponible.required'
                => 'INTERRUPTORES EN B.T ¿Cuenta con espacios disponibles?',
                'disponible.between'
                => 'El valor para los espacios disponibles debe ser "si" o "no"',
                'disponible_cantidad.required'
                => 'Este campo es requerido',
                'disponible_cantidad.integer'
                => 'Sólo numeros',
                'disponible_faltante.required'
                => 'Este campo es requerido',
                'disponible_faltante.integer'
                => 'Sólo numeros',

                'bt_observaciones.required'
                => 'Este campo es requerido',
                'bt_observaciones.max'
                => 'Este campo no puede tener más de 255 caracteres',

                //CABLEADO EN M.T.
                'acc_subterraneo_edo.required'
                => 'CABLEADO EN M.T ¿Cuál es el estado de los accesorios subterráneos?',

                //PEDESTAL*********
                "no_codos_occ.required" => "Este campo es requerido",
                "no_codos_occ.integer" => "Sólo cantidades",
                "codos_occ_edo.required" => "Cableado en M.T ¿Cuál es el estado de los codos OCC?",
                "codos_occ_edo.between" => "El valor para la el estado de los codos debe ser 'si' o 'no'",

                "no_insertos_occ.required" =>  "Este campo es requerido",
                "no_insertos_occ.integer" => "Sólo cantidades",
                "insertos_occ_edo.required" => "Cableado en M.T ¿Cúal es el estado de los insertos?",
                "insertos_occ_edo.between" => "El valor para la el estado de los insertos debe ser 'si' o 'no'",

                "no_adpt_tierra.required" =>  "Este campo es requerido",
                "no_adpt_tierra.integer" => "Sólo cantidades",

                "adpt_tierra_edo.required" => "Cableado en M.T ¿Cúal es el estado de los adaptadores de tierra?",
                "adpt_tierra_edo.between" => "El valor para la el estado de los adaptadores de tierra debe ser 'si' o 'no'",

                'adpt_tierra_faltante.max'
                => 'Este campo no puede tener más de 255 caracteres',

                "no_barras_tierra.required" => "Este campo es requerido",
                "no_barras_tierra.integer" => 'Sólo cantidades',
                "barras_tierra_faltante" => 'Este campo no puede tener más de 255 caracteres',

                "barras_tierra_edo.required" => "Cableado en M.T ¿Cúal es el estado de las barras de tierra?",
                "barras_tierra_edo.between" => "El valor para la el estado de las barras de tierra debe ser 'si' o 'no'",
                // COMPACTA **** 
                'codos_edo.required'
                => 'CABLEADO EN M.T ¿Cuál es el estado de los codos?',
                'codos_edo.between'
                => 'El valor para la el estado de los codos debe ser "si" o "no"',

                'codos.required'
                => 'CABLEADO EN M.T ¿Cuenta con codos?',
                'codos.integer'
                => 'Sólo cantidades',

                "terminales_edo.required"
                => 'CABLEADO EN M.T ¿Cuál es el estado de las terminales?',
                "terminales_edo.between"
                => 'El valor para la el estado de los terminales debe ser "si" o "no"',
                "terminales.required"
                => 'CABLEADO EN M.T ¿Cuenta con terminales?',
                "terminales.integer"
                => 'Sólo cantidades',


                "mecanismo.required"
                => 'CABLEADO EN M.T ¿Cuenta con mecanismo?',
                "mecanismo.integer"
                => 'Sólo cantidades', 
                "mecanismo_edo.required" => "CABLEADO EN M.T ¿Cuál es el estado de los mecanismos?",

                "mecanismo_edo.between" => "El valor para la el estado de los mecanismos debe ser 'si' o 'no'",

                "mecanismo_danado.max" => "Este campo no puede tener más de 255 caracteres",

                //fusibles
                "fusibles_edo.required"
                => 'CABLEADO EN M.T ¿Cuál es el estado de las fusibles?',
                "fusibles_edo.between"
                => 'El valor para la el estado de los fusibles debe ser "si" o "no"',
                "fusibles.required"
                => 'CABLEADO EN M.T ¿Cuenta con fusibles?',
                "fusibles.integer"
                => 'Sólo cantidades',

                "fusibles_capacidad.required" => "Este campo es requerido",
                "fusibles_capacidad.max" => "Este campo no puede tener más de 255 caracteres",

                "fusibles_faltante.max" => "Este campo no puede tener más de 255 caracteres",

                //SUBESTACIONES GENERAL
                "se_cable_acomodo_edo.required"
                => "CABLEADO EN M.T ¿Cómo se encuentra el acomodo de cable?",

                "se_cable_acomodo_edo.between"
                => 'El valor para la el estado del acomodo de cable  debe ser "si" o "no"',

                'marbete.required' =>
                "CABLEADO EN M.T ¿Cuenta con ID los marbetes?",
                'marbete.between'
                => 'El valor para la ID de los marbetes deben ser "si" o "no"',
                'marbete_edo.between'
                => 'El valor para el estado de los IDs de marbetes debe ser "si" o "no"',
                'marbete_edo.required'
                => 'CABLEADO EN M.T  ¿Cuál es el estado de los IDs de marbetes?',
                'marbete_faltante.required'
                => 'Este campo es requerido',
                'marbete_faltante.max'
                => 'Este campo no puede tener más de 255 caracteres',

                "mt_cableado_observaciones.max"
                => "Este campo no puede tener más de 255 caracteres",
                //CABLEADO EN B.T.
                "bt_cableado_cable_acomodo.required"
                => "CABLEADO EN B.T ¿Cómo se encuentra el acomodo de cable?",

                "bt_cableado_cable_acomodo.between"
                => 'El valor para la el estado del acomodo de cable  debe ser "si" o "no"',
                "bt_cableado_conexiones.required"
                => "CABLEADO EN B.T ¿Cuál es el estado de las conexiones?",

                "bt_cableado_conexiones.between"
                => "El valor para la el estado de las conexiones debe ser 'si' o 'no'",

                "bt_cableado_conexiones_faltante.max"
                => "Este campo no puede tener más de 255 caracteres",

                "bt_cableado_conexiones_observaciones.max"
                => "Este campo no puede tener más de 255 caracteres",

                // MEDICION DE VOLTAJES
                't_vab.required'
                => 'Este campo es requerido',
                't_vab.integer'
                => 'Sólo cantidades',

                't_vbc.required'
                => 'Este campo es requerido',
                't_vbc.integer'
                => 'Sólo cantidades',

                't_vbc2.required'
                => 'Este campo es requerido',
                't_vbc2.integer'
                => 'Sólo cantidades',

                't_van.required'
                => 'Este campo es requerido',
                't_van.integer'
                => 'Sólo cantidades',

                't_vbn.required'
                => 'Este campo es requerido',
                't_vbn.integer'
                => 'Sólo cantidades',

                't_vcn.required'
                => 'Este campo es requerido',
                't_vcn.integer'
                => 'Sólo cantidades',


                'i_vab.required'
                => 'Este campo es requerido',
                'i_vab.integer'
                => 'Sólo cantidades',

                'i_vbc.required'
                => 'Este campo es requerido',
                'i_vbc.integer'
                => 'Sólo cantidades',

                'i_vbc2.required'
                => 'Este campo es requerido',
                'i_vbc2.integer'
                => 'Sólo cantidades',

                'i_van.required'
                => 'Este campo es requerido',
                'i_van.integer'
                => 'Sólo cantidades',

                'i_vbn.required'
                => 'Este campo es requerido',
                'i_vbn.integer'
                => 'Sólo cantidades',

                'i_vcn.required'
                => 'Este campo es requerido',
                'i_vcn.integer'
                => 'Sólo cantidades',

                'i_ia.required'
                => 'Este campo es requerido',
                'i_ia.integer'
                => 'Sólo cantidades',

                'i_ib.required'
                => 'Este campo es requerido',
                'i_ib.integer'
                => 'Sólo cantidades',

                'i_ic.required'
                => 'Este campo es requerido',
                'i_ic.integer'
                => 'Sólo cantidades',

                'i_in.required'
                => 'Este campo es requerido',
                'i_in.integer'
                => 'Sólo cantidades',

                'img1.required'
                => 'Este campo es requerido',
                'img1.image'
                => 'El archivo debe ser una imagen',
                'img1.mimes'
                => 'El archivo debe ser una imagen con formato png, jpg o jpeg',
                'img1.max'
                => 'El archivo no puede pesar más de 2MB',

                'img2.required'
                => 'Este campo es requerido',
                'img2.image'
                => 'El archivo debe ser una imagen',
                'img2.mimes'
                => 'El archivo debe ser una imagen con formato png, jpg o jpeg',
                'img2.max'
                => 'El archivo no puede pesar más de 2MB',

                'img3.required'
                => 'Este campo es requerido',
                'img3.image'
                => 'El archivo debe ser una imagen',
                'img3.mimes'
                => 'El archivo debe ser una imagen con formato png, jpg o jpeg',
                'img3.max'
                => 'El archivo no puede pesar más de 2MB',

                'img4.image'
                => 'El archivo debe ser una imagen',
                'img4.mimes'
                => 'El archivo debe ser una imagen con formato png, jpg o jpeg',
                'img4.max'
                => 'El archivo no puede pesar más de 2MB',

                'img5.image'
                => 'El archivo debe ser una imagen',
                'img5.mimes'
                => 'El archivo debe ser una imagen con formato png, jpg o jpeg',
                'img5.max'
                => 'El archivo no puede pesar más de 2MB',

                'img6.image'
                => 'El archivo debe ser una imagen',
                'img6.mimes'
                => 'El archivo debe ser una imagen con formato png, jpg o jpeg',
                'img6.max'
                => 'El archivo no puede pesar más de 2MB',
            ],
        );

        if ($validated->fails()) {
            return response()->json(['response' => false, 'errors' => $validated->errors()]);
        }

        $existe_reporte = Rep_electrica::where('inspeccion_id', $request->inspeccion_id)->first();

        if ($existe_reporte) {
            return response()->json(['response' => false, 'message' => 'Este reporte ya existe']);
        }

        $r_e = new Rep_electrica();
        $r_e->inspeccion_id = $request->inspeccion_id;
        $r_e->disasolve_req = $request->disasolve_req;
        $r_e->disasolve_cantidad = $request->disasolve_cantidad;
        $r_e->mt_limpieza_req = $request->mt_limpieza_req;
        $r_e->mt_limpieza_cantidad = $request->mt_limpieza_cantidad;
        $r_e->ten_media_soporteria = $request->ten_media_soporteria;
        $r_e->ten_media_soporteria_edo = $request->ten_media_soporteria_edo;
        $r_e->ten_media_soporteria_faltante = $request->ten_media_soporteria_faltante;
        $r_e->sis_tierra = $request->sis_tierra;
        $r_e->sis_tierra_edo = $request->sis_tierra_edo;
        $r_e->sis_tierra_faltante = $request->sis_tierra_faltante;
        $r_e->mt_observaciones = $request->mt_observaciones;
        $r_e->conex_tierra = $request->conex_tierra;
        $r_e->conex_tierra_edo = $request->conex_tierra_edo;
        $r_e->conex_tierra_faltante = $request->conex_tierra_faltante;
        $r_e->sellado_ducteria = $request->sellado_ducteria;
        $r_e->sellado_ducteria_edo = $request->sellado_ducteria_edo;
        $r_e->sellado_ducteria_faltante = $request->sellado_ducteria_faltante;
        $r_e->tipo_canalizacion = $request->tipo_canalizacion;
        $r_e->torni = $request->torni;
        $r_e->torni_cantidad = $request->torni_cantidad;
        $r_e->torni_limpieza = $request->torni_limpieza;
        $r_e->bt_soporteria = $request->bt_soporteria;
        $r_e->bt_soporteria_edo = $request->bt_soporteria_edo;
        $r_e->bt_soporteria_faltante = $request->bt_soporteria_faltante;
        $r_e->mb_observaciones = $request->mb_observaciones;

        $r_e->int_no = $request->int_no;
        $r_e->int_limpieza_cantidad = $request->int_limpieza_cantidad;
        $r_e->int_limpieza = $request->int_limpieza;
        $r_e->int_edo = $request->int_edo;
        $r_e->int_torni = $request->int_torni;
        $r_e->int_senalizacion = $request->int_senalizacion;
        $r_e->int_senalizacion_edo = $request->int_senalizacion_edo;
        $r_e->int_senalizacion_faltante = $request->int_senalizacion_faltante;
        $r_e->circuitos = $request->circuitos;
        $r_e->circuitos_edo = $request->circuitos_edo;
        $r_e->circuitos_faltante = $request->circuitos_faltante;
        $r_e->disponible = $request->disponible;
        $r_e->disponible_cantidad = $request->disponible_cantidad;
        $r_e->disponible_faltante = $request->disponible_faltante;
        $r_e->bt_observaciones = $request->bt_observaciones;

        $r_e->acc_subterraneo_edo = $request->acc_subterraneo_edo;

        //PEDESTAL
        $r_e->no_codos_occ
            = $request->no_codos_occ;
        $r_e->codos_occ_edo
            = $request->codos_occ_edo;

        $r_e->no_insertos_occ
            = $request->no_insertos_occ;

        $r_e->insertos_occ_edo
            = $request->insertos_occ_edo;

        $r_e->no_adpt_tierra = $request->no_adpt_tierra;
        $r_e->adpt_tierra_edo = $request->adpt_tierra_edo;
        $r_e->adpt_tierra_faltante = $request->adpt_tierra_faltante;

        $r_e->no_barras_tierra = $request->no_barras_tierra;;
        $r_e->barras_tierra_edo = $request->barras_tierra_edo;
        $r_e->barras_tierra_faltante = $request->barras_tierra_faltante;
        //COMPACTA
        $r_e->codos_edo = $request->codos_edo;
        $r_e->codos = $request->codos;
        $r_e->terminales_edo = $request->terminales_edo;
        $r_e->terminales = $request->terminales;

        $r_e->fusibles = $request->fusibles;
        $r_e->fusibles_edo = $request->fusibles_edo;
        $r_e->fusibles_faltante = $request->fusibles_faltante;
        $r_e->fusibles_capacidad = $request->fusibles_capacidad;

        $r_e->mecanismo = $request->mecanismo;
        $r_e->mecanismo_edo = $request->mecanismo_edo;
        $r_e->mecanismo_danado = $request->mecanismo_danado;


        //SUBESTACIONES EN GENERAL
        $r_e->se_cable_acomodo_edo = $request->se_cable_acomodo_edo;
        $r_e->marbete = $request->marbete;
        $r_e->marbete_edo = $request->marbete_edo;
        $r_e->marbete_faltante = $request->marbete_faltante;

        $r_e->mt_cableado_observaciones = $request->mt_cableado_observaciones;

        $r_e->bt_cableado_cable_acomodo = $request->bt_cableado_cable_acomodo;
        $r_e->bt_cableado_conexiones = $request->bt_cableado_conexiones;
        $r_e->bt_cableado_conexiones_faltante = $request->bt_cableado_conexiones_faltante;
        $r_e->bt_cableado_conexiones_observaciones = $request->bt_cableado_conexiones_observaciones;

        $r_e->t_vab = $request->t_vab;
        $r_e->t_vbc = $request->t_vbc;
        $r_e->t_vbc2 = $request->t_vbc2;
        $r_e->t_van = $request->t_van;
        $r_e->t_vbn = $request->t_vbn;
        $r_e->t_vcn = $request->t_vcn;

        $r_e->i_vab = $request->i_vab;
        $r_e->i_vbc = $request->i_vbc;
        $r_e->i_vbc2 = $request->i_vbc2;
        $r_e->i_van = $request->i_van;
        $r_e->i_vbn = $request->i_vbn;
        $r_e->i_vcn = $request->i_vcn;

        $r_e->i_ia = $request->i_ia;
        $r_e->i_ib = $request->i_ib;
        $r_e->i_ic = $request->i_ic;
        $r_e->i_in  = $request->i_in;

        if ($request->img1 != null && $request->img1 != 'undefined') {
            $imageName = $request->inspeccion_id .  '_img1_' . auth()->id() . '.' . $request->img1->extension();
            $request->img1->move(storage_path('images/reportes/electrica/'.$request->inspeccion_id), $imageName);
            $r_e->img1 = $imageName;
        }

        if ($request->img2 != null && $request->img2 != 'undefined') {
            $imageName = $request->inspeccion_id .  '_img2_' . auth()->id() . '.' . $request->img2->extension();

            $request->img2->move(storage_path('images/reportes/electrica/'.$request->inspeccion_id), $imageName);
            $r_e->img2 = $imageName;
        }

        if ($request->img3 != null && $request->img3 != 'undefined') {
            $imageName = $request->inspeccion_id .  '_img3_' . auth()->id() . '.' . $request->img3->extension();$request->img3->extension();

            $request->img3->move(storage_path('images/reportes/electrica/'.$request->inspeccion_id), $imageName);
            $r_e->img3 = $imageName;
        }

        if ($request->img4 != null && $request->img4 != 'undefined') {
                $imageName = $request->inspeccion_id .  '_img4_' . auth()->id() . '.' . $request->img4->extension();

            $request->img4->move(storage_path('images/reportes/electrica/'.$request->inspeccion_id), $imageName);
            $r_e->img4 = $imageName;
        }

        if ($request->img5 != null && $request->img5 != 'undefined') {
                $imageName = $request->inspeccion_id .  '_img5_' . auth()->id() . '.' . $request->img5->extension();

            $request->img5->move(storage_path('images/reportes/electrica/'.$request->inspeccion_id), $imageName);
            $r_e->img5 = $imageName;
        }

        if ($request->img6 != null && $request->img6 != 'undefined') {
            $imageName = $request->inspeccion_id .  '_img6_' . auth()->id() . '.' . $request->img6->extension();

            $request->img6->move(storage_path('images/reportes/electrica/'.$request->inspeccion_id), $imageName);
            $r_e->img6 = $imageName;
        }
        $r_e->status_id = 5;

        $r = $r_e->save();
        if ($r) {
            $inspeccion = Inspecciones::find($request->inspeccion_id);
            $inspeccion->porcentaje = $inspeccion->porcentaje + 34;
            if(  $inspeccion->porcentaje >= 100 ){
                $inspeccion->status_id = 5;

                $date = date('Y-m-d H:i:s');
                $inspeccion->fecha_fin = $date;  
            }
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
            $cadena = Str::random(6);
            $imageName = 'anomalia' . $cadena . '.' . $request->imagen->extension();
            $request->imagen->move(storage_path('images/anomalias/'. $request->inspeccion_id), $imageName);
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
