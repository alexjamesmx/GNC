<div class="row">
    <div class="col-lg-12 stretch-card grid-margin">
        <div class="card">
            <div class="card-body">
                <svg id="spinner_profile" class="animate-spin mb-5"
                    style="display:none;position: relative; top: calc(50% - 24px);
                left: calc(50% - 24px);}"
                    id="spinner" width="48px" height="48px" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.2" fill-rule="evenodd" clip-rule="evenodd"
                        d="M12 19C15.866 19 19 15.866 19 12C19 8.13401 15.866 5 12 5C8.13401 5 5 8.13401 5 12C5 15.866 8.13401 19 12 19ZM12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                        fill="black" />
                    <path d="M2 12C2 6.47715 6.47715 2 12 2V5C8.13401 5 5 8.13401 5 12H2Z" fill="black" />
                </svg>

                <div id="list_calendar">
                    <div class="flex justify-between">
                        <h3>Calendario</h3>
                        <select class="form-select" aria-label="Default select example" id="ano_select">
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                            <option value="2029">2029</option>
                            <option value="2030">2030</option>
                        </select>
                    </div>
                    <hr>

                    <div class="row row-cols-1 row-cols-md-4 g-4">

                        @foreach ($meses as $num => $mes)
                            <div class="col mb-2">
                                <div class="card h-100">
                                    <button class="btn btn-{{ $mes[1] }} m-0 p-0"
                                        onclick="profileMes('{{ $mes[0] }}', {{ $num }})">
                                        <div class="card-body d-flex justify-content-between">
                                            <h4 class="card-title">{{ $mes[0] }}</h4>
                                            <h3><i class="fa-solid fa-calendar-day"></i></h3>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>


                <div id="mes_selec">
                    @include('admin._calendario_mes')
                </div>

                <div id="parke_selec">
                    @include('admin._calendario_parke')
                </div>

                <div id="empresa_selec">
                    @include('admin._calendario_empresa')
                </div>

            </div>
        </div>
    </div>
</div>
