<div>
    <h2>Inspección a la red eléctrica</h2>
    @foreach ($data as $item)
        <table>
            <tbody>
                <tr>
                    <th colspan="2">Cliente</th>
                    <td colspan="4">{{ $data_inspeccion[0]->enterprise->enterprise }}</td>
                    <th colspan="2">Fecha</th>
                    <td colspan="4">{{ $data_inspeccion[0]->fecha_fin }}</td>
                </tr>
                <tr>
                    <th colspan="2">Subestación</th>
                    <td colspan="10">{{ $data_inspeccion[0]->subestacion->subestacion }}</td>
                </tr>
                <tr>
                    <th colspan="12"> CANALIZACIONES EN M.T. </th>
                </tr>
                <tr>
                    <td colspan="2">Requiere desasolve</td>
                    <td colspan="1"> 
                    @if ($item->disasolve_req == 1)
                    Si
                    @else
                    No
                    @endif
                    </td>
                    <td colspan="2">Cantidad</td>
                    <td colspan="1"> {{$item->disasolve_cantidad}} </td>
                    <td colspan="2">Requiere limpieza</td>
                    <td colspan="1">
                    @if ($item->mt_limpieza_req == 1)
                    Si
                    @else
                    No
                    @endif
                    </td>
                    <td colspan="2">Cantidad</td>
                    <td colspan="1"> {{$item->mt_limpieza_cantidad}}</td>
                </tr>
                <tr>
                    <td colspan="3">Soportería</td>
                    <td colspan="1">
                    @if ($item->ten_media_soporteria == 1)
                    Si
                    @else
                    No
                    @endif
                    </td>
                    <td colspan="2">Estado</td>
                    <td colspan="2">
                    @if ($item->ten_media_soporteria_edo == 1)
                    Buen estado
                    @elseif ($item->ten_media_soporteria_edo == 0)
                        Mal estado
                        @else
                        -
                        @endif
                    </td>
                    <td colspan="2">Faltante</td>
                    <td colspan="2">{{$item->ten_media_soporteria_faltante}}</td>
                </tr>

                <tr>
                    <td colspan="3">Sistemas de tierra</td>
                    <td colspan="1">
                    @if ($item->sis_tierra == 1)
                    Si
                    @else
                    No
                    @endif
                    </td>
                    <td colspan="2">Estado</td>
                    <td colspan="2">
                    @if ($item->sis_tierra_edo == 1)
                    Buen estado
                    @elseif ($item->sis_tierra_edo == 0)
                        Mal estado
                        @else
                        -
                        @endif
                    </td>
                    <td colspan="2">Faltante</td>
                    <td colspan="2">{{$item->sis_tierra_faltante}}</td>
                </tr>

                <tr>
                    <td colspan="3">Conx. sistemas de tierra</td>
                    <td colspan="1">
                    @if ($item->conex_tierra == 1)
                    Si
                    @else
                    No
                    @endif
                    </td>
                    <td colspan="2">Estado</td>
                    <td colspan="2">
                    @if ($item->conex_tierra_edo == 1)
                    Buen estado
                    @elseif ($item->conex_tierra_edo == 0)
                        Mal estado
                        @else
                        -
                        @endif
                    </td>
                    <td colspan="2">Faltante</td>
                    <td colspan="2">{{$item->conex_tierra_faltante}}</td>
                </tr>

                <tr>
                    <td colspan="3">Sellado de ductería</td>
                    <td colspan="1">
                    @if ($item->sellado_ducteria == 1)
                    Si
                    @else
                    No
                    @endif
                    </td>
                    <td colspan="2">Estado</td>
                    <td colspan="2">
                    @if ($item->sellado_ducteria_edo == 1)
                    Buen estado
                    @elseif ($item->sellado_ducteria_edo == 0)
                        Mal estado
                        @else
                        -
                        @endif
                    </td>
                    <td colspan="2">Faltante</td>
                    <td colspan="2">{{$item->sellado_ducteria_faltante}}</td>
                </tr>

                <tr>
                    <th colspan="12"> OBSERVACIONES </th>
                </tr>
                <tr>
                    <td colspan="12"> {{$item->mt_observaciones}} </td>
                </tr>
                <tr>
                    <th colspan="12"> CANALIZACIONES EN B.T. </th>
                </tr>
                <tr>
                    <td colspan="6">Tipo de canalizaciones</td>
                    <td colspan="6"> {{$item->tipo_canalizacion}} </td>
                </tr>

                <tr>
                    <td colspan="3">Requiere tornillería</td>
                    <td colspan="1">
                    @if ($item->torni == 1)
                    Si
                    @else
                    No
                    @endif
                    </td>
                    <td colspan="2">Cantidad</td>
                    <td colspan="2"> {{$item->torni_cantidad}} </td>
                    <td colspan="3">Requiere limpieza</td>
                    <td colspan="1">
                    @if ($item->torni_limpieza == 1)
                    Si
                    @else
                    No
                    @endif
                    </td>
                </tr>

                <tr>
                    <td colspan="3">Soportería</td>
                    <td colspan="1">
                    @if ($item->bt_soporteria == 1)
                    Si
                    @else
                    No
                    @endif
                    </td>
                    <td colspan="2">Estado</td>
                    <td colspan="2">
                    @if ($item->bt_soporteria_edo == 1)
                    Buen estado
                    @elseif ($item->bt_soporteria_edo == 0)
                        Mal estado
                        @else
                        -
                        @endif
                    </td>
                    <td colspan="2">Faltante</td>
                    <td colspan="2">{{$item->bt_soporteria_faltante}}</td>
                </tr>

                <tr>
                    <th colspan="12"> OBSERVACIONES </th>
                </tr>
                <tr>
                    <td colspan="12"> {{$item->mb_observaciones}} </td>
                </tr>

                <tr>
                    <th colspan="12"> INTERRUPTORES EN B.T. </th>
                </tr>

                <tr>
                    <td colspan="5">No. Interruptores y/o gabinetes en B.T.</td>
                    <td colspan="1"> {{$item->int_no}} </td>
                    <td colspan="2">Requiere limpieza</td>
                    <td colspan="1">
                    @if ($item->int_limpieza == 1)
                    Si
                    @else
                    No
                    @endif
                    </td>
                    <td colspan="2">Cantidad</td>
                    <td colspan="1"> {{$item->int_limpieza_cantidad}} </td>
                </tr>

                <tr>
                    <td colspan="4">Estado de interruptores</td>
                    <td colspan="3">
                    @if ($item->int_edo == 1)
                    Buen estado
                    @elseif ($item->int_edo == 0)
                    Mal estado
                    @else
                    -
                    @endif
                    </td>
                    <td colspan="3">Requiere tornillería</td>
                    <td colspan="2">
                    @if ($item->int_torni == 1)
                    Si
                    @else
                    No
                    @endif
                    </td>
                </tr>

                <tr>
                    <td colspan="3">Señalización interruptores</td>
                    <td colspan="1">
                    @if ($item->int_senalizacion == 1)
                    Si
                    @else
                    No
                    @endif
                    </td>
                    <td colspan="2">Estado</td>
                    <td colspan="2">
                    @if ($item->int_senalizacion_edo == 1)
                    Buen estado
                    @elseif ($item->int_senalizacion_edo == 0)
                    Mal estado
                    @else
                    -
                    @endif
                    </td>
                    <td colspan="2">Faltante</td>
                    <td colspan="2">{{$item->int_senalizacion_faltante}}</td>
                </tr>

                <tr>
                    <td colspan="3">Señalización circuitos</td>
                    <td colspan="1">
                    @if ($item->circuitos == 1)
                    Si
                    @else
                    No
                    @endif
                    </td>
                    <td colspan="2">Estado</td>
                    <td colspan="2">
                    @if ($item->circuitos_edo == 1)
                    Buen estado
                    @elseif ($item->circuitos_edo == 0)
                    Mal estado
                    @else
                    -
                    @endif
                    </td>
                    <td colspan="2">Faltante</td>
                    <td colspan="2">{{$item->circuitos_faltante}}</td>
                </tr>

                <tr>
                    <td colspan="3">Espacios disponibles</td>
                    <td colspan="1">
                    @if ($item->disponible == 1)
                    Si
                    @else
                    No
                    @endif
                    </td>
                    <td colspan="2">Cantidad</td>
                    <td colspan="2">
                    @if ($item->disponible_cantidad != "")
                    {{$item->disponible_cantidad}}
                    @else
                    -
                    @endif
                    </td>
                    <td colspan="2">Faltante</td>
                    <td colspan="2">{{$item->disponible_faltante}}</td>
                </tr>

                <tr>
                    <th colspan="12"> OBSERVACIONES </th>
                </tr>
                <tr>
                    <td colspan="12"> {{$item->bt_observaciones}} </td>
                </tr>

                @if ($data_inspeccion[0]->subestacion->type_id == 2)
                    <tr>
                        <th colspan="12"> CABLEADO EN M.T. </th>
                    </tr>

                    <tr>
                        <td colspan="7">Accesorios subterráneos (estado)</td>
                        <td colspan="5">
                        @if ($item->acc_subterraneo_edo == 1)
                        Buen estado
                        @elseif ($item->acc_subterraneo_edo == 0)
                        Mal estado
                        @else
                        -
                        @endif
                        </td>
                    </tr>

                    <tr>
                        <td colspan="5">No. de codos OCC</td>
                        <td colspan="2">{{$item->no_codos_occ}} </td>
                        <td colspan="2">Estado</td>
                        <td colspan="3">
                        @if ($item->codos_occ_edo == 1)
                        Buen estado
                        @elseif ($item->codos_occ_edo == 0)
                        Mal estado
                        @else
                        -
                        @endif
                        </td>
                    </tr>

                    <tr>
                        <td colspan="5">No. de insertos OCC</td>
                        <td colspan="2">{{$item->no_insertos_occ}}</td>
                        <td colspan="2">Estado</td>
                        <td colspan="3">
                        @if ($item->insertos_occ_edo == 1)
                        Buen estado
                        @elseif ($item->insertos_occ_edo == 0)
                        Mal estado
                        @else
                        -
                        @endif
                        </td>
                    </tr>

                    <tr>
                        <td colspan="5">No. de adaptadores de tierra</td>
                        <td colspan="1">{{$item->no_insertos_occ}}</td>
                        <td colspan="2">Estado</td>
                        <td colspan="2">
                        @if ($item->adpt_tierra_edo == 1)
                        Buen estado
                        @elseif ($item->adpt_tierra_edo == 0)
                        Mal estado
                        @else
                        -
                        @endif
                        </td>
                        <td colspan="1">Faltante</td>
                        <td colspan="1">{{$item->adpt_tierra_faltante}}</td>
                    </tr>

                    <tr>
                        <td colspan="5">No. de barras de tierra</td>
                        <td colspan="1">{{$item->no_barras_tierra}}</td>
                        <td colspan="2">Estado</td>
                        <td colspan="2">
                        @if ($item->barras_tierra_edo == 1)
                        Buen estado
                        @elseif ($item->barras_tierra_edo == 0)
                        Mal estado
                        @else
                        -
                        @endif
                        </td>
                        <td colspan="1">Faltante</td>
                        <td colspan="1">{{$item->barras_tierra_faltante}}</td>
                    </tr>
                @else
                    <tr>
                        <th colspan="12"> S.E. COMPACTA </th>
                    </tr>

                    <tr>
                        <td colspan="7">Accesorios subterráneos (estado)</td>
                        <td colspan="5">
                        @if ($item->acc_subterraneo_edo == 1)
                        Buen estado
                        @elseif ($item->acc_subterraneo_edo == 0)
                        Mal estado
                        @else
                        -
                        @endif
                        </td>
                    </tr>

                    <tr>
                        <td colspan="5">Codos</td>
                        <td colspan="2">
                        @if ($item->codos == 1)
                        Si
                        @else
                        No
                        @endif
                        </td>
                        <td colspan="2">Estado</td>
                        <td colspan="3">
                        @if ($item->codos_edo == 1)
                        Buen estado
                        @elseif ($item->codos_edo == 0)
                        Mal estado
                        @else
                        -
                        @endif
                        </td>
                    </tr>

                    <tr>
                        <td colspan="5">Terminales</td>
                        <td colspan="2">
                        @if ($item->terminales == 1)
                        Si
                        @else
                        No
                        @endif
                        </td>
                        <td colspan="2">Estado</td>
                        <td colspan="3">
                        @if ($item->terminales_edo == 1)
                        Buen estado
                        @elseif ($item->terminales_edo == 0)
                        Mal estado
                        @else
                        -
                        @endif
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">Fusibles</td>
                        <td colspan="1">
                        @if ($item->fusibles == 1)
                        Si
                        @else
                        No
                        @endif
                        </td>
                        <td colspan="1">Capacidad.</td>
                        <td colspan="1">{{$item->fusibles_capacidad}}</td>
                        <td colspan="2">Estado</td>
                        <td colspan="2">
                        @if ($item->fusibles_edo == 1)
                        Buen estado
                        @elseif ($item->fusibles_edo == 0)
                        Mal estado
                        @else
                        -
                        @endif
                        </td>
                        <td colspan="2">Faltante</td>
                        <td colspan="1">{{$item->fusibles_faltante}}</td>
                    </tr>

                    <tr>
                        <td colspan="3">Mecanismo Op.</td>
                        <td colspan="1">
                        @if ($item->mecanismo == 1)
                        Si
                        @else
                        No
                        @endif
                        </td>
                        <td colspan="2">Estado</td>
                        <td colspan="2">
                        @if ($item->mecanismo_edo == 1)
                        Buen estado
                        @elseif ($item->mecanismo_edo == 0)
                        Mal estado
                        @else
                        -
                        @endif
                        </td>
                        <td colspan="2">Dañado</td>
                        <td colspan="2">{{$item->mecanismo_danado}}</td>

                    </tr>
                @endif

                <tr>
                    <td colspan="7">Colocación y acomodo de cable (estado)</td>
                    <td colspan="5">
                    @if ($item->se_cable_acomodo_edo == 1)
                        Buen estado
                        @elseif ($item->se_cable_acomodo_edo == 0)
                        Mal estado
                        @else
                        -
                        @endif
                    </td>
                </tr>

                <tr>
                    <td colspan="2">ID. marbetes</td>
                    <td colspan="1">
                    @if ($item->marbete == 1)
                        Si
                        @else
                        No
                        @endif
                    </td>
                    <td colspan="3">Estado</td>
                    <td colspan="3">
                    @if ($item->marbete_edo == 1)
                        Buen estado
                        @elseif ($item->marbete_edo == 0)
                        Mal estado
                        @else
                        -
                        @endif
                    </td>
                    <td colspan="2">Faltante</td>
                    <td colspan="1">{{$item->marbete_faltante}}</td>
                </tr>

                <tr>
                    <th colspan="12"> OBSERVACIONES </th>
                </tr>

                <tr>
                    <td colspan="12">{{$item->mt_cableado_observaciones}}</td>
                </tr>

                <tr>
                    <th colspan="12"> CABLEADO EN B.T. </th>
                </tr>

                <tr>
                    <td colspan="7">Colocación y acomodo de cable (estado)</td>
                    <td colspan="5">
                    @if ($item->bt_cableado_cable_acomodo == 1)
                        Buen estado
                        @elseif ($item->bt_cableado_cable_acomodo == 0)
                        Mal estado
                        @else
                        -
                        @endif
                    </td>
                </tr>

                <tr>
                    <td colspan="5">Conexiones (estado)</td>
                    <td colspan="3">
                    @if ($item->bt_cableado_conexiones == 1)
                        Buen estado
                        @elseif ($item->bt_cableado_conexiones == 0)
                        Mal estado
                        @else
                        -
                        @endif
                    </td>
                    <td colspan="2">Faltante</td>
                    <td colspan="2">{{$item->bt_cableado_conexiones_faltante}}</td>
                </tr>

                <tr>
                    <th colspan="12"> OBSERVACIONES </th>
                </tr>

                <tr>
                    <td colspan="12">{{$item->bt_cableado_conexiones_observaciones}}</td>
                </tr>

                <tr>
                    <th colspan="12"> MEDICIÓN DE VOLTAJES </th>
                </tr>

                <tr>
                    <td colspan="3" rowspan="2"> Voltaje en transfromador </td>
                    <td colspan="2">Vab</td>
                    <td colspan="1">{{$item->t_vab}}</td>
                    <td colspan="2">Vbc</td>
                    <td colspan="1">{{$item->t_vbc}}</td>
                    <td colspan="2">Vbc-2</td>
                    <td colspan="1">{{$item->t_vbc2}}</td>
                </tr>

                <tr>
                    <td colspan="2">Van</td>
                    <td colspan="1">{{$item->t_van}}</td>
                    <td colspan="2">Vbn</td>
                    <td colspan="1">{{$item->t_vbn}}</td>
                    <td colspan="2">Vcn</td>
                    <td colspan="1">{{$item->t_vcn}}</td>
                </tr>

                <tr>
                    <td colspan="3" rowspan="2"> Voltaje en interruptor principal </td>
                    <td colspan="2">Vab</td>
                    <td colspan="1">{{$item->i_vab}}</td>
                    <td colspan="2">Vbc</td>
                    <td colspan="1">{{$item->i_vbc}}</td>
                    <td colspan="2">Vbc-2</td>
                    <td colspan="1">{{$item->i_vbc2}}</td>
                </tr>

                <tr>
                    <td colspan="2">Van</td>
                    <td colspan="1">{{$item->i_van}}</td>
                    <td colspan="2">Vbn</td>
                    <td colspan="1">{{$item->i_vbn}}</td>
                    <td colspan="2">Vcn</td>
                    <td colspan="1">{{$item->i_vcn}}</td>
                </tr>

                <tr>
                    <td colspan="3"> Corriente en int. principal </td>
                    <td colspan="1">Ia</td>
                    <td colspan="1">{{$item->i_ia}}</td>
                    <td colspan="1">Ib</td>
                    <td colspan="1">{{$item->i_ib}}</td>
                    <td colspan="1">Ic</td>
                    <td colspan="1">{{$item->i_ic}}</td>
                    <td colspan="2">In</td>
                    <td colspan="1">{{$item->i_in}}</td>
                </tr>

                <tr>
                    <td colspan="5"></td>
                    <th colspan="2"> Realizo </th>
                    <td colspan="5"> {{ $data_inspeccion[0]->tecnico->name }}
                        {{ $data_inspeccion[0]->tecnico->last_name }}</td>
                </tr>

            </tbody>
        </table>
    @endforeach
</div>
