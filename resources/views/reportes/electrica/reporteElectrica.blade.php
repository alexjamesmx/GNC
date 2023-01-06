<div>
    <h2>Inspección a la red eléctrica</h2>
    @foreach ($data as $item)
    <table>
        <tbody>
            <tr>
                <th colspan="2">Cliente</th>
                <td colspan="4">{{$data_inspeccion[0]->enterprise->enterprise}}</td>
                <th colspan="2">Fecha</th>
                <td colspan="4">{{$data_inspeccion[0]->fecha_fin}}</td>
            </tr>
            <tr>
                <th colspan="2">Subestación</th>
                <td colspan="10">{{$data_inspeccion[0]->subestacion->subestacion}}</td>
            </tr>
            <tr>
                <th colspan="12"> CANALIZACIONES EN M.T. </th>
            </tr>
            <tr>
                <td colspan="2">Requiere desasolve</td>
                <td colspan="1"> - </td>
                <td colspan="2">Cantidad</td>
                <td colspan="1"> - </td>
                <td colspan="2">Requiere limpieza</td>
                <td colspan="1"> - </td>
                <td colspan="2">Cantidad</td>
                <td colspan="1"> - </td>
            </tr>
            <tr>
                <td colspan="3">Soportería</td>
                <td colspan="1">-</td>
                <td colspan="2">Estado</td>
                <td colspan="2">-</td>
                <td colspan="2">Faltante</td>
                <td colspan="2">-</td>
            </tr>

            <tr>
                <td colspan="3">Sistemas de tierra</td>
                <td colspan="1">-</td>
                <td colspan="2">Estado</td>
                <td colspan="2">-</td>
                <td colspan="2">Faltante</td>
                <td colspan="2">-</td>
            </tr>

            <tr>
                <td colspan="3">Conx. sistemas de tierra</td>
                <td colspan="1">-</td>
                <td colspan="2">Estado</td>
                <td colspan="2">-</td>
                <td colspan="2">Faltante</td>
                <td colspan="2">-</td>
            </tr>

            <tr>
                <td colspan="3">Sellado de ductería</td>
                <td colspan="1">-</td>
                <td colspan="2">Estado</td>
                <td colspan="2">-</td>
                <td colspan="2">Faltante</td>
                <td colspan="2">-</td>
            </tr>

            <tr>
                <th colspan="12"> OBSERVACIONES </th>
            </tr>
            <tr>
                <td colspan="12"> - </td>
            </tr>
            <tr>
                <th colspan="12"> CANALIZACIONES EN B.T. </th>
            </tr>
            <tr>
                <td colspan="6">Tipo de canalizaciones</td>
                <td colspan="6"> - </td>
            </tr>

            <tr>
                <td colspan="3">Requiere tornillería</td>
                <td colspan="1"> - </td>
                <td colspan="2">Cantidad</td>
                <td colspan="2"> - </td>
                <td colspan="3">Requiere limpieza</td>
                <td colspan="1"> - </td>
            </tr>

            <tr>
                <td colspan="3">Soportería</td>
                <td colspan="1">-</td>
                <td colspan="2">Estado</td>
                <td colspan="2">-</td>
                <td colspan="2">Faltante</td>
                <td colspan="2">-</td>
            </tr>

            <tr>
                <th colspan="12"> OBSERVACIONES </th>
            </tr>
            <tr>
                <td colspan="12"> - </td>
            </tr>

            <tr>
                <th colspan="12"> INTERRUPTORES EN B.T. </th>
            </tr>

            <tr>
                <td colspan="5">No. Interruptores y/o gabinetes en B.T.</td>
                <td colspan="1"> - </td>
                <td colspan="2">Requiere limpieza</td>
                <td colspan="1"> - </td>
                <td colspan="2">Cantidad</td>
                <td colspan="1"> - </td>
            </tr>

            <tr>
                <td colspan="4">Estado de interruptores</td>
                <td colspan="3">-</td>
                <td colspan="3">Requiere tornillería</td>
                <td colspan="2">-</td>
            </tr>

            <tr>
                <td colspan="3">Señalización interruptores</td>
                <td colspan="1">-</td>
                <td colspan="2">Estado</td>
                <td colspan="2">-</td>
                <td colspan="2">Faltante</td>
                <td colspan="2">-</td>
            </tr>

            <tr>
                <td colspan="3">Señalización circuitos</td>
                <td colspan="1">-</td>
                <td colspan="2">Estado</td>
                <td colspan="2">-</td>
                <td colspan="2">Faltante</td>
                <td colspan="2">-</td>
            </tr>

            <tr>
                <td colspan="3">Espacios disponibles</td>
                <td colspan="1"> si / no</td>
                <td colspan="2">Cantidad</td>
                <td colspan="2">-</td>
                <td colspan="2">Faltante</td>
                <td colspan="2">-</td>
            </tr>

            <tr>
                <th colspan="12"> OBSERVACIONES </th>
            </tr>
            <tr>
                <td colspan="12"> - </td>
            </tr>

            @if ($data_inspeccion[0]->subestacion->type_id == 2)

            <tr>
                <th colspan="12"> CABLEADO EN M.T. </th>
            </tr>

            <tr>
                <td colspan="7">Accesorios subterráneos (estado)</td>
                <td colspan="5"> - </td>
            </tr>

            <tr>
                <td colspan="5">No. de codos OCC</td>
                <td colspan="2"> - </td>
                <td colspan="2">Estado</td>
                <td colspan="3"> - </td>
            </tr>

            <tr>
            <td colspan="5">No. de insertos OCC</td>
                <td colspan="2"> - </td>
                <td colspan="2">Estado</td>
                <td colspan="3"> - </td>
            </tr>

            <tr>
                <td colspan="5">No. de adaptadores de tierra</td>
                <td colspan="1"> - </td>
                <td colspan="2">Estado</td>
                <td colspan="2"> - </td>
                <td colspan="1">Faltante</td>
                <td colspan="1"> - </td>
            </tr>

            <tr>
                <td colspan="5">No. de barras de tierra</td>
                <td colspan="1"> - </td>
                <td colspan="2">Estado</td>
                <td colspan="2"> - </td>
                <td colspan="1">Faltante</td>
                <td colspan="1"> - </td>
            </tr>


            @else

            <tr>
                <th colspan="12"> S.E. COMPACTA </th>
            </tr>

            <tr>
                <td colspan="7">Accesorios subterráneos (estado)</td>
                <td colspan="5"> - </td>
            </tr>

            <tr>
                <td colspan="5">Codos</td>
                <td colspan="2"> - </td>
                <td colspan="2">Estado</td>
                <td colspan="3"> - </td>
            </tr>

            <tr>
                <td colspan="5">Terminales</td>
                <td colspan="2"> - </td>
                <td colspan="2">Estado</td>
                <td colspan="3"> - </td>
            </tr>

            <tr>
                <td colspan="2">Fusibles</td>
                <td colspan="1"> - </td>
                <td colspan="1">Capacidad.</td>
                <td colspan="1"> - </td>
                <td colspan="2">Estado</td>
                <td colspan="2"> - </td>
                <td colspan="2">Faltante</td>
                <td colspan="1"> - </td>
            </tr>

            <tr>
                <td colspan="4">Mecanismo Op.</td>
                <td colspan="2"> - </td>
                <td colspan="3">Estado</td>
                <td colspan="3"> - </td>
                
            </tr>

            @endif

            <tr>
                <td colspan="7">Colocación y acomodo de cable (estado)</td>
                <td colspan="5"> - </td>
            </tr>

            <tr>
                <td colspan="2">ID. marbetes</td>
                <td colspan="1"> - </td>
                <td colspan="3">Estado</td>
                <td colspan="3"> - </td>
                <td colspan="2">Faltante</td>
                <td colspan="1"> - </td>
            </tr>

            <tr>
                <th colspan="12"> OBSERVACIONES </th>
            </tr>

            <tr>
                <td colspan="12"> - </td>
            </tr>

            <tr>
                <th colspan="12"> CABLEADO EN B.T. </th>
            </tr>

            <tr>
                <td colspan="7">Colocación y acomodo de cable (estado)</td>
                <td colspan="5"> - </td>
            </tr>

            <tr>
                <td colspan="5">Conexiones (estado)</td>
                <td colspan="3"> - </td>
                <td colspan="2">Faltante</td>
                <td colspan="2"> - </td>
            </tr>

            <tr>
                <th colspan="12"> OBSERVACIONES </th>
            </tr>

            <tr>
                <td colspan="12"> - </td>
            </tr>

            <tr>
                <th colspan="12"> MEDICIÓN DE VOLTAJES </th>
            </tr>

            <tr>
                <td rowspan="2" colspan="3"> Voltaje en transfromador </td>
                <td colspan="2">Vab</td>
                <td colspan="1"> - </td>
                <td colspan="2">Vbc</td>
                <td colspan="1"> - </td>
                <td colspan="2">Vbc-2</td>
                <td colspan="1"> - </td>
            </tr>

            <tr>
                <td colspan="2">Van</td>
                <td colspan="1"> - </td>
                <td colspan="2">Vbn</td>
                <td colspan="1"> - </td>
                <td colspan="2">Vcn-2</td>
                <td colspan="1"> - </td>
            </tr>

            <tr>
                <td rowspan="2" colspan="3"> Voltaje en interruptor principal </td>
                <td colspan="2">Vab</td>
                <td colspan="1"> - </td>
                <td colspan="2">Vbc</td>
                <td colspan="1"> - </td>
                <td colspan="2">Vbc-2</td>
                <td colspan="1"> - </td>
            </tr>

            <tr>
                <td colspan="2">Van</td>
                <td colspan="1"> - </td>
                <td colspan="2">Vbn</td>
                <td colspan="1"> - </td>
                <td colspan="2">Vcn-2</td>
                <td colspan="1"> - </td>
            </tr>

            <tr>
                <td colspan="3"> Corriente en int. principal </td>
                <td colspan="1">Ia</td>
                <td colspan="1"> - </td>
                <td colspan="1">Ib</td>
                <td colspan="1"> - </td>
                <td colspan="1">Ic</td>
                <td colspan="1"> - </td>
                <td colspan="2">Ic</td>
                <td colspan="1"> - </td>
            </tr>

            <tr>
                <td colspan="5"></td>
                <th colspan="2"> Realizo </th>
                <td colspan="5"> {{$data_inspeccion[0]->tecnico->name}} {{$data_inspeccion[0]->tecnico->last_name}}</td>
            </tr>

        </tbody>
    </table>
    @endforeach
</div>