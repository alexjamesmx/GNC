<style>
    label {
        font-size: 0.875rem !important;
        line-height: 1.25rem !important;
    }

    input {
        font-size: 0.875rem !important;
        line-height: 1.25rem !important;
    }

    @media screen and (max-width: 991px) {
        .content-wrapper {
            margin: 0;
            padding: 0;
        }

        [mt] {
            margin-top: 12px;
        }

        [mb] {
            margin-bottom: 12px;
        }

        [my] {
            margin-block: 12px;
        }


        div[gap-parent] {
            gap: 0 !important;
            padding-inline: 3rem !important;
            /* background-color: ; */
        }


    }

    @media (max-width: 768px) {
        .content-wrapper {
            /* background-color: red; */
        }

    }

    div[bg] {
        background-color: green;
    }

    [blue]>div {
        color: rgb(1, 134, 222)
    }
</style>
<form class="form-sample needs-validation" id="form-inspecciones" novalidate
    onsubmit="event.preventDefault(); saveInspeccion({{ $inspeccion->id }})">
    {{-- DATOS GENERALES --}}
    <div class="grid gap-5 bg-slate-100 p-5" gap-parent>
        <p class="font-bold">DATOS GENERALES</p>
        <div class="row">
            <div class="col-md-6 row">
                <label class="col-sm-3" mt>Parque:</label>
                <div bg class="col-sm-9 h-fit" my>
                    <input class="form-control" readonly=»readonly» type="text"
                        value="{{ $inspeccion->parque->parque }}">
                </div>
            </div>
            <div class="col-md-6 row">
                <label class="col-sm-3">Cliente:</label>
                <div bg class="col-sm-9 h-fit" my>
                    <input class="form-control" readonly=»readonly» type="text"
                        value="{{ $inspeccion->enterprise->enterprise }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 row">
                <label class="col-sm-3">Subestación:</label>
                <div bg class="col-sm-9 h-fit" my>
                    <input class="form-control" readonly=»readonly» type="text"
                        value="{{ $inspeccion->subestacion->subestacion }}">
                </div>
            </div>


            <div class="col-md-6 row">
                <label class="col-sm-3">Fecha:</label>
                <div bg class="col-sm-9 h-fit" my>
                    <input class="form-control" readonly=»readonly» type="text"
                        value="{{ $inspeccion->fecha_inicio }}" />
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center">
        <hr class="w-4/5">
    </div>
