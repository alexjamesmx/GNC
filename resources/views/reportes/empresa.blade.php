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
    </style>
</head>

<body>

    <h1>Reporte</h1>
    <div class="page-break"></div>
    <h1>Evidencias</h1>

    @foreach ($data as $item)
    @if ($item->img1)
    <p>Imagen:</p>
    <img src="http://127.0.0.1:8000/images/reportes/edificio/1672847677img113.png" alt=".">
    <p>{{ asset('images/reportes/edificio/'.$item->img1) }}</p>
    @endif
    @endforeach


    <div class="page-break"></div>
    @if ($anomalias)
    <h1>Anomalias</h1>
    @foreach ($anomalias as $anomalia)
    <p>Urgencia:</p>
    <p>{{ $anomalia->urgencia }}</p>
    @endforeach
    @endif


</body>

</html>