@extends('template._tecnico_inspecciones_template')

@section('test_body')
    <!-- form -->
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <form id="form-inspecciones" class="form-sample needs-validation" novalidate
                    onsubmit="event.preventDefault(); saveInspeccion({{ $inspeccion->id }})">
                    {{-- INPUT --}}
                    <input type="hidden" name="inspeccion_id" id="inspeccion_id"value="{{ $inspeccion->id }}">
                    {{-- DATOS GENERALES --}}
                    <div class="">
                        <p class="font-bold">Datos generales</p>
                        <div class="row">
                            <div class="col-md-6 row">
                                <label class="col-sm-3 text-sm">Nombre parque:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" readonly=»readonly»
                                        value="{{ $inspeccion->parque->parque }}">
                                </div>
                            </div>
                            <div class="col-md-6 row">
                                <label class="col-sm-3 text-sm">Nombre empresa:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" readonly=»readonly»
                                        value="{{ $inspeccion->enterprise->enterprise }}">
                                </div>
                            </div>
                        </div>
                        <div class="row my-5">
                            <div class="col-md-6 row">
                                <label class="col-sm-3 text-sm">Nombre de la<br>subestación:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" readonly=»readonly»
                                        value="{{ $inspeccion->subestacion->subestacion }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 row">
                                <label class="col-sm-3 text-sm">Otorgada en:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" readonly=»readonly»
                                        value="{{ $inspeccion->fecha_inicio }}" />
                                </div>
                            </div>
                            <div class="col-md-6 row">
                                <label class="col-sm-3 text-sm">Iniciada en:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" readonly=»readonly»
                                        value="{{ $inspeccion->fecha_comienzo }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    {{-- INICIA ENCUESTA --}}
                    <p class="card-description text-sm font-bold">Datos del equipo</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="marca"class="col-sm-3 form-label">Marca</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="marca"name="marca" />
                                    <div id="marca_error"class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 form-label"for="form_capacidad">Capacidad</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"name="capacidad"id="capacidad" />
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
                                    <input type="text" class="form-control" name="neutro"id="neutro" />
                                    <div id="neutro_error"class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 form-label">Tensión</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="tension" id="tension" />
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
                                    <input type="text" class="form-control" name="impedancia" id="impedancia" />
                                    <div id="impedancia_error"class="invalid-feedback">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group row">
                                <label class="col-sm-2 form-label">A</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="a" id="a" />
                                    <div id="a_error"class="invalid-feedback">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group row">
                                <label class="col-sm-2 form-label">C</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="c" id="c" />
                                    <div id="c_error"class="invalid-feedback">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group row">
                                <label class="col-sm-4 form-label">Lts de aceite</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="lts_aceite" id="lts_aceite" />
                                    <div id="lts_aceite_error"class="invalid-feedback">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- INICIAN ANOMALIAS --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-6 form-label">Conexión primaria</label>
                                <div class="col-sm-3">

                                    <img src="{{ asset('images/gnc/triangle-svgrepo-com.svg') }}" alt=""
                                        width="40px" height="40px">
                                    <input type="radio" class="col-form-check-input" name="conex_primario"
                                        value="delta">
                                </div>
                                <div class="col-sm-3">
                                    <img src="{{ asset('images/gnc/pata_gallo.svg') }}" alt="" width="40px"
                                        height="40px">
                                    <input type="radio" class="col-form-check-input" name="conex_primario"
                                        value="estrella">
                                </div>
                            </div>
                        </div>
                        {{-- ANOMALIA LAMPARAS --}}
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-6 form-label">Conexión secundaria</label>
                                <div class="col-sm-3">
                                    <img src="{{ asset('images/gnc/triangle-svgrepo-com.svg') }}" alt=""
                                        width="40px" height="40px">
                                    <input type="radio" class="col-form-check-input" name="conex_secundario"
                                        value="delta">
                                </div>
                                <div class="col-sm-3">
                                    <img src="{{ asset('images/gnc/pata_gallo.svg') }}" alt="" width="40px"
                                        height="40px">
                                    <input type="radio" class="col-form-check-input" name="conex_secundario"
                                        value="estrella">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label class="col-sm-6 form-label">Año de fabricación</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="fecha_fabricacion"
                                        id="fecha_fabricacion" />
                                    <div id="fecha_fabricacion_error"class="invalid-feedback">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label class="col-sm-3 form-label">Aceite</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="aceite" id="aceite" />
                                    <div id="aceite_error"class="invalid-feedback">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Pesos total</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="peso_total"id="peso_total" />
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
                                    <input type="text" class="form-control" name="limpieza"id="limpieza" />
                                    <div id="limpieza_error"class="invalid-feedback">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Indicador de nivel</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"
                                        name="indicador_nivel"id="indicador_nivel" />
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
                                    <input type="text" class="form-control"
                                        name="indicador_temperatura"id="indicador_temperatura" />
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
                                    <input type="text" class="form-control"
                                        name="indicador_temperatura_max"id="indicador_temperatura_max" />
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
                                    <input type="text" class="form-control"
                                        name="valvula_alivio"id="valvula_alivio" />
                                    <div id="valvula_alivio_error"class="invalid-feedback">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Válvula de llenado</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"
                                        name="valvula_llenado"id="valvula_llenado" />
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
                                    <input type="text" class="form-control"
                                        name="valvula_drenado"id="valvula_drenado" />
                                    <div id="valvula_drenado_error"class="invalid-feedback">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Válvula de muestreo</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"
                                        name="valvula_muestreo"id="valvula_muestreo" />
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
                                    <input type="text" class="form-control"
                                        name="cambiador_derivaciones"id="cambiador_derivaciones" />
                                    <div id="cambiador_derivaciones_error"class="invalid-feedback">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Estado de la pintura</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"
                                        name="pintura_estado"id="pintura_estado" />
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
                                    <input type="text" class="form-control" name="tierra_neutro"id="tierra_neutro" />
                                    <div id="tierra_neutro_error"class="invalid-feedback">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tanque</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="tierra_tanque"id="tierra_tanque" />
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
                                    <input type="text" class="form-control" name="tierra_codos"id="tierra_codos" />
                                    <div id="tierra_codos_error"class="invalid-feedback">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Insertos</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"
                                        name="tierra_insertos"id="tierra_insertos" />
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
                                    <input type="text" class="form-control" name="boquillas_h1"id="boquillas_h1" />
                                    <div id="boquillas_h1_error"class="invalid-feedback">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Boquillas X0</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="boquillas_h2"id="boquillas_h2" />
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
                                    <input type="text" class="form-control" name="boquillas_h3"id="boquillas_h3" />
                                    <div id="boquillas_h3_error"class="invalid-feedback">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Boquillas X1</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="boquillas_x0"id="boquillas_x0" />
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
                                    <input type="text" class="form-control" name="boquillas_x1"id="boquillas_x1" />
                                    <div id="boquillas_x1_error"class="invalid-feedback">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Boquillas X2</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="boquillas_x2"id="boquillas_x2" />
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
                                    <input type="text" class="form-control" name="boquillas_x3"id="boquillas_x3" />
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
                            <textarea class="form-control" rows="5" name="observaciones" id="observaciones"></textarea>
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
                                    <input type="file" class="form-control" name="img1" id="img1"
                                        accept=".png, .jpg, .jpeg" />
                                    <div id="img1_error"class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input type="file" class="form-control"id="img2" name="img2"
                                        accept=".png, .jpg, .jpeg" />
                                    <div id="img2_error"class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input type="file" class="form-control" accept=".png, .jpg, .jpeg"
                                        name="img3"id="img3" />
                                    <div id="img3_error"class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input type="file" class="form-control" accept=".png, .jpg, .jpeg"
                                        name="img4"id="img4" />
                                    <div id="img4_error"class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input type="file" class="form-control" accept=".png, .jpg, .jpeg"
                                        name="img5"id="img5" />
                                    <div id="img5_error"class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input type="file" class="form-control" accept=".png, .jpg, .jpeg"
                                        name="img6"id="img6" />
                                    <div id="img6_error"class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- INPUT --}}
                    <input type="hidden" value="{{ $inspeccion->id }}" name="inspeccion_id">

                    <button type="submit" class="btn btn-success mr-2">Guardar</button>
                    <button type="button"class="btn btn-light" id="btn-cancelar">Cancelar</button>
                </form>

                <!-- fin form -->
            </div>
        </div>
    </div>
    <!-- Anomalia -->
    <div class="overlay" id="overlay">
        <div class="popup" id="popup">
            <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
            <h3></h3>
            <h4>ANOMALIA DETECTADA</h4>
            <form name="anomalias" id="form-anomalias" enctype="multipart/form-data"
                onsubmit="event.preventDefault(); saveAnomalia()" data-anomalia="">
                <div class="contenedor-selects">
                    <select class="contenedor-selects" name="urgencia" id="form-select-tipo">
                        <option value="">-- Selecciona una opcion *</option>
                        <option value="Urgente">Urgente</option>
                        <option value="Inmediatamente">Inmediatamente</option>
                        <option value="Normal">Normal</option>
                    </select>
                    <label id="form-select-tipo-error" class="text-sm text-red-500 tracking-wide mb-3"></label>
                </div>
                <div class="contenedor-inputs">
                    <input placeholder="Marca" name="marca" id="form-marca">
                    <input placeholder="Modelo" name="modelo" id="form-modelo">
                    <input placeholder="Medidas" name="medidas" id="form-medidas">
                    <textarea class="form-control" rows="3" name="descripcion" placeholder="Describa el problema"
                        id="form-description"></textarea>
                    <label id="form-description-error" class="text-sm text-red-500 tracking-wide mb-3"></label>
                    <input id="form-foto" type="file" class="form-control" name="imagen" id="image" />
                    <label id="form-foto-error" class="text-sm text-red-500 tracking-wide mb-3"></label>
                </div>
                <input type="hidden" value="{{ $inspeccion->id }}" name="inspeccion_id">
                <input type="hidden" value="1" name="tipo_inspeccion_id">
                <button type="submit">Guardar Datos</button>
            </form>
        </div>
    </div>
@endsection
