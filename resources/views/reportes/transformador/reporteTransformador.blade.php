<div>
    <h2>Inspección a transformador</h2>
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
                    <th colspan="12"> DATOS DEL EQUIPO </th>
                </tr>
                <tr>
                    <td>Marca</td>
                    <td colspan="3">{{ $item->marca }}</td>
                    <td># Serie</td>
                    <td colspan="4">{{ $item->no_serie }}</td>
                    <td>Capacidad</td>
                    <td colspan="2">{{ $item->capacidad }}</td>
                </tr>
                <tr>
                    <td colspan="2">Neutro</td>
                    <td colspan="4">{{ $item->neutro }}</td>
                    <td colspan="2">Tensión</td>
                    <td colspan="4">{{ $item->tension }}</td>
                </tr>
                <tr>
                    <td colspan="1">Impedancia</td>
                    <td colspan="2">{{ $item->impedancia }}</td>
                    <td colspan="1">A</td>
                    <td colspan="1">{{ $item->a }}</td>
                    <td colspan="1">°C</td>
                    <td colspan="1">{{ $item->c }}</td>
                    <td colspan="3">Litros de aceite</td>
                    <td colspan="2">{{ $item->lts_aceite }}</td>
                </tr>
                <tr>
                    <td colspan="3">Conexión primario</td>
                    <td colspan="3">{{ $item->conex_primario }}</td>
                    <td colspan="3">Conexión secundario</td>
                    <td colspan="3">{{ $item->conex_secundario }}</td>
                </tr>
                <tr>
                    <td colspan="2">Año de fabricación</td>
                    <td colspan="2">{{ $item->fecha_fabricacion }}</td>
                    <td colspan="2">Aceite</td>
                    <td colspan="2">{{ $item->aceite }}</td>
                    <td colspan="2">Peso total</td>
                    <td colspan="2">{{ $item->peso_total }}</td>
                </tr>

                <tr>
                    <th colspan="12"> REVISIÓN Y LIMPIEZA </th>
                </tr>

                <tr>
                    <td colspan="7">Limpieza general</td>
                    <td colspan="5">{{ $item->limpieza }}</td>
                </tr>

                <tr>
                    <td colspan="7">Indicador de nivel</td>
                    <td colspan="5">{{ $item->indicador_nivel }}</td>
                </tr>

                <tr>
                    <td colspan="7">Indicador de temperatura</td>
                    <td colspan="5">{{ $item->indicador_temperatura }}</td>
                </tr>

                <tr>
                    <td colspan="7">Indicador de temperatura maxima</td>
                    <td colspan="5">{{ $item->indicador_temperatura_max }}</td>
                </tr>

                <tr>
                    <td colspan="7">Válvula de alivio</td>
                    <td colspan="5">{{ $item->valvula_alivio }}</td>
                </tr>

                <tr>
                    <td colspan="7">Válvula de llenado</td>
                    <td colspan="5">{{ $item->valvula_llenado }}</td>
                </tr>

                <tr>
                    <td colspan="7">Válvula de drenado</td>
                    <td colspan="5">{{ $item->valvula_drenado }}</td>
                </tr>

                <tr>
                    <td colspan="7">Válvula de muestreo</td>
                    <td colspan="5">{{ $item->valvula_muestreo }}</td>
                </tr>

                <tr>
                    <td colspan="7">Cambiador de derivaciones</td>
                    <td colspan="5">{{ $item->cambiador_derivaciones }}</td>
                </tr>

                <tr>
                    <td colspan="7">Estado de pintura</td>
                    <td colspan="5">{{ $item->pintura_estado }}</td>
                </tr>

                <tr>
                    <th colspan="12"> PUESTA A TIERRA </th>
                </tr>

                <tr>
                    <td colspan="3">Neutro</td>
                    <td colspan="3">{{ $item->tierra_neutro }}</td>
                    <td colspan="3">Tanque</td>
                    <td colspan="3">{{ $item->tierra_tanque }}</td>
                </tr>

                <tr>
                    <td colspan="3">Codos</td>
                    <td colspan="3">{{ $item->tierra_codos }}</td>
                    <td colspan="3">Insertos</td>
                    <td colspan="3">{{ $item->tierra_insertos }}</td>
                </tr>

                <tr>
                    <th colspan="12"> BOQUILLAS PRIMARIO </th>
                </tr>

                <tr>
                    <td colspan="3">Boquilla H1</td>
                    <td colspan="3">{{ $item->boquillas_h1 }}</td>
                    <td colspan="3">Boquilla X0</td>
                    <td colspan="3">{{ $item->boquillas_x0 }}</td>
                </tr>

                <tr>
                    <td colspan="3">Boquilla H2</td>
                    <td colspan="3">{{ $item->boquillas_h2 }}</td>
                    <td colspan="3">Boquilla X1</td>
                    <td colspan="3">{{ $item->boquillas_x1 }}</td>
                </tr>

                <tr>
                    <td colspan="3">Boquilla H3</td>
                    <td colspan="3">{{ $item->boquillas_h3 }}</td>
                    <td colspan="3">Boquilla X2</td>
                    <td colspan="3">{{ $item->boquillas_x2 }}</td>
                </tr>

                <tr>
                    <td colspan="6"></td>
                    <td colspan="3">Boquilla X3</td>
                    <td colspan="3">{{ $item->boquillas_x3 }}</td>
                </tr>

                <tr>
                    <th colspan="12"> OBSERVACIONES </th>
                </tr>
                <tr>
                    <td colspan="12"> {{ $item->observaciones }} </td>
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
