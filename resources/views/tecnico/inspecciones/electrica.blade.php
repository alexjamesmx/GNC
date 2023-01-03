@extends('template._tecnico_inspecciones_template')

@section('test_body')
    <!-- form -->
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">


                <h4 class="card-title">Ingresa los datos</h4>
                <form id="form-inspecciones" class="form-sample needs-validation" novalidate
                    onsubmit="event.preventDefault(); saveInspeccion({{ $inspeccion->id }})">
                    {{-- DATOS GENERALES --}}
                    <div class="">

                        <p class="card-description">Datos generales</p>
                        <div class="row">
                            <div class="col-md-6 row">
                                <label class="col-sm-3 col-form-label">Nombre parque:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" readonly=»readonly»/
                                        value="{{ $inspeccion->parque->parque }}">
                                </div>
                            </div>
                            <div class="col-md-6 row">
                                <label class="col-sm-3 col-form-label">Nombre empresa:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" readonly=»readonly»/
                                        value="{{ $inspeccion->enterprise->enterprise }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 row">
                                <label class="col-sm-4 col-form-label">Nombre de la <br>Sub -
                                    estacion:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" readonly=»readonly»/
                                        value="{{ $inspeccion->subestacion->subestacion }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 row">
                                <label class="col-sm-3 col-form-label">Otorgada en</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" readonly=»readonly»
                                        value="{{ $inspeccion->fecha_inicio }}" />
                                </div>
                            </div>
                            <div class="col-md-6 row">
                                <label class="col-sm-3 col-form-label">Iniciada en:</label>
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
                    <p class="card-title">Canalizaciones en M.T.</p>
                    <input type="hidden" name="inspeccion_id" id="inspeccion_id" value="{{ $inspeccion->id }}">
                    {{-- DISASOLVE --}}
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Requiere disasolve:</label>
                                <div class="col-md-9 flex">
                                    <div class="form-radio flex justify-center w-1/2">
                                        <input type="radio" class="col-form-check-input" name="pintura_estado"
                                            id="optionsRadios1" value="Buen estado">
                                        <label class="col-form-check-label">Si</label>
                                    </div>
                                    {{-- ANOMALIA PINTURA --}}
                                    <div class="form-radio flex justify-center w-1/2">
                                        <input type="radio" class="col-orm-check-input pintura" name="pintura_estado"
                                            value="Mal estado" onclick="handleAnomalia('pintura')">
                                        <label class="col-form-check-label">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label">Cantidad</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="pintura_requiere"
                                        id="pintura_requiere" />
                                    <div id="pintura_requiere_error"class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- ********** --}}
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Herreria de edificio:</label>
                                <div class="col-md-9 flex">

                                    <div class="form-radio flex justify-center w-1/2">
                                        <input type="radio" class="col-form-check-input"
                                            name="herreria_estado"id="herreria_estado_si" value="Buen estado">
                                        <label class="col-form-check-label" for="herreria_estado">Buen
                                            estado</label>
                                    </div>
                                    {{-- ANOMALIA HERRERIA  --}}
                                    <div class="form-radio flex justify-center w-1/2">
                                        <input type="radio" class="col-form-check-input herreria" name="herreria_estado"
                                            id="herreria_estado_no" value="Mal estado" onclick="handleAnomalia('herreria')">
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
