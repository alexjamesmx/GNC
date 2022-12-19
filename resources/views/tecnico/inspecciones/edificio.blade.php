@extends('template')




<img id="spinner"
    class="animate-spin"style="opacity:1;position: absolute;
top: calc(50% - 24px);
left: calc(50% - 24px);"src="{{ asset('images/gnc/loader.svg') }}"
    alt="">


@section('content')
    <div id="divLoading" style="opacity:0">
        <!--navbar -->
        @include('tecnico._navbar')
        <div class="container-fluid page-body-wrapper">
            <!-- sidebar -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav mt-3">
                    <li class="nav-item nav-profile flex justify-center m-0 mb-4">
                        <a href="#" class="nav-link relative w-[95%]">
                            <div class="profile-image">

                                <img class="img-xs rounded-circle object-cover"
                                    src="{{ Auth::user()->image ? asset('images/profile/1670282071.jpg') : asset('images/worker-svgrepo-com.svg') }}"
                                    alt="profile image">
                                <div class="dot-indicator bg-success"></div>
                            </div>
                            <div class="w-full py-3">
                                <p class="break-words whitespace-normal m-0 text-white  font-bold">
                                    {{ Auth::user()->name }} </p>
                                <p class="designation p-0 !mt-2">{{ $role_cute }}</p>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item nav-category">En inspección</li>
                    <li id="nav_dashboard"class="nav-item">
                        <a class="flex justify-start mt-2 px-4 py-3 rounded nav-custom"
                            href="{{ route('tecnico.test', $inspeccion->id) }}">
                            <i class="fas fa-arrow-alt-circle-left text-white ml-12 self-center"></i>
                            <span class="menu-title text-white ml-12 text-lg">Atrás</span>
                        </a>
                    </li>
                </ul>
            </nav>

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
                                    <p class="card-description">Sistema de seguridad </p>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group row">
                                                <label for="extintores_no"class="col-sm-6 form-label">No. extintores</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control"
                                                        id="extintores_no"name="extintores_no" />
                                                    <div id="extintores_no_error"class="invalid-feedback">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="col-sm-6 form-label" for="extintores_tipo_agente">Tipo de
                                                    agente extintor</label>
                                                <div class="col-sm-6">
                                                    <select class="form-control"
                                                        name="extintores_tipo_agente"id="extintores_tipo_agente">
                                                        <option value="0" selected disabled>-- Seleccionar </option>
                                                        <option value="CO2">CO2</option>
                                                        <option value="PQS">PQS</option>
                                                    </select>
                                                    <div id="extintores_tipo_agente_error"class="invalid-feedback">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group row">
                                                <label class="col-sm-4 form-label"
                                                    for="extintores_fecha_vencimiento">Fecha
                                                    de vencimiento</label>
                                                <div class="col-sm-8">
                                                    <input type="date" class="form-control" placeholder="yyyy/dd/mm"
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
                                                <label class="col-sm-3 form-label">Presión</label>
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
                                                <label class="col-sm-3 form-label">Aro de seguridad</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                        name="extintores_aro_seguridad" id="extintores_aro_seguridad" />
                                                    <div id="extintores_aro_seguridad_error"class="invalid-feedback">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label for="extintores_ubicacion">Ubicacion de extintores:</label>
                                                <textarea class="form-control" id="extintores_ubicacion" rows="5" name="extintores_ubicacion"></textarea>
                                                <div id="extintores_ubicacion_error"class="invalid-feedback">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- INICIAN ANOMALIAS --}}
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="col-sm-6 form-label">No. lamparas</label>
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
                                                <label class="col-sm-6 col-form-label">No. Lamparas de emergencia</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control"
                                                        name="lamparas_emergencia_no"id="lamparas_emergencia_no" />
                                                    <div id="lamparas_emergencia_no_error"class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <div class="form-radio flex justify-center w-1/2">
                                                    <input type="radio" class="col-form-check-input"
                                                        name="lamparas_emergencia_estado" value="Buen estado">
                                                    <label class="col-form-check-label"> Buen estado </label>
                                                </div>

                                                {{-- ANOMALIA LAMPARAS EMERGENCIA --}}
                                                <div class="form-radio flex justify-center w-1/2">
                                                    <input type="radio" class="col-form-check-input lamparas_emergencia"
                                                        name="lamparas_emergencia_estado" value="Mal estado"
                                                        onclick="handleAnomalia('lamparas_emergencia')">
                                                    <label class="col-form-check-label">Mal estado </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Faltante</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control"
                                                        name="lamparas_emergencia_faltante"id="lamparas_emergencia_faltante" />
                                                    <div id="lamparas_emergencia_faltante_error"class="invalid-feedback">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="col-sm-6 col-form-label">Señalización de seguridad</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control"
                                                        name="senalizacion_seguridad" id="senalizacion_seguridad" />
                                                    <div id="senalizacion_seguridad_error"class="invalid-feedback"></div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <div class="form-radio flex justify-center w-1/2">
                                                    <input type="radio" class="col-form-check-input"
                                                        name="senalizacion_seguridad_estado" value="Buen estado">
                                                    <label class="col-form-check-label"> Buen estado</label>
                                                </div>
                                                {{-- ANOMALIA SENALIZACION --}}
                                                <div class="form-radio flex justify-center w-1/2">
                                                    <input type="radio" class="col-form-check-input senalizacion"
                                                        name="senalizacion_seguridad_estado" value="Mal estado"
                                                        onclick="handleAnomalia('senalizacion')">
                                                    <label class="col-form-check-label">Mal estado </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Faltante</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control"
                                                        name="senalizacion_seguridad_faltante"
                                                        id="senalizacion_seguridad_faltante" />
                                                    <div
                                                        id="senalizacion_seguridad_faltante_error"class="invalid-feedback">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label for="observaciones">Observaciones:</label>
                                                <textarea class="form-control" rows="5" name="senalizacion_observaciones" id="senalizacion_observaciones"></textarea>
                                                <div id="senalizacion_observaciones_error"class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <p class="card-description"> Cuarto de S. E. </p>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label">Pintura de edificio:</label>
                                                <div class="col-md-9 flex">

                                                    <div class="form-radio flex justify-center w-1/2">
                                                        <input type="radio" class="col-form-check-input"
                                                            name="pintura_estado" id="optionsRadios1"
                                                            value="Buen estado">
                                                        <label class="col-form-check-label">Buen estado</label>
                                                    </div>
                                                    {{-- ANOMALIA PINTURA --}}
                                                    <div class="form-radio flex justify-center w-1/2">
                                                        <input type="radio" class="col-orm-check-input pintura"
                                                            name="pintura_estado" value="Mal estado"
                                                            onclick="handleAnomalia('pintura')">
                                                        <label class="col-form-check-label"> Mal estado </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label">Requiere pintura</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" name="pintura_requiere"
                                                        id="pintura_requiere" />
                                                    <div id="pintura_requiere_error"class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label">Herreria de edificio:</label>
                                                <div class="col-md-9 flex">

                                                    <div class="form-radio flex justify-center w-1/2">
                                                        <input type="radio" class="col-form-check-input"
                                                            name="herreria_estado"id="herreria_estado_si"
                                                            value="Buen estado">
                                                        <label class="col-form-check-label" for="herreria_estado">Buen
                                                            estado</label>
                                                    </div>
                                                    {{-- ANOMALIA HERRERIA  --}}
                                                    <div class="form-radio flex justify-center w-1/2">
                                                        <input type="radio" class="col-form-check-input herreria"
                                                            name="herreria_estado" id="herreria_estado_no"
                                                            value="Mal estado" onclick="handleAnomalia('herreria')">
                                                        <label for="herreria_estado"class="col-form-check-label"> Mal
                                                            estado
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label">Requiere mantto:</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" name="herreria_requiere"
                                                        id="herreria_requiere" />
                                                    <div id="herreria_requiere_error"class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
