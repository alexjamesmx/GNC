@extends('template._tecnico_inspecciones_template')

@section('test_body')
    <!-- form -->
    <div class="card">
        @include('tecnico.inspecciones.header.datos_generales')
        {{-- INICIA ENCUESTA --}}
        <div class="grid gap-8 p-5" gap-parent>
            <p class="card-description text-sm font-bold">Datos del equipo</p>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group row">
                        <label for="marca"class="col-sm-3 form-label">Marca</label>
                        <div class="col-sm-9">
                            <input class="form-control" id="marca"name="marca" type="text" />
                            <div id="marca_error"class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group row">
                        <label for="no_serie"class="col-sm-3 form-label">No. serie</label>
                        <div class="col-sm-9">
                            <input class="form-control" id="no_serie"name="no_serie" type="text" />
                            <div id="no_serie_error"class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group row">
                        <label class="col-sm-3 form-label"for="form_capacidad">Capacidad</label>
                        <div class="col-sm-9">
                            <input class="form-control"name="capacidad"id="capacidad" type="text" />
                            <div id="capacidad_error"class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 form-label">Neutro</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="neutro"id="neutro" type="text" />
                            <div id="neutro_error"class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 form-label">Tensión</label>
                        <div class="col-sm-9">
                            <input class="form-control" id="tension" name="tension" type="text" />
                            <div id="tension_error"class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group row">
                        <label class="col-sm-4 form-label">Impedancia</label>
                        <div class="col-sm-8">
                            <input class="form-control" id="impedancia" name="impedancia" type="text" />
                            <div id="impedancia_error"class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group row">
                        <label class="col-sm-2 form-label">A</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="a" name="a" type="text" />
                            <div id="a_error"class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group row">
                        <label class="col-sm-2 form-label">C</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="c" name="c" type="text" />
                            <div id="c_error"class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group row">
                        <label class="col-sm-4 form-label">Lts de aceite</label>
                        <div class="col-sm-8">
                            <input class="form-control" id="lts_aceite" name="lts_aceite" type="text" />
                            <div id="lts_aceite_error"class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-6 form-label">Conexión primaria</label>
                        <div class="col-sm-3">

                            <img alt="" height="40px" src="{{ asset('images/gnc/triangle-svgrepo-com.svg') }}"
                                width="40px">
                            <input class="col-form-check-input" name="conex_primario" type="radio" value="delta">
                        </div>
                        <div class="col-sm-3">
                            <img alt="" height="40px" src="{{ asset('images/gnc/pata_gallo.svg') }}"
                                width="40px">
                            <input class="col-form-check-input" name="conex_primario" type="radio" value="estrella">
                        </div>
                    </div>
                </div>
                {{-- ANOMALIA LAMPARAS --}}
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-6 form-label">Conexión secundaria</label>
                        <div class="col-sm-3">
                            <img alt="" height="40px" src="{{ asset('images/gnc/triangle-svgrepo-com.svg') }}"
                                width="40px">
                            <input class="col-form-check-input" name="conex_secundario" type="radio" value="delta">
                        </div>
                        <div class="col-sm-3">
                            <img alt="" height="40px" src="{{ asset('images/gnc/pata_gallo.svg') }}"
                                width="40px">
                            <input class="col-form-check-input" name="conex_secundario" type="radio" value="estrella">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group row">
                        <label class="col-sm-6 form-label">Año de fabricación</label>
                        <div class="col-sm-6">
                            <input class="form-control" id="fecha_fabricacion" name="fecha_fabricacion"
                                type="text" />
                            <div id="fecha_fabricacion_error"class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group row">
                        <label class="col-sm-3 form-label">Aceite</label>
                        <div class="col-sm-9">
                            <input class="form-control" id="aceite" name="aceite" type="text" />
                            <div id="aceite_error"class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Pesos total</label>
                        <div class="col-sm-8">
                            <input class="form-control" name="peso_total"id="peso_total" type="text" />
                            <div id="peso_total_error"class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <p class="card-description text-sm font-bold">Revisión y limpieza</p>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Limpieza general</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="limpieza"id="limpieza" type="text" />
                            <div id="limpieza_error"class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Indicador de nivel</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="indicador_nivel"id="indicador_nivel" type="text" />
                            <div id="indicador_nivel_error"class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Indicador de temperatura</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="indicador_temperatura"id="indicador_temperatura"
                                type="text" />
                            <div id="indicador_temperatura_error"class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Indicador de temperatura
                            máxima</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="indicador_temperatura_max"id="indicador_temperatura_max"
                                type="text" />
                            <div id="indicador_temperatura_max_error"class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Válvula de alivio</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="valvula_alivio"id="valvula_alivio" type="text" />
                            <div id="valvula_alivio_error"class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Válvula de llenado</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="valvula_llenado"id="valvula_llenado" type="text" />
                            <div id="valvula_llenado_error"class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Válvula de drenado</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="valvula_drenado"id="valvula_drenado" type="text" />
                            <div id="valvula_drenado_error"class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Válvula de muestreo</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="valvula_muestreo"id="valvula_muestreo" type="text" />
                            <div id="valvula_muestreo_error"class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Cambiador de derivaciones</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="cambiador_derivaciones"id="cambiador_derivaciones"
                                type="text" />
                            <div id="cambiador_derivaciones_error"class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Estado de la pintura</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="pintura_estado"id="pintura_estado" type="text" />
                            <div id="pintura_estado_error"class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <p class="card-description text-sm font-bold">Puesta a tierra</p>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Neutro</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="tierra_neutro"id="tierra_neutro" type="text" />
                            <div id="tierra_neutro_error"class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Tanque</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="tierra_tanque"id="tierra_tanque" type="text" />
                            <div id="tierra_tanque_error"class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Codos</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="tierra_codos"id="tierra_codos" type="text" />
                            <div id="tierra_codos_error"class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Insertos</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="tierra_insertos"id="tierra_insertos" type="text" />
                            <div id="tierra_insertos_error"class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <p class="card-description text-sm font-bold">Boquillas primario</p>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Boquillas H1</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="boquillas_h1"id="boquillas_h1" type="text" />
                            <div id="boquillas_h1_error"class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Boquillas X0</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="boquillas_h2"id="boquillas_h2" type="text" />
                            <div id="boquillas_h2_error"class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Boquillas H2</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="boquillas_h3"id="boquillas_h3" type="text" />
                            <div id="boquillas_h3_error"class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Boquillas X1</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="boquillas_x0"id="boquillas_x0" type="text" />
                            <div id="boquillas_x0_error"class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Boquillas H3</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="boquillas_x1"id="boquillas_x1" type="text" />
                            <div id="boquillas_x1_error"class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Boquillas X2</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="boquillas_x2"id="boquillas_x2" type="text" />
                            <div id="boquillas_x2_error"class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Boquillas X3</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="boquillas_x3"id="boquillas_x3" type="text" />
                            <div id="boquillas_x3_error"class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="col-md-12">
                <div class="form-group row">
                    <label>Observaciones:</label>
                    <textarea class="form-control" id="observaciones" name="observaciones" rows="5"></textarea>
                    <div id="observaciones_error"class="invalid-feedback"></div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword4">Imagen (3 requeridas)</label>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input accept=".png, .jpg, .jpeg" class="form-control" id="img1" name="img1"
                                type="file" />
                            <div id="img1_error"class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input accept=".png, .jpg, .jpeg" class="form-control"id="img2" name="img2"
                                type="file" />
                            <div id="img2_error"class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input accept=".png, .jpg, .jpeg" class="form-control" name="img3"id="img3"
                                type="file" />
                            <div id="img3_error"class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input accept=".png, .jpg, .jpeg" class="form-control" name="img4"id="img4"
                                type="file" />
                            <div id="img4_error"class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input accept=".png, .jpg, .jpeg" class="form-control" name="img5"id="img5"
                                type="file" />
                            <div id="img5_error"class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input accept=".png, .jpg, .jpeg" class="form-control" name="img6"id="img6"
                                type="file" />
                            <div id="img6_error"class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- INPUT --}}
            <input id="inspeccion_id"name="inspeccion_id" type="hidden" value="{{ $inspeccion->id }}">

        </div>
        @include('tecnico.inspecciones.header.botones')

        </form>

        <!-- fin form -->
    </div>
@endsection
