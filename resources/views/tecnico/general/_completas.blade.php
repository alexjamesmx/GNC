<div class="row">
    <div class="col-md-12">
    </div>
</div>
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
                                <th class="font-bold w-2/12 text-base"scope="col">Parque</th>
                                <th class="font-bold w-2/12 text-base"scope="col">Empresa
                                </th>
                                <th class="font-bold w-2/12 text-base"scope="col">Subestación
                                </th>
                                <th class="font-bold w-1/12 text-base"scope="col">
                                    Estado
                                </th>
                                <th class="font-bold w-2/12 text-center"scope="col">
                                    Fecha a
                                    realizar</th>
                                <th class=" font-bold w-2/12 text-center"scope="col">
                                    Reportes
                                </th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @forelse ($inspecciones_completas as $inspeccion)
                                @if ($inspeccion->enterprise->status_id !== 1 &&
                                    $inspeccion->parque->status_id !== 1 &&
                                    $inspeccion->subestacion->status_id !== 1)
                                    <tr id="row_{{ $inspeccion->id }}">
                                        {{-- ID --}}
                                        <td scope="row" style="min-width:fit-content;width:1rem">
                                            <p id="row_inspeccion_id_{{ $inspeccion->id }}"
                                                class='p-0 m-0 text-xs text-gray-500 text-center'>
                                                {{ $inspeccion->id }}
                                        </td>
                                        </p>
                                        {{-- EMPRESA --}}
                                        <td scope="row" style="min-width:fit-content;width:15rem">
                                            <div class="flex">
                                                <p id="row_empresa_id_{{ $inspeccion->enterprise_id }}"
                                                    class="p-0 m-0 text-base">
                                                    {{ $inspeccion->enterprise->enterprise }}</p>
                                            </div>
                                        </td>
                                        {{-- PARQUE --}}
                                        <td scope="row"
                                            style="min-width:fit-content;width:35px;"id="field_parque_{{ $inspeccion->id }}">
                                            <p class="m-0 text-base"> {{ $inspeccion->parque->parque }}
                                            </p>
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
                                        {{-- FECHA --}}
                                        <td scope="row" style="min-width:fit-content;width:1rem"
                                            class="text-base text-center"
                                            id="field_fecha_inicio_{{ $inspeccion->id }}">
                                            {{ $inspeccion->fecha_inicio }}
                                        </td>
                                        {{-- ACCIONES --}}
                                        <td scope="row" style="min-width:fit-content; white-space:initial">
                                            <div class="flex justify-center">
                                                <button
                                                    class="py-2 text-orange-600 font-semibold bg-white border border-solid hover:bg-orange-200 rounded w-2/3 border-orange-500 text-base"
                                                    onclick="ingresarInspeccion({{ $inspeccion->id }})">Ingresar</button>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @empty
                            @endforelse
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
