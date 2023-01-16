@extends('template._tecnico_inspecciones_template')

@section('test_body')
    <!-- form -->

        <div class="card">
            @include('tecnico.inspecciones.header.datos_generales')
            {{-- INICIA ENCUESTA --}}

            <div class="grid gap-8 p-5" gap-parent>
                <p class="font-bold">SISTEMA DE SEGURIDAD </p>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group row">
                            <label for="extintores_no"class="col-sm-6 form-label">No. extintores</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="extintores_no"name="extintores_no" type="text" />
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
                                <select class="form-control" name="extintores_tipo_agente"id="extintores_tipo_agente">
                                    <option disabled selected value="0">-- Seleccionar </option>
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
                            <label class="col-sm-4 form-label" for="extintores_fecha_vencimiento">Fecha
                                de vencimiento</label>
                            <div class="col-sm-8">
                                <input class="form-control" id="extintores_fecha_vencimiento"
                                    name="extintores_fecha_vencimiento" placeholder="yyyy/dd/mm" type="date" />
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
                                <input class="form-control" id="extintores_presion" name="extintores_presion"
                                    type="text" />
                                <div id="extintores_presion_error"class="invalid-feedback">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 form-label">Aro de seguridad</label>
                            <div class="col-sm-9">
                                <input class="form-control" id="extintores_aro_seguridad" name="extintores_aro_seguridad"
                                    type="text" />
                                <div id="extintores_aro_seguridad_error"class="invalid-feedback">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group row">
                        <label for="extintores_ubicacion">Ubicacion de extintores:</label>
                        <textarea class="form-control" id="extintores_ubicacion" name="extintores_ubicacion" rows="5"></textarea>
                        <div id="extintores_ubicacion_error"class="invalid-feedback">
                        </div>
                    </div>
                </div>
                {{-- INICIAN ANOMALIAS --}}
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-sm-6 form-label">No. lamparas</label>
                            <div class="col-sm-6">
                                <input class="form-control" name="lamparas_no"id="lamparas_no" type="text" />
                                <div id="lamparas_no_error"class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    {{-- ANOMALIA LAMPARAS --}}
                    <div class="col-md-4">
                        <div class="form-group row">
                            <div class="form-radio flex w-1/2 justify-center">
                                <input class="col-form-check-input" name="lamparas_estado" type="radio"
                                    value="Buen estado">
                                <label class="col-form-check-label"> Buen estado</label>
                            </div>
                            <div class="form-radio flex w-1/2 justify-center">
                                <input class="col-form-check-input lamparas" name="lamparas_estado"
                                    onclick="handleAnomalia('lamparas')" type="radio" value="Mal estado">
                                <label class="col-form-check-label">Mal estado </label>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-sm-4 form-label align-center">Faltante</label>
                            <div class="col-sm-8">
                                <input class="form-control" id="lamparas_faltante" name="lamparas_faltante"
                                    type="text" />
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
                                <input class="form-control" name="lamparas_emergencia_no"id="lamparas_emergencia_no"
                                    type="text" />
                                <div id="lamparas_emergencia_no_error"class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <div class="form-radio flex w-1/2 justify-center">
                                <input class="col-form-check-input" name="lamparas_emergencia_estado" type="radio"
                                    value="Buen estado">
                                <label class="col-form-check-label"> Buen estado </label>
                            </div>

                            {{-- ANOMALIA LAMPARAS EMERGENCIA --}}
                            <div class="form-radio flex w-1/2 justify-center">
                                <input class="col-form-check-input lamparas_emergencia" name="lamparas_emergencia_estado"
                                    onclick="handleAnomalia('lamparas_emergencia')" type="radio" value="Mal estado">
                                <label class="col-form-check-label">Mal estado </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Faltante</label>
                            <div class="col-sm-8">
                                <input class="form-control"
                                    name="lamparas_emergencia_faltante"id="lamparas_emergencia_faltante"
                                    type="text" />
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
                                <input class="form-control" id="senalizacion_seguridad" name="senalizacion_seguridad"
                                    type="text" />
                                <div id="senalizacion_seguridad_error"class="invalid-feedback"></div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <div class="form-radio flex w-1/2 justify-center">
                                <input class="col-form-check-input" name="senalizacion_seguridad_estado" type="radio"
                                    value="Buen estado">
                                <label class="col-form-check-label"> Buen estado</label>
                            </div>
                            {{-- ANOMALIA SENALIZACION --}}
                            <div class="form-radio flex w-1/2 justify-center">
                                <input class="col-form-check-input senalizacion" name="senalizacion_seguridad_estado"
                                    onclick="handleAnomalia('senalizacion')" type="radio" value="Mal estado">
                                <label class="col-form-check-label">Mal estado </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Faltante</label>
                            <div class="col-sm-8">
                                <input class="form-control" id="senalizacion_seguridad_faltante"
                                    name="senalizacion_seguridad_faltante" type="text" />
                                <div id="senalizacion_seguridad_faltante_error"class="invalid-feedback">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="observaciones">Observaciones:</label>
                            <textarea class="form-control" id="senalizacion_observaciones" name="senalizacion_observaciones" rows="5"></textarea>
                            <div id="senalizacion_observaciones_error"class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
                <hr>
                <p class="font-bold">CUARTO DE S.E. </p>
                <div class="row">
                    <div class="col-md-7">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Pintura de edificio:</label>
                            <div class="col-md-9 flex">

                                <div class="form-radio flex w-1/2 justify-center">
                                    <input class="col-form-check-input" id="optionsRadios1" name="pintura_estado"
                                        type="radio" value="Buen estado">
                                    <label class="col-form-check-label">Buen estado</label>
                                </div>
                                {{-- ANOMALIA PINTURA --}}
                                <div class="form-radio flex w-1/2 justify-center">
                                    <input class="col-orm-check-input pintura" name="pintura_estado"
                                        onclick="handleAnomalia('pintura')" type="radio" value="Mal estado">
                                    <label class="col-form-check-label"> Mal estado </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Requiere pintura</label>
                            <div class="col-sm-7">
                                <input class="form-control" id="pintura_requiere" name="pintura_requiere"
                                    type="text" />
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

                                <div class="form-radio flex w-1/2 justify-center">
                                    <input class="col-form-check-input" name="herreria_estado"id="herreria_estado_si"
                                        type="radio" value="Buen estado">
                                    <label class="col-form-check-label" for="herreria_estado">Buen
                                        estado</label>
                                </div>
                                {{-- ANOMALIA HERRERIA  --}}
                                <div class="form-radio flex w-1/2 justify-center">
                                    <input class="col-form-check-input herreria" id="herreria_estado_no"
                                        name="herreria_estado" onclick="handleAnomalia('herreria')" type="radio"
                                        value="Mal estado">
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
                                <input class="form-control" id="herreria_requiere" name="herreria_requiere"
                                    type="text" />
                                <div id="herreria_requiere_error"class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label>Observaciones:</label>
                            <textarea class="form-control" id="herreria_observaciones" name="herreria_observaciones" rows="5"></textarea>
                            <div id="herreria_observaciones_error"class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <p class="font-bold">Imagenes (3 requeridas)</p>
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

            </div>
            <input id="inspeccion_id"name="inspeccion_id" type="hidden" value="{{ $inspeccion->id }}">

            @include('tecnico.inspecciones.header.botones')
            </form>
        </div>
@endsection
