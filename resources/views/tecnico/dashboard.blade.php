@extends('template')

@section('content')
    @include('spinner')
    <div id="divLoading" style="opacity:0">
        <!--navbar -->
        @include('tecnico._navbar')
        <div class="container-fluid page-body-wrapper">
            <!-- sidebar -->
            @include('tecnico._sidebar')
            <div class="main-panel">
                <div class="content-wrapper ">
                    <!-- Body -->
                    <div class="inspecciones-activas oculto">
                        <div class="row">
                            <div class="col-md-12">
                                {{-- <div class="flex items-center">
    
                                    <div class="rounded-full border-solid border border-black bg-green-500 w-3 h-3 mx-3"></div>
                                    Disponibles
                                    <div class="rounded-full border-solid border border-black bg-yellow-500 w-3 h-3 mx-3"></div>
                                    En inspección
    
                                </div> --}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card p-2">
                                    <div class="table-responsive p-5">
                                        <p class="m-0 text-lg font-semibold mb-7">Inspecciones activas</p>
                                        <table class="table align-middle">
                                            <thead class="">
                                                <tr>
                                                    <th class=" font-bold w-[5%] text-center text-base"scope="col">
                                                        Id
                                                    </th>
                                                    <th class=" font-bold w-2/12  text-base"scope="col">Parque</th>
                                                    <th class=" font-bold w-2/12  text-base"scope="col">Empresa
                                                    </th>
                                                    <th class=" font-bold w-2/12  text-base"scope="col">Subestación
                                                    </th>
                                                    <th class=" font-bold w-1/12 text-center text-base"scope="col">
                                                        Estado
                                                    </th>
                                                    <th class="font-bold w-2/12 text-base  text-center"scope="col">
                                                        Fecha a
                                                        realizar</th>
                                                    <th class=" font-bold w-2/12 text-base text-center"scope="col">
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
                                                            <td scope="row" style="min-width:fit-content;width:5rem"
                                                                class="text-base"
                                                                id="field_subestacion_{{ $inspeccion->id }}">
                                                                {{ $inspeccion->subestacion->subestacion }}
                                                            </td>
                                                            {{-- ESTADO --}}
                                                            <td scope="row"
                                                                style="min-width:fit-content;width:1rem"class="text-center text-base"
                                                                id="field_estado_{{ $inspeccion->id }}">
                                                                {{ $inspeccion->status->status }}
                                                            </td>
                                                            {{-- FECHA --}}
                                                            <td scope="row" style="min-width:fit-content;width:1rem"
                                                                class="text-base text-center"
                                                                id="field_fecha_inicio_{{ $inspeccion->id }}">
                                                                {{ $inspeccion->fecha_inicio }}
                                                            </td>
                                                            {{-- ACCIONES --}}
                                                            <td scope="row"
                                                                style="min-width:fit-content; white-space:initial">
                                                                <div class="flex justify-center">
                                                                    <button
                                                                        class="py-2 text-orange-600 font-semibold bg-white border border-solid hover:bg-orange-200 rounded w-2/3 border-orange-500 text-base"
                                                                        onclick="ingresarInspeccion({{ $inspeccion->id }})">Ingresar</button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @empty
                                                    <h1>No hay inspecciones</h1>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard oculto">
                    </div>
                </div>
                @include('admin._footer')
            </div>
        </div>
    </div>
@endsection
