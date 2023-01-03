<div class="row">
    <div class="col-md-12">
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card p-2">
            @if (count($inspecciones_activas) !== 0)
                <div class="table-responsive p-5">
                    <p class="text-lg font-semibold mb-10">Inspecciones asignadas:</p>
                    <table class="table align-middle">
                        <thead class="">
                            <tr>
                                <th class=" font-bold w-[5%] text-base"scope="col">
                                    Id
                                </th>
                                <th class=" font-bold w-2/12  text-base"scope="col">Parque</th>
                                <th class=" font-bold w-2/12  text-base"scope="col">Empresa
                                </th>
                                <th class=" font-bold w-2/12  text-base"scope="col">Subestación
                                </th>
                                <th class=" font-bold w-1/12  text-base"scope="col">
                                    Estado
                                </th>
                                <th class="font-bold w-2/12 text-base  "scope="col">
                                    Fecha a
                                    realizar</th>
                                <th class=" font-bold w-2/12 text-base "scope="col">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @forelse ($inspecciones_activas as $inspeccion)
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

                                            @if ($inspeccion->status->id === 4)
                                                <p class="rounded bg-slate-500 px-2 py-1 font-bold text-white">
                                                    Por ingresar
                                            @endif

                                            @if ($inspeccion->status->id === 6)
                                                <p class="rounded bg-orange-600 px-2 py-1 font-bold text-white">
                                                    En proceso
                                            @endif
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
                                                    class="w-full py-1 text-black-600 font-semibold bg-white border-solid hover:bg-slate-100 rounded border-black-700 text-base border-spacing-14 border-2"
                                                    onclick="ingresarInspeccion({{ $inspeccion->id }})">

                                                    <i class="fa-solid fa-play text-xs"></i> </button>
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
                <p class="text-lg text-center">De momento no cuentas con inspecciones asignadas</p>
                <img class="self-center mt-5"src="{{ asset('images/gnc/no-task.svg') }}" width="80px" height="80px"
                    alt="">
            @endif
        </div>
    </div>
</div>
