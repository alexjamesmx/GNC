<div class="row">
    <div class="col-lg-12 stretch-card grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="flex justify-between">
                    <p class="text-xl p-0 m-0 text-center self-center">
                        Inspecciones asignadas
                    </p>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal-inspecciones"
                        class="text-decoration-none rounded relative inline-flex group items-center justify-center px-3.5 py-2 m-1 cursor-pointer border-b-4 border-l-2 active:border-purple-600 active:shadow-none shadow-lg bg-gradient-to-tr from-purple-600 to-purple-500 border-purple-700 text-white"
                        data-modal='crear' onclick="handleCreate(this)">
                        <span
                            class="absolute w-0 h-0 transition-all duration-300 ease-out bg-white rounded-full group-hover:w-32 group-hover:h-32 opacity-10"></span>
                        <span class="relative font-semibold tracking-wider">
                            <i class="fa-solid fa-plus"></i>
                            Nuevo
                        </span>
                    </a>
                </div>
                <hr>
                <table class="table table-striped table-sm">
                    <thead class="table-dark text-white">
                        <tr>
                            <th class="text-white">ID</th>
                            <th class="text-white">Empresa</th>
                            <th class="text-white">Subestacion</th>
                            <th class="text-white">Parque</th>
                            <th class="text-white">Tecnico</th>
                            <th class="text-white">Fecha</th>
                            <th class="text-white">Estatus</th>
                            <th class="text-white">Asignado por</th>
                            <th class="text-white">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @forelse ($inspecciones as $inspeccion)
                            {{-- solo mostrar inspecciones completadas o pendientes --}}
                            @if ($inspeccion->status->status != 'Inactivo')
                            <tr id="row_{{ $inspeccion->id }}">
                                {{-- ID --}}
                                <td scope="row" style="min-width:fit-content; white-space:initial" id="id_{{ $inspeccion->id }}">
                                    {{ $inspeccion->id }}
                                </td>

                                {{-- empresa --}}
                                <td scope="row" style="min-width:fit-content; white-space:initial" id="enterprise_{{ $inspeccion->id }}">
                                    {{ $inspeccion->enterprise->enterprise }}
                                </td>

                                {{-- subestacion --}}
                                <td scope="row" style="min-width:fit-content; white-space:initial" id="subestacion_{{ $inspeccion->id }}">
                                    {{ $inspeccion->subestacion->subestacion }}
                                </td>

                                {{-- parque --}}
                                <td scope="row" style="min-width:fit-content; white-space:initial" id="parque_{{ $inspeccion->id }}">
                                    {{ $inspeccion->parque->parque }}
                                </td>

                                {{-- tecnico --}}
                                <td scope="row" style="min-width:fit-content; white-space:initial" id="tecnico_{{ $inspeccion->id }}">
                                    {{ $inspeccion->tecnico->name }}
                                </td>
                                    
                                {{-- fecha --}}
                                <td scope="row" style="min-width:fit-content; white-space:initial" id="fecha_{{ $inspeccion->id }}">
                                    {{ $inspeccion->fecha_inicio }}
                                </td>

                                {{-- estatus --}}
                                @if ($inspeccion->status->status == 'Pendiente')
                                <td scope="row" style="min-width:fit-content; white-space:initial; color:rgb(214, 21, 21);" id="estatus_{{ $inspeccion->id }}">
                                    {{ $inspeccion->status->status }}
                                </td>
                                @else
                                <td scope="row" style="min-width:fit-content; white-space:initial; color:rgb(19, 131, 19);" id="estatus_{{ $inspeccion->id }}">
                                    {{ $inspeccion->status->status }}
                                </td>
                                @endif

                                {{-- asignado por --}}
                                <td scope="row" style="min-width:fit-content; white-space:initial" id="tecnico_{{ $inspeccion->id }}">
                                    {{ $inspeccion->admin->name }}
                                </td>

                                {{-- acciones --}}
                                @if ($inspeccion->status->status == 'Pendiente')
                                <td scope="row" style="min-width:fit-content; white-space:initial">
                                    <div class="flex justify-start">
                                        <button
                                            onclick="document.getElementById('delete-id').value = {{ $inspeccion->id }}"
                                            type="button"
                                            class="modal-open text-red-600 border-none bg-transparent hover:text-red-500"
                                            data-bs-toggle="modal" data-bs-target="#modal-delete">
                                            <i class="fa-solid fa-ban" data-modal="delete"></i>Cancelar
                                        </button>
                                    </div>
                                </td>
                                @endif
                            </tr>
                            @endif
                        @empty
                            <h1>No hay parques</h1>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-4">
                    {{-- {{ $parques->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <input type="hidden" id="parques" value="{{$parques}}">
    <input type="hidden" id="enterprises" value="{{$enterprises}}">
    <input type="hidden" id="subestaciones" value="{{$subestaciones}}">
    <input type="hidden" id="tecnicos" value="{{$tecnicos}}">
    <input type="hidden" id="section" value="{{$section_cute}}">
    <input type="hidden" id="id_user" value="{{$id_user}}">
</div>

<script defer src="{{ asset('scripts/inspecciones.js') }}"></script>
