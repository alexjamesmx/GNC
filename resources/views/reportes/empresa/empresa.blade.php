<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de edificion</title>

    <style>
    .page-break {
        page-break-after: always;
    }

    h2, th, td {
        text-align: center;
    }

    th, td {
        width: 8.33%;
        font-size: 14px;
    }

    table,
    th,
    td {
        border: 1px solid black;
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
    @include('reportes.empresa.reporteEmpresa')
    <div class="page-break"></div>

    <!-- evidencias -->
    @include('reportes.empresa.evidenciasEmpresa')
    <div class="page-break"></div>

    <!-- anomalias -->
    @if (is_null($anomalias) || $anomalias->isEmpty())
    <center><h3>No hay anomalias</h3><center>
    @else
    @include('reportes.empresa.anomaliasEmpresa')
    @endif


</body>


</html>