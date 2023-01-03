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
                    }

                    input {
                        font-size: 0.875rem !important;
                        line-height: 1.25rem !important;
                    }
                </style>
                <form id="form-inspecciones" class="form-sample needs-validation" novalidate
                    onsubmit="event.preventDefault(); saveInspeccion({{ $inspeccion->id }})">
                    {{-- DATOS GENERALES --}}
                    <div class="">
                        <p class="font-bold">Datos generales</p>
                        <div class="row">
                            <div class="col-md-6 row">
                                <label class="col-sm-3">Nombre parque:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" readonly=»readonly»
                                        value="{{ $inspeccion->parque->parque }}">
                                </div>
                            </div>
                            <div class="col-md-6 row">
                                <label class="col-sm-3">Nombre empresa:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" readonly=»readonly»
                                        value="{{ $inspeccion->enterprise->enterprise }}">
                                </div>
                            </div>
                        </div>
                        <div class="row my-5">
                            <div class="col-md-6 row">
                                <label class="col-sm-3">Nombre de la<br>subestación:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" readonly=»readonly»
                                        value="{{ $inspeccion->subestacion->subestacion }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 row">
                                <label class="col-sm-3">Otorgada en:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" readonly=»readonly»
                                        value="{{ $inspeccion->fecha_inicio }}" />
                                </div>
                            </div>
                            <div class="col-md-6 row">
                                <label class="col-sm-3">Iniciada en:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" readonly=»readonly»
                                        value="{{ $inspeccion->fecha_comienzo }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- ********** --}}
                    <hr>
                    {{-- INICIA ENCUESTA --}}
                    <input type="hidden" name="inspeccion_id" id="inspeccion_id" value="{{ $inspeccion->id }}">
                    <p class="font-bold">Canalizaciones en M.T.</p>
                    {{-- CANALIZACIONES EN M.T --}}
                    {{-- DISASOLVE --}}
                    <div class="row">
                        <div class="col-md-7">
                            <div class="row">
                                <label class="col-md-3" for="disasolve_req">Requiere disasolve</label>
                                <div class="col-md-9 flex">
                                    <div class="form-radio flex justify-center w-1/2">
                                        <input id="disasolve_req_si" type="radio" name="disasolve_req" value="1">
                                        <label for="disasolve_req" class="ml-1">Si</label>
                                    </div>
                                    {{-- ANOMALIA PINTURA --}}
                                    <div class="form-radio flex justify-center w-1/2">
                                        <input id="disasolve_req_no"type="radio" class="" name="disasolve_req"
                                            value="0">
                                        <label for="disasolve_req"class="ml-1">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="row">
                                <label class="col-md-5" for="disasolve_cantidad">Cantidad</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="disasolve_cantidad"
                                        id="disasolve_cantidad" />
                                    <div id="disasolve_cantidad_error"class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- ********** --}}
                    {{-- LIMPIEZA --}}
                    <div class="row my-4">
                        <div class="col-md-7">
                            <div class="row">
                                <label class="col-md-3" for="mt_limpieza_req">Requiere limpieza:</label>
                                <div class="col-md-9 flex">
                                    <div class="form-radio flex justify-center w-1/2">
                                        <input type="radio" name="mt_limpieza_req" id="mt_limpieza_req_si" value="1">
                                        <label class="ml-1">Si</label>
                                    </div>
                                    {{-- ANOMALIA PINTURA --}}
                                    <div class="form-radio flex justify-center w-1/2">
                                        <input type="radio" name="mt_limpieza_req" value="0"id="mt_limpieza_req_no">
                                        <label class="ml-1">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- ********** --}}
                    {{-- Soporteria --}}
                    <div class="row">
                        <div class="col-md-7">
                            <div class="row">
                                <label class="col-md-2" for="disasolve_req">Soportería</label>
                                <div class="col-md-10 flex">
                                    <div class="form-radio flex justify-center w-1/4">
                                        <input id="disasolve_req_si" type="radio" name="disasolve_req" value="1">
                                        <label for="disasolve_req" class="ml-1">Si</label>
                                    </div>
                                    <div class="form-radio flex justify-center w-1/4">
                                        <input id="disasolve_req_no"type="radio" class="" name="disasolve_req"
                                            value="0">
                                        <label for="disasolve_req" class="ml-1">No</label>
                                    </div>
                                    <div class="form-radio flex justify-center w-1/4">
                                        <input id="disasolve_req_si" type="radio" name="disasolve_req" value="1"
                                            disabled>
                                        <label for="disasolve_req" class="ml-1 opacity-50">Buen estado</label>
                                    </div>
                                    {{-- ANOMALIA SOPORTERIA --}}
                                    <div class="form-radio flex justify-center w-1/4">
                                        <input id="disasolve_req_no"type="radio" class="" name="disasolve_req"
                                            value="0"disabled>
                                        <label for="disasolve_req" class="ml-1 opacity-50">Mal estado</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="row">
                                <label class="col-md-5" for="disasolve_cantidad">Faltante</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="disasolve_cantidad"
                                        id="disasolve_cantidad" />
                                    <div id="disasolve_cantidad_error"class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- ********** --}}

                    <div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label>Observaciones:</label>
                                <textarea class="form-control" rows="5" name="herreria_observaciones" id="herreria_observaciones"></textarea>
                                <div id="herreria_observaciones_error"class="invalid-feedback"></div>
                            </div>
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
