@extends('template._tecnico_inspecciones_template')

@section('test_body')
    <!-- form -->
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <style>
                    label {
                        font-size: 0.875rem !important;
                        line-height: 1.25rem !important;
                    }

                    input {
                        font-size: 0.875rem !important;
                        line-height: 1.25rem !important;
                    }
                </style>
                <form class="form-sample needs-validation" id="form-inspecciones" novalidate
                    onsubmit="event.preventDefault(); saveInspeccion({{ $inspeccion->id }})">
                    {{-- DATOS GENERALES --}}
                    <div class="grid gap-5">
                        <p class="font-bold">Datos generales</p>
                        <div class="row">
                            <div class="col-md-6 row">
                                <label class="col-sm-3">Parque:</label>
                                <div class="col-sm-9">
                                    <input class="form-control" readonly=»readonly» type="text"
                                        value="{{ $inspeccion->parque->parque }}">
                                </div>
                            </div>
                            <div class="col-md-6 row">
                                <label class="col-sm-3">Cliente:</label>
                                <div class="col-sm-9">
                                    <input class="form-control" readonly=»readonly» type="text"
                                        value="{{ $inspeccion->enterprise->enterprise }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 row">
                                <label class="col-sm-3">Subestación:</label>
                                <div class="col-sm-9">
                                    <input class="form-control" readonly=»readonly» type="text"
                                        value="{{ $inspeccion->subestacion->subestacion }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 row">
                                <label class="col-sm-3">Otorgada en:</label>
                                <div class="col-sm-9">
                                    <input class="form-control" readonly=»readonly» type="text"
                                        value="{{ $inspeccion->fecha_inicio }}" />
                                </div>
                            </div>
                            <div class="col-md-6 row">
                                <label class="col-sm-3">Iniciada en:</label>
                                <div class="col-sm-9">
                                    <input class="form-control" readonly=»readonly» type="text"
                                        value="{{ $inspeccion->fecha_comienzo }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    {{-- INICIA ENCUESTA --}}
                    <input id="inspeccion_id" name="inspeccion_id" type="hidden" value="{{ $inspeccion->id }}">

                    <div class="grid gap-5">
                        {{-- CANALIZACIONES EN M.T --}}
                        <p class="font-bold">Canalizaciones en M.T.</p>

                        {{-- DISASOLVE --}}
                        <div class="row">
                            <div class="col-md-7">
                                <div class="row">
                                    <label class="col-md-3" for="disasolve_req">Requiere desasolve</label>
                                    <div class="col-md-9 flex">
                                        <div class="form-radio flex w-1/2 justify-center">
                                            <input existe='1' id="disasolve_req_si" name="disasolve_req" type="radio"
                                                value=1>
                                            <label class="ml-1" for="disasolve_req">Si</label>
                                        </div>
                                        <div class="form-radio flex w-1/2 justify-center">
                                            <input id="disasolve_req_no"type="radio" name="disasolve_req"
                                                value="0"existe='1'>
                                            <label for="disasolve_req"class="ml-1">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="row">
                                    <label class="col-md-3" for="disasolve_cantidad">Cantidad (desasolve)</label>
                                    <div class="col-md-9">
                                        <input class="form-control" existe='1' id="disasolve_cantidad"
                                            name="disasolve_cantidad" requerido_generico=1 type="text" />
                                        <div id="disasolve_cantidad_error"class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- LIMPIEZA --}}
                        <div class="row">
                            <div class="col-md-7">
                                <div class="row">
                                    <label class="col-md-3" for="mt_limpieza_req">Requiere limpieza (desasolve):</label>
                                    <div class="col-md-9 flex">
                                        <div class="form-radio flex w-1/2 justify-center">
                                            <input id="mt_limpieza_req_si" name="mt_limpieza_req" type="radio"
                                                value="1"existe='1'>
                                            <label class="ml-1">Si</label>
                                        </div>
                                        {{-- ANOMALIA PINTURA --}}
                                        <div class="form-radio flex w-1/2 justify-center">
                                            <input name="mt_limpieza_req" type="radio"
                                                value="0"id="mt_limpieza_req_no"existe='1'>
                                            <label class="ml-1">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="row">
                                    <label class="col-md-3" for="mt_limpieza_cantidad">Cantidad (limpieza)</label>
                                    <div class="col-md-9">
                                        <input class="form-control" existe='1' id="mt_limpieza_cantidad"
                                            name="mt_limpieza_cantidad" requerido_generico=1 type="text" />
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Soporteria --}}
                        <div class="row">
                            <div class="col-md-7">
                                <div class="row">
                                    <label class="col-md-2" for="ten_media_soporteria">Soportería</label>
                                    <div class="col-md-10 flex">
                                        <div class="form-radio flex w-1/4 justify-center">
                                            <input existe='1' id="ten_media_soporteria_si"
                                                name="ten_media_soporteria" tipo="ten_media_soporteria" type="radio"
                                                value=1>
                                            <label class="ml-1" for="ten_media_soporteria"
                                                tipo="ten_media_soporteria">Si</label>
                                        </div>
                                        <div class="form-radio flex w-1/4 justify-center">
                                            <input class="" existe='1'
                                                id="ten_media_soporteria_no"type="radio" name="ten_media_soporteria"
                                                tipo="ten_media_soporteria" value=0>
                                            <label class="ml-1" for="ten_media_soporteria"
                                                tipo="ten_media_soporteria">No</label>
                                        </div>
                                        <div class="form-radio flex w-1/4 justify-center">
                                            <input disabled existe='1' id="ten_media_soporteria_edo_si"
                                                name="ten_media_soporteria_edo" tipo="ten_media_soporteria"
                                                type="radio" value="1">
                                            <label class="ml-1 opacity-50" for="ten_media_soporteria_edo"
                                                tipo="ten_media_soporteria">Buen
                                                estado</label>
                                        </div>
                                        {{-- ANOMALIA SOPORTERIA --}}
                                        <div class="form-radio flex w-1/4 justify-center">
                                            <input class="" disabled existe='1'
                                                id="ten_media_soporteria_edo_no"type="radio"
                                                name="ten_media_soporteria_edo" onclick="handleAnomalia(this.name)"
                                                tipo="ten_media_soporteria" value="0">
                                            <label class="ml-1 opacity-50" for="ten_media_soporteria_edo"
                                                tipo="ten_media_soporteria">Mal
                                                estado</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="row">
                                    <label class="col-md-3" for="ten_media_soporteria_faltante">Faltante</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="ten_media_soporteria_faltante"existe='1'
                                            name="ten_media_soporteria_faltante" requerido_generico=1 type="text" />
                                        <div id="ten_media_soporteria_faltante_error"class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Sistema de tierra --}}
                        <div class="row">
                            <div class="col-md-7">
                                <div class="row">
                                    <label class="col-md-2" for="sis_tierra">Sistema de tierra</label>
                                    <div class="col-md-10 flex">
                                        <div class="form-radio flex w-1/4 justify-center">
                                            <input existe='1' id="sis_tierra_si"type="radio" name="sis_tierra"
                                                tipo="sis_tierra" value=1>
                                            <label class="ml-1" for="sis_tierra" tipo="sis_tierra">Si</label>
                                        </div>
                                        <div class="form-radio flex w-1/4 justify-center">
                                            <input class="" existe='1' id="sis_tierra_no"type="radio"
                                                name="sis_tierra" tipo="sis_tierra" value=0>
                                            <label class="ml-1" for="sis_tierra" tipo="sis_tierra">No</label>
                                        </div>
                                        <div class="form-radio flex w-1/4 justify-center">
                                            <input disabled existe='1' id="sis_tierra_edo_si"type="radio"
                                                name="sis_tierra_edo" tipo="sis_tierra" value=1>
                                            <label class="ml-1 opacity-50" for="sis_tierra_edo" tipo="sis_tierra">Buen
                                                estado</label>
                                        </div>
                                        {{-- ANOMALIA TIERRA --}}
                                        <div class="form-radio flex w-1/4 justify-center">
                                            <input disabled existe='1' id="sis_tierra_edo_no"type="radio"
                                                name="sis_tierra_edo" onclick="handleAnomalia(this.name)"
                                                tipo="sis_tierra" value=0>
                                            <label class="ml-1 opacity-50" for="sis_tierra_edo" tipo="sis_tierra">Mal
                                                estado</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="row">
                                    <label class="col-md-3" for="sis_tierra_faltante">Faltante</label>
                                    <div class="col-md-9">
                                        <input class="form-control" existe='1' name="sis_tierra_faltante"
                                            requerido_generico=1 type="text" />
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Conexión de tierra --}}
                        <div class="row">
                            <div class="col-md-7">
                                <div class="row">
                                    <label class="col-md-2" for="conex_tierra">Conexión de tierra</label>
                                    <div class="col-md-10 flex">
                                        <div class="form-radio flex w-1/4 justify-center">
                                            <input existe='1' id="conex_tierra_si"type="radio" name="conex_tierra"
                                                tipo="conex_tierra" value=1>
                                            <label class="ml-1" for="conex_tierra" tipo="conex_tierra">Si</label>
                                        </div>
                                        <div class="form-radio flex w-1/4 justify-center">
                                            <input existe='1' id="conex_tierra_no"type="radio" name="conex_tierra"
                                                tipo="conex_tierra" value=0>
                                            <label class="ml-1" for="conex_tierra" tipo="conex_tierra">No</label>
                                        </div>
                                        <div class="form-radio flex w-1/4 justify-center">
                                            <input disabled existe='1' id="conex_tierra_edo_si"type="radio"
                                                name="conex_tierra_edo" tipo="conex_tierra" value=1>
                                            <label class="ml-1 opacity-50" for="conex_tierra_edo"
                                                tipo="conex_tierra">Buen
                                                estado</label>
                                        </div>
                                        {{-- ANOMALIA TIERRA --}}
                                        <div class="form-radio flex w-1/4 justify-center">
                                            <input disabled existe='1' id="conex_tierra_edo_no"type="radio"
                                                name="conex_tierra_edo" onclick="handleAnomalia(this.name)"
                                                tipo="conex_tierra" value=0>
                                            <label class="ml-1 opacity-50" for="conex_tierra_edo" tipo="conex_tierra">Mal
                                                estado</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="row">
                                    <label class="col-md-3" for="conex_tierra_faltante">Faltante</label>
                                    <div class="col-md-9">
                                        <input class="form-control" existe='1' name="conex_tierra_faltante"
                                            requerido_generico=1 type="text" />
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Sellado de ductería --}}
                        <div class="row">
                            <div class="col-md-7">
                                <div class="row">
                                    <label class="col-md-2" for="sellado_ducteria">Sellado de ductería</label>
                                    <div class="col-md-10 flex">
                                        <div class="form-radio flex w-1/4 justify-center">
                                            <input existe='1' id="sellado_ducteria_si"type="radio"
                                                name="sellado_ducteria" tipo="sellado_ducteria" value=1>
                                            <label class="ml-1" for="sellado_ducteria"
                                                tipo="sellado_ducteria">Si</label>
                                        </div>
                                        <div class="form-radio flex w-1/4 justify-center">
                                            <input existe='1' id="sellado_ducteria_no"type="radio"
                                                name="sellado_ducteria" tipo="sellado_ducteria" value=0>
                                            <label class="ml-1" for="sellado_ducteria"
                                                tipo="sellado_ducteria">No</label>
                                        </div>
                                        <div class="form-radio flex w-1/4 justify-center">
                                            <input disabled existe='1' id="sellado_ducteria_edo_si"type="radio"
                                                name="sellado_ducteria_edo" tipo="sellado_ducteria" value=1>
                                            <label class="ml-1 opacity-50" for="sellado_ducteria_edo"
                                                tipo="sellado_ducteria">Buen
                                                estado</label>
                                        </div>
                                        {{-- ANOMALIA DUCTERIA --}}
                                        <div class="form-radio flex w-1/4 justify-center">
                                            <input disabled existe='1' id="sellado_ducteria_edo_no"type="radio"
                                                name="sellado_ducteria_edo" onclick="handleAnomalia(this.name)"
                                                tipo="sellado_ducteria" value=0>
                                            <label class="ml-1 opacity-50" for="sellado_ducteria_edo"
                                                tipo="sellado_ducteria">Mal
                                                estado</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="row">
                                    <label class="col-md-3" for="sellado_ducteria_faltante">Faltante</label>
                                    <div class="col-md-9">
                                        <input class="form-control" existe='1' name="sellado_ducteria_faltante"
                                            requerido_generico=1 type="text" />
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- m.t observaciones  --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="mt_observaciones">Observaciones:</label>
                                    <textarea class="form-control" existe='1'requerido_generico=1 id="mt_observaciones" name="mt_observaciones"
                                        rows="5"></textarea>
                                    <div id="mt_observaciones_error"class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>

                        {{-- CANALIZACIONES EN B.T. --}}
                        <label class="font-bold">Canalizaciones en B.T.</label>
                        <div class="row flex justify-between">
                            <p class="col-md-2 self-center">Tipo canalizaciones</p>
                        </div>
                        {{-- tipo canalizacion --}}
                        <div class="row">
                            <div class="col-md-4">
                                <input existe='1'onclick="disableOtro()" type="radio"name="tipo_canalizacion"
                                    value="T.conduit"> <label class="ml-1">T. conduit
                                </label></input>
                            </div>
                            <div class="col-md-4">
                                <input existe='1'onclick="disableOtro()" name="tipo_canalizacion" type="radio"
                                    value="Charola">
                                <label class="ml-1">Charola</label></input>
                            </div>
                            <div class="col-md-4">
                                <div class="">
                                    <input type="radio"
                                        value="0"id="tipo_canalizacion_otro"existe='1'name="tipo_canalizacion">
                                    <label class="ml-1">Otro:
                                    </label>
                                    <input class="form-control ml-3 self-center"disabled existe='1'
                                        id="tipo_canalizacion_otro_input"type="text" name="tipo_canalizacion"
                                        requerido_generico=1 />
                                </div>
                            </div>
                        </div>
                        {{-- requiere tornilleria --}}
                        <div class="row">
                            <p class="col-md-2 self-center">Requiere tornillería</p>
                            <div class="col-md-4 flex">
                                <div class="form-radio flex w-2/4 justify-center">
                                    <input existe='1' name="torni" tipo="torni" type="radio" value=1>
                                    <label class="ml-1" for="torni" tipo="torni">Si</label>
                                </div>
                                <div class="form-radio flex w-2/4 justify-center">
                                    <input existe='1' name="torni" tipo="torni" type="radio" value=0>
                                    <label class="ml-1" for="torni" tipo="torni">No</label>
                                </div>
                            </div>
                            <p class="col-md-2 self-center">Cantidad (tornillería)</p>
                            <div class="col-md-4">
                                <input class="form-control" existe='1' name="torni_cantidad" requerido_generico=1
                                    type="text" />
                                <div class="invalid-feedback"></div>
                            </div>

                        </div>
                        {{-- LIMPIEZA --}}
                        <div class="row">
                            <p class="col-md-2 self-center">Requiere limpieza (tornillería)</p>
                            <div class="col-md-4 flex">
                                <div class="form-radio flex w-2/4 justify-center">
                                    <input name="torni_limpieza" type="radio" value="1"existe='1'>
                                    <label class="ml-1">Si</label>
                                </div>
                                {{-- ANOMALIA PINTURA --}}
                                <div class="form-radio flex w-2/4 justify-center">
                                    <input existe='1' name="torni_limpieza" type="radio" value="0">
                                    <label class="ml-1">No</label>
                                </div>
                            </div>
                            <p class="col-md-2 self-center">Cantidad (limpieza)</p>
                            <div class="col-md-4">
                                <input class="form-control" existe='1' id="mt_limpieza_cantidad"
                                    name="mt_limpieza_cantidad" requerido_generico=1 type="text" />
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <p class="font-bold">Imagenes (3 requeridas)</p>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input accept=".png, .jpg, .jpeg"existe='1' class="form-control"
                                            id="img1" name="img1" type="file" />
                                        <div id="img1_error"class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input accept=".png, .jpg, .jpeg" class="form-control"id="img2"
                                            existe='1' name="img2" type="file" />
                                        <div id="img2_error"class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input accept=".png, .jpg, .jpeg" class="form-control" existe='1'
                                            name="img3"id="img3" type="file" />
                                        <div id="img3_error"class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input accept=".png, .jpg, .jpeg" class="form-control" existe='1'
                                            name="img4"id="img4" type="file" />
                                        <div id="img4_error"class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input accept=".png, .jpg, .jpeg" class="form-control"
                                            name="img5"id="img5"existe='1' type="file" />
                                        <div id="img5_error"class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input accept=".png, .jpg, .jpeg" class="form-control"
                                            name="img6"id="img6"existe='1' type="file" />
                                        <div id="img6_error"class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-success mr-2" type="submit">Guardar</button>
                    <button id="btn-cancelar" type="button"class="btn btn-light">Cancelar</button>
                </form>
                <!-- fin form -->
            </div>
        </div>
    </div>
@endsection
