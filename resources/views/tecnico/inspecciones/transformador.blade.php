@extends('template')




@section('content')
    @include('spinner')

    <div id="divLoading" style="opacity:0">
        <!--navbar -->
        @include('tecnico._navbar')
        <div class="container-fluid page-body-wrapper">
            <!-- sidebar -->

            @include('tecnico.inspecciones._sidebar')

            <div class="main-panel">
                <div class="content-wrapper ">
                    <!-- Body -->
                    <style>
                        label {
                            margin: 0;
                            padding: 0;
                            align-self: center
                        }
                    </style>
                    <!-- form -->
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Ingresa los datos</h4>
                                <form id="form-inspecciones" class="form-sample needs-validation" novalidate
                                    onsubmit="event.preventDefault(); saveInspeccion({{ $inspeccion->id }})">

                                    <input type="hidden" name="inspeccion_id" id="inspeccion_id"
                                        value="{{ $inspeccion->id }}">
                                    <p class="card-description">Datos generales</p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Nombre empresa:</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" readonly=»readonly»/
                                                        value="{{ $inspeccion->enterprise->enterprise }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Otorgada en</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" readonly=»readonly»
                                                        value="{{ $inspeccion->fecha_inicio }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Iniciada en:</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" readonly=»readonly»
                                                        value="@php echo date('Y-d-m h:i', time()); @endphp" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Nombre de la <br>Sub -
                                                    estacion:</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" readonly=»readonly»/
                                                        value="{{ $inspeccion->subestacion->subestacion }}">
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
                                                <label for="extintores_no"class="col-sm-3 form-label">Marca</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                        id="extintores_no"name="extintores_no" />
                                                    <div id="extintores_no_error"class="invalid-feedback">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-label"
                                                    for="extintores_fecha_vencimiento">Capacidad</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                        name="extintores_fecha_vencimiento"
                                                        id="extintores_fecha_vencimiento" />
                                                    <div id="extintores_fecha_vencimiento_error"class="invalid-feedback">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-label">Neutro</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="extintores_presion"
                                                        id="extintores_presion" />
                                                    <div id="extintores_presion_error"class="invalid-feedback">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-label">Tensión</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                        name="extintores_aro_seguridad" id="extintores_aro_seguridad" />
                                                    <div id="extintores_aro_seguridad_error"class="invalid-feedback">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group row">
                                                <label class="col-sm-6 form-label">Impedancia</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control"
                                                        name="extintores_aro_seguridad" id="extintores_aro_seguridad" />
                                                    <div id="extintores_aro_seguridad_error"class="invalid-feedback">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group row">
                                                <label class="col-sm-6 form-label">A</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control"
                                                        name="extintores_aro_seguridad" id="extintores_aro_seguridad" />
                                                    <div id="extintores_aro_seguridad_error"class="invalid-feedback">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group row">
                                                <label class="col-sm-6 form-label">C:</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control"
                                                        name="extintores_aro_seguridad" id="extintores_aro_seguridad" />
                                                    <div id="extintores_aro_seguridad_error"class="invalid-feedback">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group row">
                                                <label class="col-sm-6 form-label">Lts de aceite</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control"
                                                        name="extintores_aro_seguridad" id="extintores_aro_seguridad" />
                                                    <div id="extintores_aro_seguridad_error"class="invalid-feedback">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- INICIAN ANOMALIAS --}}
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="col-sm-6 form-label">Conexión primario</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control"
                                                        name="lamparas_no"id="lamparas_no" />
                                                    <div id="lamparas_no_error"class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- ANOMALIA LAMPARAS --}}
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <div class="form-radio flex justify-center w-1/2">
                                                    <input type="radio" class="col-form-check-input"
                                                        name="lamparas_estado" value="Buen estado">
                                                    <label class="col-form-check-label"> Buen estado</label>
                                                </div>
                                                <div class="form-radio  flex justify-center w-1/2">
                                                    <input type="radio" class="col-form-check-input lamparas"
                                                        name="lamparas_estado" value="Mal estado"
                                                        onclick="handleAnomalia('lamparas')">
                                                    <label class="col-form-check-label">Mal estado </label>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="col-sm-4 form-label align-center">Faltante</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="lamparas_faltante"
                                                        id="lamparas_faltante" />
                                                    <div id="lamparas_faltante_error"class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="col-sm-6 form-label">Año de fabricación</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control"
                                                        name="extintores_aro_seguridad" id="extintores_aro_seguridad" />
                                                    <div id="extintores_aro_seguridad_error"class="invalid-feedback">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-label">Aceite</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                        name="extintores_aro_seguridad" id="extintores_aro_seguridad" />
                                                    <div id="extintores_aro_seguridad_error"class="invalid-feedback">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Pesos total</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control"
                                                        name="lamparas_emergencia_faltante"id="lamparas_emergencia_faltante" />
                                                    <div id="lamparas_emergencia_faltante_error"class="invalid-feedback">
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
                                                    <input type="text" class="form-control"
                                                        name="lamparas_emergencia_faltante"id="lamparas_emergencia_faltante" />
                                                    <div id="lamparas_emergencia_faltante_error"class="invalid-feedback">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Indicador de nivel</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                        name="lamparas_emergencia_faltante"id="lamparas_emergencia_faltante" />
                                                    <div id="lamparas_emergencia_faltante_error"class="invalid-feedback">
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
                                                        name="lamparas_emergencia_faltante"id="lamparas_emergencia_faltante" />
                                                    <div id="lamparas_emergencia_faltante_error"class="invalid-feedback">
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
                                                        name="lamparas_emergencia_faltante"id="lamparas_emergencia_faltante" />
                                                    <div id="lamparas_emergencia_faltante_error"class="invalid-feedback">
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
                                                        name="lamparas_emergencia_faltante"id="lamparas_emergencia_faltante" />
                                                    <div id="lamparas_emergencia_faltante_error"class="invalid-feedback">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Válvula de llenado</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                        name="lamparas_emergencia_faltante"id="lamparas_emergencia_faltante" />
                                                    <div id="lamparas_emergencia_faltante_error"class="invalid-feedback">
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
                                                        name="lamparas_emergencia_faltante"id="lamparas_emergencia_faltante" />
                                                    <div id="lamparas_emergencia_faltante_error"class="invalid-feedback">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Válvula de muestreo</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                        name="lamparas_emergencia_faltante"id="lamparas_emergencia_faltante" />
                                                    <div id="lamparas_emergencia_faltante_error"class="invalid-feedback">
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
                                                        name="lamparas_emergencia_faltante"id="lamparas_emergencia_faltante" />
                                                    <div id="lamparas_emergencia_faltante_error"class="invalid-feedback">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Estado de la pintura</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                        name="lamparas_emergencia_faltante"id="lamparas_emergencia_faltante" />
                                                    <div id="lamparas_emergencia_faltante_error"class="invalid-feedback">
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
                                                    <input type="text" class="form-control"
                                                        name="lamparas_emergencia_faltante"id="lamparas_emergencia_faltante" />
                                                    <div id="lamparas_emergencia_faltante_error"class="invalid-feedback">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Tanque</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                        name="lamparas_emergencia_faltante"id="lamparas_emergencia_faltante" />
                                                    <div id="lamparas_emergencia_faltante_error"class="invalid-feedback">
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
                                                    <input type="text" class="form-control"
                                                        name="lamparas_emergencia_faltante"id="lamparas_emergencia_faltante" />
                                                    <div id="lamparas_emergencia_faltante_error"class="invalid-feedback">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Insertos</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                        name="lamparas_emergencia_faltante"id="lamparas_emergencia_faltante" />
                                                    <div id="lamparas_emergencia_faltante_error"class="invalid-feedback">
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
                                                    <input type="text" class="form-control"
                                                        name="lamparas_emergencia_faltante"id="lamparas_emergencia_faltante" />
                                                    <div id="lamparas_emergencia_faltante_error"class="invalid-feedback">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Boquillas X0</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                        name="lamparas_emergencia_faltante"id="lamparas_emergencia_faltante" />
                                                    <div id="lamparas_emergencia_faltante_error"class="invalid-feedback">
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
                                                    <input type="text" class="form-control"
                                                        name="lamparas_emergencia_faltante"id="lamparas_emergencia_faltante" />
                                                    <div id="lamparas_emergencia_faltante_error"class="invalid-feedback">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Boquillas X1</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                        name="lamparas_emergencia_faltante"id="lamparas_emergencia_faltante" />
                                                    <div id="lamparas_emergencia_faltante_error"class="invalid-feedback">
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
                                                    <input type="text" class="form-control"
                                                        name="lamparas_emergencia_faltante"id="lamparas_emergencia_faltante" />
                                                    <div id="lamparas_emergencia_faltante_error"class="invalid-feedback">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Boquillas X2</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                        name="lamparas_emergencia_faltante"id="lamparas_emergencia_faltante" />
                                                    <div id="lamparas_emergencia_faltante_error"class="invalid-feedback">
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
                                                    <input type="text" class="form-control"
                                                        name="lamparas_emergencia_faltante"id="lamparas_emergencia_faltante" />
                                                    <div id="lamparas_emergencia_faltante_error"class="invalid-feedback">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label>Observaciones:</label>
                                            <textarea class="form-control" rows="5" name="herreria_observaciones" id="herreria_observaciones"></textarea>
                                            <div id="herreria_observaciones_error"class="invalid-feedback"></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword4">Imagen (3 requeridas)</label>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="file" class="form-control" name="img1"
                                                        id="img1" accept=".png, .jpg, .jpeg" />
                                                    <div id="img1_error"class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="file" class="form-control"id="img2"
                                                        name="img2" accept=".png, .jpg, .jpeg" />
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
                            <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i
                                    class="fas fa-times"></i></a>
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
                                    <label id="form-select-tipo-error"
                                        class="text-sm text-red-500 tracking-wide mb-3"></label>
                                </div>
                                <div class="contenedor-inputs">
                                    <input placeholder="Marca" name="marca" id="form-marca">
                                    <input placeholder="Modelo" name="modelo" id="form-modelo">
                                    <input placeholder="Medidas" name="medidas" id="form-medidas">
                                    <textarea class="form-control" rows="3" name="descripcion" placeholder="Describa el problema"
                                        id="form-description"></textarea>
                                    <label id="form-description-error"
                                        class="text-sm text-red-500 tracking-wide mb-3"></label>
                                    <input id="form-foto" type="file" class="form-control" name="imagen"
                                        id="image" />
                                    <label id="form-foto-error" class="text-sm text-red-500 tracking-wide mb-3"></label>
                                </div>
                                <input type="hidden" value="{{ $inspeccion->id }}" name="inspeccion_id">
                                <input type="hidden" value="1" name="tipo_inspeccion_id">
                                <button type="submit">Guardar Datos</button>
                            </form>
                        </div>
                    </div>
                </div>
                @include('admin._footer')
            </div>
        </div>
    </div>
@endsection
