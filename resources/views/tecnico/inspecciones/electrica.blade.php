@extends('template._tecnico_inspecciones_template')

@section('test_body')
    <div class="card">
        @include('tecnico.inspecciones.header.datos_generales')
        {{-- INICIA ENCUESTA --}}
        <input id="inspeccion_id" name="inspeccion_id" type="hidden" value="{{ $inspeccion->id }}">
        <div class="grid gap-8 p-5" gap-parent>
            <p class="font-bold">CANALIZACIONES EN M.T.</p>
            {{-- DISASOLVE --}}
            <div class="row" mt>
                <div class="col-md-7">
                    <div class="row">
                        <label class="col-md-3" for="disasolve_req">Requiere desasolve</label>
                        <div blue class="col-md-9 flex" my>
                            <div class="flex w-1/2 justify-center">
                                <input existe='1' id="disasolve_req_si" name="disasolve_req" type="radio" value=1>
                                <label class="ml-1" for="disasolve_req">Si</label>
                            </div>
                            <div class="flex w-1/2 justify-center">
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
                        <div class="col-md-9" my>
                            <input class="form-control" existe='1' id="disasolve_cantidad" name="disasolve_cantidad"
                                requerido_generico=1 type="text" />
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
                        <div class="col-md-9 flex" mb>
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
                        <div class="col-md-9" my>
                            <input class="form-control" existe='1' id="mt_limpieza_cantidad" name="mt_limpieza_cantidad"
                                requerido_generico=1 type="text" />
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
                        <div class="col-md-10 flex" my>
                            <div class="form-radio flex w-1/4 justify-center">
                                <input existe='1' id="ten_media_soporteria_si" name="ten_media_soporteria"
                                    tipo="ten_media_soporteria" type="radio" value=1>
                                <label class="ml-1" for="ten_media_soporteria" tipo="ten_media_soporteria">Si</label>
                            </div>
                            <div class="form-radio flex w-1/4 justify-center">
                                <input class="" existe='1' id="ten_media_soporteria_no"type="radio"
                                    name="ten_media_soporteria" tipo="ten_media_soporteria" value=0>
                                <label class="ml-1" for="ten_media_soporteria" tipo="ten_media_soporteria">No</label>
                            </div>
                            <div class="form-radio flex w-1/4 justify-center">
                                <input disabled existe='1' id="ten_media_soporteria_edo_si"
                                    name="ten_media_soporteria_edo" tipo="ten_media_soporteria" type="radio"
                                    value="1">
                                <label class="ml-1 opacity-50" for="ten_media_soporteria_edo"
                                    tipo="ten_media_soporteria">Buen
                                    estado</label>
                            </div>
                            {{-- ANOMALIA SOPORTERIA --}}
                            <div class="form-radio flex w-1/4 justify-center">
                                <input class="" disabled existe='1'
                                    id="ten_media_soporteria_edo_no"type="radio" name="ten_media_soporteria_edo"
                                    onclick="handleAnomalia(this.name)" tipo="ten_media_soporteria" value="0">
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
                            <input class="form-control" id="ten_media_soporteria_faltante"existe='1' my
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
                        <div class="col-md-10 flex" my>
                            <div class="form-radio flex w-1/4 justify-center">
                                <input existe='1' id="sis_tierra_si"type="radio" name="sis_tierra"
                                    tipo="sis_tierra" value=1>
                                <label class="ml-1" for="sis_tierra" tipo="sis_tierra">Si</label>
                            </div>
                            <div class="form-radio flex w-1/4 justify-center">
                                <input class="" existe='1' id="sis_tierra_no"type="radio" name="sis_tierra"
                                    tipo="sis_tierra" value=0>
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
                                    name="sis_tierra_edo" onclick="handleAnomalia(this.name)" tipo="sis_tierra" value=0>
                                <label class="ml-1 opacity-50" for="sis_tierra_edo" tipo="sis_tierra">Mal
                                    estado</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <label class="col-md-3" for="sis_tierra_faltante">Faltante</label>
                        <div class="col-md-9" my>
                            <input class="form-control" existe='1' name="sis_tierra_faltante" requerido_generico=1
                                type="text" />
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
                        <div class="col-md-10 flex" my>
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
                                <label class="ml-1 opacity-50" for="conex_tierra_edo" tipo="conex_tierra">Buen
                                    estado</label>
                            </div>
                            {{-- ANOMALIA TIERRA --}}
                            <div class="form-radio flex w-1/4 justify-center">
                                <input disabled existe='1' id="conex_tierra_edo_no"type="radio"
                                    name="conex_tierra_edo" onclick="handleAnomalia(this.name)" tipo="conex_tierra"
                                    value=0>
                                <label class="ml-1 opacity-50" for="conex_tierra_edo" tipo="conex_tierra">Mal
                                    estado</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <label class="col-md-3" for="conex_tierra_faltante">Faltante</label>
                        <div class="col-md-9" my>
                            <input class="form-control" existe='1' name="conex_tierra_faltante" requerido_generico=1
                                type="text" />
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
                        <div class="col-md-10 flex" my>
                            <div class="form-radio flex w-1/4 justify-center">
                                <input existe='1' id="sellado_ducteria_si"type="radio" name="sellado_ducteria"
                                    tipo="sellado_ducteria" value=1>
                                <label class="ml-1" for="sellado_ducteria" tipo="sellado_ducteria">Si</label>
                            </div>
                            <div class="form-radio flex w-1/4 justify-center">
                                <input existe='1' id="sellado_ducteria_no"type="radio" name="sellado_ducteria"
                                    tipo="sellado_ducteria" value=0>
                                <label class="ml-1" for="sellado_ducteria" tipo="sellado_ducteria">No</label>
                            </div>
                            <div class="form-radio flex w-1/4 justify-center">
                                <input disabled existe='1' id="sellado_ducteria_edo_si"type="radio"
                                    name="sellado_ducteria_edo" tipo="sellado_ducteria" value=1>
                                <label class="ml-1 opacity-50" for="sellado_ducteria_edo" tipo="sellado_ducteria">Buen
                                    estado</label>
                            </div>
                            {{-- ANOMALIA DUCTERIA --}}
                            <div class="form-radio flex w-1/4 justify-center">
                                <input disabled existe='1' id="sellado_ducteria_edo_no"type="radio"
                                    name="sellado_ducteria_edo" onclick="handleAnomalia(this.name)"
                                    tipo="sellado_ducteria" value=0>
                                <label class="ml-1 opacity-50" for="sellado_ducteria_edo" tipo="sellado_ducteria">Mal
                                    estado</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <label class="col-md-3" for="sellado_ducteria_faltante">Faltante</label>
                        <div class="col-md-9" my>
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
                    <div class="form-group">
                        <label for="mt_observaciones">Observaciones:</label>
                        <textarea class="form-control" existe='1'requerido_generico=1 id="mt_observaciones" mt name="mt_observaciones"
                            rows="5"></textarea>
                        <div id="mt_observaciones_error"class="invalid-feedback"></div>
                    </div>
                </div>
            </div>

            {{-- CANALIZACIONES EN B.T. --}}
            <label class="font-bold" my>CANALIZACIONES EN B.T.</label>
            <div class="row flex justify-between">
                <p class="col-md-2 self-center" mt>Tipo canalizaciones</p>
            </div>
            {{-- tipo canalizacion --}}
            <div class="row">
                <div class="col-md-4" mt>
                    <input existe='1'onclick="tipoCanalizacion()" type="radio"name="tipo_canalizacion"
                        value="T.conduit"> <label class="ml-1">T. conduit
                    </label></input>
                </div>
                <div class="col-md-4">
                    <input existe='1'onclick="tipoCanalizacion()" name="tipo_canalizacion" type="radio"
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
                <p class="col-md-2 self-center" mt>Requiere tornillería</p>
                <div class="col-md-4 flex self-center">
                    <div class="form-radio flex w-2/4 justify-center">
                        <input existe='1' name="torni" tipo="torni" type="radio" value=1>
                        <label class="ml-1" for="torni" tipo="torni">Si</label>
                    </div>
                    <div class="form-radio flex w-2/4 justify-center">
                        <input existe='1' name="torni" tipo="torni" type="radio" value=0>
                        <label class="ml-1" for="torni" tipo="torni">No</label>
                    </div>
                </div>
                <p class="col-md-2 self-center" my>Cantidad (tornillería)</p>
                <div class="col-md-4">
                    <input class="form-control" existe='1' name="torni_cantidad" requerido_generico=1
                        type="text" />
                    <div class="invalid-feedback"></div>
                </div>

            </div>
            {{-- LIMPIEZA --}}
            <div class="row">
                <p class="col-md-2 self-center" mt>Requiere limpieza (tornillería)</p>
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
            </div>
            {{-- BT - soportería --}}
            <div class="row">
                <div class="col-md-7">
                    <div class="row">
                        <label class="col-md-2" for="bt_soporteria">Soportería</label>
                        <div class="col-md-10 flex">
                            <div class="form-radio flex w-1/4 justify-center">
                                <input existe='1' id="bt_soporteria_si"type="radio" name="bt_soporteria"
                                    tipo="bt_soporteria" value=1>
                                <label class="ml-1" for="bt_soporteria" tipo="bt_soporteria">Si</label>
                            </div>
                            <div class="form-radio flex w-1/4 justify-center">
                                <input existe='1' id="bt_soporteria_no"type="radio" name="bt_soporteria"
                                    tipo="bt_soporteria" value=0>
                                <label class="ml-1" for="bt_soporteria" tipo="bt_soporteria">No</label>
                            </div>
                            <div class="form-radio flex w-1/4 justify-center">
                                <input disabled existe='1' id="bt_soporteria_edo_si"type="radio"
                                    name="bt_soporteria_edo" tipo="bt_soporteria" value=1>
                                <label class="ml-1 opacity-50" for="bt_soporteria_edo" tipo="bt_soporteria">Buen
                                    estado</label>
                            </div>
                            {{-- ANOMALIA DUCTERIA --}}
                            <div class="form-radio flex w-1/4 justify-center">
                                <input disabled existe='1' id="bt_soporteria_edo_no"type="radio"
                                    name="bt_soporteria_edo" onclick="handleAnomalia(this.name)" tipo="bt_soporteria"
                                    value=0>
                                <label class="ml-1 opacity-50" for="bt_soporteria_edo" tipo="bt_soporteria">Mal
                                    estado</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5" my>
                    <div class="row">
                        <label class="col-md-3" for="bt_soporteria_faltante">Faltante</label>
                        <div class="col-md-9">
                            <input class="form-control" existe='1' mt name="bt_soporteria_faltante"
                                requerido_generico=1 type="text" />
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- BT  observaciones  --}}
            <div class="row">
                <div class="col-md-12" my>
                    <div class="form-group">
                        <label for="mb_observaciones">Observaciones:</label>
                        <textarea class="form-control" existe='1'requerido_generico=1 id="mb_observaciones" name="mb_observaciones"
                            rows="5"></textarea>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
            </div>
            {{-- interruptores en B.T --}}
            <p class="font-bold"mb>INTERRUPTORES EN B.T.</p>
            <div class="row">
                <p class="col-md-2 self-center">No. Interruptores y/o gabinetes</p>
                <div class="col-md-2"my>
                    <input class="form-control" existe='1' name="int_no" requerido_generico=1 type="text" />
                    <div class="invalid-feedback"></div>
                </div>
                <p class="col-md-2 self-center">Requiere limpieza (int/gabinetes)</p>
                <div class="col-md-2 flex">
                    <div class="form-radio flex w-2/4 justify-center">
                        <input name="int_limpieza" type="radio" value="1"existe='1'>
                        <label class="ml-1">Si</label>
                    </div>
                    <div class="form-radio flex w-2/4 justify-center">
                        <input existe='1' name="int_limpieza" type="radio" value="0">
                        <label class="ml-1">No</label>
                    </div>
                </div>
                <p class="col-md-2 self-center"my>Cantidad (limpieza)</p>
                <div class="col-md-2"mb>
                    <input class="form-control" existe='1' id="int_limpieza_cantidad" name="int_limpieza_cantidad"
                        requerido_generico=1 type="text" />
                    <div class="invalid-feedback"></div>
                </div>
            </div>
            {{-- Interruptores estado, y si requieren tornilleria  --}}
            <div class="row">
                <p class="col-md-2 self-center"mt>Estado de interruptores</p>
                {{-- ANOMALIA Interruptores --}}
                <div class="col-md-4 flex"mb>
                    <div class="form-radio flex w-2/4 justify-center">
                        <input name="int_edo" type="radio" value="1"existe='1'tipo="int_edo">

                        <label class="ml-1"tipo="int_edo">Buen estado</label>
                    </div>
                    <div class="form-radio flex w-2/4 justify-center">
                        <input existe='1' name="int_edo" onclick="handleAnomalia(this.name)" tipo="int_edo"
                            type="radio" value=0>
                        <label class="ml-1" for="int_edo" tipo="int_edo">Mal
                            estado</label>
                    </div>
                </div>
                <p class="col-md-2 self-center">¿Requiere tornillería?</p>
                <div class="col-md-4 flex">
                    <div class="form-radio flex w-2/4 justify-center">
                        <input name="int_torni" type="radio" value="1"existe='1'>
                        <label class="ml-1">Si</label>
                    </div>
                    <div class="form-radio flex w-2/4 justify-center">
                        <input existe='1' name="int_torni" type="radio" value="0">
                        <label class="ml-1">No</label>
                    </div>
                </div>
            </div>
            {{-- Señalización Interruptores  --}}
            <div class="row">
                <div class="col-md-7" mt>
                    <div class="row">
                        <p class="col-md-2">Señalización Interruptores</p>
                        <div class="col-md-10 flex">
                            <div class="form-radio flex w-1/4 justify-center">
                                <input existe='1' id="int_senalizacion_si"type="radio" name="int_senalizacion"
                                    tipo="int_senalizacion" value=1>
                                <label class="ml-1" for="int_senalizacion" tipo="int_senalizacion">Si</label>
                            </div>
                            <div class="form-radio flex w-1/4 justify-center">
                                <input existe='1' id="int_senalizacion_no"type="radio" name="int_senalizacion"
                                    tipo="int_senalizacion" value=0>
                                <label class="ml-1" for="int_senalizacion" tipo="int_senalizacion">No</label>
                            </div>
                            <div class="form-radio flex w-1/4 justify-center">
                                <input disabled existe='1' id="int_senalizacion_edo_si"type="radio"
                                    name="int_senalizacion_edo" tipo="int_senalizacion" value=1>
                                <label class="ml-1 opacity-50" for="int_senalizacion_edo" tipo="int_senalizacion">Buen
                                    estado</label>
                            </div>
                            {{-- ANOMALIA TIERRA --}}
                            <div class="form-radio flex w-1/4 justify-center">
                                <input disabled existe='1' id="int_senalizacion_edo_no"type="radio"
                                    name="int_senalizacion_edo" onclick="handleAnomalia(this.name)"
                                    tipo="int_senalizacion" value=0>
                                <label class="ml-1 opacity-50" for="int_senalizacion_edo" tipo="int_senalizacion">Mal
                                    estado</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5"mt>
                    <div class="row">
                        <label class="col-md-3" for="int_senalizacion_faltante">Faltante</label>
                        <div class="col-md-9" mt>
                            <input class="form-control" existe='1' name="int_senalizacion_faltante"
                                requerido_generico=1 type="text" />
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Señalización Circuitos  --}}
            <div class="row">
                <div class="col-md-7" my>
                    <div class="row">
                        <p class="col-md-2">Señalización Circuitos</p>
                        <div class="col-md-10 flex"mt>
                            <div class="form-radio flex w-1/4 justify-center">
                                <input existe='1' id="circuitos_si"type="radio" name="circuitos" tipo="circuitos"
                                    value=1>
                                <label class="ml-1" for="circuitos" tipo="circuitos">Si</label>
                            </div>
                            <div class="form-radio flex w-1/4 justify-center">
                                <input existe='1' id="circuitos_no"type="radio" name="circuitos" tipo="circuitos"
                                    value=0>
                                <label class="ml-1" for="circuitos" tipo="circuitos">No</label>
                            </div>
                            <div class="form-radio flex w-1/4 justify-center">
                                <input disabled existe='1' id="circuitos_edo_si"type="radio" name="circuitos_edo"
                                    tipo="circuitos" value=1>
                                <label class="ml-1 opacity-50" for="circuitos_edo" tipo="circuitos">Buen
                                    estado</label>
                            </div>
                            {{-- ANOMALIA TIERRA --}}
                            <div class="form-radio flex w-1/4 justify-center">
                                <input disabled existe='1' id="circuitos_edo_no"type="radio" name="circuitos_edo"
                                    onclick="handleAnomalia(this.name)" tipo="circuitos" value=0>
                                <label class="ml-1 opacity-50" for="circuitos_edo" tipo="circuitos">Mal
                                    estado</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5"mb>
                    <div class="row">
                        <label class="col-md-3" for="circuitos_faltante">Faltante</label>
                        <div class="col-md-9" mt>
                            <input class="form-control" existe='1' name="circuitos_faltante" requerido_generico=1
                                type="text" />
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Espacios disponibles  --}}
            <div class="row">
                <p class="col-md-1 self-center">Espacios disponibles</p>
                <div class="col-md-3 flex justify-evenly self-center">
                    <div class="form-radio flex">
                        <input existe='1' id="disponible_si"type="radio" name="disponible"
                            onclick="mostrarCantidad(this)" tipo="disponible" value=1>
                        <label class="ml-1" for="disponible" tipo="circuitos">Si</label>
                    </div>


                    <div class="form-radio flex">
                        <input existe='1' id="disponible_no"type="radio" name="disponible"
                            onclick="esconderCantidad(this)" tipo="disponible" value=0>
                        <label class="ml-1" for="disponible" tipo="circuitos">No</label>
                    </div>
                </div>

                <div class="col-md-4 self-center">
                    <div class="row">
                        <label class="col-md-3"for="disponible_cantidad" mt>Cantidad (espacios)</label>
                        <div class="col-md-9" my>
                            <input class="form-control w-2/3" existe='1' name="disponible_cantidad"
                                requerido_generico=2 type="text" />
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 self-center" mb>
                    <div class="row">

                        <label class="col-md-3"for="disponible_faltante">Faltante (espacios)</label>
                        <div class="col-md-9"mt>
                            <input class="form-control w-2/3" existe='1' name="disponible_faltante"
                                requerido_generico=1 type="text" />
                            <div class="invalid-feedback"></div>
                        </div>

                    </div>

                </div>
            </div>

            {{-- Interruptores B.T. observaciones  --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="bt_observaciones">Observaciones:</label>
                        <textarea class="form-control" existe='1'requerido_generico=1 id="bt_observaciones" mt name="bt_observaciones"
                            rows="5"></textarea>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
            </div>
            <p class="font-bold" mb>CABLEADO EN M.T.</p>
            {{-- Accesorios subterráneos --}}
            <div class="row">
                <p class="col-md-2 self-center">Accesorios subterráneos</p>
                <div class="col-md-4 flex">
                    <div class="form-radio flex w-2/4 justify-center">
                        <input name="acc_subterraneo_edo" type="radio"
                            value="1"existe='1'tipo="acc_subterraneo_edo">

                        <label class="ml-1"tipo="acc_subterraneo_edo">Buen estado</label>
                    </div>
                    <div class="form-radio flex w-2/4 justify-center">
                        <input existe='1' name="acc_subterraneo_edo" onclick="handleAnomalia(this.name)"
                            tipo="acc_subterraneo_edo" type="radio" value=0>
                        <label class="ml-1" for="acc_subterraneo_edo" tipo="acc_subterraneo_edo">Mal
                            estado</label>
                    </div>
                </div>
            </div>

            {{--  SUBESTACION: PEDESTAL --}}
            @if ($subestacion_type == 2)
                {{-- No. de codos OCC --}}
                <div class="row" my>
                    <div class="col-md-6 self-center">
                        <div class="row">
                            <p class="col-md-3 self-center">No. de codos OCC</p>
                            <div class="col-md-9">
                                <input class="form-control w-2/3" existe='1' name="no_codos_occ"
                                    oninput="activarEstadoDeNoCodosOCC(this)" requerido_generico=2 type="text" />
                                <div class="invalid-feedback"></div>
                            </div>

                        </div>

                    </div>
                    <div class="col-md-6 flex self-center">
                        <div class="form-radio flex w-2/4 justify-center">
                            <input disabled name="codos_occ_edo" type="radio"
                                value="1"existe='1'tipo="codos_occ">

                            <label class="ml-1 opacity-50"tipo="codos_occ">Buen estado</label>
                        </div>
                        <div class="form-radio flex w-2/4 justify-center">
                            <input existe='1' id="codos_occ_edo_no"disabled name="codos_occ_edo"
                                onclick="handleAnomalia(this.name)" tipo="codos_occ" type="radio" value=0>
                            <label class="ml-1 opacity-50" for="codos_occ_edo" tipo="codos_occ">Mal
                                estado</label>
                        </div>
                    </div>
                </div>
                {{-- No. de insertos OCC --}}
                <div class="row">
                    <div class="col-md-6 self-center">
                        <div class="row">
                            <p class="col-md-3 self-center">No. de insertos OCC</p>
                            <div class="col-md-9">
                                <input class="form-control w-2/3" existe='1' name="no_insertos_occ"
                                    oninput="activarEstadoDeNoInsertosOCC(this)" requerido_generico=2 type="text" />
                                <div class="invalid-feedback"></div>
                            </div>

                        </div>

                    </div>
                    <div class="col-md-6 flex self-center">
                        <div class="form-radio flex w-2/4 justify-center">
                            <input disabled name="insertos_occ_edo" type="radio"
                                value="1"existe='1'tipo="insertos_occ">

                            <label class="ml-1 opacity-50"tipo="insertos_occ">Buen estado</label>
                        </div>
                        <div class="form-radio flex w-2/4 justify-center">
                            <input disabled existe='1' id="insertos_occ_edo_no" name="insertos_occ_edo"
                                onclick="handleAnomalia(this.name)" tipo="insertos_occ" type="radio" value=0>
                            <label class="ml-1 opacity-50" for="insertos_occ_edo" tipo="insertos_occ">Mal
                                estado</label>
                        </div>
                    </div>


                </div>
                {{-- No. de adaptadores de tierra --}}
                <div class="row">
                    <div class="col-md-4 self-center">
                        <div class="row">
                            <p class="col-md-3 self-center"> No. de adaptadores de tierra</p>
                            <div class="col-md-9">
                                <input class="form-control w-2/3" existe='1' name="no_adpt_tierra"
                                    oninput="activarEstadoDeAdptTiera(this)" requerido_generico=2 type="text" />
                                <div class="invalid-feedback"></div>
                            </div>

                        </div>

                    </div>
                    <div class="col-md-4 flex self-center">
                        <div class="form-radio flex w-2/4 justify-center">
                            <input disabled name="adpt_tierra_edo" type="radio"
                                value="1"existe='1'tipo="adpt_tierra">

                            <label class="ml-1 opacity-50"tipo="adpt_tierra">Buen estado</label>
                        </div>
                        <div class="form-radio flex w-2/4 justify-center">
                            <input existe='1' id="adpt_tierra_edo_no"disabled name="adpt_tierra_edo"
                                onclick="handleAnomalia(this.name)" tipo="adpt_tierra" type="radio" value=0>
                            <label class="ml-1 opacity-50" for="adpt_tierra_edo" tipo="adpt_tierra">Mal
                                estado</label>
                        </div>
                    </div>

                <div class="col-md-4 self-center" mb>
                    <div class="row">

                        <label class="col-md-3"for="adpt_tierra_faltante">Faltante (adaptadores)</label>
                        <div class="col-md-9"mt>
                            <input class="form-control w-2/3" existe='1' name="adpt_tierra_faltante"
                                requerido_generico=1 type="text" />
                            <div class="invalid-feedback"></div>
                        </div>

                    </div>

                </div>


                </div>
                {{-- No. de barras de tierra --}}
                <div class="row">
                    <div class="col-md-4 self-center">
                        <div class="row">
                            <p class="col-md-3 self-center">No. de barras de tierra</p>
                            <div class="col-md-9">
                                <input class="form-control w-2/3" existe='1' name="no_barras_tierra"
                                    oninput="activarEstadoDeBarraTiera(this)" requerido_generico=2 type="text" />
                                <div class="invalid-feedback"></div>
                            </div>

                        </div>

                    </div>
                    <div class="col-md-4 flex self-center">
                        <div class="form-radio flex w-2/4 justify-center">
                            <input disabled name="barras_tierra_edo" type="radio"
                                value="1"existe='1'tipo="barras_tierra">

                            <label class="ml-1 opacity-50"tipo="barras_tierra">Buen estado</label>
                        </div>
                        <div class="form-radio flex w-2/4 justify-center">
                            <input existe='1' id="barras_tierra_edo_no"disabled name="barras_tierra_edo"
                                onclick="handleAnomalia(this.name)" tipo="barras_tierra" type="radio" value=0>
                            <label class="ml-1 opacity-50" for="barras_tierra_edo" tipo="barras_tierra">Mal
                                estado</label>
                        </div>
                    </div>

                    <div class="col-md-4 self-center" mb>
                        <div class="row">

                            <label class="col-md-3"for="barras_tierra_faltante">Faltante (barras)</label>
                            <div class="col-md-9"mt>
                                <input class="form-control w-2/3" existe='1' name="barras_tierra_faltante"
                                requerido_generico=1 type="text" />
                            <div class="invalid-feedback"></div>
                        </div>

                    </div>

                </div>


                </div>
                {{-- SUBESTACION: COMPACTA --}}
            @else
                {{-- codos  --}}
                <div class="row">
                    <div class="col-md-7" my>
                        <div class="row">
                            <p class="col-md-2 self-center">Codos</p>
                            <div class="col-md-10 flex"mt>
                                <div class="form-radio flex w-1/4 justify-center">
                                    <input existe='1' id="codos_si"type="radio" name="codos" tipo="codos"
                                        value=1>
                                    <label class="ml-1" for="codos" tipo="codos">Si</label>
                                </div>
                                <div class="form-radio flex w-1/4 justify-center">
                                    <input existe='1' id="codos_no"type="radio" name="codos" tipo="codos"
                                        value=0>
                                    <label class="ml-1" for="codos" tipo="codos">No</label>
                                </div>
                                <div class="form-radio flex w-1/4 justify-center">
                                    <input disabled existe='1' id="codos_edo_si"type="radio" name="codos_edo"
                                        tipo="codos" value=1>
                                    <label class="ml-1 opacity-50" for="codos_edo" tipo="codos">Buen
                                        estado</label>
                                </div>
                                {{-- ANOMALIA TIERRA --}}
                                <div class="form-radio flex w-1/4 justify-center">
                                    <input disabled existe='1' id="codos_edo_no"type="radio" name="codos_edo"
                                        onclick="handleAnomalia(this.name)" tipo="codos" value=0>
                                    <label id="capacidad_codos_label"class="ml-1 opacity-50" for="circuitos_edo" tipo="codos">Mal
                                        estado</label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                {{-- terminales  --}}
                <div class="row">
                    <div class="col-md-7" my>
                        <div class="row">
                            <p class="col-md-2 self-center">Terminales</p>
                            <div class="col-md-10 flex"mt>
                                <div class="form-radio flex w-1/4 justify-center">
                                    <input existe='1' id="terminales_si"type="radio" name="terminales"
                                        tipo="terminales" value=1>
                                    <label class="ml-1" for="terminales" tipo="terminales">Si</label>
                                </div>
                                <div class="form-radio flex w-1/4 justify-center">
                                    <input existe='1' id="terminales_no"type="radio" name="terminales"
                                        tipo="terminales" value=0>
                                    <label class="ml-1" for="terminales" tipo="terminales">No</label>
                                </div>
                                <div class="form-radio flex w-1/4 justify-center">
                                    <input disabled existe='1' id="terminales_edo_si"type="radio"
                                        name="terminales_edo" tipo="terminales" value=1>
                                    <label class="ml-1 opacity-50" for="terminales_edo" tipo="terminales">Buen
                                        estado</label>
                                </div>
                                {{-- ANOMALIA TIERRA --}}
                                <div class="form-radio flex w-1/4 justify-center">
                                    <input disabled existe='1' id="terminales_edo_no"type="radio"
                                        name="terminales_edo" onclick="handleAnomalia(this.name)" tipo="terminales"
                                        value=0>
                                    <label class="ml-1 opacity-50" for="circuitos_edo" tipo="terminales">Mal
                                        estado</label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                {{-- Fusibles  --}}
                <div class="row">
                    <div class="col-md-6" my>
                        <div class="row">
                            <p class="col-md-2">Fusibles</p>
                            <div class="col-md-10 flex"mt>
                                <div class="form-radio flex w-1/4 justify-center">
                                    <input existe='1' id="fusibles_si"type="radio" name="fusibles"
                                        tipo="fusibles" value=1>
                                    <label class="ml-1" for="fusibles" tipo="fusibles">Si</label>
                                </div>
                                <div class="form-radio flex w-1/4 justify-center">
                                    <input existe='1' id="fusibles_no"type="radio" name="fusibles"
                                        tipo="fusibles" value=0>
                                    <label class="ml-1" for="fusibles" tipo="fusibles">No</label>
                                </div>
                                <div class="form-radio flex w-1/4 justify-center">
                                    <input disabled existe='1' id="fusibles_edo_si"type="radio"
                                        name="fusibles_edo" tipo="fusibles" value=1>
                                    <label class="ml-1 opacity-50" for="fusibles_edo" tipo="fusibles">Buen
                                        estado</label>
                                </div>
                                {{-- ANOMALIA TIERRA --}}
                                <div class="form-radio flex w-1/4 justify-center">
                                    <input disabled existe='1' id="fusibles_edo_no"type="radio"
                                        name="fusibles_edo" onclick="handleAnomalia(this.name)" tipo="fusibles" value=0>
                                    <label class="ml-1 opacity-50" for="fusibles_edo" tipo="fusibles">Mal
                                        estado</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3"mb>
                        <div class="row">
                            <label class="col-md-6" for="marbete_faltante" id="capacidad_fusibles">Capacidad
                                (fusibles)</label>
                            <div class="col-md-6" mt>
                                <input class="form-control" existe='1' id="capacidad_fusibles_input"
                                    name="fusibles_capacidad" requerido_generico=1 type="text" />
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3"mb>
                        <div class="row">
                            <label class="col-md-6" for="marbete_faltante">Faltante (fusibles)</label>
                            <div class="col-md-6" mt>
                                <input class="form-control" existe='1' name="fusibles_faltante" requerido_generico=1
                                    type="text" />
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Mecanismo Op  --}}
                <div class="row">
                    <div class="col-md-6" my>
                        <div class="row">
                            <p class="col-md-2">Mecanismo</p>
                            <div class="col-md-10 flex"mt>
                                <div class="form-radio flex w-1/4 justify-center">
                                    <input existe='1' id="mecanismo_si"type="radio" name="mecanismo"
                                        tipo="mecanismo" value=1>
                                    <label class="ml-1" for="mecanismo" tipo="mecanismo">Si</label>
                                </div>
                                <div class="form-radio flex w-1/4 justify-center">
                                    <input existe='1' id="mecanismo_no"type="radio" name="mecanismo"
                                        tipo="mecanismo" value=0>
                                    <label class="ml-1" for="mecanismo" tipo="mecanismo">No</label>
                                </div>
                                <div class="form-radio flex w-1/4 justify-center">
                                    <input disabled existe='1' id="mecanismo_edo_si"type="radio"
                                        name="mecanismo_edo" tipo="mecanismo" value=1>
                                    <label class="ml-1 opacity-50" for="mecanismo_edo" tipo="mecanismo">Buen
                                        estado</label>
                                </div>
                                {{-- ANOMALIA TIERRA --}}
                                <div class="form-radio flex w-1/4 justify-center">
                                    <input disabled existe='1' id="mecanismo_edo_no"type="radio"
                                        name="mecanismo_edo" onclick="handleAnomalia(this.name)" tipo="mecanismo" value=0>
                                    <label class="ml-1 opacity-50" for="mecanismo_edo" tipo="mecanismo">Mal
                                        estado</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3"mb>
                        <div class="row">
                            <label class="col-md-6" for="marbete_faltante" id="capacidad_mecanismo">Capacidad
                                (mecanismo)</label>
                            <div class="col-md-6" mt>
                                <input class="form-control" existe='1' id="capacidad_mecanismo_input"
                                    name="mecanismo_capacidad" requerido_generico=1 type="text" />
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3"mb>
                        <div class="row">
                            <label class="col-md-6" for="marbete_faltante">Faltante (mecanismo)</label>
                            <div class="col-md-6" mt>
                                <input class="form-control" existe='1' name="mecanismo_faltante" requerido_generico=1
                                    type="text" />
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            {{-- Colocación y acomodo de cable --}}
            <div class="row">
                <p class="col-md-2 self-center">Colocación y acomodo de cable</p>
                <div class="col-md-4 flex">
                    <div class="form-radio flex w-2/4 justify-center">
                        <input name="se_cable_acomodo_edo" type="radio"
                            value="1"existe='1'tipo="se_cable_acomodo">

                        <label class="ml-1"tipo="se_cable_acomodo">Buen estado</label>
                    </div>
                    <div class="form-radio flex w-2/4 justify-center">
                        <input existe='1' name="se_cable_acomodo_edo" onclick="handleAnomalia(this.name)"
                            tipo="se_cable_acomodo" type="radio" value=0>
                        <label class="ml-1" for="se_cable_acomodo" tipo="se_cable_acomodo">Mal
                            estado</label>
                    </div>
                </div>
            </div>
            {{-- ID. marbetes  --}}
            <div class="row">
                <div class="col-md-7" my>
                    <div class="row">
                        <p class="col-md-2">ID. marbetes</p>
                        <div class="col-md-10 flex"mt>
                            <div class="form-radio flex w-1/4 justify-center">
                                <input existe='1' id="marbete_si"type="radio" name="marbete" tipo="marbete"
                                    value=1>
                                <label class="ml-1" for="marbete" tipo="marbete">Si</label>
                            </div>
                            <div class="form-radio flex w-1/4 justify-center">
                                <input existe='1' id="marbete_no"type="radio" name="marbete" tipo="marbete"
                                    value=0>
                                <label class="ml-1" for="marbete" tipo="marbete">No</label>
                            </div>
                            <div class="form-radio flex w-1/4 justify-center">
                                <input disabled existe='1' id="marbete_edo_si"type="radio" name="marbete_edo"
                                    tipo="marbete" value=1>
                                <label class="ml-1 opacity-50" for="marbete_edo" tipo="marbete">Buen
                                    estado</label>
                            </div>
                            {{-- ANOMALIA TIERRA --}}
                            <div class="form-radio flex w-1/4 justify-center">
                                <input disabled existe='1' id="marbete_edo_no"type="radio" name="marbete_edo"
                                    onclick="handleAnomalia(this.name)" tipo="marbete" value=0>
                                <label class="ml-1 opacity-50" for="circuitos_edo" tipo="marbete">Mal
                                    estado</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5"mb>
                    <div class="row">
                        <label class="col-md-3" for="marbete_faltante">Faltante</label>
                        <div class="col-md-9" mt>
                            <input class="form-control" existe='1' name="marbete_faltante" requerido_generico=1
                                type="text" />
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Cableado M.T. observaciones  --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="mt_cableado_observaciones">Observaciones:</label>
                        <textarea class="form-control" existe='1'requerido_generico=1 id="mt_cableado_observaciones"
                            name="mt_cableado_observaciones" rows="5"></textarea>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
            </div>
            <p class="font-bold">CABLEADO EN B.T.</p>
            {{-- Colocación y acomodo de cable --}}
            <div class="row">
                <p class="col-md-2 self-center">Colocación y acomodo de cable</p>
                <div class="col-md-4 flex">
                    <div class="form-radio flex w-2/4 justify-center">
                        <input name="bt_cableado_cable_acomodo" type="radio"
                            value="1"existe='1'tipo="bt_cableado_cable_acomodo">

                        <label class="ml-1"tipo="bt_cableado_cable_acomodo">Buen estado</label>
                    </div>
                    <div class="form-radio flex w-2/4 justify-center">
                        <input existe='1' name="bt_cableado_cable_acomodo" onclick="handleAnomalia(this.name)"
                            tipo="bt_cableado_cable_acomodo" type="radio" value=0>
                        <label class="ml-1" for="bt_cableado_cable_acomodo" tipo="bt_cableado_cable_acomodo">Mal
                            estado</label>
                    </div>
                </div>
            </div>
            {{-- conexiones estado --}}
            <div class="row">
                <p class="col-md-2 self-center">Conexiones</p>
                <div class="col-md-4 flex self-center">
                    <div class="form-radio flex w-2/4 justify-center">
                        <input name="bt_cableado_conexiones" type="radio"
                            value="1"existe='1'tipo="bt_cableado_conexiones">

                        <label class="ml-1"tipo="bt_cableado_conexiones">Buen estado</label>
                    </div>
                    <div class="form-radio flex w-2/4 justify-center">
                        <input existe='1' name="bt_cableado_conexiones" onclick="handleAnomalia(this.name)"
                            tipo="bt_cableado_conexiones" type="radio" value=0>
                        <label class="ml-1" for="bt_cableado_conexiones" tipo="bt_cableado_conexiones">Mal
                            estado</label>
                    </div>
                </div>
                <div class="col-md-6 self-center">
                    <div class="row">
                        <p class="col-md-3 self-center">Faltante</p>
                        <div class="col-md-9">
                            <input class="form-control w-2/3" existe='1' name="bt_cableado_conexiones_faltante"
                                requerido_generico=1 type="text" />
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Cableado en B.T. observaciones --}}
            <div class="row" my>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="bt_cableado_conexiones_observaciones">Observaciones:</label>
                        <textarea class="form-control" existe='1'requerido_generico=1 id="bt_cableado_conexiones_observaciones"
                            name="bt_cableado_conexiones_observaciones" rows="5"></textarea>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
            </div>
            {{-- MEDICIÓN DE VOLTAJES --}}
            <p class="font-bold">MEDICIÓN DE VOLTAJES</p>
            <ul>
                <li>
                    <p class="">Voltaje en transformador</p>
                    <div class="row mt-3">
                        <label class="col-md-1" for="t_vab">Vab</label>
                        <div class="col-md-1">
                            <input class="form-control" existe='1' name="t_vab" requerido_generico=2
                                type="text" />
                            <div class="invalid-feedback"></div>
                        </div>
                        <label class="col-md-1" for="t_vbc">Vbc</label>
                        <div class="col-md-1">
                            <input class="form-control" existe='1' name="t_vbc" requerido_generico=2
                                type="text" />
                            <div class="invalid-feedback"></div>
                        </div>
                        <label class="col-md-1" for="t_vbc2">Vbc</label>
                        <div class="col-md-1">
                            <input class="form-control" existe='1' name="t_vbc2" requerido_generico=2
                                type="text" />
                            <div class="invalid-feedback"></div>
                        </div>
                        <label class="col-md-1" for="t_van">Van</label>
                        <div class="col-md-1">
                            <input class="form-control" existe='1' name="t_van" requerido_generico=2
                                type="text" />
                            <div class="invalid-feedback"></div>
                        </div>
                        <label class="col-md-1" for="t_vbn">Vbn</label>
                        <div class="col-md-1">
                            <input class="form-control" existe='1' name="t_vbn" requerido_generico=2
                                type="text" />
                            <div class="invalid-feedback"></div>
                        </div>
                        <label class="col-md-1" for="t_vcn">Vcn</label>
                        <div class="col-md-1">
                            <input class="form-control" existe='1' name="t_vcn" requerido_generico=2
                                type="text" />
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </li>
                <li>
                    <p class="mt-3">Voltaje en interruptor principal</p>
                    <div class="row my-3">
                        <label class="col-md-1" for="i_vab">Vab</label>
                        <div class="col-md-1">
                            <input class="form-control" existe='1' name="i_vab" requerido_generico=2
                                type="text" />
                            <div class="invalid-feedback"></div>
                        </div>
                        <label class="col-md-1" for="i_vbc">Vbc</label>
                        <div class="col-md-1">
                            <input class="form-control" existe='1' name="i_vbc" requerido_generico=2
                                type="text" />
                            <div class="invalid-feedback"></div>
                        </div>
                        <label class="col-md-1" for="i_vbc2">Vbc</label>
                        <div class="col-md-1">
                            <input class="form-control" existe='1' name="i_vbc2" requerido_generico=2
                                type="text" />
                            <div class="invalid-feedback"></div>
                        </div>
                        <label class="col-md-1" for="t_van">Van</label>
                        <div class="col-md-1">
                            <input class="form-control" existe='1' name="i_van" requerido_generico=2
                                type="text" />
                            <div class="invalid-feedback"></div>
                        </div>
                        <label class="col-md-1" for="i_vbn">Vbn</label>
                        <div class="col-md-1">
                            <input class="form-control" existe='1' name="i_vbn" requerido_generico=2
                                type="text" />
                            <div class="invalid-feedback"></div>
                        </div>
                        <label class="col-md-1" for="i_vcn">Vcn</label>
                        <div class="col-md-1">
                            <input class="form-control" existe='1' name="i_vcn" requerido_generico=2
                                type="text" />
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </li>
                <li>
                    <p class="mt-3">Corriente en int. principal</p>
                    <div class="row my-3">
                        <label class="col-md-1" for="i_ia">Ia</label>
                        <div class="col-md-2">
                            <input class="form-control" existe='1' name="i_ia" requerido_generico=2
                                type="text" />
                            <div class="invalid-feedback"></div>
                        </div>
                        <label class="col-md-1" for="i_ib">Ib</label>
                        <div class="col-md-2">
                            <input class="form-control" existe='1' name="i_ib" requerido_generico=2
                                type="text" />
                            <div class="invalid-feedback"></div>
                        </div>
                        <label class="col-md-1" for="i_ic">Ic</label>
                        <div class="col-md-2">
                            <input class="form-control" existe='1' name="i_ic" requerido_generico=2
                                type="text" />
                            <div class="invalid-feedback"></div>
                        </div>
                        <label class="col-md-1" for="i_in">In</label>
                        <div class="col-md-2">
                            <input class="form-control" existe='1' name="i_in" requerido_generico=2
                                type="text" />
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </li>
            </ul>
            {{-- IMAGENES --}}
            <p class="font-bold">Imagenes (3 requeridas)</p>
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input accept=".png, .jpg, .jpeg"existe='1' class="form-control" id="img1"
                                name="img1" type="file" />
                            <div id="img1_error"class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input accept=".png, .jpg, .jpeg" class="form-control"id="img2" existe='1'
                                name="img2" type="file" />
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
        {{-- </div> --}}
        <input name="subestacion_type" type="hidden" value={{ $subestacion_type }}>

        @include('tecnico.inspecciones.header.botones')
        </form>
        <!-- fin form -->

    </div>
@endsection
