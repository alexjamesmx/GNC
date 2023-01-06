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
    <h1>Evidencias 3</h1>

    @forelse ($data as $item)
        {{-- @if ($item->img1) --}}
        <p>Imagen:</p>
        <img src="https://services.meteored.com/img/article/olas-de-calor-marinas-cambio-climatico-337391-5_1024.jpg"
            alt=".">
        <p>"https://services.meteored.com/img/article/olas-de-calor-marinas-cambio-climatico-337391-5_1024.jpg"</p>
        {{-- @endif --}}
    @empty
        <p>no hay</p>
    @endforelse


    <div class="page-break"></div>
    @if ($anomalias)
        <h1>Anomalias</h1>
        @foreach ($anomalias as $anomalia)
            <p>Urgencia:</p>
            <p>{{ $anomalia->urgencia }}</p>
        @endforeach
    @endif
