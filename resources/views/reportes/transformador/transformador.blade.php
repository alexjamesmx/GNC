<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Reporte de transformador</title>

    <style>
        .page-break {
            page-break-after: always;
        }

        h2,
        th,
        td {
            text-align: center;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            width: 8.33%;
            font-size: 14px;
        }

        th {
            background-color: #0756c3;
            color: white;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        .evidencias {
            text-align: center;
        }
    </style>
</head>

<body>

    <!-- reporte -->
    @include('reportes.transformador.reporteTransformador')
    <div class="page-break"></div>

    <!-- evidencias -->
    @include('reportes.transformador.evidenciasTransformador')
    <!-- <div class="page-break"></div> -->

    <!-- anomalias
    @if (is_null($anomalias) || $anomalias->isEmpty())
        <center>
            <h3>No hay anomalias</h3>
            <center>
            @else
                @include('reportes.transformador.anomaliasTransformador')
    @endif -->


</body>


</html>
