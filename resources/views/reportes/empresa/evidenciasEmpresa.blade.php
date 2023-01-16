<div class="evidencias">

    <h2>Evidencias</h2>

    @foreach ($data as $item)
    
        @if ($item->img1)
             <img alt="" src="{{ storage_path('images/reportes/edificio/' . $item->inspeccion_id . '/' . $item->img1) }}" 
             style="width: 400px; height: 225px;">
        @endif

        @if ($item->img2)
            <p>Evidencia 2:</p>
            <img alt="" src="{{ storage_path('images/reportes/edificio/' . $item->inspeccion_id . '/' . $item->img2) }}" style="width: 400px; height: 225px;">
        @endif

        @if ($item->img3)
            <p>Evidencia 3:</p>
            <img alt="" src="{{ storage_path('images/reportes/edificio/' . $item->inspeccion_id . '/' . $item->img3) }}" style="width: 400px; height: 225px;">
        @endif

        @if ($item->img4)
            <p>Evidencia 4:</p>
            <img alt="" src="{{ storage_path('images/reportes/edificio/' . $item->inspeccion_id . '/' . $item->img4) }}" style="width: 400px; height: 225px;">
        @endif

        @if ($item->img5)
            <p>Evidencia 5:</p>
            <img alt="" src="{{ storage_path('images/reportes/edificio/' . $item->inspeccion_id . '/' . $item->img5) }}" style="width: 400px; height: 225px;">
        @endif

        @if ($item->img6)
            <p>Evidencia 6:</p>
            <img alt="" src="{{ storage_path('images/reportes/edificio/' . $item->inspeccion_id . '/' . $item->img6) }}" style="width: 400px; height: 225px;">
        @endif
    @endforeach

</div>
