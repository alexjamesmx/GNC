<div>
    <h2>Inspección al edificio de S.E</h2>
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
                    <th colspan="12"> SISTEMA DE SEGURIDAD </th>
                </tr>
                <tr>
                    <td colspan="3">No. de extintores</td>
                    <td>{{ $item->extintores_no }}</td>
                    <td colspan="4">Tipo de agente extintor</td>
                    <td colspan="4">{{ $item->extintores_tipo_agente }}</td>
                </tr>
                <tr>
                    <td colspan="3">Fecha de vencimiento</td>
                    <td colspan="2">{{ $item->extintores_fecha_vencimiento }}</td>
                    <td colspan="2">Presión</td>
                    <td>{{ $item->extintores_presion }}</td>
                    <td colspan="3">Aro de seguridad</td>
                    <td>{{ $item->extintores_aro_seguridad }}</td>
                </tr>
                <tr>
                    <td colspan="3">Ubicación de los extintores</td>
                    <td colspan="9">{{ $item->extintores_ubicacion }}</td>
                </tr>
                <tr>
                    <td colspan="2">No. Lámparas</td>
                    <td>{{ $item->lamparas_no }}</td>
                    <td colspan="3">Estado de lamparas</td>
                    <td colspan="3">{{ $item->lamparas_estado }}</td>
                    <td colspan="2">Faltante</td>
                    <td>{{ $item->lamparas_faltante }}</td>
                </tr>
                <tr>
                    <td colspan="2">No. Lámparas de emergencia</td>
                    <td>{{ $item->lamparas_emergencia_no }}</td>
                    <td colspan="3">Estado de lamparas de emergencia</td>
                    <td colspan="3">{{ $item->lamparas_emergencia_estado }}</td>
                    <td colspan="2">Faltante</td>
                    <td>{{ $item->lamparas_emergencia_faltante }}</td>
                </tr>
                <tr>
                    <td colspan="2">Señalización de seguridad</td>
                    <td>{{ $item->senalizacion_seguridad }}</td>
                    <td colspan="3">Estado de señalización</td>
                    <td colspan="3">{{ $item->senalizacion_seguridad_estado }}</td>
                    <td colspan="2">Faltante</td>
                    <td>{{ $item->senalizacion_seguridad_faltante }}</td>
                </tr>
                <tr>
                    <th colspan="12"> OBSERVACIONES </th>
                </tr>
                <tr>
                    <td colspan="12"> {{ $item->senalizacion_observaciones }} </td>
                </tr>
                <tr>
                    <th colspan="12"> CUARTO DE S.E. </th>
                </tr>
                <tr>
                    <td colspan="5">Estado de pintura del edificio</td>
                    <td colspan="3">{{ $item->pintura_estado }}</td>
                    <td colspan="3">Requiere pintura</td>
                    <td>{{ $item->pintura_requiere }}</td>
                </tr>
                <tr>
                    <td colspan="5">Estado de herreria del edificio</td>
                    <td colspan="3">{{ $item->herreria_estado }}</td>
                    <td colspan="3">Requiere mantto</td>
                    <td>{{ $item->herreria_requiere }}</td>
                </tr>
                <tr>
                    <th colspan="12"> OBSERVACIONES </th>
                </tr>
                <tr>
                    <td colspan="12"> {{ $item->herreria_observaciones }} </td>
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
