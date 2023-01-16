<div class="row">
    <div class="col-lg-12 stretch-card grid-margin">
        <div class="card">
            @if (count($data) !== 0)
                <div class="card-body">
                    <div class="flex justify-between">
                        <p class="text-xl p-0 m-0 text-center self-center">
                            Tus inspecciones 
                        </p>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead class="table-dark text-white">
                                <tr>
                                    <th class="text-white">ID</th>
                                    <th class="text-white">Tecnico</th>
                                    <th class="text-white">Subestacion</th>
                                    <th class="text-white">Asignado por</th>
                                    <th class="text-white">Fecha</th>
                                    <th class="text-white">Reportes</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">

                            @foreach ($data as $d)
                                <tr id="row_{{ $d->id }}">
                                    {{-- ID --}}
                                    <td scope="row" style="min-width:fit-content; white-space:initial">
                                            {{ $d->id }}
                                    </td>
                                    {{-- Tecnico --}}
                                    <td scope="row" style="min-width:fit-content; white-space:initial">
                                            {{ $d->tecnico->name }} {{ $d->tecnico->last_name }}
                                    </td>
                                    {{-- Subestacion --}}
                                    <td scope="row" style="min-width:fit-content; white-space:initial">
                                            {{ $d->subestacion->subestacion }}
                                    </td>
                                    {{-- Asignado --}}
                                    <td scope="row" style="min-width:fit-content; white-space:initial">
                                            {{ $d->admin->name }} {{ $d->admin->last_name }}
                                    </td>
                                    {{-- Fecha --}}
                                    <td scope="row" style="min-width:fit-content; white-space:initial">
                                            {{ $d->fecha_fin }} 
                                    </td>
                                    {{-- Reportes --}}
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-success" onclick="pdfEnterprise_em({{$d->id}})">
                                                <img src="{{ asset('images/gnc/building-news-svgrepo-com.svg') }}"/>
                                            </button>
                                            <button type="button" class="btn btn-warning" onclick="pdfElecrica_em({{$d->id}})">
                                                <img src="{{ asset('images/gnc/electric-signal-svgrepo-com.svg') }}"/>
                                            </button>
                                            <button type="button" class="btn btn-danger" onclick="pdfTransformador_em({{$d->id}})">
                                                <img src="{{ asset('images/gnc/tesla-coil-svgrepo-com.svg') }}"/>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            @else 
                <div class="flex relative justify-center">
                    <p class="text-2xl text-center mt-5">No se encuentraron inspecciones</p>
                </div>
                <img class="self-center my-5"src="{{ asset('images/gnc/sad.svg') }}" width="80px" height="80px" alt="">                
            @endif
        </div>
    </div>
</div>


