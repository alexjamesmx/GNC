<div class="row">
    <div class="col-lg-12 stretch-card grid-margin">
        <div class="card">
            @if (count($data) !== 0)
                <div class="card-body">
                    <div class="flex justify-between">
                        <p class="text-xl p-0 m-0 text-center self-center">
                            Inspecciones por verificar
                        </p>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead class="table-dark text-white">
                                <tr>
                                    <th class="text-white">ID</th>
                                    <th class="text-white">Parque</th> 
                                    <th class="text-white">Empresa</th>
                                    <th class="text-white">Subestacion</th>
                                    <th class="text-white">Reportes</th>
                                    <th class="text-white">Verificar</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @foreach ($data as $inspeccion)
                                    {{-- solo mostrar inspecciones pendientes --}}
                                    <tr id="row_{{ $inspeccion->id }}">
                                        {{-- ID --}}
                                        <td scope="row" style="min-width:fit-content; white-space:initial"
                                            id="id_{{ $inspeccion->id }}">
                                            {{ $inspeccion->id }}
                                        </td>

                                        {{-- parque --}}
                                        <td scope="row" style="min-width:fit-content; white-space:initial"
                                                id="parque_{{ $inspeccion->id }}">
                                                {{ $inspeccion->parque->parque }}
                                            </td> 
                                    
                                        {{-- empresa --}}
                                        <td scope="row" style="min-width:fit-content; white-space:initial"
                                                id="enterprise_{{ $inspeccion->id }}">
                                                {{ $inspeccion->enterprise->enterprise }}
                                            </td>

                                        {{-- subestacion --}}
                                        <td scope="row" style="min-width:fit-content; white-space:initial"
                                                id="subestacion_{{ $inspeccion->id }}">
                                                {{ $inspeccion->subestacion->subestacion }}
                                            </td> 
                                        <td>
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
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-success" onclick="verificado({{$inspeccion->id}})">
                                                Verificar <i class="fa-solid fa-check-to-slot"></i>
                                            </button>
                                        </td>
                                        
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                    <div class="flex relative justify-center">
                        <p class="text-2xl text-center mt-5">No se encuentran inspecciones por verificar</p>

                    </div>
                    <img class="self-center my-5"src="{{ asset('images/gnc/happy.svg') }}" width="80px" height="80px"
                        alt="">
                
            @endif
        </div>

    </div>
</div>


