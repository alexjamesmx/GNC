<div class="row">
    <div class="col-lg-12">
        <div class="card p-2">
            @if (count($inspecciones_completas) !== 0)
                <div class="table-responsive p-5">
                    <p class="text-lg font-semibold mb-10">Inspecciones finalizadas:</p>
                    <table class="table align-middle">
                        <thead class="">
                            <tr>
                            <th class=" font-bold w-[5%] text-base"scope="col">
                                    Id
                                </th>
                                <th class="font-bold w-1/12 text-base"scope="col">Empresa
                                </th>
                                <th class="font-bold w-1/12 text-base"scope="col">Subestación
                                </th>
                                <th class="font-bold w-1/12 text-base"scope="col">
                                    Estado
                                </th>
                                <th class="font-bold w-2/12 text-center"scope="col">
                                    Fecha inicio</th>
                                <th class="font-bold w-2/12 text-center"scope="col">
                                Fecha fin</th>
                                <th class="font-bold w-2/12 text-center"scope="col">
                                Duración</th>
                                
                                <th class=" font-bold w-2/12 text-center"scope="col">
                                    Reportes
                                </th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($inspecciones_completas as $inspeccion)
                                @if ($inspeccion->enterprise->status_id !== 1 &&
                                    $inspeccion->parque->status_id !== 1 &&
                                    $inspeccion->subestacion->status_id !== 1)
                                    <tr id="row_{{ $inspeccion->id }}">
                                    {{-- ID --}}
                                        <td scope="row" style="min-width:fit-content;width:1rem">
                                            <p id="row_inspeccion_id_{{ $inspeccion->id }}"
                                                class='p-0 m-0'>
                                                {{ $inspeccion->id }}
                                            </p>
                                        </td>
                                        {{-- EMPRESA --}}
                                        <td scope="row" style="min-width:fit-content;width:15rem">
                                            <div class="flex">
                                                <p id="row_empresa_id_{{ $inspeccion->enterprise_id }}"
                                                    class="p-0 m-0 text-base">
                                                    {{ $inspeccion->enterprise->enterprise }}</p>
                                            </div>
                                        </td>
                                
                                        {{-- SUBESTACION --}}
                                        <td scope="row" style="min-width:fit-content;width:5rem" class="text-base"
                                            id="field_subestacion_{{ $inspeccion->id }}">
                                            {{ $inspeccion->subestacion->subestacion }}
                                        </td>
                                        {{-- ESTADO --}}
                                        <td scope="row"
                                            style="min-width:fit-content;width:1rem"class="text-center text-base"
                                            id="field_estado_{{ $inspeccion->id }}">
                                            <p class="rounded bg-lime-600 px-2 py-1 font-bold text-white">
                                                Finalizada
                                            </p>
                                            
                                        </td>
                                        {{-- FECHA INICIO --}}
                                        <td scope="row" style="min-width:fit-content;width:1rem"
                                            class="text-base text-center"
                                            id="field_fecha_inicio_{{ $inspeccion->id }}">
                                            {{ $inspeccion->fecha_inicio }}
                                        </td>
                                        {{-- FECHA FIN --}}
                                        <td scope="row" style="min-width:fit-content;width:1rem"
                                            class="text-base text-center"
                                            id="field_fecha_inicio_{{ $inspeccion->id }}">
                                            {{ $inspeccion->fecha_fin }}
                                        </td>
                                        {{-- Duración --}}
                                        <td scope="row" style="min-width:fit-content;width:1rem"
                                            class="text-base text-center"
                                            id="field_fecha_inicio_{{ $inspeccion->id }}">

                                            @php 
                                            $diff = abs(strtotime($inspeccion->fecha_fin) - strtotime($inspeccion->fecha_inicio));
                                            $hor = floor($diff/(60*60));
                                            $min = floor(($diff - $hor*60*60)/60);
                                            $sec = floor($diff - $hor*60*60 - $min*60);
                                            echo $hor.":".$min.":".$sec." Hrs";
                                            @endphp

                                        <!-- <script> document.write(Math.abs({{$inspeccion->fecha_fin}} - {{$inspeccion->fecha_inicio}})/(1000*60))</script>
  -->
                                        </td>


                                        {{-- ACCIONES --}}
                                        <td scope="row" style="min-width:fit-content; white-space:initial">
                                            <div class="flex justify-center">
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                <button type="button" class="btn btn-success" onclick="pdfEnterprise({{$inspeccion->id}})">
                                                    <img src="{{ asset('images/gnc/building-news-svgrepo-com.svg') }}"/>
                                                </button>
                                                <button type="button" class="btn btn-warning" onclick="pdfElecrica({{$inspeccion->id}})">
                                                    <img src="{{ asset('images/gnc/electric-signal-svgrepo-com.svg') }}"/>
                                                </button>
                                                <button type="button" class="btn btn-danger" onclick="pdfTransformador({{$inspeccion->id}})">
                                                    <img src="{{ asset('images/gnc/tesla-coil-svgrepo-com.svg') }}"/>
                                                </button>
                                            </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-lg text-center">!Aún no has completado tu primera inspección! </p>
                <img class="self-center mt-5"src="{{ asset('images/gnc/task.svg') }}" width="80px" height="80px"
                    alt="">
            @endif


        </div>
    </div>
</div>


<script>

var routePDF = [
            "{{ route('reportes.enterprise', ['id' => ':id']) }}",
            "{{ route('reportes.transformador', ['id' => ':id']) }}",
            "{{ route('reportes.electrica', ['id' => ':id']) }}",
            "{{ route('inspeccion.verificar_i') }}",
        ];
    function pdfEnterprise(id) {
    let url = routePDF[0];
    console.log(url);
    url = url.replace(':id', id);
    window.open(url);
}

function pdfTransformador(id) {
    let url = routePDF[1];
    console.log(url);
    url = url.replace(':id', id);
    window.open(url);
}

function pdfElecrica(id) {
    console.log("pdfElecrica");
    let url = routePDF[2];
    console.log(url);
    url = url.replace(':id', id);
    window.open(url);
}
</script>


@include('admin._modal_inspecciones_detalle')

