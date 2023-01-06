<h1>Anomalias</h1>
@foreach ($anomalias as $anomalia)
    <table>
        <tbody>
            <tr>
                <th colspan="2">Anomalia</th>
                <td colspan="6">{{ $anomalia->descripcion }}</td>
                <th colspan="2">Urgencia</th>
                <td colspan="2">{{ $anomalia->urgencia }}</td>
            </tr>
            <tr>
                <th colspan="2">Marca</th>
                <td colspan="2">{{ $anomalia->marca }}</td>
                <th colspan="2">Modelo</th>
                <td colspan="2">{{ $anomalia->modelo }}</td>
                <th colspan="2">Medidas</th>
                <td colspan="2">{{ $anomalia->medidas }}</td>
            </tr>
            <tr>
                <td colspan="12">
                    <img alt="Imagen de la anomalia" src="http://31.220.57.169/images/hacker.jpg"
                        style="width: 400px; height: 225px;">
                    <p>{{ asset('images/reportes/edificio/' . $anomalia->imagen) }}</p>
                </td>
            </tr>
        </tbody>
    </table>
@endforeach
